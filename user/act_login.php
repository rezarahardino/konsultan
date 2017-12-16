<?php  
	include '../config/connection.php';

	$email 		= $_POST['email'];
	$password 	= md5($_POST['password']);

	$sql 		= "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND level != 1";
	$query		= mysql_query($sql);
	$get_data	= mysql_fetch_assoc($query);
	$sum_data	= mysql_num_rows($query);

	if ($sum_data == 1) {
		session_start();
		$_SESSION['name'] 	 = $get_data['name'];
		$_SESSION['email'] 	 = $get_data['email'];
		$_SESSION['id_user'] = $get_data['id_user'];
		$_SESSION['level'] 	 = $get_data['level'];

			$sql_update = "UPDATE users SET is_online = 1 WHERE id_user = ".$get_data['id_user']." 
						AND
							is_online = 0";
			mysql_query($sql_update);

		header('location:index.php');
	} else {
		header('location:?login&fail');
	}
?>