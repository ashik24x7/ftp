<?php               
                    include('../../core/init.php');
                    
			        $infoError = array();		
					if(isset($_POST['psubmit'])){
					  $fullName = sanitize($_POST['fullName']);
					  $email = sanitize($_POST['email']);
					  $MobileNumber = sanitize($_POST['MobileNumber']);
					  $city = sanitize($_POST['city']);
					  $aboutMe = sanitize($_POST['aboutMe']);
					
					if($fullName == ''){
					  $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Fields marks with asterisk are required!
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
					}else{
					  $id = $user_data['id'];
					  $sql = "UPDATE admin SET fullName='$fullName',email='$email',MobileNumber='$MobileNumber',city='$city',aboutMe='$aboutMe' WHERE id='$id'";
					  
						if(mysqli_query($connect_baza,$sql)){
							$infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully updated your information.
                  </div>';
							$_SESSION["infoError"] = $infoError;
							header("Location: ../../page_user_profile_account.php");

						} else {
							$infoError[] = "ERROR: Could not able to execute";
							$_SESSION["infoError"] = $infoError;
							header("Location: ../../page_user_profile_account.php");
						}
					}
						
						 }
						 
						 
                  if(isset($_FILES['profile']) === true){
				  if(empty($_FILES['profile']['name']) === true){
					  $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Please Choose a image
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
				   
				  }else{
				   $allowed = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG');
				   
				   $file_name = $_FILES['profile']['name'];
				   $file_extn = explode('.', $file_name);
                   $file_extn = strtolower(end($file_extn));
				   $file_temp = $_FILES['profile']['tmp_name'];
				   
				   if(in_array($file_extn, $allowed) === true){
					 $session_user_id = $user_data['id'];
				     change_profile_pic($session_user_id,$file_temp,$file_extn);
					 $infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>Success!</h4>
                    You\'ve been successfully updated your Profile Picture.
                  </div>';
							$_SESSION["infoError"] = $infoError;
							header("Location: ../../page_user_profile_account.php");
					 
					 
				   }else{
					   $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Incorrect file type! Allowed : '.implode(', ',$allowed).'
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
				   }
				  }
				}
				
				
				/* ---- password Changing action -- */
				/* ---- password Changing action -- */
				
				
				
				
			
						if(isset($_POST['passwordSubmit'])){
						if(empty($_POST) === false){
						  $required_fields = array('current_password','password','password_again');
						  foreach($_POST as $key=>$value){
							if(empty($value) && in_array($key, $required_fields) === true){
							  $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Fields marks with asterisk are required!
                  </div>';
				  $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
							}
						 }
						 if(md5($_POST['current_password']) === $user_data['password']) {
						   if(trim($_POST['password']) !== trim($_POST['password_again'])){
							 $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Your new password do not match
                  </div>';
				  $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
						   }else if(strlen($_POST['password']) < 4){
							 $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Your new password must be at least 4 characters!
                  </div>';
				  $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
						   }
						 }else{
						   $infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Your Current password is incorrect!
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
						 }
						}
						if(empty($_POST['passwordSubmit']) === false && empty($infoError) === true){
							            $session_user_id = $user_data['id'];
										change_password($session_user_id, $_POST['password']);
										 $infoError[] = '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Success!</h4>
                    You\'ve been successfully changed your old password.
                  </div>';
				  $_SESSION["infoError"] = $infoError;
					header("Location: ../../page_user_profile_account.php");
										}
						}
                   
				
				
				
				
				
				
				
				
				
				
				
				
				
						 
					?>