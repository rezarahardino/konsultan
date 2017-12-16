<div class="col-md-9">
	<div class="content-box-large">
		<div class="panel-heading">
			<div class="panel-title"><i class="glyphicon glyphicon-list"></i> List Category</div>
		</div>
		<div class="panel-body">
			<a href="?addCategory" class="btn btn-sm btn-primary f_list"><i class="glyphicon glyphicon-plus"></i> Add Category</a>
			<form class="navbar-form navbar-right" method="post" action="?categories">
        		<div class="form-group">
         			<input type="text" class="form-control input-sm" placeholder="Search ..." name="search">
        		</div>
        		<button type="submit" class="btn btn-sm btn-default">Search</button>
      		</form>

			<?php 
				if (isset($_GET['addCategorySuccess'])) {
					echo "<div class='alert alert-success'>Success, Add Category</div>";
				} elseif (isset($_GET['addCategoryFail'])) {
					echo "<div class='alert alert-danger'>Failed, Add Category</div>";
				} elseif (isset($_GET['editCategorySuccess'])) {
					echo "<div class='alert alert-success'>Success, Edit Category</div>";
				} elseif (isset($_GET['editCategoryFail'])) {
					echo "<div class='alert alert-danger'>Failed, Edit Category</div>";
				} elseif (isset($_GET['deleteCategorySuccess'])) {
					echo "<div class='alert alert-success'>Success, Delete Category</div>";
				} elseif (isset($_GET['deleteCategoryFail'])) {
					echo "<div class='alert alert-danger'>Failed, Delete Category</div>";
				}
			?>
				
			 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			 	<thead>
			 		<tr>
			 			<th>No</th>
			 			<th>Name Category</th>
			 			<th>Action</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
			 			include'../config/connection.php';

			 			function highlight($text_highlight, $text_search) {
               			 	$str = preg_replace('#'. preg_quote($text_highlight) .'#i', '<span style="font-weight:bold;">\\0</span>', $text_search);
               				return $str;
              			}

			 			$no 			= 1;
			 			$search 		= isset($_POST['search']) ? $_POST['search'] : '';
              			$id_category 	= isset($_POST['id_category']) ? $_POST['id_category'] : '';
			 			$sql 			= "SELECT * FROM categories";

						if (!empty($search) || !empty($id_category)) {
                			$sql .= " WHERE name_category LIKE '%".$search."%'";
              			}

			 			$query			= mysql_query($sql);
			 			$count 			= mysql_num_rows($query);

			 			if ($count == 0) {
               				echo "<tr><td colspan='9'>Category Not Found !!</td></tr>";
              			} else {
              				
				 			while ($data = mysql_fetch_assoc($query)) {
				 			?>
				 				<tr>
				 					<td><?=	$no ?></td>
				 					<td><?= highlight($search, $data['name_category']); ?></td>
				 					<td>
				 						<a href="?editCategory&id=<?= $data['id_category']?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</a>
				 						<a href="?deleteCategory&id=<?= $data['id_category']?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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
