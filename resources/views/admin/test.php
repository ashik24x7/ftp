<?php
$url = file_get_contents("http://api.themoviedb.org/3/movie/tt0000005?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00");
$json = json_decode($url, true); //This will convert it to an array
			 //  $response['posts'] = $posts;
$title = $json['original_title'];
/* $fp = fopen('movies.json', 'w');
fwrite($fp, json_encode($test));
fclose($fp); */
// http://www.w3schools.com/php/php_ref_array.asp


$inp = file_get_contents('movies.json');
$tempArray = json_decode($inp,true);
$test = array($title=>$json);
//sort($tempArray);
array_push($tempArray, $test);                     /// add new movie into json database
$jsonData = json_encode($tempArray);
file_put_contents('movies.json', $jsonData);

/* $newMovie = json_decode($url,true);
$allMovies = json_decode(file_get_contents('test3.json'),true);
$allMovies[] = $newMovie;
sort($allMovies);
$jsonData = json_encode($allMovies,JSON_FORCE_OBJECT);
file_put_contents('test3.json',$jsonData); */

  
         
				/* $fp = file_get_contents("test3.json");
				$json_a = json_decode($fp, true);
				$genre = $json_a['mytest2']['credits'];
foreach ($genre as $person_name => $person_a) {
    foreach($person_a as $test=>$test2){
		foreach($test2 as $test3=>$test4){
			
			if($test3 == 'character'){
				echo $test4.'<br>';
			}
			if($test3 == 'profile_path'){
				//echo $test4.'<br>';
				if($test4 != null){
				echo '<img src="http://image.tmdb.org/t/p/w500/'.$test4.'" style="width:220px;height:220px;"/><br>';
				}
			}
	}
	}
} */
				
				
				$fp = file_get_contents("movies.json");
				$json_a = json_decode($fp, true);
				echo $json_a['original_title'].'<br>';
		 

		
			/* $genre = $json['genres'];
			foreach($genre as $allgenre){
				foreach($allgenre as $test=>$key){           //// fetch json genre array
					if($test == 'name'){
					echo $key.'<br>';
					}
				}
			} */
			//echo $json['overview'];
			
        //    <img src="http://image.tmdb.org/t/p/w500/".$json['poster_path']."" />  // image path // can give fixed width with ==== w300 , w780 , w1280
		//   http://api.themoviedb.org/3/movie/tt4383594/credits?api_key=f7d5dae12ee54dc9f51ccac094671b00   /// get the cast and crew information
		//	 https://api.themoviedb.org/3/find/tt4383594?external_source=imdb_id&api_key=f7d5dae12ee54dc9f51ccac094671b00
		
		//  http://api.themoviedb.org/3/movie/now_playing?api_key=f7d5dae12ee54dc9f51ccac094671b00     /// Total Pages 28 ///
		/// Get the list of movies playing that have been, or are being released this week. This list refreshes every day.
		
		//  http://api.themoviedb.org/3/movie/popular?api_key=f7d5dae12ee54dc9f51ccac094671b00    //// Total Pages 978 ////
		//  Get the list of popular movies on The Movie Database. This list refreshes every day.
		
		//  http://api.themoviedb.org/3/movie/top_rated?api_key=f7d5dae12ee54dc9f51ccac094671b00  /// Total Pages 256 ///
		//  Get the list of top rated movies. By default, this list will only include movies that have 50 or more votes.
		
		//  http://api.themoviedb.org/3/movie/upcoming?api_key=f7d5dae12ee54dc9f51ccac094671b00   /// Total Pages 7 ///
		//  Get the list of upcoming movies by release date. This list refreshes every day.
		
		// http://api.themoviedb.org/3/person/28782??api_key=f7d5dae12ee54dc9f51ccac094671b00
		// Get the general person information for a specific id.
		
		// http://api.themoviedb.org/3/movie/tt4383594?api_key=f7d5dae12ee54dc9f51ccac094671b00
		// Get the basic movie information for a specific movie id. (IMDB)
		
		// http://api.themoviedb.org/3/movie/tt2975590/videos?api_key=f7d5dae12ee54dc9f51ccac094671b00
		// Get the Movie Trailer
		
		// http://api.themoviedb.org/3/movie/id/images?api_key=f7d5dae12ee54dc9f51ccac094671b00
		// Movies Screenshots
		
		// http://api.themoviedb.org/3/movie/tt4383594/keywords?api_key=f7d5dae12ee54dc9f51ccac094671b00
		// Movies Keywords
		
		// http://api.themoviedb.org/3/movie/tt4383594/reviews?api_key=f7d5dae12ee54dc9f51ccac094671b00
		// Get the reviews for a particular movie id.
		
		// http://api.themoviedb.org/3/movie/tt4383594?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00
		// GET THE FULL INFORMATION INCLUDING CAST AND CREW :) :) 
		
		// http://api.themoviedb.org/3/movie/000005?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00
		// GET FULL INFO FROM TMDB
		
             		
		      /* $genre = $json['genres'];
		       foreach($genre as $allgenre){
				foreach($allgenre as $idname=>$value){ 
				if($idname == 'id'){
					$okID = '`'.$idname.'`';
				}
				if($idname == 'name'){                        //// inserted by this method into database ///
					$Ensql = '`'.$idname.'`';
				}
				 if($value > 1){
					 $id = "'".$value."'";
				 }
				    if($value < 1){
					 $name = "'".$value."'";
					}

				}
				 echo $sql = "INSERT INTO `tvgenre`($okID,$Ensql) VALUES ($id,$name);";
				 echo '<br>';
			   } */
			   
			   
