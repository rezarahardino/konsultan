<?php  
	include '../config/connection.php';

	$id 			= $_POST['id_user'];
	$name 			= $_POST['name'];
	$telp 			= $_POST['telp'];
	$address 		= $_POST['address'];
	$id_category 	= $_POST['id_category'];


	$sql 	= "UPDATE users SET 
				name	 	= '$name', 
				telp	 	= '$telp', 
				address	 	= '$address', 
				id_category = '$id_category'
			WHERE id_user = '$id'
	";
	$query 	= mysql_query($sql);

	if ($query) {
		header('location:?doctor&editDoctorSuccess');
	} else {
		header('location:?doctor&editDoctorFail');
	}
?>