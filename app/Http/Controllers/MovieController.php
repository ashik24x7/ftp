<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Submenu;
use App\Quality;
use App\Movie;

class MovieController extends Controller
{	
	public function getAddMovieManual(){
    	$data['category'] = Submenu::where('visible',1)->get();
    	$data['quality'] = Quality::where('visible',1)->get();
    	return view('admin.add-movie-manual',$data);
    }

    public function AddMovieManual(Request $request){
    	$this->validate($request,[
    		'title' => 'required',
	    	'year' => 'required',
	    	'api_id' => 'required',
	    	'quality' => 'required',
	    	'category' => 'required',
	    	'trailer' => 'required',
	    	'rating' => 'required',
	    	'genre' => 'required',
	    	'release_date' => 'required',
	    	'language' => 'required',
	    	'time' => 'required',
	    	'keyword' => 'required',
	    	'story' => 'required'
    	]);
    	$errors = [];

    	
    	$category = Submenu::where('id',$request->category)->pluck('menu_name');
    	
    	$path = 'fs1'. DIRECTORY_SEPARATOR .$category[0]. DIRECTORY_SEPARATOR .$request->year. DIRECTORY_SEPARATOR .$request->title.' ['.$request->year.']';

    	if($poster = $request->file('poster')){
    		$poster_name = str_random(20).'.'.$poster->extension();
    		$poster->move(public_path($path),$poster_name);
    	}else{
			chmod($path, 0777);
    		$data['poster'] = $poster_name = str_random(20).'.png';
			file_put_contents($path. DIRECTORY_SEPARATOR .$poster_name, file_get_contents($request->poster_path));
    	}

    	$data = $request->except('_token','poster_path');
    	if (is_dir(public_path($path))){
    		$dir = opendir($path);
    		while ($files = readdir($dir)) {
    			if(strpos($files,'.mkv') || stripos($files,'.mp4') || stripos($files,'.avi') || stripos($files,'.vob')){
    				$data['path'] = $files;
    			}elseif(stripos($files,'.png') || stripos($files,'.jpg')){
    				$data['poster'] = $files;
    			}
    		}
		}else{
			$errors[] = 'This is not directory';
		}

		if(!isset($data['path'])){
			$errors[1] = 'There is no movies in '.$path;
		}elseif(!isset($data['poster'])){
			$errors[1] = 'There is no poster in '.$path;
		}


    	if(count($errors) !== 0){
    		return redirect()->to('/admin/movie/manual')->with($errors);
    	}else{
    		$data['uploaded_by'] = auth()->guard('admin')->user()->id;
    		Movie::create($data);
    		return redirect()->to('/admin/movie/manual')->with('message','Movie has added successfully');
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

}
