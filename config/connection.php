<?php 
	$host 		= "127.0.0.1";
	$username 	= "root";
	$password 	= "";
	$databse 	= "konsultan";

	$con = mysql_connect($host, $username, $password) or die("Database not found !!");
	mysql_select_db($databse, $con);
?>