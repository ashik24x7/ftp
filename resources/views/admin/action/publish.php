<?php 
include('../core/init.php');
$imdbid = sanitize($_GET['id']);
$genres = "";
$lang = "";
$down_link = "";
$actorss = "";
$trailerK = "";
$infoError = array();

if(isset($imdbid)){

$fp = file_get_contents("http://api.themoviedb.org/3/movie/".$imdbid."?append_to_response=credits,images&api_key=".API_KEY);
$json = json_decode($fp, true);

$movieYear = date('Y', strtotime($json['release_date']));

$genre = $json['genres'];

$actor = $json['credits']['cast'];
foreach($actor as $allactors){
 $actorss .= sanitize($allactors['name'].',');	
}

foreach($genre as $addgenre){
	$genres .= sanitize($addgenre['name'].',');
}
$link = takeMovieLink($imdbid);	
$link = $link['MovieWatchLink'];


if(!is_dir($link)){
	
$link = substr_replace($link ," [$movieYear]",-1);

}			
//print_r($link);die();

if (file_exists($link)) {
    
	  $handle2 = opendir($link);

                    while(($file_name = readdir($handle2)) !== false){ //while loop #0.2
				    if($file_name == "." || $file_name == ".."){
						continue;
					}

				    $MOVExtension = array("mp4", "mpeg", "mkv", "avi","flv");
				    $SUBExtension = array("srt");

					$parts = explode(".", $file_name);
					$ext = strtolower($parts[count($parts) - 1]);

					if(in_array($ext, $MOVExtension)){


						$quality = explode("__", $file_name);
						if (is_array($quality) && count($quality) > 0 && isset($quality[1])) {
							$quality = trim($quality[1]);
						}else{
							$quality = "";
						}
                         
						$down_link = "$link/$file_name";
					  
					   
						
						$filesize = filesize($down_link);
						if($filesize <1024){ $size = number_format($filesize,2) . ' Byte'; }
						elseif($filesize <1048576){ $size = number_format($filesize/1024,2) . ' KB'; }
						elseif($filesize <1073741824){ $size = number_format($filesize/1048576,2) . ' MB'; }
						elseif($filesize <1099511627776){ $size = number_format($filesize/1073741824,2) . ' GB'; }
						else{ $size = number_format($filesize/1073741824,2) . ' TB'; }
						
				    $down_link = str_replace("../../../",URL,"$link/$file_name");
					$down_link = sanitize($down_link);
					}else{	
					 $subtitle_link = sanitize("$link/$file_name");
					}
					
				}
	
	
	
} else {
 $infoError[] = '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-ban"></i>Success!</h4>
We didn\'t find the '.$Title.' Movie in folder directories.
</div>';
$_SESSION["infoError"] = $infoError;
header("Location: ../unpublished.php");
}


		
                    $fp2 = file_get_contents("http://api.themoviedb.org/3/movie/".$imdbid."/videos?api_key=".API_KEY);
					$json2 = json_decode($fp2, true);
					$trailer = $json2['results'];					
					 foreach($trailer as $alltrailer){
						$trailerK .= $alltrailer['key'].',';
					 }
					$MovieTrailer = $trailerK;	
				

$sql = "UPDATE `allmovies` SET `published`='0',`MovieGenre` = '$genres',`MovieTrailer` = '$MovieTrailer',`MovieQuality`='$quality',`MovieSize` = '$size',`MovieWatchLink`= '$down_link',`MovieSubtitle` = '$subtitle_link',`MovieActors` = '$actorss' WHERE `MovieID` = '$imdbid'";
//die($sql);
					
if(mysqli_query($connect_baza,$sql)){
		$infoError[] = '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-ban"></i>Success!</h4>
You\'ve been published the Movie successfully '.$Title.'.
</div>';
$_SESSION["infoError"] = $infoError;
header("Location: ../unpublished.php");
} else {
$infoError[] = "ERROR: Could not able to execute";
$_SESSION["infoError"] = $infoError;
header("Location: ../unpublished.php");
}
}