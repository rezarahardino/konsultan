<?php  
	include '../config/connection.php';
	
	if (session_destroy()) {
		header('location:login.php');
	} 
?>