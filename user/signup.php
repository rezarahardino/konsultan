<div class="col-md-9 f_car">

	<div class="panel-heading">
		<div class="panel-title">
			<h3>Register</h3>
			<hr>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<form action="?act_signup" method="post">
					<div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
				  	</div>
				  	<div class="form-group">
					    <label for="Gender">Gender</label>
					    <div class="radio">
  							<label class="radio-inline"><input type="radio" name="gender" value="L">Male</label> 
  							<label class="radio-inline"><input type="radio" name="gender" value="P">Female</label>
						</div>
				  	</div>
				  	<div class="form-group">
					    <label for="telephone">Telephone</label>
					    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="+62">
				  	</div>
				  	<div class="form-group">
					    <label for="address">Address</label>
					    <textarea class="form-control" rows="5" id="address" name="address" placeholder="Address"></textarea>
				  	</div>
			</div>
			<div class="col-md-4">
					<div class="form-group">
					    <label for="username">Username</label>
					    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
				  	</div>
				  	<div class="form-group">
					    <label for="email">Email</label>
					    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
				  	</div>
				  	<div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				  	</div>
				  	<?php
						if (isset($_GET['success'])) {
							echo "<div class='alert alert-success'>Register Success</div>";
						} elseif (isset($_GET['fail'])) {
							echo "<div class='alert alert-danger'>Register Fail</div>";
						} elseif (isset($_GET['validate'])) {
							echo "<div class='alert alert-danger'>Form is required !!</div>";
						}
					?>
				  	<button type="submit" class="btn btn-primary">Submit</button>
				  	<button type="reset" class="btn btn-default">Reset</button>
				</form>
			</div>
		</div>
	</div>

</div>
