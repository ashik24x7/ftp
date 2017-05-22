<?php 
include('../core/init.php');

$year = $_GET['year'];
$Category = $_GET['cat'];

$path = $_GET['path'];
$dir = '../../../'.$path.'/'.$Category.'/'.$year;



$size = "";
$down_link = "";

                  
					


if(!is_dir($dir)){ 
		$message[] = 
		"<div class=\"alert alert-danger alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <h4><i class=\"icon fa fa-ban\"></i>Error!</h4>
                    There is no directory like <span style=\"color:red;font-weight:bold\">".$dir."</span>
                  </div>";
				  $_SESSION["message"] = $message;
		          header("Location: ../autoinsert.php");
		
	}else{
		            $owndir = '../Moviesinfo/'.$year.'/';
					$owndir = opendir($owndir);
						
					while(($folder_name2 = readdir($owndir)) !== false){
						if($folder_name2 == "." || $folder_name2 == ".."){
							continue;
						}
						@$myFolder .= $folder_name2."'";	
					} 
					
		$handle = opendir($dir);
		while(($folder_name = readdir($handle)) !== false){

		    if($folder_name == "." || $folder_name == ".."){
		        continue;
		    }
			
			
			if(is_dir($dir.'/'.$folder_name)){    

		        $handle2 = opendir($dir.'/'.$folder_name);
				while(($file_name = readdir($handle2)) !== false){ 
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

						$down_link = "$dir/$folder_name/$file_name";
					    
					   
						
						$filesize = filesize($down_link);
						if($filesize <1024){ $size = number_format($filesize,2) . ' Byte'; }
						elseif($filesize <1048576){ $size = number_format($filesize/1024,2) . ' KB'; }
						elseif($filesize <1073741824){ $size = number_format($filesize/1048576,2) . ' MB'; }
						elseif($filesize <1099511627776){ $size = number_format($filesize/1073741824,2) . ' GB'; }
						else{ $size = number_format($filesize/1073741824,2) . ' TB'; }
						
				
					}else{	
					 $subtitle_link = "$dir/$folder_name/$file_name";
					}
					
				}
				
				if(isset($folder_name) && !empty($folder_name)){
					$new_folder_name_array  = explode("[", $folder_name);
						if(isset($new_folder_name_array[0])){
							@$main_folder_name .= $new_folder_name_array[0]."'";
						}else{
							@$main_folder_name .= $folder_name."'";	
						}
						
				     }
					 
				    
					$MAINfolder = explode("'",$main_folder_name);
					$MYfolder = explode("'",$myFolder);
					
					$diff = array_diff($MAINfolder,$MYfolder);
					
					foreach($diff as $Newmovies){
						//echo $Newmovies.'<br>'; // insert Movies
						
					$title_name = str_replace(" ","%20",$Newmovies);
				    $omdbapi = file_get_contents("http://www.omdbapi.com/?t=$title_name&y=$year&plot=full"); // getting IMDBID from OMDBAPI
					$json_imdb = json_decode($omdbapi, true); //This will convert it to an array
						
					if(!isset($json_imdb["Error"])){
							
					$MovieID = $json_imdb['imdbID'];	
					$fp = file_get_contents("http://api.themoviedb.org/3/movie/".$MovieID."?append_to_response=credits,images&api_key=".API_KEY);
					$json = json_decode($fp, true);
					
					//$posterUrl = sanitize($_POST['posterUrl']);
					
					//$posterTemp = $_FILES['poster']['tmp_name'];
                    // $poster = $json['poster_path'];
					// $MovieTitle = $json['title'];
					// $MovieYear = $year;
					// $MovieID = $json['imdb_id'];
					// $MovieQuality = ;
					// $MovieTrailer = ;
					// $MovieCategory = ;
					// $MovieRatings = $json['vote_average'];
					// $MovieGenre = sanitize($_POST['MovieGenre']);
					// $MovieDate = $json['release_date'];
					// $Movielang = $json['original_language'];
					// $Moviehomepage = $json['homepage'];
					// $MovieRuntime = $json['runtime'];
					//$MovieKeywords = $json['release_date'];
					// $MovieStory = $json['overview'];
					// $MovieWatchLink = sanitize($_POST['MovieWatchLink']);
					// $MovieSubtitle = sanitize($_POST['MovieSubtitle']);
					// $uploadedUser = $user_data['user'];
					// $uploadedTime = $date_a;

                   
					
					//echo $json['title'].'<br>';
					//echo $down_link.'<br>';
					
						
						}else{
							$message[] = "<div class=\"alert alert-danger alert-dismissable\">
										<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
										<h4><i class=\"icon fa fa-ban\"></i>Error!</h4>
										Sorry we haven't found any info about <span style=\"color:red;font-weight:bold\">".$Newmovies."</span> in IMDB 
										</div>";
										$_SESSION["message"] = $message;
										header("Location: ../autoinsert.php");
						}
						
						
					}	 
					 
				
				
			}else{
		    	$message[] = "<div class=\"alert alert-danger alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <h4><i class=\"icon fa fa-ban\"></i>Error!</h4>
                    There is no file in <span style=\"color:red;font-weight:bold\">".$folder_name."</span> Folder 
                  </div>";
				  $_SESSION["message"] = $message;
		          header("Location: ../autoinsert.php");
		    }
			
			
		}
		            
					 
	}
