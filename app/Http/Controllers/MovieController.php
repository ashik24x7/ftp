<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Submenu;
use App\Menu;
use App\Shout;
use App\Quality;
use App\Movie;
use \DB;

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
    	$data['category'] = Submenu::where(['main_menu'=>1,'visible' => 1])->get();
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
    	
    	$path = $category->drive . DIRECTORY_SEPARATOR .$request->year;

    	if (Storage::disk('ftp')->exists($path)){
    		$dir = Storage::disk('ftp')->directories($path);
    		$movies = Movie::pluck('title')->toArray();

    		foreach ($dir as $sub_path) {
    			$sub_data = explode("/",$sub_path);
    			$files = end($sub_data);

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
					unset($finaltrailers);

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

                    if (Storage::disk('ftp')->exists($sub_path)){

			    		$sub_dir = Storage::disk('ftp')->files($sub_path);
			    		foreach ($sub_dir as $sub_files_path) {
			    			$tmp = explode("/",$sub_files_path);
    						$sub_files = end($tmp);
			    			if(strpos($sub_files,'.mkv') || stripos($sub_files,'.mp4') || stripos($sub_files,'.avi') || stripos($sub_files,'.vob')){
			    				$data['path'] = $sub_files;
			    				$data['size'] = $this->byte_to_human(Storage::disk('ftp')->size($sub_files_path));
			    				$quality = explode('__', $sub_files);
			    				$data['quality'] = !empty($quality[1]) ? $quality[1] : 'N/A';
			    			}
			    			// elseif(stripos($sub_files,'.png') || stripos($sub_files,'.jpg')){
			    			// 	$data['poster'] = $sub_files;
			    			// 	$poster_exist = 1;
			    			// }
			    			elseif(stripos($sub_files,'.srt')){
			    				$data['subtitle'] = $sub_files;
			    			}elseif(strpos($sub_files,'.m4v')){
			    				$errors[] = '<b style="font-weight:bold;">'.$sub_files.'</b>\'s extension is unsupported';
			    				continue(2);
			    			}
			    		}
					}else{
						$errors[] = '<b style="font-weight:bold;">'.$sub_path.'</b> is not exist';
					}

					$poster_name = str_replace(' ', '_', $movie_name_title);
					 
					$poster_name = str_replace('?', '', $poster_name);
					$poster_name = str_replace('.', '', $poster_name);
					$poster_name = str_replace('!', '', $poster_name);
					$poster_name = str_replace(':', '', $poster_name).'.png';
					$data['poster'] = $poster_name;

					$poster_dir = ltrim($path,'fs1/');

					// dd($data['poster']);

					if(!Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name) && !empty($json->poster_path)){
						if(!Storage::exists($poster_dir)){
							Storage::makeDirectory($poster_dir);
						}
						Storage::put($poster_dir.DIRECTORY_SEPARATOR.$poster_name, file_get_contents($movie_poster));

					}

					if (Movie::where('api_id', '=', $data['api_id'])->exists()) {
						$errors[] = '<b style="font-weight:bold;">API ID: '.$data['api_id'].' for '.$tmp_movie_name.'</b> already exist';
						continue;
					}

					if(empty($data['poster'])){
						$errors[] = 'Poster is not exist in <b style="font-weight:bold;">API ID: '.$tmp_movie_name.'</b>';
						continue;
					}
					if(!isset($data['quality']) or empty($data['quality'])){
						continue;
					}
					if(Movie::create($data)){
						unset($data);
						$message[] = '<b style="color:green;font-weight:bold;">'.$tmp_movie_name.'</b> has added successfully';
					}
				}

    		}
    	}else{
    		$errors[] = '<b style="font-weight:bold;">'.$path.'</b> is not exist';
    	}

    	if(!empty($errors)){
    		return redirect()->to('/admin/movie/auto')->with('errors',$errors)->with('messages',$message);
    	}else{
    		return redirect()->to('/admin/movie/auto')->with('messages',$message);
    	}

    }


    public function getAddMovieManual(){
    	$data['category'] = Submenu::where(['main_menu'=>1,'visible' => 1])->get();
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
    	if(!$category){
			$errors[] = '<b style="font-weight:bold;">Categorty</b> is not selected';
		}
    	$path = $category->drive. DIRECTORY_SEPARATOR .  $request->year. DIRECTORY_SEPARATOR .$request->title.' ['.$request->year.']';
		
		$poster_dir = ltrim($category->drive,'fs1/'). DIRECTORY_SEPARATOR .  $request->year;
		$poster_name = str_replace(' ', '_', $request->title);
		$poster_name = str_replace('?', '', $poster_name);
		$poster_name = str_replace('.', '', $poster_name);
		$poster_name = str_replace('!', '', $poster_name);
		$poster_name = str_replace(':', '', $poster_name).'.png';
    	
		if(!Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name) && $poster = $request->file('poster')){
			
			Storage::putFileAs($poster_dir, $poster, $poster_name);
			$data['poster'] = $poster_name;
    	}

    	$data = $request->except('_token','poster_path','Moviesbackdrops','MovieSubmit');
    	$data['uploaded_by'] = auth()->guard('admin')->user()->id;

    	$movies = Movie::pluck('title')->toArray();

    	if (Storage::disk('ftp')->exists($path)){
    		if(!in_array($request->title, $movies)){
				
				$dir = Storage::disk('ftp')->files($path);
			    foreach ($dir as $files_path) {
					$files = explode("/",$files_path);
    				$files = end($files);
	    			if(strpos($files,'.mkv') || stripos($files,'.mp4') || stripos($files,'.avi') || stripos($files,'.vob')){
	    				$data['path'] = $files;
	    				$data['size'] = $this->byte_to_human(Storage::disk('ftp')->size($files_path));
	    				$quality = explode('__', $files);
	    				$data['quality'] = $quality[1];
	    			}else{
						$errors[] = '<b style="font-weight:bold;">Unsupported </b> file extension';
					}
	    		}
    		}else{
    			$errors[] = '<b style="font-weight:bold;">'.$request->title.'</b> is already exists';
    		}
		}else{
			$errors[] = '<b style="font-weight:bold;">'.$path.'</b> is not exist';
			return redirect()->to('/admin/movie/manual')->with('errors', $errors);
		}
		
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

    	$search = Movie::pluck('title');
    	$str = '';
    	foreach ($search as $key) {
    		$str .= '"'.$key.'",';
    	}
    	$data['search'] = rtrim($str,',');
    	$data['movies'] = Movie::orderBy('id','DESC')->paginate(5);
    	return view('admin.all-movies',$data);
    }
    public function adminFilterMovies(Request $request){
    	$search = Movie::pluck('title');
    	$str = '';
    	foreach ($search as $key) {
    		$str .= '"'.$key.'",';
    	}
    	$data['search'] = rtrim($str,',');
    	$data['movies'] = Movie::where('title',$request->str)->orWhere('api_id',$request->str)->paginate(5);
		$data['history'] = $request->str;
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

    public function allMovies()
    {
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('id','DESC')->paginate(42);
        return view('home.all-movies',$data);
    }

    public function getEditMovie($id){
    	$data['category'] = Submenu::where(['visible' => 1, 'main_menu' => 1])->get();
    	$data['movies'] = Movie::findOrFail($id);
    	return view('admin.edit-movie',$data);
    }

    public function updateMovie(Request $request){
    	$this->validate($request,[
    		'trailer' => 'required',
	    	'title' => 'required',
	    	'id' => 'required',
	    	'year' => 'required',
	    	'category' => 'required',
	    	'rating' => 'required',
	    	'published' => 'required',
	    	'time' => 'required',
	    	'story' => 'required',
	    	'path' => 'required'
    	]);

    	$data = $request->only('trailer','title','year','category','rating','published','genre','release_date','language','website','time','kewyword','story','path','poster');
    	$category = Submenu::where('id',$request->category)->first();
		
		$poster_dir = ltrim($category->drive,'fs1/'). DIRECTORY_SEPARATOR .  $request->year;
		$poster_name = str_replace(' ', '_', $request->title).'.png';
		
		//dd(Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name));
    	
		if($new_poster = request()->file('new_poster')){
			if(Storage::exists($poster_dir.DIRECTORY_SEPARATOR.$poster_name)){
				Storage::delete($poster_dir.DIRECTORY_SEPARATOR.$poster_name);
			}
			
			Storage::putFileAs($poster_dir, $new_poster, $poster_name);
			$data['poster'] = $poster_name;
    	}else{
			exit;
		}
		
    	$movie = Movie::find($request->id);
    	if($movie->update($data)){
    		return redirect()->to('/admin/movie/'.$request->id.'/edit')->with('messages',$request->title.' has updated!');
    	}else{
    		return redirect()->to('/admin/movie/'.$request->id.'/edit')->with('messages',$request->title.' updation failed!');
    	}
    }

    public function deleteMovie($id){
    	$movie = Movie::find($id);
    	$movie_name = $movie->title;
    	if($movie->delete()){
    		return redirect()->to('/admin/movie/all')->with('messages',$movie_name.' has deleted!');
    	}else{
    		return redirect()->to('/admin/movie/all')->with('messages',$movie_name.' deleatation failed!');
    	}
    }

}
