<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Submenu;

class MenuController extends Controller
{
    public function getMenu(){
    	$data['position'] = 1;
    	$data['position'] += Menu::where('visible',1)->get()->count();
    	return view('admin.add-menu',$data);
    }

    public function postMenu(Request $request){
    	$this->validate($request,[
    		'menu_name' => 'required'
    	]);

    	$data = $request->except('_token');
    	if(Menu::create($data)){
    		return redirect()->to('/admin/menu')->with('message','Menu has added successfully');
    	}
    }

    public function getSubMenu(){
    	$data['main_menu'] = Menu::where('visible',1)->get();
    	$data['position'] = 1;
    	$data['position'] += Submenu::where('visible',1)->get()->count();
    	return view('admin.add-sub-menu',$data);
    }

    public function postSubMenu(Request $request){
    	$this->validate($request,[
    		'main_menu' => 'required',
            'menu_name' => 'required',
    		'drive' => 'required'
    	]);

    	$data = $request->except('_token');
    	if(Submenu::create($data)){
    		return redirect()->to('/admin/sub-menu')->with('message','Sub Menu has added successfully');
    	}
    }
}
