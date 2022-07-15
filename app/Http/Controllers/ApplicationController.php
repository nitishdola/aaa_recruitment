<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Validator, DB, Redirect, File;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|max: 255',
            'applied_for'           => 'required',
            'email'                 => 'required|email|max: 255',
            'g-recaptcha-response'  => 'required',
            'mobile_number'         => 'required|numeric|digits:10',
            'experience'            => 'required|numeric|between:0,99.99',
            'cv'                    => "required|mimetypes:application/pdf|max:50000"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Application::where('applied_for', $request->applied_for)
                        ->where(function($query) use ($request){
                            $query->where('email', $request->email);
                            $query->orWhere('mobile_number', $request->mobile_number);
                        })
                        ->count()) {

            return Redirect::back()->with(['message' => '! You have already applied for this post', 'alert-class' => 'alert-danger']);
        } 
            

        $cv_name = strtolower(str_replace(' ', '_', trim($request->name)));

        
        $data = [];
        $data = $request->all();

        if($request->hasFile('cv')){
            $dir      = '/cv_attachments';
            $file = $request->file('cv');
            $cv = $cv_name.'_'.uniqid() . 'cv.' . $file->getClientOriginalExtension();
            $file->move(public_path().$dir, $cv);
            $data['cv_path'] = $cv;
        }
        DB::beginTransaction();

        $data['submission_date'] = date('Y-m-d');
        $data['ip_address']      = $this->getIp();
        $uc = $this->unique_code(9);
        $data['unique_code']     = $uc;
        $data['email_verification_key'] = md5($request->mobile_number.time().uniqid());
        
        Application::create($data);

        DB::commit();

        return Redirect()->route('success', $uc);
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

    public function success(Request $request, $uc) {
        if(Application::where('unique_code', $uc)->count()) {
            return view('application_submit_success', compact('uc'));
        }
        return 'Invalid reference key';
    }

    public function moveFiles() {

        $all_applications = Application::get();
        foreach($all_applications as $k => $v) {
            /*
            $new_folder_name = strtolower(str_replace('','_', $v->applied_for));
            $new_folder_name = strtolower(str_replace(' ','_', $v->new_folder_name));
            $new_folder_name = strtolower(str_replace('(','_', $v->new_folder_name));
            $new_folder_name = strtolower(str_replace(')','_', $v->new_folder_name));

            
            if(file_exists(public_path('cv_attachments/'.$v->cv_path))) {
                $new_path = $new_folder_name.'/'.$v->cv_path;
                copy(
                    public_path('cv_attachments/'.$v->cv_path), 
                    public_path($new_path)
                );
            }
            */

            $new_folder_name = strtolower(str_replace('','_', $v->applied_for));
            $new_folder_name = strtolower(str_replace(' ','_', $v->applied_for));
            
            if (!file_exists($new_folder_name)) {
                mkdir($new_folder_name, 0777, true);
            }

            //print '<br> IS '.$new_folder_name;

            $to = public_path($new_folder_name);
            $file = public_path('cv_attachments/'.$v->cv_path);
            $path_parts = pathinfo($file);

            $newplace   = "$to/{$path_parts['basename']}";//dd($newplace);

            if(file_exists($file)) {
                print $file.' exists ';
                if(rename($file, $newplace))
                    print '<br> moved to '.$newplace;
            }else{
                print '<br>File does not exist '.$file;
            }
            
            //exit;
            
        }
        
    }

}
