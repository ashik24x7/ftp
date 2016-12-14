<?php
include('../core/init.php');
if(isset($_POST['submit'])){

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$id = sanitize($_POST['id']);
$gamesTitle = sanitize($_POST['GamesTitle']);
$filesize = sanitize($_POST['filesize']);
$YoutubeTrailer = sanitize($_POST['YoutubeTrailer']);
$DownloadLink = sanitize($_POST['DownloadLink']);
$GamesDetails = sanitize($_POST['GamesDetails']);
$GamesCate = sanitize($_POST['GamesCate']);
$uploadedUser = $user_data['user'];
$published = $_POST['Published'];

	  if(!empty($_FILES['GamesCover']['name']) === true){
				   
				   $allowed = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG');
				   $file_name = $_FILES['GamesCover']['name'];
				   $coverpic = $_POST['coverpic'];
				   $file_extn = explode('.', $file_name);
                   $file_extn = strtolower(end($file_extn));
				   $file_temp = $_FILES['GamesCover']['tmp_name'];
				   
				   if(in_array($file_extn, $allowed) === true){
					 $file_path = '../Games/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 unlink('../Games/'.$coverpic);
					 move_uploaded_file($file_temp,$file_path);
					 $file_path = 'Admin/main/Games/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 $sql = "UPDATE games SET cover_pic = '".$file_path."' WHERE id=".(int)$id;
					 
					 mysqli_query($connect_baza,$sql);
				   }else{
					$infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Incorrect file type! Allowed : '.implode(', ',$allowed).'
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../editgames.php");
				   }
	  }else{
	  $sql = "UPDATE `games` SET `date`='$date_a',`title`='$gamesTitle',`trailer`='$YoutubeTrailer',`download`='$DownloadLink',`details`='$GamesDetails',`con_cat`='$GamesCate',`filesize`='$filesize',`published`='$published',`uploader`='$uploadedUser' WHERE id = ".(int)$id;
	  }
  if(mysqli_query($connect_baza,$sql)){
	$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully Updated '.$gamesTitle.'
	  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../editgames.php");
  }
}