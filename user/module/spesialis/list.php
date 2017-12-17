<div class="col-md-9 f_car">
	<div class="panel-heading">
		<div class="panel-title">
			<h3>Spesialis</h3>
			<p>Klik konsultasi untuk mulai konsultasi dan tunggu respon dari dokter tersebut</p>
			<hr>
		</div>
	</div>
	<?php 
		include '../config/connection.php';

		$no 	= 1;
		$sql 	= "SELECT *, users.name, categories.name_category FROM users
				JOIN categories ON users.id_category = categories.id_category
				WHERE users.id_category IS NOT NULL AND is_online = 1
		";
		$query	= mysql_query($sql);

		while ($data = mysql_fetch_assoc($query)) {?>
			<div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="../assets/img/auth.png">
			      <div class="caption"> 
			        <h3><?= $data['name_category'] ?></h3>
			        <p><?= $data['name'] ?> <button class="label label-success">on</button> </p>
			        <p class="">
						<a href="?konsultasi&id_doctor=<?= $data['id_user']?>">Konsultasi</a>
						<a class="btn btn-primary" href="?chatWithDokter&id_doctor=<?= $data['id_user'] ?>">Chat</a>
					</p>
			      </div>
			    </div>
			</div>
		<?php
			$no++;
		}
	?>
</div>
