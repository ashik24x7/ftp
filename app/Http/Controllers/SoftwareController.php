<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;
use App\Software;
use App\Menu;
use App\Game;

class SoftwareController extends Controller
{
    private function mysql_escape($inp){ 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }

    private function byte_to_human($filesize){
        if($filesize <1024){ $size = ceil($filesize) . ' Byte'; }
        elseif($filesize <1048576){ $size = ceil($filesize/1024) . ' KB'; }
        elseif($filesize <1073741824){ $size = ceil($filesize/1048576) . ' MB'; }
        elseif($filesize <1099511627776){ $size = number_format($filesize/1073741824,2) . ' GB'; }
        else{ $size = number_format($filesize/1073741824,2) . ' TB'; }
        return $size;
    }


    public function getAddSoftware(){
    	$data['submenu'] = Submenu::where('visible',1)->where('main_menu',2)->get();
    	return view('admin.add-software',$data);
    }

    public function postAddSoftware(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
	    	'category' => 'required'
    	]);

        $errors = [];
        $message = [];
        $software = Software::pluck('name')->toArray();
        if(!in_array($request->name, $software)){
            $data = $request->only('name','category','requirement');
            $data['requirement'] = $request->requirement;

            $data['added_by'] = auth()->guard('admin')->user()->id;

            $category = Submenu::where('id',$request->category)->first();
            
            $path = $category->drive . DIRECTORY_SEPARATOR . $request->name;

        	if (is_dir(public_path($path))){
        		$dir = opendir($path);
        		while ($files = readdir($dir)) {
        			if($files == '.' || $files == '..'){
        				continue;
        			}elseif(stripos($files,'.png') || stripos($files,'.jpg')){
                        $data['cover'] = $files;
                        $poster_exist = 1;
                    }elseif(stripos($files,'.exe')){
                        $data['path'] = $files;
                        $data['size'] = $this->byte_to_human(filesize($path.DIRECTORY_SEPARATOR.$files));
                        $data['platform'] = 'Windows';
                        $data['views'] = 1;
                    }
        		}

                if(!isset($data['cover']) && $request->file('cover') !== null){
                    if($cover = $request->file('cover')){
                        $cover_name = str_random(20).'.'.$cover->extension();
                        $cover->move(public_path($path),$cover_name);
                    }
                }

                if(!isset($data['path'])){
                    $errors[] = 'There is no software in <b style="font-weight:bold;">'.$path.'</b>';
                }elseif(!isset($data['cover'])){
                    $errors[] = 'There is no cover in <b style="font-weight:bold;">'.$path.'</b>';
                }

        	}else{
        		$errors[] = 'This is not a directory';
        	}
        }else{
            $errors[] = $request->name.' is already exist!';
        }
        
        if(empty($errors) && Software::create($data)){
            $message[] = '<b style="color:green;font-weight:bold;">'.$request->name.'</b> has added successfully';
            return redirect()->to('/admin/software/add')->with('messages', $message);
        }else{
            return redirect()->to('/admin/software/add')->with('errors', $errors);
        }
    }

    public function allSoftwares(){
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['softwares'] = Software::with(['category_name'])->orderBy('id','DESC')->paginate(18);
        $data['games'] = Game::with(['category_name'])->orderBy('id','DESC')->paginate(8);
        return view('home.all-softwares',$data);
    }
}
