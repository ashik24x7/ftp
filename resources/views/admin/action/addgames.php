<?php 
include('../core/init.php');
$infoError = array();

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$gamesTitle = sanitize($_POST['GamesTitle']);
$filesize = sanitize($_POST['filesize']);
$YoutubeTrailer = sanitize($_POST['YoutubeTrailer']);
$DownloadLink = sanitize($_POST['DownloadLink']);
$GamesDetails = sanitize($_POST['GamesDetails']);
$GamesCate = sanitize($_POST['GamesCate']);
$uploadedUser = $user_data['user'];

	
 if(isset($_FILES['GamesCover']) === true){
  if(empty($_FILES['GamesCover']['name']) === true){
	  $infoError[] = '<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	Please Choose a Games Cover picture
  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../games.php");
   
  }else{
   $allowed = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG');
   
   $file_name = $_FILES['GamesCover']['name'];
   $file_extn = explode('.', $file_name);
   $file_extn = strtolower(end($file_extn));
   $file_temp = $_FILES['GamesCover']['tmp_name'];
   
   if(in_array($file_extn, $allowed) === true){
	 
	 
  $file_path = '../Games/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
  move_uploaded_file($file_temp,$file_path);
  $file_path = 'Admin/main/Games/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
  

  
  $sql = "INSERT INTO `games`(`date`, `title`, `cover_pic`, `trailer`, `download`, `details`, `con_cat`, `filesize`, `published`,`uploader`) VALUES ('$date_a','$gamesTitle','$file_path','$YoutubeTrailer','$DownloadLink','$GamesDetails','$GamesCate','$filesize','0','$uploadedUser')";
 // die($sql);
  if(mysqli_query($connect_baza,$sql)){
	$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully Added '.$gamesTitle.'
	  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../games.php");
  }
   }else{
	   $infoError[] = '<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	Incorrect file type! Allowed : '.implode(', ',$allowed).'
  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../games.php");
   }
  }
}