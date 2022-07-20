<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'FrontendController@home')->name('frontend_home');

Route::get('/contact', function () {
    return view('layouts.frontend.contact');
});

Route::get('send-mail', function () {
   
    $details = [
        'name' => 'Nitish Dolakasharia',
        'otp' => 5567,
    ];
   
    \Mail::to('nitish.dola@gmail.com')->send(new \App\Mail\OtpMail($details));
   
    dd("Email is Sent.");
});

Route::get('send-sms', function() {
    $otp = 12345;
    $mobile_no = 9706125041;

    //Msg91::sms()->to(['91'.$mobile_no])->flow('62c3c070359b01412a0fd2c3')->variable('loan_amount', $otp)->send();

    Msg91::sms()->to(['91'.$mobile_no])->flow('62d4f96554f44b38077a936e')->variable('OTP', $otp)->send();
});


Route::post('registration', 'Auth\RegisterController@userRegistration')->name('register_user');
Route::get('verify-otp/{mobile_number}', 'Auth\RegisterController@submitOtp')->name('otp_entry');
Route::get('error', 'ErrorController@unauthorizedAccess')->name('error_entry');
Route::post('verify-otp', 'Auth\RegisterController@verifyOtp')->name('otp_verify');



/*Route::post('/save', 'ApplicationController@store')->name('recruitment_form.store');
Route::get('/success/{skey}', 'ApplicationController@success')->name('success');
Route::get('/email-verification/{vkey}', 'ApplicationController@emailVerification');
Route::get('/email-verify', 'ApplicationController@email_verify');
Route::get('/email-verification-success', 'ApplicationController@email_verify_success');

Route::get('/move-files', 'ApplicationController@moveFiles');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin-home', 'HomeController@adminHome')->middleware('is_admin')->name('admin_home');


Route::post('/save-form', 'HomeController@saveData')->name('save_form');
Route::get('/success/{skey}', 'HomeController@applicationSubmit')->name('application_submit');