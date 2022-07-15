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
Route::get('/', function () {
    return view('layouts.frontend.home');
})->name('home');


Route::post('registration', 'Auth\RegisterController@registration')->name('register');
Route::get('verify-otp', 'Auth\RegisterController@verifyOtp')->name('otp_entry');



/*Route::post('/save', 'ApplicationController@store')->name('recruitment_form.store');
Route::get('/success/{skey}', 'ApplicationController@success')->name('success');
Route::get('/email-verification/{vkey}', 'ApplicationController@emailVerification');
Route::get('/email-verify', 'ApplicationController@email_verify');
Route::get('/email-verification-success', 'ApplicationController@email_verify_success');

Route::get('/move-files', 'ApplicationController@moveFiles');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin-home', 'HomeController@adminHome')->middleware('is_admin')->name('admin_home');
