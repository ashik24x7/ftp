<?php
include('../core/init.php');
if(isset($_POST['submit'])){

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$id = sanitize($_POST['id']);
$TVTitle = sanitize($_POST['TVTitle']);
$TVactors = sanitize($_POST['TVactors']);
$YoutubeTrailer = sanitize($_POST['YoutubeTrailer']);
$TVgenre = sanitize($_POST['TVgenre']);
$TVstory = sanitize($_POST['TVstory']);
$TVcategory = sanitize($_POST['TVcategory']);
$uploadedUser = $user_data['user'];
$published = $_POST['Published'];

	  if(!empty($_FILES['TVCover']['name']) === true){
				   
				   $allowed = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG');
				   $file_name = $_FILES['TVCover']['name'];
				   $coverpic = $_POST['coverpic'];
				   $file_extn = explode('.', $file_name);
                   $file_extn = strtolower(end($file_extn));
				   $file_temp = $_FILES['TVCover']['tmp_name'];
				   
				   if(in_array($file_extn, $allowed) === true){
					 $file_path = '../TVseries/'.$TVTitle.'/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 unlink('../TVseries/'.$TVTitle.'/'.$coverpic);
					 move_uploaded_file($file_temp,$file_path);
					 $file_path = 'Admin/main/Games/'.$TVTitle.'/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
					 $sql = "UPDATE tvseries SET TVposter = '".$file_path."' WHERE TVID=".(int)$id;
					 
					 mysqli_query($connect_baza,$sql);
				   }else{
					$infoError[] = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Incorrect file type! Allowed : '.implode(', ',$allowed).'
                  </div>';
				    $_SESSION["infoError"] = $infoError;
					header("Location: ../add_episodes.php");
				   }
	  }else{
	  $sql = "UPDATE `tvseries` SET `uploadTime`='$date_a',`TVtitle`='$TVTitle',`TVtrailer`='$YoutubeTrailer',`TVactors`='$TVactors',`TVgenre`='$TVgenre',`TVcategory`='$TVcategory',`published`='$published',`uploadedUser`='$uploadedUser' WHERE TVID = ".(int)$id;
	  //die($sql);
	  }
  if(mysqli_query($connect_baza,$sql)){
	$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully Updated '.$TVTitle.'
	  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../add_episodes.php");
  }
}