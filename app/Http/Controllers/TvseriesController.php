<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;
use App\Tvseries;

class TvseriesController extends Controller
{
    public function getAddTvSeries(){
    	return view('admin.add-tv-series');
    }

    public function getAutoTvSeries(){
    	$data['category'] = Submenu::where(['visible' => 1,'main_menu' => 4])->get();
    	return view('admin.add-tv-series-auto',$data);
    }

    public function postAutoTvSeries(Request $request){

    	$this->validate($request,[
    		'category' => 'required'
    	]);

    	$errors = [];
    	$message = [];
    	$category = Submenu::where('id',$request->category)->first();
    	$path = $category->drive;

    	
    	if (is_dir(public_path($path))){
    		$dir = opendir($path);
    		// $tvseries = Tvseries::pluck('title')->toArray();
    		$tvseries = [];
    		while ($files = readdir($dir)) {
    			if($files == '.' || $files == '..'){
    				continue;
    			}else{
    				if(!in_array($files, $tvseries)){
	    			    $tmp_tvseries_name = $files;
	    				$tvseries_name = str_replace(" ","%20",$files);
	    				$search = @file_get_contents("https://api.themoviedb.org/3/search/tv?api_key=f7d5dae12ee54dc9f51ccac094671b00&query=$tvseries_name&page=1");
	    				if(!$search){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_tvseries_name.'</b>';
	    					continue;
	    				}

	    				$json_search = json_decode($search);

	    				if(isset($json_search->results[0]->id)){
		    				$api_id = $json_search->results[0]->id;
		    			}

	    				$content = @file_get_contents("http://api.themoviedb.org/3/tv/".$api_id."?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00");

	    				if(!$content){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_tvseries_name.'</b>';
	    					continue;
	    				}

	    				$json = json_decode($content);

	                    
	                    if(!$json->poster_path){
	                    	$tvseries_poster = '';
	                    }else{
	                    	$tvseries_poster = "http://image.tmdb.org/t/p/w342/".$json->poster_path;
	                    }
	                    // dd($json);
	                    $poster_exist = '';

	                    $data['genre'] = '';
	                    foreach ($json->genres as $key) {
	                    	$data['genre'] .= $key->name.',';
	                    }
	                    $data['genre'] = trim($data['genre'],',');

	                    $data['language'] = '';
	                    foreach ($json->languages as $key) {
	                    	$data['language'] .= $key.',';
	                    }
	                    $data['language'] = trim($data['language'],',');
	                    $data['title'] = $tmp_tvseries_name;
				    	$data['api_id'] = $json->id;
				    	$data['category'] = $request->category;

				    	$fp2 = @file_get_contents("http://api.themoviedb.org/3/tv/".$api_id."/videos?api_key=f7d5dae12ee54dc9f51ccac094671b00");
				    	if(!$fp2){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_tvseries_name.'</b>';
	    					continue;
	    				}
						$json2 = json_decode($fp2, true);
						$trailer = $json2['results'];
								

						foreach($trailer as $trailers=>$keytrailers){
						   foreach($keytrailers as $alltrailers=>$allkeytrailers){
							   	if($alltrailers == 'key'){
							   		@ $finaltrailers .=  $allkeytrailers.',';
							   	}
						   } 
						}
				    	$data['trailer'] = isset($finaltrailers) ? trim($finaltrailers,',') : '';

				    	$fp3 = @file_get_contents("http://api.themoviedb.org/3/tv/".$api_id."/keywords?api_key=f7d5dae12ee54dc9f51ccac094671b00");
				    	if(!$fp3){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_tvseries_name.'</b>';
	    					continue;
	    				}
						$json3 = json_decode($fp3);
						
					    foreach($json3->results as $keyword){
							@ $data['keyword'] .=  $keyword->name.',';
					    }


					    $data['cast'] = '';
	                    foreach ($json->credits->cast as $key) {
	                    	$data['cast'] .= $key->name.',';
	                    }

	                    if($data['cast'] > 1500){
	                    	$data['cast'] = substr($data['cast'],0,1300);
	                    	return $data['cast'];
	                    }
				    	$data['cast'] = trim($data['cast'],',');
				    	$data['rating'] = $json->vote_average;
				    	$data['release_date'] = $json->first_air_date;
				    	$data['website'] = $json->homepage;
				    	$data['keyword'] = isset($data['keyword']) ? trim($data['keyword'],',') : '';
				    	if(strlen($data['keyword']) > 2000){
				    		$data['keyword'] = substr($data['keyword'],1,2000);
				    	}
				    	$data['story'] = $json->overview;
				    	$data['uploaded_by'] = auth()->guard('admin')->user()->id;
				    	$data['views'] = 1;
	                    $sub_path = $path.DIRECTORY_SEPARATOR.$tmp_tvseries_name;
	                    if (is_dir(public_path($sub_path))){
				    		$sub_dir = opendir($sub_path);
				    		while ($sub_files = readdir($sub_dir)) {
				    			if(stripos($sub_files,'.png') ||stripos($sub_files,'.jpeg') || stripos($sub_files,'.jpg')){
				    				$data['poster'] = $sub_files;
				    				$poster_exist = 1;
				    			}
				    		}
						}else{
							$errors[] = '<b style="font-weight:bold;">'.public_path($sub_path).'</b> is not exist';
						}

						if($poster_exist !==1 && !empty($json->poster_path)){
							$data['poster'] = $poster_name = str_random(20).'.png';
							file_put_contents($sub_path.DIRECTORY_SEPARATOR .$poster_name, file_get_contents($tvseries_poster));

						}

						
						if (Tvseries::where('api_id', '=', $data['api_id'])->exists()) {
							$errors[] = '<b style="font-weight:bold;">API ID: '.$data['api_id'].' for '.$tmp_tvseries_name.'</b> already exist';
							continue;
						}

						if(empty($data['poster'])){
							$errors[] = 'Poster is not exist in <b style="font-weight:bold;">API ID: '.$tmp_tvseries_name.'</b>';
							continue;
						}

						if(Tvseries::create($data)){
							$message[] = '<b style="color:green;font-weight:bold;">'.$tmp_tvseries_name.'</b> has added successfully';
						}

						unset($data);
					}

    			}
    		}
    	}else{
    		$errors[] = '<b style="font-weight:bold;">'.public_path($path).'</b> is not exist';
    	}

    	if(!empty($errors)){
    		return redirect()->to('/admin/tv-series/auto')->with('errors',$errors)->with('messages',$message);
    	}else{
    		return redirect()->to('/admin/tv-series/auto')->with('messages',$message);
    	}


    }
}
