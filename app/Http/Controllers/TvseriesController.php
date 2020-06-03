<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;
use App\Tvseries;
use App\Episode;
use App\Menu;
use DB;
use Storage;

class TvseriesController extends Controller
{
	
	public function tmdb(Request $request){
		$tvseries_name = str_replace(" ","%20",trim($request->name));
		$search = @file_get_contents("https://api.themoviedb.org/3/search/tv?api_key=f7d5dae12ee54dc9f51ccac094671b00&query=$tvseries_name&page=1");

		if($search){
			$json_search = json_decode($search);

			if(isset($json_search->results[0]->id)){
				$api_id = $json_search->results[0]->id;
			}else{
				return false;
			}
		}else{
			return false;
		}

		

		$content = @file_get_contents("http://api.themoviedb.org/3/tv/".$api_id."?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00");

		if(!$content){
			$errors[] = 'No information found from api for <b style="font-weight:bold">'.$request->name.'</b>';
		}

		$json = json_decode($content);

		if(!$json->poster_path){
			$tvseries_poster = '';
		}else{
			$tvseries_poster = "http://image.tmdb.org/t/p/w342/".$json->poster_path;
		}
		
		

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
		$data['title'] = trim($request->name);
		$data['api_id'] = $json->id;

		$data['overview'] = $json->overview;

		$fp2 = @file_get_contents("http://api.themoviedb.org/3/tv/".$api_id."/videos?api_key=f7d5dae12ee54dc9f51ccac094671b00");
		if(!$fp2){
			$errors[] = 'No information found from api for <b style="font-weight:bold">'.$request->name.'</b>';
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


		$data['published'] = 1;


		$data['trailer'] = isset($finaltrailers) ? trim($finaltrailers,',') : '';
		
		unset($finaltrailers);

		if(empty($data['trailer'])){
			$data['published'] = 0;
			$errors[] = 'Trailer not found from api for <b style="font-weight:bold">'.$request->name.'</b>';
		}

		$fp3 = @file_get_contents("http://api.themoviedb.org/3/tv/".$api_id."/keywords?api_key=f7d5dae12ee54dc9f51ccac094671b00");
		if(!$fp3){
			$errors[] = 'No information found from api for <b style="font-weight:bold">'.$request->name.'</b>';
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

		return json_encode(array(
		  'title' => $data['title'],
		  'id' => $data['api_id'],
		  'poster' => $tvseries_poster,
		  'overview' => $data['overview'],
		  'release_date' => $data['release_date'],
		  'vote_average' => $data['rating'],
		  'homepage' => $data['website'],
		  'genres' =>   $data['genre'],
		  'youtube' =>  $data['trailer'],
		  'keywords' => $data['keyword'],
		  'spokenLanguages' => $data['language'],
		  'images' => $tvseries_poster,
		  'castname' => $data['cast']
		));

		
    }

	public function omdb(Request $request){
		// `title`, `api_id`, `category`, `trailer`, `rating`, `genre`, `cast`, `release_date`, `language`, `website`, `keyword`, `story`, `poster`, `views`, `published`, `uploaded_by`
    	$omdb = file_get_contents("http://www.omdbapi.com/?t=$request->name&plot=full&apikey=f96ceddd");
		
		$movie = json_decode($omdb); //This will convert it to an array
		
		$finaltrailers  = '';
		$finalkeywords  = '';
			   
	    $api_trailer = @file_get_contents("http://api.themoviedb.org/3/tv/".$movie->imdbID."/videos?api_key=f7d5dae12ee54dc9f51ccac094671b00");
		$movie_trailer = json_decode($api_trailer, true);
		$trailer = $movie_trailer['results'];
				

		foreach($trailer as $trailers=>$keytrailers){
		   foreach($keytrailers as $alltrailers=>$allkeytrailers){
			   	if($alltrailers == 'key'){
			   		@ $finaltrailers .=  $allkeytrailers.',';
			   	}
		   } 
		}
				   
				   
		$api_keywords = @file_get_contents("http://api.themoviedb.org/3/tv/".$movie->imdbID."/keywords?api_key=f7d5dae12ee54dc9f51ccac094671b00");
		$movie_keywords = json_decode($api_keywords, true);
		$keywords = $movie_keywords['keywords'];
		
		foreach($keywords as $allkeywords=>$keykeywords){
		   foreach($keykeywords as $totalkeywords=>$keytotalkeywords){
			   if($totalkeywords == 'name'){
					  @ $finalkeywords .=  $keytotalkeywords.',';
			   }
		   }
	    }
		
		if(trim($movie->Released) !== 'N/A'){
			$movie->Released = Carbon::parse($movie->Released);
		}else{
			$movie->Released = '';
		}
		
		$finalkeywords = !empty($finalkeywords) ? $finalkeywords : "N/A";
		$finaltrailers = !empty($finaltrailers) ? $finaltrailers : "N/A";
		   
		return json_encode(array(
		  'title' => $movie->Title,
		  'MovieYear' => date("Y",strtotime($data['release_date'])),
		  'id' => $movie->imdbID,
		  'poster' => $movie->Poster,
		  'overview' => $movie->Plot,
		  'release_date' => $movie->Released,
		  'vote_average' => $movie->imdbRating,
		  'runtime' => $movie->Runtime,
		  'homepage' => $movie->Website,
		  'genres' => $movie->Genre,
		  'youtube' =>  trim($finaltrailers,","),
		  'keywords' => trim($finalkeywords,","),
		  'spokenLanguages' => $movie->Language,
		  'images' => "",
		  'castname' => $movie->Actors,
		  'castprofile' => "",
		  'finalCastcharacter' => "",
		  'crewname' => "",
		  'crewprofile' => "",
		  'finalCrewdepartment' => ""
		));
    }

	public function api(Request $request){
		if(!empty($request->name) && isset($request->name)){
			return $this->tmdb($request);
		}elseif(!empty($request->name) && isset($request->name)){
			return $this->omdb($request);
		}
	}


    public function getAddTvSeriesNew(){
    	return view('admin.add-tv-series-new');
    }
 	public function getAddTvSeries(){
 		$data['category'] = Submenu::where(['main_menu'=>2,'visible' => 1])->get();
    	return view('admin.add-tv-series',$data);
    }

    public function postAddTvSeries(Request $request){
    	
    	$this->validate($request,[
    		'api_id' => 'required',
    		'title' => 'required',
    		'category' => 'required',
    		'trailer' => 'required',
	    	'rating' => 'required',
	    	'genre' => 'required',
	    	'release_date' => 'required',
	    	'language' => 'required',
	    	'story' => 'required'
    	]);

    	$errors = [];
    	$message = [];
    	$category = Submenu::where('id',$request->category)->first();
    	if(!$category){
			$errors[] = '<b style="font-weight:bold;">Categorty</b> is not selected';
		}
    	$path = $category->drive. DIRECTORY_SEPARATOR .$request->title;
		
		$poster_dir = $category->drive;
		
		$poster_dir = str_replace('fs1/','',$poster_dir);
		$poster_dir = str_replace('fs2/','',$poster_dir);
		$poster_dir = str_replace('fs3/','',$poster_dir);
		$poster_dir = str_replace('fs4/','',$poster_dir);
		$poster_dir = strtolower($poster_dir);
		
		$poster_name = str_replace(' ', '_', $request->title);
		$poster_name = str_replace('?', '', $poster_name);
		$poster_name = str_replace('.', '', $poster_name);
		$poster_name = str_replace('!', '', $poster_name);
		$poster_name = str_replace(':', '', $poster_name).'.png';
    	
		if(!Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name) && $poster = $request->file('poster')){
			
			Storage::putFileAs($poster_dir, $poster, $poster_name);
			$data['poster'] = $poster_name;
    	}
    	$data = $request->except('_token','name','TvSeriesSubmit','poster_path');
		
    	$data['uploaded_by'] = auth()->guard('admin')->user()->id;
    	
    	$data['published'] = 1;

		if(!Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name) && !empty($request->poster_path)){
			if(!Storage::exists($poster_dir)){
				Storage::makeDirectory($poster_dir);
			}
			Storage::put($poster_dir.DIRECTORY_SEPARATOR.$poster_name, file_get_contents($request->poster_path));
			$data['poster'] = $poster_name;

		}else{
			$data['poster'] = $poster_name;
		}
		
		$data['views'] = 1;
		
		if($data['rating'] <=0 ){
			$errors[] = '<b style="font-weight:bold;">IMD Rating</b> is missing';
		}
		
		if(empty($errors) && Tvseries::create($data)){
			$message[] = '<b style="color:green;font-weight:bold;">'.$request->title.'</b> has added successfully';
			return redirect()->to('/admin/tv-series/add')->with('messages', $message);
		}else{
			return redirect()->to('/admin/tv-series/add')->with('errors', $errors);
		}

    }

    public function getAutoTvSeries(){
    	$data['category'] = Submenu::where(['visible' => 1,'main_menu' => 2])->get();
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
		
		$poster_dir = ltrim($category->drive,'fs1/');
		$poster_dir = strtolower($poster_dir);

    	if (Storage::disk('ftp')->exists($path)){
    		$dir = Storage::disk('ftp')->directories($path);
    		$tvseries = Tvseries::pluck('title')->toArray();
    		//$tvseries = [];
			
    		foreach ($dir as $sub_path) {
				$data = explode("/",$sub_path);
				$files = end($data);
				$poster_name = str_replace(' ', '_', $files);
				$poster_name = str_replace('?', '', $poster_name);
				$poster_name = str_replace('.', '', $poster_name);
				$poster_name = str_replace('!', '', $poster_name);
				$poster_name = str_replace(':', '', $poster_name).'.png';
				
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


					$data['published'] = 1;


					$data['trailer'] = isset($finaltrailers) ? trim($finaltrailers,',') : '';
					
					unset($finaltrailers);

					if(empty($data['trailer'])){
						$data['published'] = 0;
						$errors[] = 'Trailer not found from api for <b style="font-weight:bold">'.$tmp_tvseries_name.'</b>';
						continue;
					}

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

					$tvseries_poster = file_get_contents($tvseries_poster);
					if(empty($tvseries_poster)){
						$data['published'] = 0;
						$errors[] = 'Poster not found from api for <b style="font-weight:bold">'.$tmp_tvseries_name.'</b>';
						continue;
					}

					if(!Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name) && !empty($json->poster_path)){
						if(!Storage::exists($poster_dir)){
							Storage::makeDirectory($poster_dir);
						}
						Storage::put($poster_dir.DIRECTORY_SEPARATOR.$poster_name, $tvseries_poster);
						$data['poster'] = $poster_name;
					}else{
						$data['poster'] = $poster_name;
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
    	}else{
    		$errors[] = '<b style="font-weight:bold;">'.$path.'</b> is not exist';
    	}

    	if(!empty($errors)){
    		return redirect()->to('/admin/tv-series/auto')->with('errors',$errors)->with('messages',$message);
    	}else{
    		return redirect()->to('/admin/tv-series/auto')->with('messages',$message);
    	}


    }


    public function getAllTvSeries(){
		$search = Tvseries::pluck('title');
    	$str = '';
    	foreach ($search as $key) {
    		$str .= '"'.$key.'",';
    	}
    	$data['search'] = rtrim($str,',');
    	$data['tvseries'] = Tvseries::with(['category_name'])->orderBy('id','DESC')->paginate(18);
    	return view('admin.view-tv-series',$data);
    }
	
	public function adminFilterTvSeries(Request $request){

    	$search = Tvseries::pluck('title');

    	$str = '';
    	foreach ($search as $key) {
    		$str .= '"'.$key.'",';
    	}
    	$data['search'] = rtrim($str,',');
		
    	$data['tvseries'] = Tvseries::with(['category_name'])->where('title',$request->str)->orWhere('api_id',$request->str)->paginate(5);

    	if($data['tvseries']->count() == 0){
			return redirect()->to('/admin/tv-series/search')->with('messages','Nothing Found');
		}


		$data['history'] = $request->str;
    	return view('admin.view-tv-series',$data);
    }


    public function allTvSeries(){

        $data['tvseries'] = Tvseries::with(['category_name','episode'])->where('published',1)->orderBy('id','DESC')->paginate(18);
    	$data['menu'] = Menu::with(['submenu'])->get();
    	return view('home.all-tv-series',$data);
    }

    public function singleTvSeries($id){
    	$id = str_replace('-', ' ', $id);
        $id = str_replace('*', '-', $id);
        DB::table('tvseries')->where('title',$id)->increment('views',1);
    	$data['tvseries'] = Tvseries::with(['category_name'])->where('title',$id)->first();
    	$data['menu'] = Menu::with(['submenu'])->get();
    	return view('home.single-tv-series',$data);
    }


    public function deleteTvseries($id){
    	$tvseries = Tvseries::find($id);
    	$tvseries_name = $tvseries->title;
    	if($tvseries->delete()){
    		return redirect()->to('/admin/tv-series/all')->with('messages',$tvseries_name.' has deleted!');
    	}else{
    		return redirect()->to('/admin/tv-series/all')->with('messages',$tvseries_name.' deleatation failed!');
    	}
    }


}
