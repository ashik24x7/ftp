<?php
include('../core/init.php');
$owndir = '../TVseries/';

$Category = $_GET['cat'];
$path = $_GET['path'];

$filesDIR = '../../../'.$path.'/'.$Category;

$dir = '../../../'.$path.'/'.$Category;
$dir2 = $path.'/'.$Category;

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
						//print_r($myFolder);die();
						
						$errors = array_filter($diff);

						if (empty($errors)) {
					$message[] = "<div class=\"alert alert-danger alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <h4><i class=\"icon fa fa-ban\"></i>Error!</h4>
                    We didn't find any new Movies in <span style=\"color:red;font-weight:bold\">".$Category."->".$year."</span> Folder 
                  </div>";
				  $_SESSION["message"] = $message;
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
				    $omdbapi = file_get_contents("http://www.omdbapi.com/?t=$title_name"); // getting IMDBID from OMDBAPI
					$json_imdb = json_decode($omdbapi, true); //This will convert it to an array
					//print_r($json_imdb);die();
					
					if(!isset($json_imdb["Error"])){
							
					$MovieID = $json_imdb['imdbID'];
					echo $MovieID.'<br>';
					
					}
					
					
					}
				 }
					
					
					
					
					
}				
					
