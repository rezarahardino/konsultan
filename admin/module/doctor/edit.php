<?php 
	include '../config/connection.php';

	$id 	= $_GET['id'];

	$sql 	= "SELECT * FROM users WHERE id_user = $id ";
	$query 	= mysql_query($sql);
	$data 	= mysql_fetch_assoc($query);
?>

<div class="col-md-9">
	<div class="content-box-large">
		<div class="panel-heading">
			<div class="panel-title"><i class="glyphicon glyphicon-plus"></i> Edit Doctor</div>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" action="?editedDoctor" method="post">
				<input type="hidden" name="id_user" value="<?= $data['id_user']?>">
				<div class="form-group">
					<label for="name" class="col-md-2 control-label">Name Doctor</label>
					<div class="col-md-10">
						<input type="text" name="name" class="form-control" id="name" placeholder="Name Doctor" value="<?= $data['name']?>">
					</div>
				</div>
				<div class="form-group">
					<label for="telp" class="col-md-2 control-label">Telephone</label>
					<div class="col-md-10">
						<input type="text" name="telp" class="form-control" id="telp" placeholder="+62" value="<?= $data['telp']?>">
					</div>
				</div>
				<div class="form-group">
					<label for="address" class="col-md-2 control-label">Address</label>
					<div class="col-md-10">
						<textarea class="form-control" rows="5" id="address" name="address" placeholder=""><?= $data['address']?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="id_category" class="col-md-2 control-label">Name Category</label>
					<div class="col-md-10">
						<select name="id_category" class="form-control">
							<?php  
								include '../config/connection.php';

								$sql 	= "SELECT * FROM categories";
								$query 	= mysql_query($sql);

								while ($category = mysql_fetch_assoc($query)) {
									$selected_cat = ($category['id_category'] == $data['id_category']) ? 'selected="selected"' : '';
								?>
									<option value="<?= $category['id_category'];?>" <?= $selected_cat?> ><?= $category['name_category'] ?></option>
								<?php 
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>