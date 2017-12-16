<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Admin</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php 
				session_start(); 	
				if (empty($_SESSION['email'])) {
					header('location:login.php?validate');
				} 	

				include 'components/header.php';
				include 'components/menu.php';	
			?>	

			<?php  
				// Doctor
				if (isset($_GET['doctor'])) {
					include 'module/doctor/list.php';
				} elseif (isset($_GET['addDoctor'])) {
					include 'module/doctor/add.php';
				} elseif (isset($_GET['saveDoctor'])) {
					include 'module/doctor/save.php';
				} elseif (isset($_GET['editDoctor'])) {
					include 'module/doctor/edit.php';
				} elseif (isset($_GET['editedDoctor'])) {
					include 'module/doctor/edited.php';
				} elseif (isset($_GET['deleteDoctor'])) {
					include 'module/doctor/delete.php';
				}
				// Category
				 elseif (isset($_GET['categories'])) {
					include 'module/categories/list.php';
				} elseif (isset($_GET['addCategory'])) {
					include 'module/categories/add.php';
				} elseif (isset($_GET['saveCategory'])) {
					include 'module/categories/save.php';
				} elseif (isset($_GET['editCategory'])) {
					include 'module/categories/edit.php';
				} elseif (isset($_GET['editedCategory'])) {
					include 'module/categories/edited.php';
				} elseif (isset($_GET['deleteCategory'])) {
					include 'module/categories/delete.php';
				}

				// Auth
				elseif (isset($_GET['act_logout'])) {
					include 'act_logout.php';
				} 

				else {
					include 'components/content.php';	
				}
			?>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php 
				include 'components/footer.php';	
			?>
		</div>
	</div>
</body>
</html>