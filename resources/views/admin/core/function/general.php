<?php 

function logged_in_redirect(){
  if(logged_in() === true){
    header('Location: page_user_profile_account.php');
	exit();
}
}

function protect_page(){
  if(logged_in() === false){
    header('Location: index.php');
	exit();
  }
}



function output_errors($errors){
  $output = array();
  foreach($errors as $error){
    $output[] =  $error;
  }
  return implode('',$output);
}
function array_sanitize(&$item){
	global $connect_baza;
   $item = htmlentities(strip_tags(mysqli_real_escape_string($connect_baza,$item)));
}
function sanitize($data){
  global $connect_baza;
  return mysqli_real_escape_string($connect_baza,$data);
}
function preg_rplc($data){
	global $connect_baza;
	return preg_replace('#[^0-9a-z]#i','',stripslashes(mysqli_real_escape_string($connect_baza,$data)));
}
function settings(){
global $connect_baza;
//$results = array();
$data2 = mysqli_query($connect_baza,"SELECT * FROM `settings` WHERE id = '1'");
$setting = mysqli_fetch_array($data2);
return $setting;
}
$sett = settings();
$url = $sett['websiteUrl'];
define("URL",$url);
$theme = $sett['theme'];
define("THEME",$theme);
$webname = $sett['websiteName'];
define("WEBNAME",$webname);


//check mysqli injection
	function check_input($value){
		$value=htmlspecialchars($value);
		if (get_magic_quotes_gpc()){
  			$value = stripslashes($value);
  		}
		// Quote if not a number
		if (!is_numeric($value)){
  			$value = mysqli_real_escape_string($value);
  		}
		return $value;
	}
?>


