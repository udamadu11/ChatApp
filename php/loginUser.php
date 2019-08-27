<?php 
	
	session_start();
	include ('include/connection.php');
	if (isset($_POST['sign_in'])) {
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$password = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
		$select_user = "SELECT * FROM users WHERE email ='$email' AND password ='$password'";
		$query = mysqli_query($con, $select_user);
		$check_user =mysqli_num_rows($query);

		if ($check_user ==1) {
			$_SESSION['email'] =$email;
			$update_msg = mysqli_query($con,"UPDATE users SET log_in ='online' WHERE email ='$email'");
			$user = $_SESSION['email'];
			$get_user = "SELECT * FROM users WHERE email = '$user' ";
			$rUser = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($rUser);
			
			$user_name = $row['user_name'];
			echo "<script>window.open('home.php?user_name=$user_name', '_self')</script>";
		}
		else{
			echo "
			<div class='alert alert-danger'>
				<strong>Check Your email and password</strong>
			</div>
			";
		}
	}

?>