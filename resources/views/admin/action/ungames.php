<?php               
                    include('../core/init.php');
					$id = sanitize($_GET['id']);
					$uid = sanitize($_GET['uid']);
					$allid = sanitize($_GET['allid']);
					$restore = sanitize($_GET['restore']);
					$allres = sanitize($_GET['allres']);
					$uSid = sanitize($_GET['uSid']);
					$allSid = sanitize($_GET['allSid']);
					$restoreS = sanitize($_GET['restoreS']);
					$Sid = sanitize($_GET['Sid']);
					$TVID = sanitize($_GET['TVID']);
					$STVID = sanitize($_GET['STVID']);
					
					$infoError = array();
					
					if(isset($id) && !empty($id) === true){
					$sql = "UPDATE games SET `published`='1' WHERE `id` = '$id'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Unpublished '.$allGames['title'].'. You will find this Games in Unpublished.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../ungames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../ungames.php");
				}
					}
					
						if(isset($STVID) && !empty($STVID) === true){
					$sql = "UPDATE tvseries SET `published`='0' WHERE `TVID` = '$STVID'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully published '.$jsonm['TVtitle'].'. You will find this tv series in add episodes page.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../untvseries.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../untvseries.php");
				}
					}
					
						if(isset($TVID) && !empty($TVID) === true){
					$sql = "UPDATE tvseries SET `published`='0' WHERE `published` = '1'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully published '.$jsonm['TVtitle'].'
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../add_episodes.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../add_episodes.php");
				}
					}
					
					if(isset($Sid) && !empty($Sid) === true){
					$sql = "UPDATE software SET `publish`='1' WHERE `id` = '$Sid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Unpublished. You will find this Software in Unpublished.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../unsoftware.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../unsoftware.php");
				}
					}
					
					if(isset($uid) && !empty($uid) === true){
					$sql = "UPDATE games SET `published`='0' WHERE `id` = '$uid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully published '.$allGames['title'].'. You will find this Games in Unpublished.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				}
					}
					
					if(isset($uSid) && !empty($uSid) === true){
					$sql = "UPDATE software SET `publish`='0' WHERE `id` = '$uSid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully published.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				}
					}
					
					
					if(isset($allid) && !empty($allid) === true){ /// For Published All Games
					$sql = "UPDATE games SET `published`='0' WHERE `published` = '$allid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully all published .
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				}
					}
					
					
						if(isset($allSid) && !empty($allSid) === true){  /// For Published All Software
					$sql = "UPDATE software SET `publish`='0' WHERE `publish` = '$allSid'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    All Unpublished Software has been Successfully Published
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				}
					}
					
					
					if(isset($restore) && !empty($restore) === true){ // Games Restore
					$sql = "UPDATE games SET `published`='0' WHERE `id` = '$restore'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully all published .
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				}
					}
					
					
					if(isset($restoreS) && !empty($restoreS) === true){ // Software Restore
					$sql = "UPDATE software SET `publish`='0' WHERE `id` = '$restoreS'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully published this software.
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../software.php");
				}
					}
					
					
					if(isset($allres) && !empty($allres) === true){
					$sql = "UPDATE games SET `published`='0' WHERE `published` = '$allres'";
                    //die($sql);					
					if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully all published .
                  </div>';
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				} else {
					$infoError[] = "ERROR: Could not able to execute";
					$_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				}
					}