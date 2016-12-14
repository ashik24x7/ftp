<?php 
session_start();

require 'database/config.php';
require 'function/general.php';
require 'function/user.php';
require 'function/menuchange.php';
require 'function/readMovies.php';


if(logged_in() === true){
     $session_user_id = $_SESSION['id'];
     $user_data = user_data($session_user_id,'id','user','fullName','password','MobileNumber','city','aboutMe','country','email','active','profile','theme');
	 $admin_login="logged_in";
	 
	 if(user_active($user_data['user']) === false){
   session_destroy();
   header ('Location: logout.php');
   exit();
 }
}

function isEmptyDir($dir){ 
     return (($files = @scandir($dir)) && count($files) <= 2); 
}


?>