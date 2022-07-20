<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Validator, DB, Redirect;
use App\Models\Master\District;
use App\Models\OnlineApplication;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(OnlineApplication::where('user_id', auth()->user()->id)->count()) {
            $unique_code = OnlineApplication::where('user_id', auth()->user()->id)->first()->unique_code;
            $submission_date = OnlineApplication::where('user_id', auth()->user()->id)->first()->submission_date;
            return view('users.already_submitted', compact('unique_code', 'submission_date'));
        }else{
            $districts = District::pluck('name', 'id');
            return view('users.homepage', compact('districts'));
        }
    }

    public function saveData(Request $request) {
        

        if(isset($request->declaration) && $request->declaration == 'yes'):
            
            $data = $request->all();



            if(!isset($request->assamese_read)) {
                $data['assamese_read'] = 'No';
            }

            if(!isset($request->assamese_write)) {
                $data['assamese_write'] = 'No';
            }

            if(!isset($request->assamese_speak)) {
                $data['assamese_speak'] = 'No';
            }


            if(!isset($request->hindi_read)) {
                $data['hindi_read'] = 'No';
            }

            if(!isset($request->hindi_write)) {
                $data['hindi_write'] = 'No';
            }

            if(!isset($request->hindi_speak)) {
                $data['hindi_speak'] = 'No';
            }


            if(!isset($request->english_read)) {
                $data['english_read'] = 'No';
            }

            if(!isset($request->english_write)) {
                $data['english_write'] = 'No';
            }

            if(!isset($request->english_speak)) {
                $data['english_speak'] = 'No';
            }

            $data['user_id'] = auth()->user()->id;
            
            

            $validator = Validator::make($data, [
                'user_id'               => 'required|exists:users,id',
                'name'                  => 'required|max:255',
                'dob'                   => 'required|date|date_format:Y-m-d',
                'father_name'           => 'required|max:255',
                'mother_name'           => 'required|max:255',
                'present_street_address_1'              => 'required|max:255',
                'present_street_address_2'              => 'required|max:255',
                'present_village_town_city'             => 'required|max:255',
                'present_district_id'                   => 'required|exists:districts,id',
                'present_pin'                           => 'required|digits:6',
                'present_police_station'                => 'required|max:255',

                'permanent_street_address_1'            => 'required|max:255',
                'permanent_street_address_2'            => 'required|max:255',
                'permanent_village_town_city'           => 'required|max:255',
                'permanent_district_id'                 => 'required|exists:districts,id',
                'permanent_pin'                         => 'required|digits:6',
                'permanent_police_station'              => 'required|max:255',

                'nationality'                           => 'required|max:255',
                'employment_exchange_registered'        => 'required|max:10',
                'employment_exchange_number'            => 'max:127',

                'hslc_stream'              => 'max:127',
                'hslc_university'          => 'required|max:127',
                'hslc_percentage'          => 'required|max:127',
                'hslc_division'            => 'required|max:127',

                'hs_stream'                 => 'required|max:127',
                'hs_university'             => 'required|max:127',
                'hs_percentage'             => 'required|max:127',
                'hs_division'               => 'required|max:127',

                'graduation_stream'              => 'max:127',
                'graduation_university'          => 'max:127',
                'graduation_percentage'          => 'max:127',
                'graduation_division'            => 'max:127',

                'others_stream'              => 'max:127',
                'others_university'          => 'max:127',
                'others_percentage'          => 'max:127',
                'others_division'            => 'max:127',

                'computer_knowledge'    => 'required|max:10',
                'experience'            => 'required|max:10',
                'experience_in_health'  => 'numeric',

                'assamese_read'     => 'required',
                'assamese_write'    => 'required',
                'assamese_speak'    => 'required',

                'hindi_read'     => 'required',
                'hindi_write'    => 'required',
                'hindi_speak'    => 'required',

                'english_read'     => 'required',
                'english_write'    => 'required',
                'english_speak'    => 'required',

                //'g-recaptcha-response'  => 'required',

                'hslc_admit_card'       => "required|mimetypes:application/pdf|max:4096",
                'hslc_marksheet'        => "required|mimetypes:application/pdf|max:4096",
                'hslc_certificate'      => "required|mimetypes:application/pdf|max:4096",
                'hs_marksheet'          => "required|mimetypes:application/pdf|max:4096",
                'hs_certificate'        => "required|mimetypes:application/pdf|max:4096",
                'computer_certificate'  => "required|mimetypes:application/pdf|max:4096",
                'exp_certificate'       => "required|mimetypes:application/pdf|max:4096",
                'recent_photo'          => "required|mimes:jpeg,png,jpg,gif,svg|max:4096",
                'signature'             => "required|mimes:jpeg,png,jpg,gif,svg|max:4096",
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            

            try{
                DB::beginTransaction();

                $unique_code = $this->unique_code(9);

                $data['submission_date'] = date('Y-m-d');
                $data['ip_address'] = $this->getIp();
                $data['unique_code'] = $unique_code;
                

                if($request->hasFile('hslc_admit_card')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('hslc_admit_card');
                    $hslc_admit_card = $unique_code.'_'.uniqid() . 'hslc_admit_card.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $hslc_admit_card);
                    $data['hslc_admit_card'] = $hslc_admit_card;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'HSLC Admit Card Missing']);
                }

                if($request->hasFile('hslc_marksheet')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('hslc_marksheet');
                    $hslc_marksheet = $unique_code.'_'.uniqid() . 'hslc_marksheet.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $hslc_marksheet);
                    $data['hslc_marksheet'] = $hslc_marksheet;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'HSLC Marksheet Missing']);
                }

                if($request->hasFile('hslc_certificate')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('hslc_certificate');
                    $hslc_certificate = $unique_code.'_'.uniqid() . 'hslc_certificate.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $hslc_certificate);
                    $data['hslc_certificate'] = $hslc_certificate;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'HSLC Certificate Missing']);
                }


                if($request->hasFile('hs_marksheet')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('hs_marksheet');
                    $hs_marksheet = $unique_code.'_'.uniqid() . 'hs_marksheet.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $hs_marksheet);
                    $data['hs_marksheet'] = $hs_marksheet;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'HS Marksheet Missing']);
                }


                if($request->hasFile('hs_certificate')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('hs_certificate');
                    $hs_certificate = $unique_code.'_'.uniqid() . 'hs_certificate.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $hs_certificate);
                    $data['hs_certificate'] = $hs_certificate;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'HS Certificate Missing']);
                }

                if($request->hasFile('computer_certificate')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('computer_certificate');
                    $computer_certificate = $unique_code.'_'.uniqid() . 'computer_certificate.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $computer_certificate);
                    $data['computer_certificate'] = $computer_certificate;
                }/*else{
                    return Redirect::back()->withInput()->with(['message' => 'Computer Certificate Missing']);
                }*/


                if($request->hasFile('exp_certificate')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('exp_certificate');
                    $exp_certificate = $unique_code.'_'.uniqid() . 'exp_certificate.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $exp_certificate);
                    $data['exp_certificate'] = $exp_certificate;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'Experience Certificate Missing']);
                }


                if($request->hasFile('recent_photo')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('recent_photo');
                    $recent_photo = $unique_code.'_'.uniqid() . 'recent_photo.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $recent_photo);
                    $data['recent_photo'] = $recent_photo;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'Photograph Missing']);
                }


                if($request->hasFile('signature')){
                    $dir      = '/attachments/'.auth()->user()->id;
                    $file = $request->file('signature');
                    $signature = $unique_code.'_'.uniqid() . 'signature.' . $file->getClientOriginalExtension();
                    $file->move(public_path().$dir, $signature);
                    $data['signature'] = $signature;
                }else{
                    return Redirect::back()->withInput()->with(['message' => 'Signature Missing']);
                }

                if(OnlineApplication::create($data)) {

                    $details = [
                        'reference' => $unique_code
                    ];

                    \Mail::to(auth()->user()->email)->send(new \App\Mail\ApplicationSuccessMail($details));

                    DB::commit();
                    toastr()->success('Application submitted successfully !');
                    return Redirect::route('application_submit', $unique_code);
                }else{
                    DB::commit();
                    toastr()->error('Something went wrong ! Please try again');
                    return Redirect::back()->withInput()->with(['message' => 'Something went wrong ! Please try again']);
                }

                
            }catch(\Exception $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
            
        endif;
    }

    public function applicationSubmit(Request $request, $uniquid) {
        if(OnlineApplication::where('unique_code', $uniquid)->count()) {
            return view('users.arm_application_submit', compact('uniquid'));
        }
        return 'Invalid reference key';
    }


    public function adminHome() {
        $results = OnlineApplication::orderBy('name')->with('user', 'present_district', 'permanent_district')->paginate(1000);
        return view('users.admin_home', compact('results'));
    }

    private function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    private function unique_code($limit)
    {
      return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit));
    }
}
