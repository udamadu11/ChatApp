<?php
include ('include/connection.php');
	if (isset($_POST['sign_up'])) {
		$name = htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
		$password = htmlentities(mysqli_real_escape_string($con,$_POST['password']));
		$district = htmlentities(mysqli_real_escape_string($con,$_POST['user_dis']));
		$gender= htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
		$rand = rand(1, 2);

		if ($name == '') {
			echo "<script>alert('cant verify your name')</script>";
		}
		if (strlen($password)<8) {
			echo "<script>alert('password should be minimum 8 characters !')</script>";
			exit();
		}
		$checkEmail = "SELECT * FROM users WHERE email = '$email'";
		$rEmail = mysqli_query($con,$checkEmail);
		$check = mysqli_num_rows($rEmail);

		if ($check == 1) {
			echo "<script>alert('Email Already exist, please try again !')</script>";
			echo "<script>window.open('signUp.php','_serif')</script>";
			exit();
		}
		if ($rand == 1) {
				$profilePic = "../images/man2.png";
			}
		else if ($rand ==2) {
				$profilePic = "../images/man11.png";
			}
		$insert = "INSERT INTO users(user_name,email,password,profilePic,user_dis,user_gender) VALUES('$name','$email','$password','$profilePic','$district','$gender')";
		$query = mysqli_query($con, $insert);
		if($query){
			echo "<script>alert('Your Account has been Created Successfully')</script>";
			echo "<script>window.open('login.php', '_serif')</script>";
		}
		else{
			echo "<script>alert('Registration Fail,Try again !')</script>";
			echo "<script>window.open('signUp.php', '_serif')</script>";
		}
	}	

 ?>