<?php

                    include('../core/init.php');
					$imdbid = sanitize($_GET['id']);

			        $infoError = array();
					
					if(isset($imdbid)){
					$sql = "UPDATE allmovies SET `published`='0' WHERE `MovieID` = '$imdbid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been Restored successfully '.$Title.'.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../allmovies.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../allmovies.php");
				}
					}
					