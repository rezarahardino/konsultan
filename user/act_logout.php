<?php  
	include '../config/connection.php';
	
	$sql_update = "UPDATE users SET is_online = 0 WHERE id_user = ".$_SESSION['id_user']." 
						AND
							is_online = 1";
			mysql_query($sql_update);

	if (session_destroy()) {
		header('location:index.php');
	} 
?>