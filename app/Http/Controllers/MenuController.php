<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Submenu;

class MenuController extends Controller
{
	public function getAllMenu(){
		$data['menu'] = Menu::with(['submenu'])->get();
		return view('admin.all-menus',$data);
	}
    public function getMenu(){
    	$data['position'] = 1;
    	$data['position'] += Menu::where('visible',1)->get()->count();
    	return view('admin.add-menu',$data);
    }

    public function postMenu(Request $request){
    	$this->validate($request,[
    		'menu_name' => 'required|unique:menus',
    		'icon' => 'required',
    	]);

    	$data = $request->except('_token');
    	if(Menu::create($data)){
    		return redirect()->to('/admin/menu/all')->with('message','<span style="color:green;font-weight:bold;">Menu has added successfully</span>');
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
            'menu_name' => 'required|unique:submenus',
    		'drive' => 'required'
    	]);

    	$data = $request->except('_token');
    	if(Submenu::create($data)){
    		return redirect()->to('/admin/menu/all')->with('message','<span style="color:green;font-weight:bold;">Submenu has added successfully</span>');
    	}
    }
	
	public function deleteMenu($id){
		
		if(Submenu::where('main_menu', $id)->count() > 0){
			return redirect()->to('/admin/menu/all')->with('error','<span style="color:red;font-weight:bold;">Menu which has submenus can not be deleted</span>');
		}else{
			if(Menu::destroy($id)){
				return redirect()->to('/admin/menu/all')->with('message','<span style="color:green;font-weight:bold;">Menu has deleted successfully</span>');
			}else{
				return redirect()->to('/admin/menu/all')->with('error','<span style="color:red;font-weight:bold;">Menu is not deleted</span>');
			}
		}
	}
	
	public function getEditMenu($id){
		$data['menu'] = Menu::find($id);
		return view('admin.edit-menu',$data);
	}
	
	public function editMenu($id,Request $request){
		$this->validate($request,[
    		'menu_name' => 'required',
			'icon' => 'required',
    	]);

    	$data = $request->except('_token');
		$menu = Menu::find($id);
    	if($menu->update($data)){
    		return redirect()->to('/admin/menu/all')->with('message','<span style="color:green;font-weight:bold;">Menu has updated successfully</span>');
    	}else{
			return redirect()->to('/admin/menu/all')->with('error','<span style="color:red;font-weight:bold;">Menu updatation failed</span>');
		}
	}
	
	
	public function getEditSubMenu($id){
		$data['main_menu'] = Menu::where('visible',1)->get();
    	$data['position'] = 1;
    	$data['position'] += Submenu::where('visible',1)->get()->count();
		$data['submenu'] = Submenu::find($id);
		return view('admin.edit-sub-menu',$data);
	}
	
	public function editSubMenu($id,Request $request){
		
		$this->validate($request,[
    		'main_menu' => 'required',
            'menu_name' => 'required|unique:submenus',
    		'drive' => 'required'
    	]);
		
    	$data = $request->except('_token');
		$submenu = Submenu::find($id);
    	if($submenu->update($data)){
    		return redirect()->to('/admin/menu/all')->with('message','<span style="color:green;font-weight:bold;">Submenu has updated successfully</span>');
    	}else{
			return redirect()->to('/admin/menu/all')->with('error','<span style="color:red;font-weight:bold;">Submenu updatation failed</span>');
		}
	}
	
	
}
