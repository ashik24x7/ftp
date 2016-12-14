<?php 

include('../core/init.php');

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$infoError = array();	
if(isset($_POST['MovieSubmit'])){
	
	$posterUrl = sanitize($_POST['posterUrl']);
    $poster = $_FILES['poster']['name'];
    $posterTemp = $_FILES['poster']['tmp_name'];
    $MovieTitle = sanitize($_POST['MovieTitle']);
    $MovieYear = $_POST['MovieYear'];
    $MovieID = sanitize($_POST['MovieID']);
    $MovieQuality = sanitize($_POST['MovieQuality']);
    $MovieTrailer = sanitize($_POST['MovieTrailer']);
    $MovieCategory = sanitize($_POST['MovieCategory']);
    $MovieRatings = sanitize($_POST['MovieRatings']);
    $MovieGenre = sanitize($_POST['MovieGenre']);
    $MovieDate = sanitize($_POST['MovieDate']);
    $Movielang = sanitize($_POST['Movielang']);
    $Moviehomepage = sanitize($_POST['Moviehomepage']);
    $MovieRuntime = sanitize($_POST['MovieRuntime']);
    $MovieKeywords = sanitize($_POST['MovieKeywords']);
    $MovieStory = sanitize($_POST['MovieStory']);
    $MovieWatchLink = sanitize($_POST['MovieWatchLink']);
    $MovieSubtitle = sanitize($_POST['MovieSubtitle']);
    $Moviesbackdrops = sanitize($_POST['Moviesbackdrops']);
    $uploadedUser = $user_data['user'];
	$uploadedTime = $date_a;
	
	if (!file_exists('../Moviesinfo/'.$MovieYear.'/'.$MovieTitle)){
    mkdir('../images/'.$MovieID.'', 0777, true);
	mkdir('../images/'.$MovieID.'/poster', 0777, true);
	
    /* mkdir('../images/'.$MovieID.'/backdrops', 0777, true);
    mkdir('../images/'.$MovieID.'/poster', 0777, true);
    mkdir('../images/'.$MovieID.'/cast', 0777, true);
    mkdir('../images/'.$MovieID.'/crew', 0777, true); */
    mkdir('../Moviesinfo/'.$MovieYear.'/'.$MovieTitle.'', 0777, true);
    }else{
     $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    this Movie has been Added Already please Update this movie or try onather one!
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../addmovies.php");
					die();
	}
	if(empty($poster) == true){
    $MovieCategory = MoviesCatByID($MovieCategory);
	$MovieCategory = $MovieCategory['menu_name'];
	
	$MovieQuality = MoviesCatByID($MovieQuality);
	$MovieQuality = $MovieQuality['menu_name'];
	
	$fp = file_get_contents("http://api.themoviedb.org/3/movie/".$MovieID."?append_to_response=credits,images&api_key=".API_KEY);
	
	$json = json_decode($fp, true);
	$json["category"] = "{$MovieCategory}";
	$json["quality"] =  "{$MovieQuality}";
	$json["uploadedUser"] =  "{$uploadedUser}";
	$json["MovieWatchLink"] =  "{$MovieWatchLink}";
	$json["MovieSubtitle"] =  "{$MovieSubtitle}";
	$json["uploadedTime"] =  "{$uploadedTime}";
	
	$movie_Poster = "http://image.tmdb.org/t/p/w342/".$json['poster_path'];
	$url_poster = !empty($movie_Poster) ? $movie_Poster : "";
	$name_poster = basename($url_poster);   /// this is the main movie poster name //
	$file_path = "../images/$MovieID/poster/$name_poster";
	file_put_contents($file_path, file_get_contents($url_poster));
	}else{
	  $file_path2 = "../images/$MovieID/poster/$poster";
	  move_uploaded_file($posterTemp,$file_path2);
	  $name_poster = $posterTemp;
	}
	
	 /* $BackDrops = explode(",",$Moviesbackdrops);
	foreach($BackDrops as $screenshots){
		//echo $screenshots.'<br>';
		$movieScreenshots = "http://image.tmdb.org/t/p/w500/".$screenshots."";
		$url_Screenshots = !empty($movieScreenshots) ? $movieScreenshots : "";   /// it excuted the time limit :( :(
		$name_Screenshots = basename($url_Screenshots);
		file_put_contents("../images/$MovieID/backdrops/$name_Screenshots", file_get_contents($url_Screenshots));
	}  */
	
	
	$sql = "INSERT INTO `allmovies`(`MovieTitle`,`MovieYear`,`MovieID`,`MovieQuality`,`MovieCategory`,`MovieTrailer`,`MovieRatings`,`MovieGenre`,`MovieDate`, `Movielang`,`Moviehomepage`,`MovieRuntime`,`MovieKeywords`,`MovieStory`,`MovieWatchLink`,`MovieSubtitle`,`poster`,`uploadedUser`,`uploadTime`) VALUES ('$MovieTitle','$MovieYear','$MovieID','$MovieQuality','$MovieCategory','$MovieTrailer','$MovieRatings','$MovieGenre','$MovieDate','$Movielang','$Moviehomepage','$MovieRuntime','$MovieKeywords','$MovieStory','$MovieWatchLink','$MovieSubtitle','$name_poster','$uploadedUser','$uploadedTime')";
	//die($sql);
	$query = mysqli_query($connect_baza,$sql);
	if($query){
				$folder = fopen('../images/'.$MovieID.'/'.$MovieID.'.json', 'w');
				fwrite($folder, json_encode($json));
				fclose($folder);
				$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully updated your information.
	  </div>';
				$_SESSION["infoError"] = $infoError;
				header("Location: ../addmovies.php");

			}else{
				$infoError[] = "ERROR: Could not able to execute";
				$_SESSION["infoError"] = $infoError;
				header("Location: ../addmovies.php");
			}

}

?>