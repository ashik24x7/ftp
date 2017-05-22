<?php
              
                    include('../core/init.php');
					$imdbid = sanitize($_GET['id']);

			       $infoError = array();
				
				if(isset($imdbid)){
					
					$y = getYear($imdbid);
					$year = $y['MovieYear'];
					
					$N = getMovieName($imdbid);
					$Title = $N['MovieTitle'];
					$directory2 = '../Moviesinfo/'.$year.'/'.$Title;
					unlink($directory2);
					
					$directory = '../images/'.$imdbid; // get all file names
					recursiveRemoveDirectory($directory);
					//die($directory2);
					recursiveRemoveDirectory($directory2); //Movie Yearly information delete
					
					
                    $sql = "DELETE FROM allmovies WHERE MovieID ='$imdbid'";
                    //die($sql);					
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
