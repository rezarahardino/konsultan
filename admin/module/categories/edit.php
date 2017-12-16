<?php 
	include '../config/connection.php';

	$id 	= $_GET['id'];

	$sql 	= "SELECT * FROM categories WHERE id_category = $id ";
	$query 	= mysql_query($sql);
	$data 	= mysql_fetch_assoc($query);
?>

<div class="col-md-9">
	<div class="content-box-large">
		<div class="panel-heading">
			<div class="panel-title"><i class="glyphicon glyphicon-edit"></i> Edit Category</div>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" action="?editedCategory" method="post">
				<input type="hidden" name="id_category" value="<?= $data['id_category'] ?>">
				<div class="form-group">
					<label for="name_category" class="col-md-2 control-label">Name Category</label>
					<div class="col-md-10">
						<input type="text" name="name_category" class="form-control" id="name_category" value="<?= $data['name_category'] ?>">
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
