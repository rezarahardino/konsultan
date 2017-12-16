<?php 
	include '../config/connection.php';

	$id 			= $_POST['id_category'];
	$name_category 	= $_POST['name_category'];

	$sql 	= "UPDATE categories SET name_category = '$name_category' 
			WHERE id_category = '$id'
	";
	$query 	= mysql_query($sql);

	if ($query) {
		header('location:?categories&editCategorySuccess');
	} else {
		header('location:?categories&editCategoryFail');
	}
?>