<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<div class="navbar navbar-custom navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Dashboard Admin</a>	
			</div>
			<div class="colapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-user"></span> 
							<?php 
								echo $_SESSION['name'];
							?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Setting</a></li>
							<li><a href="?act_logout">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>