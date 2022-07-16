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
