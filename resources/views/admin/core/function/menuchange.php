<?php

function menuChange($parent){
	   global $connect_baza;
	    $query = "SELECT `menu_name`,`id` FROM `menu` WHERE `parent` = '$parent' ORDER BY `id` ASC LIMIT 0,7";
		
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			if($parent == 'Games'){
			echo '<li><a href="'.URL.'themes/'.THEME.'/games.php?page=1&Category='.$row['menu_name'].'"><i class="fa fa-send"></i>'.strtoupper($row['menu_name']).'</a> </li>';	
			}else if($parent == 'Software'){
		echo '<li><a href="'.URL.'themes/'.THEME.'/software.php?Category='.$row['menu_name'].'"><i class="fa fa-send"></i>'.strtoupper($row['menu_name']).'</a> </li>';	
			}else if($parent == 'Tv Series'){
		echo '<li><a href="'.URL.'themes/'.THEME.'/tv-series.php?page=1&Category='.$row['menu_name'].'"><i class="fa fa-send"></i>'.strtoupper($row['menu_name']).'</a> </li>';	
			}else{
		//echo '<li><a href="categories.php?page=1&Category='.$row['menu_name'].'"><i class="fa fa-film"></i>'.strtoupper($row['menu_name']).'</a> </li>';
		
			echo '<li style="transition-delay: 0ms;"><a href="categories.php?page=1&Category='.$row['menu_name'].'"><i class="fa fa-film"></i>'.strtoupper($row['menu_name']).'</a></li>';
		
			}
		}
}
function menuChangeMore($parent){
	global $connect_baza;
	    $query = "SELECT `menu_name`,`id` FROM `menu` WHERE `parent` = '$parent' ORDER BY `id` ASC LIMIT 7,14";
		
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			
			echo '<li style="transition-delay: 0ms;"><a href="categories.php?page=1&Category='.$row['menu_name'].'">'.strtoupper($row['menu_name']).'</a></li>';
		
		}
}
function QualityCollect($category,$quality){
	  global $connect_baza;
	    $query = "SELECT `MovieQuality` FROM `allmovies` WHERE `MovieCategory` = '$category' GROUP BY `MovieQuality`";
		
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			if($quality == $row['MovieQuality']){
			echo '<option selected="selected" value="quality.php?page=1&Category='.$category.'&quality='.$row['MovieQuality'].'" >'.$row['MovieQuality'].'</option>';
			}else{
			echo '<option value="quality.php?page=1&Category='.$category.'&quality='.$row['MovieQuality'].'" >'.$row['MovieQuality'].'</option>';	
			}
		}
}
function YearCollect($category,$year){
	  global $connect_baza;
	    $query = "SELECT `MovieYear` FROM `allmovies` WHERE `MovieCategory` = '$category' GROUP BY `MovieYear`";
		
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			if($year == $row['MovieYear']){
			echo '<option selected="selected" value="year.php?page=1&Category='.$category.'&year='.$row['MovieYear'].'" >'.$row['MovieYear'].'</option>';
			}else{
			echo '<option value="year.php?page=1&Category='.$category.'&year='.$row['MovieYear'].'" >'.$row['MovieYear'].'</option>';
			}
		}
}
function GenreCollect($category,$movGenre){
	  global $connect_baza;
	    $query = "SELECT moviesgenre.name as na FROM `moviesgenre` INNER JOIN allmovies WHERE allmovies.MovieCategory = '$category' GROUP BY moviesgenre.name";
		
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			if($movGenre == $row['na']){
			echo '<option selected="selected" value="genre.php?page=1&Category='.$category.'&genre='.$row['na'].'" >'.$row['na'].'</option>';	
			}
			echo '<option value="genre.php?page=1&Category='.$category.'&genre='.$row['na'].'" >'.$row['na'].'</option>';
			//echo '<option value="genre.php?page=1&Category='.$category.'" >All</option>';
		}
}
function menuRead($parent){
	    global $connect_baza;
	    $query = "SELECT `menu_name`,`id` FROM `menu` WHERE `parent` = '$parent'";
		
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			echo '<option value="'.$row['id'].'">'.$row['menu_name'].'</option>';
		}
}
function SelectPath(){
	    global $connect_baza;
	    $query = "SELECT `Path` FROM disk_setup GROUP BY `Path`";
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			if($row['Path'] != ''){
				echo '<option value="'.$row['Path'].'">'.$row['Path'].'</option>';
			}
		}
}
function PathCategory(){
	    global $connect_baza;
	    $query = "SELECT `Category` FROM disk_setup";
	    $sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			echo '<option value="'.$row['Category'].'">'.$row['Category'].'</option>';
		}
}

function getQualityID($Quality){
global $connect_baza;
$sql = "SELECT menu.id AS id FROM `menu` INNER JOIN allmovies ON menu.menu_name = allmovies.MovieQuality WHERE allmovies.MovieQuality = '$Quality'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}

function getCategoryID($Category){
global $connect_baza;
$sql = "SELECT menu.id AS id FROM `menu` INNER JOIN allmovies ON menu.menu_name = allmovies.MovieCategory WHERE allmovies.MovieCategory = '$Category'";
//die($sql);
$data2 = mysqli_query($connect_baza,$sql);
$results = mysqli_fetch_array($data2);
return $results;
}


function CetegoriesCollect($parent){
	    global $connect_baza;
	    $query = "SELECT `allmovies`.MovieCategory, COUNT(`allmovies`.MovieCategory) AS numcategory FROM `allmovies` WHERE `published` = '0' AND `MovieCategory` = '$parent' GROUP BY `MovieCategory`";
	    //die($query);
		$sql = mysqli_query($connect_baza,$query);
		while($row = mysqli_fetch_array($sql)){
			echo '<li><a href="categories.php?Category='.$row['MovieCategory'].'&page=1">'.$row['MovieCategory'].'</a><span>['.$row['numcategory'].']</span></li>';
		}
}
