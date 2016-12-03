<?php
include('../../Admin/main/core/init.php');

 $exordid = sanitize($_POST['exordid']);
 $request = sanitize($_POST['request']);
 
 $vowels = array("porn", "fuck", "Stupid", "asshole","sex","Porn","Fuck","Sex","maal");
 $replace = str_replace($vowels, "<del>xxx</del>", $request);
 
 date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d');
$date_a = date('Y-m-d',strtotime("Today"));
$date_a .= " ".date('H:i:s',time());
 

 
        $ipaddress = $_SERVER['REMOTE_ADDR'];
   
	
 $today_chat = mysqli_query($connect_baza,"SELECT `id` FROM `shoutbox` WHERE `text`='{$replace}' AND `user_ip`='{$ipaddress}' ");
 
 $exist = mysqli_fetch_object($today_chat);

if(empty($request)===true){
echo '<font style="color:red;">Please Write Something</font>';
}elseif(!empty($exist)){
	echo '<font style="color:red;">You have already posted it</font>';
}else{
 mysqli_query($connect_baza,"INSERT INTO shoutbox (`exordid`,`date`,`text`,`user_ip`) VALUE ('$exordid','$date_a','$replace','$ipaddress')") or die('wrong with database');
 }