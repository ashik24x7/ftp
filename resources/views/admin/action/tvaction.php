<?php 

include('../core/init.php');

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$infoError = array();	
if(isset($_POST['TVSubmit'])){
	
	$posterUrl = sanitize($_POST['posterUrl']);
    $poster = $_FILES['poster']['name'];
    $posterTemp = $_FILES['poster']['tmp_name'];
    $TVTitle = sanitize($_POST['TVTitle']);
    $TVID = sanitize($_POST['ID']);
    $TVTrailer = sanitize($_POST['TVTrailer']);
    $TVCategory = sanitize($_POST['TVCategory']);
    $TVRatings = sanitize($_POST['TVRatings']);
    $TVGenre = sanitize($_POST['TVGenre']);
    $TVDate = sanitize($_POST['TVDate']);
    $TVlang = sanitize($_POST['TVlang']);
    $TVhomepage = sanitize($_POST['TVhomepage']);
    $episode_run_time = sanitize($_POST['episode_run_time']);
    $TVKeywords = sanitize($_POST['TVKeywords']);
    $TVStory = sanitize($_POST['TVStory']);
    $TVcreator = sanitize($_POST['creator']);
    $uploadedUser = $user_data['user'];
	$uploadedTime = $date_a;
	$tvTitle = $_POST['TVTitle'];
	
	if (!file_exists('../TVseries/'.$tvTitle)){
    mkdir('../TVseries/'.$tvTitle.'/'.$TVID.'', 0777, true);
	mkdir('../TVseries/'.$tvTitle.'/'.$TVID.'/poster', 0777, true);
	
    /* mkdir('../images/'.$MovieID.'/backdrops', 0777, true);
    mkdir('../images/'.$MovieID.'/poster', 0777, true);
    mkdir('../images/'.$MovieID.'/cast', 0777, true);
    mkdir('../images/'.$MovieID.'/crew', 0777, true); */
    mkdir('../TVseries/'.$tvTitle.'', 0777, true);
    }else{
     $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    this TV Series has been Added Already please TV Series this movie or try onather one!
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../tvseries.php");
					die();
	}
	
	$TVCategory = MoviesCatByID($TVCategory);
	$TVCategory = $TVCategory['menu_name'];
	$fp = file_get_contents("https://api.themoviedb.org/3/tv/".$TVID."?api_key=".API_KEY."&language=en-US");
	$json = json_decode($fp, true);
	$json["category"] = "{$TVCategory}";
	$json["uploadedUser"] =  "{$uploadedUser}";
	$json["uploadedTime"] =  "{$uploadedTime}";
	
	if(empty($poster) == true){

	$movie_Poster = "http://image.tmdb.org/t/p/w342/".$json['poster_path'];
	$url_poster = !empty($movie_Poster) ? $movie_Poster : "";
	$name_poster = basename($url_poster);   /// this is the main movie poster name //
	$file_path = "../TVseries/$TVTitle/$TVID/poster/$name_poster";
	file_put_contents($file_path, file_get_contents($url_poster));
	}else{
	  $file_path2 = "../images/$TVID/poster/$poster";
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
	
	
	$sql = "INSERT INTO `tvseries`(`TVtitle`, `TVID`, `TVcategory`, `TVtrailer`, `TVRatings`, `TVgenre`, `TVrelease`, `TVlang`, `TVhomepage`, `TVruntime`, `TVkeywords`, `TVstory`, `TVactors`, `TVposter`, `uploadedUser`, `uploadTime`,`published`) 
	VALUES ('$TVTitle','$TVID','$TVCategory','$TVTrailer','$TVRatings','$TVGenre','$TVDate','$TVlang','$TVhomepage','$episode_run_time','$TVKeywords','$TVStory','$TVcreator','$name_poster','$uploadedUser','$uploadedTime','1')";
	
	$query = mysqli_query($connect_baza,$sql);
	if($query){
				$folder = fopen('../images/'.$TVID.'/'.$TVID.'.json', 'w');
				fwrite($folder, json_encode($json));
				fclose($folder);
				$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully updated your information.
	  </div>';
				$_SESSION["infoError"] = $infoError;
				header("Location: ../tvseries.php");

			}else{
				$infoError[] = "ERROR: Could not able to execute";
				$_SESSION["infoError"] = $infoError;
				header("Location: ../tvseries.php");
			}

}

?>