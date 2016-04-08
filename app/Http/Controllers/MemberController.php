<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Hash;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function Signup()
    {	
    	return view('signup');
    }
    public function Signin()
    {	
        if(Auth::check()){
            return 'udh login mas';
        }
    	return view('signin');
    }

    public function Logout()
    {   
        Auth::logout();
        redirect ('/home');
    }
    public function Daftar(Request $request) {

		$validator = Validator::make($request->all(), [
    		'Nama' => 'required',
    		'email' => 'required|email|unique:users',
    		'password' => 'required',
        ]);
		if ($validator->fails()) {
            return redirect('signup')
                        ->withErrors($validator)
                        ->withInput();
        }
        
       if ($validator->passes()) {

        	$test = new User;
            $test->name= $request->input('Nama');
        	$test->email= $request->input('email');
        	
        	$test->password 	= bcrypt($request->input('password'));
        	$test->save();
              return redirect('/')->with('status', 'Profile updated!');
       }
    }

    public function Masuk(Request $request){

    if (Auth::attempt(['EMAIL' => $request['email'], 'password' => $request['password']]))
    {
    	return redirect('/');
	}
	echo "gagal";
 
    } 

    public function EditProfile(Request $request){

        if (Auth::check())
        {
            return view('editprofil');
        }
        return "login dulu mas";
 
    } 

    public function ChangeName(Request $request){

        $user = \App\User::find(Auth::user()->id);
        $user->name         = $request->nama;
        $user->save();
        return redirect('profile')->with('status', 'Profile updated!');
    } 
    public function ChangeHandphone(Request $request){

        $user = \App\User::find(Auth::user()->id);
        $user->handphone         = $request->handphone;
        $user->save();
        return redirect('profile')->with('status', 'Profile updated!');
    } 
    public function ChangeEmail(Request $request){

        $user = \App\User::find(Auth::user()->id);
        $user->email         = $request->email;
        $user->save();
        return redirect('profile')->with('status', 'Profile updated!');
    } 
}
 