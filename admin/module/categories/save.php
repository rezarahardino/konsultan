<?php 
	include '../config/connection.php';

	$name_category = $_POST['name_category'];

	$sql 	= "INSERT INTO categories (name_category) 
		VALUES (
			'$name_category'
		)
		";
	$query 	= mysql_query($sql);

	if ($query) {
		header('location:?categories&addCategorySuccess');
	} else {
		header('location:?categories&addCategoryFail');
	}
?>