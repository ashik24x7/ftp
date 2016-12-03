<?php               
                    include('../../core/init.php');
			        $infoError = array();		
					$username = $user_data['user'];
					$date_a = date('Y-m-d',strtotime("Today"));
                    $date_a .= " ".date('H:i:s',time());
					
					
					if(isset($_POST['psubmit'])){
					  $PostTitle = sanitize($_POST['PostTitle']);
					  $Categories = sanitize($_POST['Categories']);
					  $keyWords = sanitize($_POST['keyWords']);
					  $Description = sanitize($_POST['Description']);
					  $FullPosts = sanitize($_POST['fullPost']);
					
					if($PostTitle == ''){
					  $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Fields marks with asterisk are required!
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../../insertpost.php");
					}else{
						
						
						if(isset($_FILES['profile']) === true){				  
				  if(empty($_FILES['profile']['name']) === true){
					  $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Please Choose a image
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../../insert_post.php");
				   
				  }else{
				   $allowed = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG');
				   
				   $file_name = $_FILES['profile']['name'];
				   $file_extn = explode('.', $file_name);
                   $file_extn = strtolower(end($file_extn));
				   $file_temp = $_FILES['profile']['tmp_name'];
				   
				   if(in_array($file_extn, $allowed) === true){
					
				     $file_path = '../images/posts/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 move_uploaded_file($file_temp,$file_path);
					 $file_path = 'core/images/posts/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 
				   }else{
					   $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Incorrect file type! Allowed : '.implode(', ',$allowed).'
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../../insert_post.php");
				   }
				  }
				}
						
						
						
					  
					  $sql = "INSERT INTO `blogposts`(`DateTime`, `userName`, `PostTitle`, `PostImage`, `Categories`, `keyWords`, `Description`, `FullPosts`) VALUES ('$date_a','$username','$PostTitle','$file_path','$Categories','$keyWords','$Description','$FullPosts')";
					  
						if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully Inserted.
                  </div>';
							$_SESSION["infoError"] = $infoError;
							header("Location: ../../insertpost.php");

						} else {
							$infoError[] = "ERROR: Could not able to execute";
							$_SESSION["infoError"] = $infoError;
							header("Location: ../../insertpost.php");
						}
					}
						
						 }
						 
						 
					?>