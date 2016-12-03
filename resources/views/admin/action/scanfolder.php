<?php
include('../core/init.php');
$owndir = '../Moviesinfo/2016/';

$year = $_GET['year'];
$Category = $_GET['cat'];
$path = $_GET['path'];

$filesDIR = '../../../'.$path.'/'.$Category.'/'.$year;
$dir = '../../../'.$path.'/'.$Category.'/'.$year;
$dir2 = $path.'/'.$Category.'/'.$year;

$size = "";
$down_link = "";
$myFolder = "";
$subtitle_link = "";
$main_folder_name = "";
$newMovie = "";

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

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
					
					$owndir = opendir($owndir);
						
					while(($folder_name2 = readdir($owndir)) !== false){
						if($folder_name2 == "." || $folder_name2 == ".."){
							continue;
						}
						$myFolder[] .= $folder_name2;
                        			
					}
					
					$filesDIR = opendir($filesDIR);
					while(($folder_name3 = readdir($filesDIR)) !== false){
						if($folder_name3 == "." || $folder_name3 == ".."){
							continue;
						}
						
						
		if(is_dir($dir.'/'.$folder_name3)){ 
			            
						if(strpos($folder_name3, '[') !== false){
						$folder_name3 = explode("[", $folder_name3, 2);
						}else if(strpos($folder_name3, '(') !== false){
						$folder_name3 = explode("(", $folder_name3, 2);
						}else{
						$folder_name3 = explode("{", $folder_name3, 2);	
						}
						if(isset($folder_name3[0])){
						$folder_name3 = $folder_name3[0];
						}else{
						$folder_name3 = $folder_name3;
						}
						
						$FilesFolder[] .= $folder_name3;
                        $diff = array_diff($FilesFolder,$myFolder);
						
						$errors = array_filter($diff);

						if (empty($errors)) {
					$message[] = "<div class=\"alert alert-danger alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <h4><i class=\"icon fa fa-ban\"></i>Error!</h4>
                    We didn't find any new Movies in <span style=\"color:red;font-weight:bold\"></span> Folder 
                  </div>";
				 // print_r($message);die();
				  $_SESSION["message"] = $message;
				  //exit();
		          header("Location: ../autoinsert.php");
				
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
	
					} // while loop end
					
				    foreach($diff as $newMovie){
					if($newMovie != "" && !empty($newMovie)){

					$addMovie = $newMovie;
						
					$title_name = str_replace(" ","%20",$addMovie);
				    $omdbapi = file_get_contents("http://www.omdbapi.com/?t=$title_name&y=$year&plot=full"); // getting IMDBID from OMDBAPI
					$json_imdb = json_decode($omdbapi, true); //This will convert it to an array
					//print_r($json_imdb);die();
					
					if(!isset($json_imdb["Error"])){
							
					$MovieID = $json_imdb['imdbID'];
					
					
					$fp = file_get_contents("http://api.themoviedb.org/3/movie/".$MovieID."?append_to_response=credits,images&api_key=".API_KEY);
					$json = json_decode($fp, true);
					
					$lang = $json['spoken_languages'][0];
					
                    $poster = $json['poster_path'];
					 
					 
					$movie_Poster = "http://image.tmdb.org/t/p/w342/".$json['poster_path'];
					$url_poster = !empty($movie_Poster) ? $movie_Poster : "";
					$name_poster = basename($url_poster);   /// this is the main movie poster name //
					$file_path = "../images/$MovieID/poster/$name_poster";
					
					 
					 
					 $MovieTitle = sanitize($json['title']);
					 $MovieYear = $year;
					 $MovieID = $json['imdb_id'];
					 $MovieQuality = $quality;
					 $MovieTrailer = "";
					 $MovieCategory = $Category;
					 $MovieRatings = $json['vote_average'];
					 $MovieGenre = "";
					 $MovieGenre = sanitize($MovieGenre);
					 $MovieDate = $json['release_date'];
					 $Movielang = sanitize($lang['name']);
					 $Moviehomepage = sanitize($json['homepage']);
					 $MovieRuntime = $json['runtime'];
					 $MovieKeywords = "";
					 $MovieStory = sanitize($json['overview']);
					 $MovieWatchLink = $dir.'/'.$MovieTitle.'/';
					 $MovieSubtitle = $dir.'/'.$MovieTitle.'/';
					 $uploadedUser = $user_data['user'];
					 $uploadedTime = $date_a;
					
					 $sql = "INSERT INTO `allmovies`(`MovieTitle`,`MovieYear`,`MovieID`,`MovieQuality`,`MovieCategory`,`MovieTrailer`,`MovieRatings`,`MovieGenre`,`MovieDate`, `Movielang`,`Moviehomepage`,`MovieRuntime`,`MovieKeywords`,`MovieStory`,`MovieWatchLink`,`MovieSubtitle`,`poster`,`uploadedUser`,`uploadTime`,`MovieSize`,`published`) VALUES ('$MovieTitle','$MovieYear','$MovieID','$MovieQuality','$MovieCategory','$MovieTrailer','$MovieRatings','$MovieGenre','$MovieDate','$Movielang','$Moviehomepage','$MovieRuntime','$MovieKeywords','$MovieStory','$MovieWatchLink','$MovieSubtitle','$name_poster','$uploadedUser','$uploadedTime','$size','1')";
					 //print_r($sql);die();
					 

					if (!file_exists('../Moviesinfo/'.$year.'/'.$addMovie)){
					mkdir('../images/'.$MovieID.'', 0777, true);
					mkdir('../images/'.$MovieID.'/poster', 0777, true);
					chmod('../images/'.$MovieID.'/poster', 0777);
					mkdir('../Moviesinfo/'.$year.'/'.$addMovie.'', 0777, true);
					
					file_put_contents($file_path, file_get_contents($url_poster));
					
					$folder = fopen('../images/'.$MovieID.'/'.$MovieID.'.json', 'w');
				    fwrite($folder, json_encode($json));
				    fclose($folder);
					
					$query = mysqli_query($connect_baza,$sql);
					
					if($query === true){
						$message[] = '<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i>Success!</h4>
				You\'ve been successfully Added '.$MovieTitle.'.
			  </div>';
				$_SESSION["message"] = $message;
				header("Location: ../autoinsert.php");
					}else{
						            $message[] = '<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
									'.$MovieTitle.' - ERROR!! Executing this movie in MYSQLI.
								  </div>';
									$_SESSION["message"] = $message;
		                            header("Location: ../autoinsert.php");
					}
					
					
					
					}else{
					 $message[] = '<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-ban"></i> Alert!</h4>
									'.$MovieTitle.' - this Movie has been Added Already please Update this movie or try onather one!
								  </div>';
									$_SESSION["message"] = $message;
		                            header("Location: ../autoinsert.php");
									
					}
					

					
					}else{
					$message[] = "<div class=\"alert alert-danger alert-dismissable\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
					<h4><i class=\"icon fa fa-ban\"></i>Error!</h4>
					Sorry we haven't found any info about <span style=\"color:red;font-weight:bold\">".$addMovie."</span> in IMDB 
					</div>";
					$_SESSION["message"] = $message;
					//header("Location: ../autoinsert.php");
					}
					
					
					}
				 }
					
					
					
					
					
}				
					
