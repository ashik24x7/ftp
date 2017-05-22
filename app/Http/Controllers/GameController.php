<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;
use App\Game;
use App\Menu;
use App\Shout;
use Storage;
use DB;

class GameController extends Controller
{
    private function byte_to_human($filesize){
        if($filesize <1024){ $size = ceil($filesize) . ' Byte'; }
        elseif($filesize <1048576){ $size = ceil($filesize/1024) . ' KB'; }
        elseif($filesize <1073741824){ $size = ceil($filesize/1048576) . ' MB'; }
        elseif($filesize <1099511627776){ $size = number_format($filesize/1073741824,2) . ' GB'; }
        else{ $size = number_format($filesize/1073741824,2) . ' TB'; }
        return $size;
    }
    public function getAddGame(){
    	$data['submenu'] = Submenu::where('visible',1)->where('main_menu',4)->get();
    	return view('admin.add-games',$data);
    }

    public function postAddGame(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
            'category' => 'required',
            'trailer' => 'required',
	    	'details' => 'required',
    	]);


        $errors = [];
        $message = [];
        $game = Game::pluck('name')->toArray() or NULL;
        if(!in_array($request->name, $game)){
            $data = $request->only('name','category','trailer','details');

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
        			if(stripos($files,'.iso') || stripos($files,'.rar')){
                        $data['path'] = $files;
                        $data['size'] = $this->byte_to_human(Storage::disk('ftp')->size($files_path));
                        $data['platform'] = '';
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
                    $errors[] = 'There is no Game in <b style="font-weight:bold;">'.$path.'</b>';
                }elseif(!isset($data['cover'])){
                    $errors[] = 'There is no cover in <b style="font-weight:bold;">'.$path.'</b>';
                }

        	}else{
        		$errors[] = 'This is not a directory';
        	}
        }else{
            $errors[] = $request->name.' is already exist!';
        }

        
        if(empty($errors) && Game::create($data)){
            $message[] = '<b style="color:green;font-weight:bold;">'.$request->name.'</b> has added successfully';
            return redirect()->to('/admin/game/add')->with('messages', $message);
        }else{
            return redirect()->to('/admin/game/add')->with('errors', $errors);
        }
    }

    public function getAllGame(){
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['games'] = Game::with(['category_name'])->orderBy('id','DESC')->paginate(18);
        return view('home.all-games',$data);
    }

	public function singleGame($id){
        $id = str_replace('-', ' ', $id);
        DB::table('games')->where('name',$id)->increment('views',1);
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['shout'] = Shout::orderBy('created_at','DESC')->paginate(15);
    	$data['game'] = Game::with(['category_name'])->where('name',$id)->first();
        return view('home.single-games',$data);
    }



}
