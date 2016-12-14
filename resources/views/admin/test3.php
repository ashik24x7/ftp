<?php
$dir = "images/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
		if($file == '.' or $file == '..'){
         continue;
		}
		$IMDBfolder = $dir.$file;
		$Posterfolder = $dir.$file.'/poster';
		if($imdb = opendir($IMDBfolder)){
			while(($jsonFile = readdir($imdb)) !== false){
				if($jsonFile == '.' or $jsonFile == '..'){
         continue;
		       }
			   if($jsonFile != 'poster'){
				//echo $jsonFile.'<br>';
				$json = file_get_contents("$IMDBfolder/$jsonFile");
				$jsonm = json_decode($json, true);
				if(!is_array($jsonm)){
					continue;
				}
				echo $title = $jsonm['original_title'].'<br>';
				echo $poster = '<img src="'.$Posterfolder.$jsonm['poster_path'].'" style="width:220px;height:220px;"/><br>';
			   }
			}
		}
    }
    closedir($dh);
  }
}
?>