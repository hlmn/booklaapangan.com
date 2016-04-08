<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/tes', function () {
	return view('new');
});
Route::get('/nama', function () {
	return view('nama');
});
Route::get('/handphone', function () {
	return view('handphone');
});
Route::get( '/settings/new', array(
    'as' => 'settings.new',
    'uses' => 'SettingsController@add'
) );
Route::post('/changehp', 'MemberController@ChangeHandphone');
Route::post('/changename', 'MemberController@ChangeName');
Route::post('/changeemail', 'MemberController@ChangeEmail');

//Settings: create a new setting
Route::post( '/settings', array(
    'as' => 'settings.create',
    'uses' => 'SettingsController@create'
) );
Route::get('/cari', 'FindController@CariFasor');
Route::get('/', 'FindController@Index');
Route::get('/showlap/{id_fasor}/{tgl}/{start}/{end}/{lapangan}', 'FindController@ShowLap');
Route::get('/profile', 'MemberController@EditProfile');
Route::get('/signup', 'MemberController@Signup');
Route::post('/daftar', 'MemberController@Daftar');
Route::post('/changepassword', 'MemberController@ChangePassword');
Route::post('/changeprofile', 'MemberController@ChangeProfile');
Route::post('/masuk', 'MemberController@Masuk');
Route::get('/signin', 'MemberController@Signin');
Route::get('/upload', 'OwnerController@UploadLapangan');
Route::post('/dropdown', 'OwnerController@DropdownLapangan');
Route::post('/tambahlapangan', 'OwnerController@Tambah');
Route::get('/logout', 'MemberController@Logout');

Route::group(['middleware' => 'web'], function () {
   //

    Route::auth();

    Route::get('/home', 'HomeController@index');
});
