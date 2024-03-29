<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/signUp.css">
</head>
<body>
	<div class="form">
		<form method="post">
			<div class="form-header">
				<h2>Sign Up</h2>
				<p>Fill This Form To Chating</p>
			</div>
			<div class="form-group">
				<label>User Name</label>
				<input type="text" name="user_name" class="form-control" placeholder="user name" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" placeholder="abc@gmail.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>District</label>
				<select class="form-control" name="user_dis" required>
					<option disabled="">Select a District</option>
					<option>Colombo</option>
					<option>Galle</option>
					<option>Mathara</option>
					<option>Kandy</option>
					<option>Jaffna</option>
				</select>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<select class="form-control" name="user_gender" required>
					<option disabled="">Select a Gender</option>
					<option>Male</option>
					<option>Female</option>
					<option>Others</option>
				</select>
			</div>
			<div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required>I Accept the<a href="#">Terms of User</a>&amp;<a href="#">Privacy Policy</a></label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-md" name="sign_up">Sign Up</button>
			</div>
			<?php include("signUpUser.php"); ?>
			<div class="text-center small" style="color:#674288;">Already have an Account <a href="login.php">Click Here</a></div>
		</form>
		
	</div>
</body>
</html>