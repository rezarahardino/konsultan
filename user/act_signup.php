<?php  
	include '../config/connection.php';

	$name 		= $_POST['name'];
	$gender 	= $_POST['gender'];
	$telephone 	= $_POST['telephone'];
	$address 	= $_POST['address'];
	$username 	= $_POST['username'];
	$email 		= $_POST['email'];
	$password 	= md5($_POST['password']);

	if (!empty($email) && !empty($_POST['password'])) {
		$sql	= "INSERT INTO users (name, gender, telp, address, username, email, password)
				VALUES (
					'$name',
					'$gender',
					'$telephone',
					'$address',
					'$username',
					'$email',
					'$password'
				)
		";

		$query 	= mysql_query($sql); 

		if ($query) {
			header('location:?signup&success');
		} else {
			header('location:?signup&fail');
		}
	} else {
		header('location:?signup&validate');
	}
?>