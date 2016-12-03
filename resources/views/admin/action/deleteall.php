<?php 
include('../core/init.php');
$imdbid = sanitize($_GET['id']);

$infoError = array();

if(isset($imdbid)){
 $deleteall = DeleteALL(2);
 foreach($deleteall as $delete){
	    $imdbid2 = $delete['MovieID'];
		$y = getYear($imdbid2);
		$year = $y['MovieYear'];
		
		$N = getMovieName($imdbid2);
		$Title = $N['MovieTitle'];
		
		$directory = '../images/'.$imdbid2; // get all file names
		recursiveRemoveDirectory($directory);
		
		$directory = '../Moviesinfo/'.$year.'/'.$Title;
		recursiveRemoveDirectory($directory); //Movie Yearly information delete
		
		
		$sql = "DELETE FROM allmovies WHERE MovieID ='$imdbid2'";
		if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Deleted '.$Title.'.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../allmovies.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../allmovies.php");
				}
 }
}