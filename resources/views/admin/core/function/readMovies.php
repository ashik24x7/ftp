<?php
function PUmovies($page){
	$url = file_get_contents("http://api.themoviedb.org/3/movie/upcoming?page=$page&api_key=".API_KEY);
	$json = json_decode($url, true);
    $results = $json['results'];
	echo $results;
}

function singleTVseries($TVID){
	$url = file_get_contents("http://api.themoviedb.org/3/tv/$TVID?api_key=".API_KEY);
	$json = json_decode($url, true);
	return $json;
}

function singleTVseriesepisode($TVID,$season,$episode){
	$url = file_get_contents("https://api.themoviedb.org/3/tv/$TVID/season/$season/episode/$episode?api_key=".API_KEY."&language=en-US");
	$json = json_decode($url, true);
	return $json;
}

function fetchTrailer($imdid){
	$results = '';
	$url = file_get_contents("http://api.themoviedb.org/3/movie/$imdid/videos?api_key=".API_KEY);
	$json = json_decode($url, true);
    $results = $json['results'];
	if($results != ''){
	foreach($results as $result){
		$trailer = $result['key'];
		$exp = explode(",",$trailer);
			echo $exp[0];
	}
	}else{
		echo 'Sorry no Trailers available for this movie right now';
	}
}
function fetchTVTrailer($tvid,$episode,$season){
	$results = '';
	$url = file_get_contents("https://api.themoviedb.org/3/tv/$tvid/season/$season/episode/$episode/videos?api_key=".API_KEY."&language=en-US");
	$json = json_decode($url, true);
    $results = $json['results'];
	if($results != ''){
	foreach($results as $result){
		$trailer = $result['key'];
		$exp = explode(",",$trailer);
			echo $exp[0];
	}
	}else{
		echo 'Sorry no Trailers available for this movie right now';
	}
}


function CollectActorDetails($actorID){
	
	$url = file_get_contents('https://api.themoviedb.org/3/person/'.$actorID.'?api_key='.API_KEY.'&language=en-US');
	$json = json_decode($url, true);
    return $json;
}

function CollectCast($imdid,$link){
	$finalCastname  = '';
	$finalCastProfile  = '';
	$finalCastcharacter  = '';
    $Cast = '';
	
	$url = file_get_contents($link);
	$json = json_decode($url, true);
    $Cast = $json['credits']['cast'];
   
	if($Cast != ''){
	foreach($Cast as $allCast=>$keyCast){

					 if($keyCast['profile_path'] != ''){	 
				echo '<div class="cell-3 fx" data-animate="bounceInUp">
									<div class="team-box-2">
				    					<div class="team-img">
				    						<a href="'.URL.'/themes/'.THEME.'/about-actor.php?id='.$keyCast['id'].'"><img alt="" src="http://image.tmdb.org/t/p/w342/'.$keyCast['profile_path'].'"></a>
				    					</div>
				    					<div class="team-details">
			                                <h3 style="font-size:14px;">'.$keyCast['name'].'</h3>
			                                <div class="t-position" style="margin-top:-10px;height:41px;">'.substr($keyCast['character'],0,42).'</div>
				    					</div>
				    				</div>
									</div>';
					 }
		       }
	}else{
		echo 'Sorry no Cast available for this movie right now';
	}
}
function CollectCrew($imdid,$link){
	$finalCrewname  = '';
	$finalCrewProfile  = '';
	$finalCrewcharacter  = '';
    $Crew = '';
	
	$url = file_get_contents($link);
	$json = json_decode($url, true);
    $Crew = $json['credits']['crew'];
	if($Crew != ''){
	foreach($Crew as $allCrew=>$keyCrew){
					 if($keyCrew['profile_path'] != ''){	 
				echo '<div class="cell-3 fx" data-animate="bounceInUp">
									<div class="team-box-2">
				    					<div class="team-img">
				    						<img alt="" src="http://image.tmdb.org/t/p/w342/'.$keyCrew['profile_path'].'">
				    					</div>
				    					<div class="team-details">
			                                <h3 style="font-size:14px;">'.$keyCrew['name'].'</h3>
			                                <div class="t-position" style="margin-top:-10px;height:41px;">'.substr($keyCrew['department'],0,42).'</div>
				    					</div>
				    				</div>
									</div>';
					 }
			       }
	}else{
		echo 'Sorry no Crew available for this movie right now';
	}
}
function CollectScreenshots($imdid,$link){
	$finalimages  = '';
	$images = '';

	$url = file_get_contents($link);
	$json = json_decode($url, true);
    $images = $json['images'];
	if($images != ''){
	foreach($images as $allimages=>$keyimages){
			    foreach($keyimages as $totalimages=>$keytotalimages){
				   foreach($keytotalimages as $Totalbackdrops=>$Totalbackdropskeys){ 
				   if($Totalbackdrops == 'file_path'){
					@ $finalimages .=  $Totalbackdropskeys.',';
				   }
				   }
			   }
		   }
		   
		   $exp = explode(",",$finalimages);
		   if(count($exp) > 11){
			   $numimages = 12;
		   }else{
			   $numimages = count($exp) - 1;
		   }
		   for($i = 0;$i < $numimages;$i++){
			   if($exp[$i] != ''){
			   echo '<li>
						<a href="http://image.tmdb.org/t/p/w500/'.$exp[$i].'" rel="prettyPhoto[gallery1]" title="You can add caption to pictures.">
						<img src="http://image.tmdb.org/t/p/w342/'.$exp[$i].'" alt=""style="width:100%;height:150px;">
						</a>
					</li>';
			   }
		   }
		   }else{
			   echo 'Sorry no Screenshots available for this movie right now';
		   }
}

function CollectScreenshotsTV($tvid,$episode,$seasons){
	$url = file_get_contents('https://api.themoviedb.org/3/tv/'.$tvid.'/season/'.$seasons.'/episode/'.$episode.'/images?api_key='.API_KEY);

	$json = json_decode($url, true);
	//print_r($json);die();
    return $json;
}



function CollectReviews($imdid){
	$finalReviewsName  = '';
	$finalReviewsContent  = '';
    $Reviews = '';
	
	@$url = file_get_contents("http://api.themoviedb.org/3/movie/".$imdid."/reviews?api_key=".API_KEY);
	$json = json_decode($url, true);
    $Reviews = $json['results'];
	if($Reviews != ''){
	foreach($Reviews as $allReviews){
					 if($allReviews['content'] != ''){	 
				echo '  <li>
						<article class="comment">
						<div class="comment-content">
							<h5 class="comment-author skew-25">
								<span class="author-name skew25">'.$allReviews['author'].'</span>
								<span class="item-rating">
									<span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star-o skew25"></span><span class="fa fa-star-o skew25"></span>
								</span>
							</h5>
							<p>'.$allReviews['content'].'</p>
						</div>
					</article>
				</li>';
					 }
			       }
	}else{
		echo 'Sorry we failed to Collect any Reviews for this movie right now';
	}
}

function CollectYoutubeTrailers($imdid){
	$finalReviewsName  = '';
	$finalReviewsContent  = '';
    $trailer = '';
	
	@$fp2 = file_get_contents("http://api.themoviedb.org/3/movie/".$imdid."/videos?api_key=".API_KEY);
				$json2 = json_decode($fp2, true);
				$trailer = $json2['results'];
				if($trailer != ''){
				foreach($trailer as $trailers=>$keytrailers){
					   foreach($keytrailers as $alltrailers=>$allkeytrailers){
						   if($alltrailers == 'key'){
						   @ $finaltrailers .=  $allkeytrailers.',';
						   }
					   } 
				}
					   $exp = explode(",",$finaltrailers);
					   for($i = 0;$i < count($exp)-1;$i++){
						  
						   echo '<iframe width="355" height="260" src="https://www.youtube.com/embed/'.$exp[$i].'" frameborder="0" style="margin:10px;" allowfullscreen></iframe>';
					   
					   }
				}else{
					echo 'Sorry we Failed to Collect any Trailers for this movie right now';
				}		   
}
function MoviesCatByID($CategoryID){	
global $connect_baza;
//$results = array();
$data2 = mysqli_query($connect_baza,"SELECT `menu_name` FROM `menu` WHERE `id` = '$CategoryID'");
$results = mysqli_fetch_array($data2);
return $results;
}

function CollectEpisode($tvID,$Season){	
global $connect_baza;
$data2 = mysqli_query($connect_baza,"SELECT * FROM `tvepisodes` WHERE `TVID` = '$tvID' AND  `epSeasons` = '$Season'");

while ($result = mysqli_fetch_array($data2)) {
    $results[] = $result;   
}
return $results;
}

function CollectGamesDetails($title){	
global $connect_baza;

$title = str_replace("-"," ",$title);

$data2 = mysqli_query($connect_baza,"SELECT * 
FROM  `games` 
WHERE  `title` =  '$title'
AND  `published` = 0
LIMIT 0 , 1");
$results = mysqli_fetch_array($data2);
return $results;
}

function MoviesCategory($Category,$start,$total_pages){	
global $connect_baza;
$results = array();

$sql = "SELECT allmovies.id,allmovies.poster,allmovies.MovieQuality,allmovies.MovieSize,allmovies.MovieYear,allmovies.MovieTitle,allmovies.MovieID,allmovies.MovieTrailer,allmovies.MovieRatings,allmovies.views,allmovies.MovieStory,allmovies.MovieCategory
FROM allmovies
WHERE allmovies.MovieCategory = '".$Category."' AND allmovies.published = '0' ORDER BY uploadTime DESC LIMIT $start , $total_pages";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function TVCategory($Category,$start,$total_pages){	
global $connect_baza;
$results = array();

$sql = "SELECT tvseries.id,tvseries.TVposter,tvseries.TVcategory,tvseries.TVrelease,tvseries.TVtitle,tvseries.TVID,tvseries.TVtrailer,tvseries.TVRatings,tvseries.views,tvseries.TVstory
FROM tvseries
WHERE tvseries.TVcategory = '".$Category."' AND tvseries.published = '0' ORDER BY uploadTime DESC LIMIT $start , $total_pages";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function AllTV($start,$total_pages){	
global $connect_baza;
$results = array();

$sql = "SELECT tvseries.id,tvseries.TVposter,tvseries.TVcategory,tvseries.TVrelease,tvseries.TVtitle,tvseries.TVID,tvseries.TVtrailer,tvseries.TVRatings,tvseries.views,tvseries.TVstory
FROM tvseries
WHERE tvseries.published = '0' ORDER BY uploadTime DESC LIMIT $start , $total_pages";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function MoviesSearch($Search,$start,$end){	
global $connect_baza;
$results = array();

$sql = "SELECT allmovies.id,allmovies.poster,allmovies.MovieQuality,allmovies.MovieYear,allmovies.MovieTitle,allmovies.MovieID,allmovies.MovieTrailer,allmovies.MovieRatings,allmovies.views,allmovies.MovieStory,allmovies.MovieCategory
FROM allmovies
WHERE allmovies.MovieTitle LIKE '%".$Search."' or allmovies.MovieTitle LIKE '%".$Search."%' or allmovies.MovieTitle LIKE '".$Search."%' AND allmovies.published = '0' ORDER BY uploadTime DESC LIMIT $start , $end";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function GamesCategory($Category,$start,$end){	
global $connect_baza;
$results = array();

$sql = "SELECT `title`, `cover_pic`, `trailer`, `con_cat`, `filesize` FROM `games` WHERE `con_cat` = '$Category' AND `published` = '0' ORDER by `date` DESC LIMIT $start ,$end";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function AllTVseries($unpublished){	
global $connect_baza;
$results = array();
$sql = "SELECT *
FROM tvseries
WHERE tvseries.published = '$unpublished' ORDER BY uploadTime DESC";
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function AllMovies($unpublished){	
global $connect_baza;
$results = array();
$sql = "SELECT *
FROM allmovies
WHERE allmovies.published = '$unpublished' ORDER BY uploadTime DESC";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function AllMovies2($unpublished,$start,$end){	
global $connect_baza;
$results = array();
$sql = "SELECT *
FROM allmovies
WHERE allmovies.published = '$unpublished' ORDER BY uploadTime DESC LIMIT $start , $end";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function tvSeries($limit){	
global $connect_baza;
$results = array();
$sql = "SELECT tvepisodes.TVID,tvseries.TVtitle, tvseries.TVposter ,tvepisodes.epTitle,tvepisodes.epEpisode,tvepisodes.epSeasons FROM tvseries INNER JOIN tvepisodes ON tvepisodes.TVID = tvseries.TVID ORDER BY `epUpTime` DESC LIMIT $limit";
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function AllGames($unpublished){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM `games` WHERE `published`='$unpublished' ORDER BY date DESC";
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function AllGames2($unpublished,$start,$end){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM `games` WHERE `published`='$unpublished' ORDER BY date DESC LIMIT $start , $end";
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function AllSoftware($unpublished){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM `software` WHERE `publish`='$unpublished' ORDER BY Date DESC";
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function AllSoftwareBYCat($cata,$start,$end){	
global $connect_baza;
$results = array();
if($cata == 0){
$sql = "SELECT * FROM `software` WHERE `publish`='0' ORDER BY Date DESC LIMIT $start , $end";
}else{
$sql = "SELECT * FROM `software` WHERE `publish`='0' AND `cata` = '$cata' ORDER BY Date DESC LIMIT $start , $end";
}
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function MoviesBYactor($name){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM `allmovies` WHERE `MovieActors` LIKE '%$name%'";
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function DeleteALL($unpublished){	
global $connect_baza;
$results = array();
$sql = "SELECT `MovieID` FROM `allmovies` WHERE `published` = '$unpublished'";
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function SingleMovie($imdbID){	
global $connect_baza;
//$results = array();
$data2 = mysqli_query($connect_baza,"SELECT * FROM `allmovies` WHERE `MovieID` = '".$imdbID."'");
$results = mysqli_fetch_array($data2);
return $results;
}
function SingleTVviews($TVID){	
global $connect_baza;
//$results = array();
$sql = "SELECT `views` FROM `tvseries` WHERE `TVID` = '".$TVID."'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}

function SingleTVepisode($TVID,$episode,$season){	
global $connect_baza;
//$results = array();
$data2 = mysqli_query($connect_baza,"SELECT * FROM `tvepisodes` WHERE `TVID` = '$TVID' AND `epSeasons` = '$season' AND `epEpisode` = '$episode'");
$results = mysqli_fetch_array($data2);
return $results;
}

function MoviesQuality($Quality,$category){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM `allmovies` WHERE `MovieQuality` = '$Quality' AND `MovieCategory` = '$category' Order by `uploadTime` DESC";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function MoviesYear($year,$category){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM `allmovies` WHERE `MovieYear` = '$year' AND `MovieCategory` = '$category' Order by `uploadTime` DESC";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function MoviesGenres($movGenre,$category){	
global $connect_baza;
$results = array();
$data= mysqli_query($connect_baza,"SELECT `id`,`poster`,`MovieQuality`,`MovieTitle`,`MovieID`,`MovieYear`,`MovieTrailer`,`MovieRatings`,`MovieStory`,`views` FROM `allmovies` WHERE `MovieCategory` = '$category' AND `MovieGenre` LIKE '$movGenre%' Order by `uploadTime` DESC");
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function RecentMovies($limit){	
global $connect_baza;
$results = array();
$sql = "SELECT `id`,`poster`,`MovieQuality`,`MovieCategory`,`MovieTitle`,`MovieYear`,`MovieID`,`MovieTrailer`,`MovieRatings`,`MovieStory`,`MovieSize`,`views` FROM allmovies WHERE published = '0' Order by `uploadTime` DESC LIMIT $limit";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function RecentGames($limit){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM games WHERE published = '0' Order by `date` DESC LIMIT $limit";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function RecentTVseries($limit){	
global $connect_baza;
$results = array();
$sql = "SELECT * FROM tvseries WHERE published = '0' Order by `uploadTime` DESC LIMIT $limit";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function RecentBollywoodMovies($limit){	
global $connect_baza;
$results = array();
$sql = "SELECT `id`,`poster`,`MovieQuality`,`MovieCategory`,`MovieTitle`,`MovieYear`,`MovieID`,`MovieTrailer`,`MovieRatings`,`MovieStory`,`views` FROM allmovies WHERE MovieCategory = 'bollywood' AND published = '0' Order by `uploadTime` DESC LIMIT $limit";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function RecentHollywoodMovies($limit){	
global $connect_baza;
$results = array();
$sql = "SELECT `id`,`poster`,`MovieQuality`,`MovieCategory`,`MovieTitle`,`MovieYear`,`MovieID`,`MovieTrailer`,`MovieRatings`,`MovieStory`,`views` FROM allmovies WHERE MovieCategory = 'hollywood' AND published = '0' Order by `uploadTime` DESC LIMIT $limit";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function M2006Movies($limit){	
global $connect_baza;
$results = array();
$thisYear = date('Y'); 

$sql = "SELECT `id`,`poster`,`MovieQuality`,`MovieCategory`,`MovieTitle`,`MovieYear`,`MovieID`,`MovieTrailer`,`MovieRatings`,`MovieStory`,`views` FROM allmovies WHERE MovieYear = '$thisYear' AND published = '0' Order by `uploadTime` DESC LIMIT $limit";
//die($sql);
$data= mysqli_query($connect_baza,$sql);
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function PopularMovies($limit){	
global $connect_baza;
$results = array();
$data= mysqli_query($connect_baza,"SELECT `id`,`poster`,`MovieQuality`,`MovieCategory`,`MovieTitle`,`MovieYear`,`MovieID`,`MovieTrailer`,`MovieRatings`,`MovieStory`,`views` FROM `allmovies` WHERE published = '0' Order by `views` DESC LIMIT $limit");
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}
function PopularTVseries($limit){	
global $connect_baza;
$results = array();
$data= mysqli_query($connect_baza,"SELECT * FROM `tvseries` WHERE published = '0' Order by `views` DESC LIMIT $limit");
while ($result = mysqli_fetch_array($data)) {
    $results[] = $result;   
}
return $results;
}

function takeQuality($quality){
global $connect_baza;
$sql = "SELECT `menu_name` FROM `menu` WHERE `id` = ".$quality;
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}


function takeManuID($name){
global $connect_baza;
$sql = "SELECT `id` FROM `menu` WHERE `menu_name` = '$name'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}

function takeMovieLink($imdbID){
global $connect_baza;
$sql = "SELECT `MovieWatchLink` FROM `allmovies` WHERE `MovieID` = '$imdbID'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}
function TotalTV(){
global $connect_baza;
$sql = "SELECT COUNT(`TVID`) as totlaTV FROM `tvseries`";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}
function TotalGames(){
global $connect_baza;
$sql = "SELECT COUNT(`id`) as totlaGames FROM `games`";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}
function TotalSof(){
global $connect_baza;
$sql = "SELECT COUNT(`id`) as totlaSof FROM `software`";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}
function TotalMovie(){
global $connect_baza;
$sql = "SELECT COUNT(`MovieID`) as totlaMovie FROM `allmovies`";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}
function TotalUnMovie(){
global $connect_baza;
$sql = "SELECT COUNT(`MovieID`) as totlaMovie FROM `allmovies` WHERE `published` = '1'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}
function TotalMovieBYCAT($category){
global $connect_baza;
$sql = "SELECT COUNT(`MovieID`) as totlaMovie FROM `allmovies` WHERE `MovieCategory` = '$category'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}
function TotalTVBYCAT($category){
global $connect_baza;
$sql = "SELECT COUNT(`TVID`) as totlaTV FROM `tvseries` WHERE `TVcategory` = '$category'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}

function TotalGamesBYCAT($GAMESCategory){
global $connect_baza;
$sql = "SELECT COUNT(`title`) as totalgame FROM `games` WHERE `con_cat` = '$GAMESCategory'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}

function categoryCheck($Category){
	global $connect_baza;
   $query = "SELECT `menu_name`,`id` FROM `menu` WHERE `parent` = 'movies'";
		
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			if (strpos($Category,$row['menu_name']) !== false) {
        return $Category = $row['menu_name'];
        }
		}	
	}

function getYear($imdbID){
	global $connect_baza;
$sql = "SELECT `MovieYear` FROM `allmovies` WHERE `MovieID` = '$imdbID'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}

function getMovieName($imdbID){
	global $connect_baza;
$sql = "SELECT `MovieTitle` FROM `allmovies` WHERE `MovieID` = '$imdbID'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}

function recursiveRemoveDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}

function MoviesViews($hit,$imdbid){
global $connect_baza;
$sql = "UPDATE `allmovies` SET `views` = '$hit' WHERE `MovieID` = '$imdbid'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);	
}
function TVViews($hit,$tvid){
global $connect_baza;
$sql = "UPDATE `tvseries` SET `views` = '$hit' WHERE `TVID` = '$tvid'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);	
}
function GamesViews($hit,$title){
	$title = str_replace("-"," ",$title);
global $connect_baza;
$sql = "UPDATE `games` SET `hit` = '$hit' WHERE `title` = '$title'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);	
}