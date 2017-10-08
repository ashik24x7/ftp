<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tvseries;
use App\Episode;
use App\Menu;
use App\Shout;
use Storage;
use DB;


class EpisodeController extends Controller
{
	private function byte_to_human($filesize){
        if($filesize <1024){ $size = ceil($filesize) . ' Byte'; }
        elseif($filesize <1048576){ $size = ceil($filesize/1024) . ' KB'; }
        elseif($filesize <1073741824){ $size = ceil($filesize/1048576) . ' MB'; }
        elseif($filesize <1099511627776){ $size = number_format($filesize/1073741824,2) . ' GB'; }
        else{ $size = number_format($filesize/1073741824,2) . ' TB'; }
        return $size;
    }

    public function getAutoEpisode($id){
    	$data['tvseries'] = Tvseries::with(['category_name'])->find($id);
    	return view('admin.add-tv-episode',$data);
    }

    public function postAutoEpisode(Request $request){
    	$this->validate($request,[
    		'path' => 'required',
    		'category' => 'required',
    		'tvseries' => 'required',
    		'session' => 'required',
    	]);

    	$errors = [];
    	$message = [];
    	$data = [];
    	$data['tvseries_id'] = $request->tvseries;
    	$data['season'] = (int)trim(str_replace('Season', '', $request->session));
    	$data['category'] = (int)$request->category;
    	$data['uploaded_by'] = auth()->guard('admin')->user()->id;
		
    	$path = $request->path.DIRECTORY_SEPARATOR.$request->session;
    	if (Storage::disk('ftp')->exists($path)){
    		$files = Storage::disk('ftp')->files($path);
    		natsort($files);
    		
    		foreach ($files as $sub_file) {
    			$tmp = explode("/",$sub_file);
				$file = end($tmp);
				if(strpos($file,'.mkv') || stripos($file,'.mp4') || stripos($file,'.avi') || stripos($file,'.vob')){
    				$episode = Episode::pluck('path')->toArray();
    				if(!in_array($file, $episode)){
	    				$data['path'] = $file;
	    				$data['size'] = $this->byte_to_human(Storage::disk('ftp')->size($sub_file));
	    				$tmp_file = explode('__', $file);
	    				$data['quality'] = $tmp_file[1];
						$data['views'] = 1;
						
						$tmp_episode = explode('E',$tmp_file[0]);
						$data['episode'] = (int) end($tmp_episode);
						
	    				if(Episode::create($data)){
							$message[] = '<b style="color:green;font-weight:bold;">Episode: '.$data['episode'].'</b> has added successfully';
						}else{
							$errors[] = 'Error at <b style="font-weight:bold;">Episode: '.$data['episode'].'</b>';
						}
	    			}
    			}
    		}
    	}

    	$to = '/admin/episode/auto/'.$request->tvseries;
    	if(!empty($errors)){
    		return redirect()->to($to)->with('errors',$errors)->with('messages',$message);
    	}else{
    		return redirect()->to($to)->with('messages',$message);
    	}
    }


    public function singleEpisode($tv,$season,$episode){
		DB::table('episodes')->where('id',$episode)->increment('views',1);
		$data['shout'] = Shout::orderBy('created_at','DESC')->paginate(200);
    	$data['episode'] = Episode::with(['category_name','tvseries'])->where(['tvseries_id'=>$tv,'season'=>$season,'episode'=>$episode])->first();
    	$data['menu'] = Menu::with(['submenu'])->get();
    	return view('home.single-tv-episode',$data);
    }
	
	public function allEpisodes(){

        $data['episodes'] = Episode::with(['category_name','tvseries'])->orderBy('id','DESC')->paginate(18);
    	$data['menu'] = Menu::with(['submenu'])->get();
    	return view('home.all-tv-episode',$data);
    }
	
}
