<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Submenu;
use App\Quality;
use App\Movie;

class MovieController extends Controller
{	
	
	private function byte_to_human($filesize){
        if($filesize <1024){ $size = ceil($filesize) . ' Byte'; }
        elseif($filesize <1048576){ $size = ceil($filesize/1024) . ' KB'; }
        elseif($filesize <1073741824){ $size = ceil($filesize/1048576) . ' MB'; }
        elseif($filesize <1099511627776){ $size = number_format($filesize/1073741824,2) . ' GB'; }
        else{ $size = number_format($filesize/1073741824,2) . ' TB'; }
        return $size;
    }

	public function getAddMovieAuto(){
    	$data['category'] = Submenu::where('visible',1)->get();
    	$data['total'] = Movie::count();
    	$data['unpublish'] = Movie::where('published',NULL)->count();
    	return view('admin.add-movie-auto',$data);
    }

    public function addMovieAuto(Request $request){
    	$this->validate($request,[
	    	'category' => 'required',
	    	'year' => 'required'
    	]);
    	$errors = [];
    	$message = [];
    	$category = Submenu::where('id',$request->category)->first();
    	
    	$path = $category->drive . DIRECTORY_SEPARATOR . $category->menu_name . DIRECTORY_SEPARATOR .$request->year;

    	if (is_dir(public_path($path))){
    		$dir = opendir($path);
    		$movies = Movie::pluck('title')->toArray();
    		while ($files = readdir($dir)) {
    			if($files == '.' || $files == '..'){
    				continue;
    			}else{
	    			$tmp_data = explode('[', $files);
	    			$movie_name = trim($tmp_data[0]);
	    			$movie_name_title = $movie_name;

    				if(!in_array($movie_name, $movies)){
	    				$tmp_movie_name = $files;
	    				$movie_name = str_replace(" ","%20",$movie_name);
	    				$omdbapi = @file_get_contents("http://www.omdbapi.com/?t=$movie_name&y=$request->year&plot=full");
	    				if(!$omdbapi){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_movie_name.'</b>';
	    					continue;
	    				}

	    				$json_imdb = json_decode($omdbapi, true);
	    				if(isset($json_imdb['imdbID'])){
		    				$api_id = $json_imdb['imdbID'];
		    			}
	    				$api = @file_get_contents("http://api.themoviedb.org/3/movie/".$api_id."?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00");

	    				if(!$api){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_movie_name.'</b>';
	    					continue;
	    				}


	    				$json = json_decode($api);

	                    
	                    if(!$json->poster_path){
	                    	$movie_poster = '';
	                    }else{
	                    	$movie_poster = "http://image.tmdb.org/t/p/w342/".$json->poster_path;
	                    }
	                    $poster_exist = '';

	                    $data['genre'] = '';
	                    foreach ($json->genres as $key) {
	                    	$data['genre'] .= $key->name.',';
	                    }
	                    $data['genre'] = trim($data['genre'],',');

	                    $data['language'] = '';
	                    foreach ($json->spoken_languages as $key) {
	                    	$data['language'] .= $key->name.',';
	                    }
	                    $data['language'] = trim($data['language'],',');
	                    $data['title'] = $movie_name_title;
				    	$data['year'] = $request->year;
				    	$data['api_id'] = $json->imdb_id;
				    	$data['category'] = $request->category;

				    	$fp2 = @file_get_contents("http://api.themoviedb.org/3/movie/".$api_id."/videos?api_key=f7d5dae12ee54dc9f51ccac094671b00");
				    	if(!$fp2){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_movie_name.'</b>';
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

				    	$fp3 = @file_get_contents("http://api.themoviedb.org/3/movie/".$api_id."/keywords?api_key=f7d5dae12ee54dc9f51ccac094671b00");
				    	if(!$fp3){
	    					$errors[] = 'No information found from api for <b style="font-weight:bold">'.$tmp_movie_name.'</b>';
	    					continue;
	    				}
						$json3 = json_decode($fp3, true);
						$keywords = $json3['keywords'];
						
						foreach($keywords as $allkeywords=>$keykeywords){
						   foreach($keykeywords as $totalkeywords=>$keytotalkeywords){
							   if($totalkeywords == 'name'){
									  @ $finalkeywords .=  $keytotalkeywords.',';
							   }
						   }
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
				    	$data['release_date'] = $json->release_date;
				    	$data['website'] = $json->homepage;
				        $data['time'] = $json->runtime;
				    	$data['keyword'] = isset($finalkeywords) ? trim($finalkeywords,',') : '';
				    	if(strlen($data['keyword']) > 2000){
				    		$data['keyword'] = substr($data['keyword'],1,2000);
				    	}
				    	$data['story'] = $json->overview;
				    	$data['uploaded_by'] = auth()->guard('admin')->user()->id;
				    	$data['views'] = 1;

	                    $sub_path = $path.DIRECTORY_SEPARATOR.$tmp_movie_name;
	                    if (is_dir(public_path($sub_path))){
				    		$sub_dir = opendir($sub_path);
				    		while ($sub_files = readdir($sub_dir)) {
				    			if(strpos($sub_files,'.mkv') || stripos($sub_files,'.mp4') || stripos($sub_files,'.avi') || stripos($sub_files,'.vob')){
				    				$data['path'] = $sub_files;
				    				$data['size'] = $this->byte_to_human(filesize($sub_path.DIRECTORY_SEPARATOR.$sub_files));
				    				$quality = explode('__', $sub_files);
				    				$data['quality'] = $quality[1];
				    			}elseif(stripos($sub_files,'.png') || stripos($sub_files,'.jpg')){
				    				$data['poster'] = $sub_files;
				    				$poster_exist = 1;
				    			}elseif(stripos($sub_files,'.srt')){
				    				$data['subtitle'] = $sub_files;
				    			}elseif(strpos($sub_files,'.m4v')){
				    				$errors[] = '<b style="font-weight:bold;">'.$sub_files.'</b>\'s extension is unsupported';
				    				continue(2);
				    			}
				    		}
						}else{
							$errors[] = '<b style="font-weight:bold;">'.public_path($sub_path).'</b> is not exist';
						}
						if($poster_exist !==1 && !empty($json->poster_path)){
							$data['poster'] = $poster_name = str_random(20).'.png';
							file_put_contents($sub_path.DIRECTORY_SEPARATOR .$poster_name, file_get_contents($movie_poster));

						}

						if (Movie::where('api_id', '=', $data['api_id'])->exists()) {
							$errors[] = '<b style="font-weight:bold;">API ID: '.$data['api_id'].' for '.$tmp_movie_name.'</b> already exist';
							continue;
						}

						if(empty($data['poster'])){
							$errors[] = 'Poster is not exist in <b style="font-weight:bold;">API ID: '.$tmp_movie_name.'</b>';
							continue;
						}

						if(Movie::create($data)){
							unset($data);
							$message[] = '<b style="color:green;font-weight:bold;">'.$tmp_movie_name.'</b> has added successfully';
						}
					}

    			}
    		}
    	}else{
    		$errors[] = '<b style="font-weight:bold;">'.public_path($path).'</b> is not exist';
    	}

    	if(!empty($errors)){
    		return redirect()->to('/admin/movie/auto')->with('errors',$errors)->with('messages',$message);
    	}else{
    		return redirect()->to('/admin/movie/auto')->with('messages',$message);
    	}

    }


    public function getAddMovieManual(){
    	$data['category'] = Submenu::where('visible',1)->get();
    	return view('admin.add-movie-manual',$data);
    }

    public function addMovieManual(Request $request){
    	$this->validate($request,[
    		'title' => 'required',
	    	'year' => 'required',
	    	'api_id' => 'required',
	    	'category' => 'required',
	    	'trailer' => 'required',
	    	'rating' => 'required',
	    	'genre' => 'required',
	    	'release_date' => 'required',
	    	'language' => 'required',
	    	'time' => 'required',
	    	'story' => 'required'
    	]);
    	
    	$errors = [];
    	$message = [];

    	
    	$category = Submenu::where('id',$request->category)->first();
    	
    	$path = $category->drive. DIRECTORY_SEPARATOR .$category->menu_name. DIRECTORY_SEPARATOR .$request->year. DIRECTORY_SEPARATOR .$request->title.' ['.$request->year.']';

    	if($poster = $request->file('poster')){
    		$poster_name = str_random(20).'.'.$poster->extension();
    		$poster->move(public_path($path),$poster_name);
    	}

    	$data = $request->except('_token','poster_path','Moviesbackdrops','MovieSubmit');
    	$data['uploaded_by'] = auth()->guard('admin')->user()->id;

    	$movies = Movie::pluck('title')->toArray();

    	if (is_dir(public_path($path))){
    		$dir = opendir($path);

    		if(!in_array($request->title, $movies)){
    			$poster_exist = '';
    			while ($files = readdir($dir)) {
	    			if(strpos($files,'.mkv') || stripos($files,'.mp4') || stripos($files,'.avi') || stripos($files,'.vob')){
	    				$data['path'] = $files;
	    				$data['size'] = $this->byte_to_human(filesize($path.DIRECTORY_SEPARATOR.$files));
	    				$quality = explode('__', $files);
	    				$data['quality'] = $quality[1];
	    			}elseif(stripos($files,'.png') || stripos($files,'.jpg')){
	    				$data['poster'] = $files;
	    				$poster_exist = 1;
	    			}
	    		}
    		}else{
    			$errors[] = '<b style="font-weight:bold;">'.$request->title.'</b> is already exists';
    		}
		}else{
			$errors[] = '<b style="font-weight:bold;">'.public_path($path).'</b> is not exist';
			return redirect()->to('/admin/movie/manual')->with('errors', $errors);
		}

		if(!isset($data['path'])){
			$errors[] = 'There is no movies in <b style="font-weight:bold;">'.$path.'</b>';
		}elseif(!isset($data['poster'])){
			$errors[] = 'There is no poster in <b style="font-weight:bold;">'.$path.'</b>';
		}

		if(empty($poster_exist) && !in_array($request->title, $movies)){
			$data['poster'] =  str_random(20).'.png';
			@file_put_contents($path. DIRECTORY_SEPARATOR .$data['poster'], file_get_contents($request->poster_path));

		}
		if(empty($data['poster'])){
			$errors[] = 'Poster is not exist in <b style="font-weight:bold;">API ID: '.$request->title.'</b>';
		}
		
		$data['views'] = 1;

		
		if(empty($errors) && Movie::create($data)){
			$message[] = '<b style="color:green;font-weight:bold;">'.$request->title.'</b> has added successfully';
			return redirect()->to('/admin/movie/manual')->with('messages', $message);
		}else{
			return redirect()->to('/admin/movie/manual')->with('errors', $errors);
		}
    }


    public function movieApi(Request $request){
    	$url = $request->url;
    	$url2 = file_get_contents($url);
		$json = json_decode($url2, true); //This will convert it to an array
		$title = $json['original_title'];
		$imdb = $json['imdb_id'];
		$overview = $json['overview'];
		$release_date = $json['release_date'];
		$vote_average = $json['vote_average'];
		$runtime = $json['runtime'];
		$images = $json['images'];
		$homepage = $json['homepage'];
		$Cast = $json['credits']['cast'];
		$Crew = $json['credits']['crew'];
		$spokenLanguages = $json['spoken_languages'];
		$MovieYear = date("Y",strtotime($release_date));
		$poster = "http://image.tmdb.org/t/p/w500/".$json['poster_path']."";
		  
		$finaltrailers  = '';
		$finalkeywords  = '';
		$finalspokenLanguages  = '';
		$finalgenres  = '';
		$finalimages  = '';
		$finalCastname  = '';
		$finalCastProfile  = '';
		$finalCastcharacter  = '';
		$finalCrewname  = '';
		$finalCrewProfile  = '';
		$finalCrewdepartment  = '';


	   	$genres = $json['genres'];
	   	foreach($genres as $allgenres=>$keygenres){
		   	foreach($keygenres as $genresname=>$keynames){
			   	if($genresname == 'name'){
					@ $finalgenres .=  $keynames.',';
			   	}
		   	}
	   	}
			   
	    $fp2 = file_get_contents("http://api.themoviedb.org/3/movie/".$imdb."/videos?api_key=f7d5dae12ee54dc9f51ccac094671b00");
		$json2 = json_decode($fp2, true);
		$trailer = $json2['results'];
				

		foreach($trailer as $trailers=>$keytrailers){
		   foreach($keytrailers as $alltrailers=>$allkeytrailers){
			   	if($alltrailers == 'key'){
			   		@ $finaltrailers .=  $allkeytrailers.',';
			   	}
		   } 
		}
				   
				   
		foreach($images as $allimages=>$keyimages){
			foreach($keyimages as $totalimages=>$keytotalimages){
				foreach($keytotalimages as $Totalbackdrops=>$Totalbackdropskeys){ 
				   	if($Totalbackdrops == 'file_path'){
						@ $finalimages .=  $Totalbackdropskeys.',';
				   	}
				}
			}
		}
		  

		$fp3 = file_get_contents("http://api.themoviedb.org/3/movie/".$imdb."/keywords?api_key=f7d5dae12ee54dc9f51ccac094671b00");
		$json3 = json_decode($fp3, true);
		$keywords = $json3['keywords'];
		
		foreach($keywords as $allkeywords=>$keykeywords){
		   foreach($keykeywords as $totalkeywords=>$keytotalkeywords){
			   if($totalkeywords == 'name'){
					  @ $finalkeywords .=  $keytotalkeywords.',';
			   }
		   }
	    }
			   
		foreach($spokenLanguages as $allspokenLanguages=>$keyspokenLanguages){
		   	foreach($keyspokenLanguages as $totalspokenLanguages=>$keytotalspokenLanguages){
			   	if($totalspokenLanguages == 'name'){
					@ $finalspokenLanguages .=  $keytotalspokenLanguages.',';
			   	}
		   	}
		}

		foreach($Cast as $allCast=>$keyCast){
			if($keyCast['profile_path'] != ''){
				@$finalCastname .= $keyCast['name'].',';
				@$finalCastProfile .= $keyCast['profile_path'].',';
				@$finalCastcharacter .= $keyCast['character'].',';
			}
		}
		foreach($Crew as $allCrew=>$keyCrew){
			if($keyCrew['profile_path'] != ''){
				@$finalCrewname .= $keyCrew['name'].',';
				@$finalCrewProfile .= $keyCrew['profile_path'].',';
				@$finalCrewdepartment .= $keyCrew['department'].',';
			}
		}
				   
		return json_encode(array(
		  'title' => $title,
		  'MovieYear' => $MovieYear,
		  'id' => $imdb,
		  'poster' => $poster,
		  'overview' => $overview,
		  'release_date' => $release_date,
		  'vote_average' => $vote_average,
		  'runtime' => $runtime,
		  'homepage' => $homepage,
		  'genres' =>   trim($finalgenres,","),
		  'youtube' =>  trim($finaltrailers,","),
		  'keywords' => trim($finalkeywords,","),
		  'spokenLanguages' => trim($finalspokenLanguages,","),
		  'images' => trim($finalimages,","),
		  'castname' => trim($finalCastname,','),
		  'castprofile' => trim($finalCastProfile,','),
		  'finalCastcharacter' => trim($finalCastcharacter,','),
		  'crewname' => trim($finalCrewname,','),
		  'crewprofile' => trim($finalCrewProfile,','),
		  'finalCrewdepartment' => trim($finalCrewdepartment,',')
		));
    }


    public function getAddQuality(){
    	return storage_path('asdf\asdfsd');
    	return view('admin.add-quality');
    }

    public function postQuality(Request $request){
    	$this->validate($request,[
    		'quality' => 'required'
    	]);

    	$data = $request->except('_token');
    	if(Quality::create($data)){
    		return redirect()->to('/admin/movie/quality')->with('message','Moview quality has added successfully');
    	}
    }

    public function getAllMovies(){
    	$data['movies'] = Movie::paginate(5);
    	return view('admin.all-movies',$data);
    }

    public function getFilterMovies($id)
    {
    	$category = Submenu::where('menu_name',$id)->first();
    	dd($category);
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['shout'] = Shout::orderBy('created_at','DESC')->paginate(15);
    	$data['movie'] = Movie::with(['category_name'])->where('category',$id)->first();
        return view('home.single-movie',$data);
    }

    public function singleMovie($id){
        $id = str_replace('-', ' ', $id);
        DB::table('movies')->where('title',$id)->increment('views',1);
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['shout'] = Shout::orderBy('created_at','DESC')->paginate(15);
    	$data['movie'] = Movie::with(['category_name'])->where('title',$id)->first();
        return view('home.single-movie',$data);
    }

}
