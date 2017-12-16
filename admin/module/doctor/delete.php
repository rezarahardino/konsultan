<?php 
	include '../config/connection.php';

	$id 	= $_GET['id'];

	$sql 	= "DELETE FROM users 
			WHERE id_user = '$id' 
	";
	$query	= mysql_query($sql);

	if ($query) {
		header('location:?doctor&deleteDoctorSuccess');
	} else {
		header('location:?doctor&deleteDoctorFail');
	}
?>