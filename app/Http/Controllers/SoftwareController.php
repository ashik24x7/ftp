<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;
use App\Software;
use App\Menu;
use App\Game;
use App\Shout;
use App\Movie;
use Storage;
use DB;

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
    	$data['submenu'] = Submenu::where('visible',1)->where('main_menu',3)->get();
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
			$poster_dir = ltrim($category->drive,'fs1/');
			$poster_name = str_replace(' ', '_', $request->name).'.png';

        	if (Storage::disk('ftp')->exists($path)){
        		$dir = Storage::disk('ftp')->files($path);
        		foreach($dir as $files_path) {
					$files = explode("/",$files_path);
    				$files = end($files);
        			if(stripos($files,'.exe')){
                        $data['path'] = $files;
                        $data['size'] = $this->byte_to_human(Storage::disk('ftp')->size($files_path));
                        $data['platform'] = 'Windows';
                        $data['views'] = 1;
                    }
        		}

                if($cover = $request->file('cover')){
					if(Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name)){
						Storage::delete($poster_dir.DIRECTORY_SEPARATOR.$poster_name);
					}
                    Storage::putFileAs($poster_dir, $cover, $poster_name);
					$data['cover'] = $poster_name;
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
	
	public function singleSoftware($id){
        $id = str_replace('-', ' ', $id);
        DB::table('softwares')->where('name',$id)->increment('views',1);
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['shout'] = Shout::orderBy('created_at','DESC')->paginate(15);
    	$data['software'] = Software::with(['category_name'])->where('name',$id)->first();
        return view('home.single-software',$data);
    }
	
	
}
