<!DOCTYPE html>
<html>
<head>
	<title>Dashboard User</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="navbar navbar-custom navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Tanya Dokter</a>
			</div>
			<div class="colapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
					<?php 
							session_start();
					 ?>
						<?php 
							$level = isset($_SESSION['level']) ? $_SESSION['level'] : '';
							echo $level;
						?>

						<?php if ($level == 2){ ?>
							<li><a href="?listUser"><span class="glyphicon glyphicon-list"></span> List User</a></li>
						<?php } else { ?>
							<li><a href="?spesialis"><span class="glyphicon glyphicon-list"></span> Spesialis</a></li>							
						<?php } ?>

					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-menu-hamburger"></span>
						<?php 
							$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
							echo $name;
						?>
					</a>
						<?php if (isset($_SESSION['email'])){ ?>
						<ul class="dropdown-menu">
							<li><a href="?act_logout">Logout</a></li>
						</ul>
						<?php } else { ?>
						<ul class="dropdown-menu">
							<li><a href="?signup">Daftar</a></li>
							<li><a href="?login">Masuk</a></li>
						</ul>
						<?php } ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>