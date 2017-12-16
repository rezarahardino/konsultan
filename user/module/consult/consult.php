<?php
	include '../config/connection.php';

	$id 		= $_GET['id_doctor'];
	$id_user 	= $_SESSION['id_user'];

	$sql = "INSERT INTO live_chat (id_user, id_doctor, is_consult)
		VALUES (
			'$id_user',
			'$id',
			1
		)
	";
	$query = mysql_query($sql);

	if ($query) {
		header('location:?dummy');
	} 
?>