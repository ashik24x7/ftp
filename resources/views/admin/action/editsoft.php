<?php
include('../core/init.php');
if(isset($_POST['submit'])){

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$id = sanitize($_POST['id']);
$softTitle = sanitize($_POST['SoftTitle']);
$filesize = sanitize($_POST['filesize']);
$DownloadLink = sanitize($_POST['DownloadLink']);
$SoftCate = sanitize($_POST['SoftCate']);
$uploadedUser = $user_data['user'];
$published = $_POST['Published'];

	  if(!empty($_FILES['SoftCover']['name']) === true){
				   
				   $allowed = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG');
				   $file_name = $_FILES['SoftCover']['name'];
				   $coverpic = $_POST['coverpic'];
				   $file_extn = explode('.', $file_name);
                   $file_extn = strtolower(end($file_extn));
				   $file_temp = $_FILES['SoftCover']['tmp_name'];
				   
				   if(in_array($file_extn, $allowed) === true){
					 $file_path = '../Software/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 unlink('../Software/'.$coverpic);
					 move_uploaded_file($file_temp,$file_path);
					 $file_path = 'Admin/main/Software/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 
				   }else{
					$infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Incorrect file type! Allowed : '.implode(', ',$allowed).'
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../editsoftware.php");
				   }
	  }
	  if(empty($_FILES['SoftCover']['name']) === true){
		  $sql = "UPDATE `software` SET `Date`='$date_a',`title`='$softTitle',`downLink`='$DownloadLink',`cata`='$SoftCate',`filesize`='$filesize',`publish`='$published',`upby`='$uploadedUser',`picU` = '1' WHERE id = ".(int)$id;
	  }else{
	  $sql = "UPDATE `software` SET `Date`='$date_a',`title`='$softTitle',`cover`='$file_path',`downLink`='$DownloadLink',`cata`='$SoftCate',`filesize`='$filesize',`publish`='$published',`upby`='$uploadedUser' WHERE id = ".(int)$id;
	  }
  if(mysqli_query($connect_baza,$sql)){
	$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully Updated '.$gamesTitle.'
	  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../editsoftware.php");
  }
}