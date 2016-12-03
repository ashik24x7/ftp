<?php

                    include('../core/init.php');
					$id = sanitize($_GET['id']);
					$delpid = sanitize($_GET['delpid']);
					$alldel = sanitize($_GET['alldel']);
					$delSid = sanitize($_GET['delSid']);
					$delSPid = sanitize($_GET['delSPid']);

			        $infoError = array();
					
					if(isset($id) && !empty($id) === true){
					$sql = "UPDATE games SET `published`='2' WHERE `id` = '$id'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Deleted '.$allGames['title'].'. You will find this Games in Trash Games.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				}
					}
					
					if(isset($delpid) && !empty($delpid) === true){
					$sql = "DELETE FROM games WHERE id = '$delpid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Deleted '.$allGames['title'].'. this Games Permanently.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../trashgames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../trashgames.php");
				}
					}
						
					if(isset($alldel) && !empty($alldel) === true){ /// Games All Delete Permanently
					$sql = "DELETE FROM games WHERE `published` = '$alldel'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Deleted '.$allGames['title'].'. all Trash Games Permanently.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../trashgames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../trashgames.php");
				}
					}
					
				if(isset($allSdel) && !empty($allSdel) === true){ /// Games All Delete Permanently
					$sql = "DELETE FROM software WHERE `publish` = '$allSdel'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
					$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Deleted all Trash Software Permanently.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				}
					}
					
						if(isset($delSid) && !empty($delSid) === true){ // Software Trash Delete
					$sql = "UPDATE software SET `publish`='2' WHERE `id` = '$delSid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Deleted '.$Softwares['title'].'. You will find this Software in Trash Page.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				}
					}
					
					if(isset($delSPid) && !empty($delSPid) === true){ // Software Permanetly Delete single
					$sql = "DELETE FROM software WHERE `id` = '$delSPid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Deleted '.$Softwares['title'].'. Permantly
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				}
					}
					