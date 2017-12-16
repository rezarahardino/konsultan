<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top">
		<div class="container-fluid">
		    <div class="navbar-header">
		    	<a class="navbar-brand">Tanya Dokter</a>
		    </div>
	  	</div>
	</nav>

	<div class="container f_header">
	    <div class="row">
	        <div class="col-sm-6 col-md-4 col-md-offset-4">
	            <div class="account-wall">
	                <img class="profile-img" src="../assets/img/auth.png" alt="">
	                <form class="form-signin" action="act_login.php" method="post">
		                <input name="email" type="text" class="form-control" placeholder="Email" required autofocus>
		                <input name="password" type="password" class="form-control" placeholder="Password" required>
		                	<?php
								if (isset($_GET['Fail'])) {
									echo "<div class='alert alert-danger'>Login Fail !!</div>";
								} elseif (isset($_GET['validate'])) {
									echo "<div class='alert alert-danger'>Login Fail !!</div>";
								}
				            ?>
		                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		                <label class="checkbox pull-left f_re"><input type="checkbox" value="remember-me">Remember me</label>
		                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>