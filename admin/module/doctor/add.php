<div class="col-md-9">
	<div class="content-box-large">
		<div class="panel-heading">
			<div class="panel-title"><i class="glyphicon glyphicon-plus"></i> Add Doctor</div>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" action="?saveDoctor" method="post">
				<div class="form-group">
					<label for="name" class="col-md-2 control-label">Name Doctor</label>
					<div class="col-md-10">
						<input type="text" name="name" class="form-control" id="name" placeholder="Name Doctor">
					</div>
				</div>
				<div class="form-group">
					<label for="gender" class="col-md-2 control-label">Gender</label>
					<div class="col-md-10 radio">
  						<label class="radio-inline "><input type="radio" name="gender" value="L">Male</label>
  						<label class="radio-inline"><input type="radio" name="gender" value="P">Female<label>
					</div>
				</div>
				<div class="form-group">
					<label for="telp" class="col-md-2 control-label">Telephone</label>
					<div class="col-md-10">
						<input type="text" name="telp" class="form-control" id="telp" placeholder="+62">
					</div>
				</div>
				<div class="form-group">
					<label for="address" class="col-md-2 control-label">Address</label>
					<div class="col-md-10">
						<textarea class="form-control" rows="5" id="address" name="address" placeholder="Address"></textarea>
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

								while ($data = mysql_fetch_assoc($query)) {
								?>
									<option value="<?= $data['id_category'] ?>"><?= $data['name_category'] ?></option>
								<?php 
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
