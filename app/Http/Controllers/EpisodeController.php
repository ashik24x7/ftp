<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tvseries;
use App\Episode;

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
    	$data['category'] = $request->category;
    	$data['uploaded_by'] = auth()->guard('admin')->user()->id;

    	$path = $request->path.DIRECTORY_SEPARATOR.$request->session;
    	if (is_dir($path)){
    		$files = scandir($path);
    		sort($files);
    		$i = 1;
    		foreach ($files as $file) {
    			if($file == '.' || $file == '..'){
    				continue;
    			}elseif(strpos($file,'.mkv') || stripos($file,'.mp4') || stripos($file,'.avi') || stripos($file,'.vob')){
    				$episode = Episode::pluck('path')->toArray();
    				if(!in_array($file, $episode)){
	    				$data['episode'] = $i++;
	    				$data['path'] = $file;
	    				$data['size'] = $this->byte_to_human(filesize($path.DIRECTORY_SEPARATOR.$file));
	    				$quality = explode('__', $file);
	    				$data['quality'] = $quality[1];
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
}
