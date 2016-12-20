<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;

class SoftwareController extends Controller
{
    public function getAddSoftware(){
    	$data['submenu'] = Submenu::where('visible',1)->where('main_menu',3)->get();
    	return view('admin.add-software',$data);
    }

    public function postAddSoftware(Request $request){
    	$this->validate($request,[
    		'title' => 'required',
	    	'category' => 'required'
    	]);
    	$errors = [];
    	$message = [];
    	
    	$path = 'fs' . DIRECTORY_SEPARATOR . 'software' . DIRECTORY_SEPARATOR .$request->category . DIRECTORY_SEPARATOR . $request->title;
    	dd(public_path($path));
    	if (is_dir(public_path($path))){
    		$dir = opendir($path);
    		while ($files = readdir($dir)) {
    			if($files == '.' || $files == '..'){
    				continue;
    			}else{
    				echo $files;
    			}
    		}
    	}else{
    		return 'This is not a directory';
    	}
    }
}
