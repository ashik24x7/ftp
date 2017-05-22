<?php
include('../core/init.php');


  
$count = count($_POST['text_array']);
$seasonID = $_POST['sessionid'];

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

if (isset($_POST['submit'])) {
    for($i=0;$i<$count;$i++){

        $urllink = $_POST['text_array'][$i];
        $quality = $_POST['quality'][$i];
        $episodes = $_POST['SOO'][$i];
        $TVID = $_POST['TVID'][$i];
		
		
		
		             
				    $tmdbApi = file_get_contents("https://api.themoviedb.org/3/tv/".$TVID."/season/".$seasonID."/episode/".$episodes."?api_key=".API_KEY."&language=en-US"); // getting IMDBID from OMDBAPI
					$json_imdb = json_decode($tmdbApi, true); //This will convert it to an array
					//print_r($json_imdb);die();
					
		if(empty($urllink) !== true && empty($quality) !== true){
						if(!isset($json_imdb["Error"])){
								
						$EPname = sanitize($json_imdb['name']);
						$still_path = sanitize($json_imdb['still_path']);
						$overview = sanitize($json_imdb['overview']);
						} 
                        
						/* function episodes_exists($TVID,$episodes,$seasonID){
						  global $connect_baza;
						  $username = sanitize($username);
						  $sql = "SELECT COUNT(`TVID`) FROM `tvepisodes` WHERE `TVID` = '$TVID' AND `epEpisode` = '$episodes' AND `epSeasons` = '$seasonID'";
						 // die($sql);
						  $query = mysqli_query($connect_baza,$sql) or exit('database problem');
						   while ($row = mysqli_fetch_row($query)) {
								$countNumber = $row[0];
								if($countNumber == 1){
									return true;
								}else{
									return false;
								}
							}
						}
						
						if(episodes_exists($TVID,$episodes,$seasonID) === true){
							$infoError[] = "<div class=\"alert alert-danger alert-dismissable\">
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
						<h4><i class=\"icon fa fa-ban\"></i>Error!</h4>
					  you have already inserted this episode - $episodes and season - $seasonID before
					  </div>";
					  $_SESSION["infoError"] = $infoError;
					  header("Location: ../addepisodes.php?tvid=$TVID");
					  die();
							} */
							
						
							$sql="INSERT INTO `tvepisodes`(`TVID`, `epTitle`, `epPoster`, `epStory`, `epDownload`, `epQuality`, `epEpisode`, `epSeasons`, `epUpTime`) VALUES ('$TVID','$EPname','$still_path','$overview','$urllink','$quality','$episodes','$seasonID','$date_a')";
		 //die($sql);
		 
        if(!($result = mysqli_query($connect_baza,$sql))){
            "<BR>Error Adding!!<BR>".mysql_error();
               exit();
        }else{
			$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully Added all Episodes
	  </div>';
				$_SESSION["infoError"] = $infoError;
				header("Location: ../addepisodes.php?tvid=$TVID");
				
		} 
						
					
					
         
		
		}
    }
	
}

