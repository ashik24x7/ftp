<?php
	

	$DB_HOST="localhost";
	$DB_USER="root";
	$DB_PASSWORD="161616z";
	$DATABASE="ftp";
	
	$connect_baza= mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DATABASE);
	if(!$connect_baza)
	{
		die("can't connect to the server");
	}
    define("API_KEY","43d80f9eb451f396a07726ad6ba768f3");
	
	
?>
