<?php
include('../core/init.php');
if(isset($_POST['MovieSubmit'])){

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());
	
	$IMDBID = sanitize($_POST['MovieID']);
    //$poster = $_FILES['poster']['name'];
    $posterTemp = $_FILES['poster']['tmp_name'];
    $MovieTitle = sanitize($_POST['MovieTitle']);
    $MovieYear = $_POST['MovieYear'];
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
    $Published = $_POST['Published'];
    $uploadedTime = $date_a;
    $uploadedUser = $user_data['user'];;
	
	$MovieCategory = MoviesCatByID($MovieCategory);
	$MovieCategory = $MovieCategory['menu_name'];
	
	$MovieQuality = MoviesCatByID($MovieQuality);
	$MovieQuality = $MovieQuality['menu_name'];
	
	$fp = file_get_contents(URL."/admin/main/images/".$IMDBID."/".$IMDBID.".json");
	
	$json = json_decode($fp, true);
	$json["category"] = "{$MovieCategory}";
	$json["quality"] =  "{$MovieQuality}";
	$json["MovieWatchLink"] =  "{$MovieWatchLink}";
	$json["MovieSubtitle"] =  "{$MovieSubtitle}";
	$json["uploadedTime"] =  "{$uploadedTime}";
	
	$newJsonString = json_encode($json);
    file_put_contents("../images/".$IMDBID."/".$IMDBID.".json", $newJsonString);
	
	
	$sql = "UPDATE `allmovies` SET 
	`MovieTitle`='$MovieTitle',
	`MovieYear`='$MovieYear',
	`MovieQuality`='$MovieQuality',
	`MovieCategory`='$MovieCategory',
	`MovieTrailer`='$MovieTrailer',
	`MovieRatings`='$MovieRatings',
	`MovieGenre`='$MovieGenre',
	`MovieDate`='$MovieDate',
	`Movielang`='$Movielang',
	`Moviehomepage`='$Moviehomepage',
	`MovieRuntime`='$MovieRuntime',
	`MovieKeywords`='$MovieKeywords',
	`MovieStory`='$MovieStory',
	`MovieWatchLink`='$MovieWatchLink',
	`MovieSubtitle`='$MovieSubtitle',
	`uploadedUser`='$uploadedUser',
	`uploadTime`='$uploadedTime',
	`published`='$Published' WHERE MovieID = '$IMDBID'";
	
	if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Updated - '.$MovieTitle.'.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../movieeidt.php?id=".$IMDBID);
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../movieeidt.php?id=".$IMDBID);
				}
}