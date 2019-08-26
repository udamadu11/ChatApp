<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div class="login">
		<form class="login-form" method="post">
			<div class="form-header">
				<h2>Sign In</h2>
				<p>Login To MyChat</p>
			</div>
			<div class="login-section">
				<div class="input-fields">
					<input type="text" class="input" name="name" id="name" placeholder="Enter User name" required>
				</div>
				<div class="input-fields">
					<input type="password" class="input" id="password" name="password" placeholder="Enter password" required>
				</div>
			</div>
			<div class="forget-password">Forget Password ?<a href="#">Click Here</a></div>
			<div class="btn">
				<input type="submit" name="submit" value="Sign In">
			</div>
			<div class="sign">Don't have a Account<a href="#">Create Account</a></div>
				
		</form>
	</div>
</body>
</html>