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


Route::get('test', function () {
$data=[];
Mail::send('babi', $data ,function ($m) {
           $m->from('no-reply@booklapangan.com', 'Your Application');

           $m->to('hlmn.hg@gmail.com', 'hlmn')->subject('test!');
        });

$to      = 'hlmn.hg@gmail.com';

        return view('babi');
});


Route::get('/cari', 'FindController@CariFasor');
Route::get('/', 'FindController@Index');
Route::get('/showlap/{id_fasor}/{tgl}/{start}/{end}/{lapangan}', 'FindController@ShowLap');

Route::get('/signup', 'MemberController@Signup');
Route::post('/daftar', 'MemberController@Daftar');
Route::post('/masuk', 'MemberController@Masuk');
Route::get('/signin', 'MemberController@Signin');
Route::get('/upload', 'OwnerController@UploadLapangan');
Route::post('/tambahlapangan', 'OwnerController@Tambah');
Route::get('/logout', 'MemberController@Logout');

Route::group(['middleware' => 'web'], function () {
   //

    Route::auth();

    Route::get('/home', 'HomeController@index');
});
