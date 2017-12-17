<div class="col-md-9 f_car">
	<div class="panel-heading">
		<div class="panel-title">
			<h3>List User Konsultasi</h3>
			<hr>
		</div>
	</div>
	<?php 
		include '../config/connection.php';

		$no 	= 1;
		$sql 	= "SELECT *, users.name FROM live_chat
				JOIN users ON live_chat.id_user = users.id_user
				WHERE live_chat.is_consult = 1 AND live_chat.id_doctor = ".$_SESSION['id_user']."
		";
		$query	= mysql_query($sql);

		while ($data = mysql_fetch_assoc($query)) {?>
			<div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="../assets/img/auth.png">
			      <div class="caption"> 
			        <p><?= $data['name'] ?> <button class="label label-success">on</button> </p>
			        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Chat</button>
							<a class="btn btn-primary" href="?chat&id_live=<?= $data['id_live_chat']?>">Chat</a>
						</div>
			    </div>
			</div>
		<?php
			$no++;
		}
	?>
</div>
