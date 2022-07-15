<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB, Msg91;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    public function registration(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|digits:10',
            'email' => 'required|email|max:128',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $otp = mt_rand(100000, 999999);

        //check if already registered
        DB::beginTransaction();

        try {
            //MOBILE NUMBER EXISTS CHECK
            $userPhoneExist = User::where([['mobile_number',$request->mobile_number],['otp_verified','!=',null],['is_active',1]])->count();
            if($userPhoneExist){
                return back()->with(['message' => 'Mobile number already exists', 'alert-class' => 'alert-danger']);
            }


            //EMAIL EXISTS CHECK
            $userEmailExist = User::where([['email',$request->email],['otp_verified','!=',null],['is_active',1]])->count();
            if($userEmailExist){
                return back()->with(['message' => 'Email already exists', 'alert-class' => 'alert-danger']);
            }

            User::where([['mobile_number',$request->mobile_number],['otp_verified','!=',null],['is_active',0]])->orWhere([['mobile_number',$request->mobile_number],['otp_verified','=',null],['is_active',0]])->delete();

            $user = User::create([
                    'name'          => trim($request->get('name')),
                    'email_address' => trim($request->get('email_address')),
                    'mobile_number' => trim($request->get('mobile_number')),
                    'password'      => Hash::make($request->get('password')),
                    'otp'           => $otp,
                    'otp_received_at' => date('Y-m-d H:i:s');
            ]);


            DB::commit();
            
            /*
            Msg91::otp()
                ->to(919706125041) 
                ->template('your_template_id')
                ->send();
            */

            return route('otp_entry')->with(['message' => 'Enter the OTP received in your mobile', 'alert-class' => 'alert-success']);
        }catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return 'RegistersUsers';

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
