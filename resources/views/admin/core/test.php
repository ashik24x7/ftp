<?php 
include('database/config.php');
  $query = mysqli_query($connect_baza,"SELECT COUNT(id) FROM admin WHERE user = 'bivob' AND password = '3f18906a561094e9099b67cdeed25a40'") or exit('database problem');
 $user_id = 3;
    /* fetch associative array */
    while ($row = mysqli_fetch_row($query)) {
		$count = $row[0];
		function testy($count){
        if(testy($count) == 1){
			return $user_id;
		}else{
			return false;
		}
		}
    }
	echo testy($count);
?>