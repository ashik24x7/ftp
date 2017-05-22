<?php 
include('../core/init.php');
$infoError = array();

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$softTitle = sanitize($_POST['softTitle']);
$filesize = sanitize($_POST['filesize']);
$DownloadLink = sanitize($_POST['DownloadLink']);
$softCate = sanitize($_POST['softCate']);
$uploadedUser = $user_data['user'];

	
 if(isset($_FILES['softCover']) === true){
  if(empty($_FILES['softCover']['name']) === true){
	  $infoError[] = '<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	Please Choose a software Cover picture
  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../software.php");
   
  }else{
   $allowed = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG');
   
   $file_name = $_FILES['softCover']['name'];
   $file_extn = explode('.', $file_name);
   $file_extn = strtolower(end($file_extn));
   $file_temp = $_FILES['softCover']['tmp_name'];
   
   if(in_array($file_extn, $allowed) === true){
	 
	 
  $file_path = '../Software/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
  move_uploaded_file($file_temp,$file_path);
  $file_path = 'Admin/main/Software/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
  

  
  $sql = "INSERT INTO `software`(`Date`, `title`, `cover`, `downLink`, `cata`, `filesize`, `upby`, `publish`, `picU`) VALUES ('$date_a','$softTitle','$file_path','$DownloadLink','$softCate','$filesize','$uploadedUser','0','1')";
  if(mysqli_query($connect_baza,$sql)){
	$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully Added '.$softTitle.'
	  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../software.php");
  }
   }else{
	   $infoError[] = '<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	Incorrect file type! Allowed : '.implode(', ',$allowed).'
  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../software.php");
   }
  }
}

