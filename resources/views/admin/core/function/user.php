<?php 

function change_profile_pic($user_id,$file_temp,$file_extn){
  global $connect_baza;
  $file_path = '../images/profile/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
  move_uploaded_file($file_temp,$file_path);
  $file_path = 'core/images/profile/'.substr(md5(time()), 0 ,10).'.'.$file_extn;
  $sql = "UPDATE admin SET profile = '".$file_path."' WHERE id=".(int)$user_id;
  mysqli_query($connect_baza,$sql);
}

function change_password($user_id, $password){
    
	global $connect_baza;
	
	$user_id = (int)$user_id;
	$password = md5($password);
	
	mysqli_query($connect_baza,"UPDATE `admin` SET `password` = '$password' WHERE `id` = '$user_id'");
}

function add_tuto($add_tuto){
   
   global $connect_baza;
   $fields = '`' .implode('`, `', array_keys($add_tuto)).'`';
   $data = '\'' .implode('\', \'', $add_tuto).'\'';
   
   //die("INSERT INTO `tuto` ($fields) VALUES ($data)");
   
    mysqli_query($connect_baza,"INSERT INTO `tuto` ($fields) VALUES ($data)");
    
}



function user_count() {
   global $connect_baza;
   return mysqli_result(mysqli_query($connect_baza,"SELECT COUNT('id') FROM `admin` WHERE `active`= 1"), 0);
}
  function user_data($user_id){
 $data = array();
 $user_id = (int)$user_id;
 
 $func_num_args = func_num_args();
 $func_get_args = func_get_args();
 
 if($func_num_args > 1){
	global $connect_baza;
    unset($func_get_args[0]);
	
	$fields ='`'.implode('`, `', $func_get_args).'`';
	$data = mysqli_fetch_assoc(mysqli_query($connect_baza,"SELECT $fields FROM `admin` WHERE `id`='$user_id'"));

	return $data;
 }
}
 
  function logged_in(){
    return (isset($_SESSION['id'])) ? true : false;
  }
  
  function user_exists($username){
  global $connect_baza;
  $username = sanitize($username);
  $query = mysqli_query($connect_baza,"SELECT COUNT(id) FROM admin WHERE user = '$username'") or exit('database problem');
   while ($row = mysqli_fetch_row($query)) {
		$countNumber = $row[0];
        if($countNumber == 1){
			return true;
		}else{
			return false;
		}
    }
  }
  
  function user_active($username){
  global $connect_baza;	  
  $username = sanitize($username);
  $query = mysqli_query($connect_baza,"SELECT COUNT(id) FROM admin WHERE user = '$username' AND active = 1") or exit('database problem');
  
  while ($row = mysqli_fetch_row($query)) {
		$countNumber = $row[0];
        if($countNumber == 1){
			return true;
		}else{
			return false;
		}
    }
  
  }
  
  function user_id_from_username($username){
  global $connect_baza;	 
  $username = sanitize($username);
  $query = mysqli_query($connect_baza,"SELECT id FROM admin WHERE user = '$username'") or exit('database problem');
  while($row = mysqli_fetch_array($query)){
	return $row['id'];
}
  }
  
  function login($username,$password){
  global $connect_baza;
  $user_id = user_id_from_username($username);
  $username = sanitize($username);
  $password = md5($password);
  $query = mysqli_query($connect_baza,"SELECT COUNT(id) FROM admin WHERE user = '$username' AND password = '$password'") or exit('database problem');

    /* fetch associative array */
    while ($row = mysqli_fetch_row($query)) {
		$countNumber = $row[0];
        if($countNumber == 1){
			return $user_id;
		}else{
			return false;
		}
    }
 // return (mysql_result($query,0) == 1) ? $user_id : false;
  }
  
           
	function active($data){  /* menu change (active) */
		$change = basename($_SERVER['PHP_SELF']); 
		if($data === $change){
			$a = 'active';
		}else{
			$a = '';
		}
		return $a;
	}

  
   
  
?>