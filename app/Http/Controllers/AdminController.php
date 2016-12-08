<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use App\Submenu;

class AdminController extends Controller
{
    public function getLogin(Request $request){
    	return view('admin.login');
    }

    public function postLogin(Request $request){
    	$this->validate($request,[
    		'username' => 'required',
		    'password' => 'required',
    	]);

    	$data = $request->only('username','password');

    	if(auth()->guard('admin')->attempt($data)){
        	return redirect()->to('/admin/home');
        }else{
        	return redirect()->to('/admin')->with('message','Username/Password Wrong');
        }

    }

    public function getRegister(){
    	return view('admin.register');
    }

    public function postRegister(Request $request){
    	$this->validate($request,[
		    'full_name' => 'required',
    		'username' => 'required|unique:admins',
		    'password' => 'required',
		    're_password' => 'required|same:password',
		    'email' => 'required',
    	]);

    	$data = $request->only('username','full_name','contact_no','about','email');
    	$data['password'] = bcrypt($request->input('password'));
    	$photo = $request->file('photo');
    	$data['photo'] = str_random(20).'.'.$photo->extension();
    	$data['active'] = 1;

        if(Admin::create($data) && $photo->storeAs('photo/admin', $data['photo'], 'public')){
        	return redirect()->to('/admin')->with('message','Your account has created successfully');
        }else{
        	return redirect()->to('/admin')->with('message','Your account creation failed');
        }
    }

    public function getHome(){
    	return view('admin.home');
    }
	
	


}
