<div class="col-md-9">
	<div class="content-box-large">
		<div class="panel-heading">
			<div class="panel-title"><i class="glyphicon glyphicon-list"></i> List Doctor</div>
		</div>
		<div class="panel-body">
			<a href="?addDoctor" class="btn btn-sm btn-primary f_add"><i class="glyphicon glyphicon-plus"></i> Add Doctor</a>
			<form class="navbar-form navbar-right" method="post" action="?doctor">
        		<div class="form-group">
         			<input type="text" class="form-control input-sm" placeholder="Search ..." name="search">
        		</div>
        		<button type="submit" class="btn btn-sm btn-default">Search</button>
      		</form>
			
			<?php 
				if (isset($_GET['addDoctorSuccess'])) {
					echo "<div class='alert alert-success'>Success, Add Doctor</div>";
				} elseif (isset($_GET['addDoctorFail'])) {
					echo "<div class='alert alert-danger'>Failed, Add Doctor</div>";
				} elseif (isset($_GET['editDoctorSuccess'])) {
					echo "<div class='alert alert-success'>Success, Edit Doctor</div>";
				} elseif (isset($_GET['editDoctorFail'])) {
					echo "<div class='alert alert-danger'>Failed, Edit Doctor</div>";
				} elseif (isset($_GET['deleteDoctorSuccess'])) {
					echo "<div class='alert alert-success'>Success, Delete Doctor</div>";
				} elseif (isset($_GET['deleteDoctorFail'])) {
					echo "<div class='alert alert-danger'>Failed, Delete Doctor</div>";
				}
			?>

			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
				<thead>
					<tr>
						<th>No</th>
						<th>Name Doctor</th>
						<th>Gender</th>
						<th>Telephone</th>
						<th>Address</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						include '../config/connection.php';

						function highlight($text_highlight, $text_search) {
               			 	$str = preg_replace('#'. preg_quote($text_highlight) .'#i', '<span style="font-weight:bold;">\\0</span>', $text_search);
               				return $str;
              			}

						$no 		= 1;
						$search 	= isset($_POST['search']) ? $_POST['search'] : '';
              			$id_user 	= isset($_POST['id_user']) ? $_POST['id_user'] : '';
						$sql 		= " SELECT *, users.name, users.gender, users.telp, users.address, 	categories.name_category 
								FROM users JOIN categories ON users.id_category = categories.id_category
						";

						if (!empty($search) || !empty($id_user)) {
                			$sql .= "WHERE name LIKE '%".$search."%'";
              			}

						$query 		= mysql_query($sql);
						$count 		= mysql_num_rows($query);

						if ($count == 0) {
               				echo "<tr><td colspan='9'>Doctor Not Found !!</td></tr>";
              			} else {

							while ($data = mysql_fetch_assoc($query)) {
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= highlight($search, $data['name']); ?></td>
									<td><?= $data['gender']?></td>
									<td><?= $data['telp']?></td>
									<td><?= $data['address']?></td>
									<td><?= $data['name_category']?></td>
									<td>
										<a href="?editDoctor&id=<?= $data['id_user'] ?>" class='btn btn-xs btn-success'><i class="glyphicon glyphicon-edit"></i> Edit</a>
										<a href="?deleteDoctor&id=<?= $data['id_user'] ?>" class='btn btn-xs btn-danger'><i class="glyphicon glyphicon-trash"></i> Delete</a>
									</td>
								</tr>
							<?php  
								$no++;
							}
              			}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>