<?php
include('../core/init.php');
if(isset($_POST['submit'])){

date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());

$id = sanitize($_POST['id']);
$exordID = sanitize($_POST['exordID']);
$Text = sanitize($_POST['text']);
$ReplyText = sanitize($_POST['reply_text']);


	  $sql = "UPDATE `shoutbox` SET `date`='$date_a',`exordid`='$exordID',`text`='$Text',`reply_text`='$ReplyText' WHERE id = ".(int)$id;
	  
  if(mysqli_query($connect_baza,$sql)){
	$infoError[] = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i>Success!</h4>
		You\'ve been successfully Updated '.$gamesTitle.'
	  </div>';
	$_SESSION["infoError"] = $infoError;
	header("Location: ../dashboard.php");
  }
}