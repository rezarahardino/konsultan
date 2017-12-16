<?php  
	include '../config/connection.php';

	$name 			= $_POST['name'];
	$gender 		= $_POST['gender'];
	$telp 			= $_POST['telp'];
	$address 		= $_POST['address'];
	$id_category 	= $_POST['id_category'];

	$sql 	= "INSERT INTO users (name, gender, telp, address, id_category, level)
			VALUES (
				'$name',
				'$gender',
				'$telp',
				'$address',
				'$id_category',
				2
			)
	";
	$query 	= mysql_query($sql);

	if ($query) {
		header('location:?doctor&addDoctorSuccess');
	} else {
		header('location:?doctor&addDoctorFail');
	}
?>