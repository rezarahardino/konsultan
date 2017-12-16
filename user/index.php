 <!DOCTYPE html>
<html>
<head>
	<title>Tanya Dokter</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php 
				include 'components/header.php';
			?>	
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php 
				if (isset($_GET['signup'])) {
					include 'signup.php';
				} elseif (isset($_GET['act_signup'])) {
					include 'act_signup.php';
				} elseif (isset($_GET['login'])) {
					include 'login.php';
				} elseif (isset($_GET['act_login'])) {
					include 'act_login.php';
				} elseif (isset($_GET['act_logout'])) {
					include 'act_logout.php';
				} elseif (isset($_GET['spesialis'])) {
					include 'module/spesialis/list.php';
				} elseif (isset($_GET['listUser'])) {
					include 'module/listuser/listuser.php';
				} elseif (isset($_GET['konsultasi'])) {
					include 'module/consult/consult.php';
				} elseif (isset($_GET['konsultasi'])) {
					include 'module/consult/dummy.php';
				} 

				else {
					include 'components/content.php';
				}

				if (!isset($_GET['login'])) {
					include 'components/sidebar.php';
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