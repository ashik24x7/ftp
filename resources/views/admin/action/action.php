<?php 
header('Content-Type: application/json');
$url = $_POST['url'];
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
				   
echo json_encode(array(
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
return true;
?>
