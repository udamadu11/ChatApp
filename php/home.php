<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center><a href="include/findFiend.php"><button class="btn btn-default search-icon" name="searchUser" type="submit">Add New user</button></a></center>
					</div>
				</div>
				<div class="left-chat">
					<ul>
						<!--<?php include("include/getUserData.php") ?> -->
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar" >
				<div class="row">
					<?php 
						$user = $_SESSION['email'];
						$getUser = "SELECT FROM users WHERE email = '$user'";
						$rUser =mysqli_query($con,$getUser);
						$row = mysqli_fetch_array($rUser);

						$userId = $row['user_id'];
						$user_name = $row['user_name'];
					?>
					<?php 
						if (isset($_GET['user_name'])) {
							global $con;

							$get_username = $_GET['user_name'];
							$get_user = "SELECT * FROM users WHERE user_name= '$get_user'";
							$rUser = mysqli_query($con,$get_user);
							$row_user = mysqli_fetch_array($rUser);

							$username =$row_user['user_name'];
							$user_profile_image = $row_user['profilePic'];

						}

						$total_message = "SELECT *FROM users_chat WHERE(sender = 'user_name' AND receiver = 'username') OR (receiver = 'user_name' AND sender = 'username')";
						$rMessage = mysqli_query($con,$total_message);
						$total = mysqli_num_rows($rMessage);

					?>
					<div class="col-md-12 right-header">
						<div class="right-header-img">
							<img src="<?php echo" $user_profile_image"; ?>">
						</div>
						<div class="right-header-detail">
							<form method="post">
								<p><?php echo "$username"; ?></p>
								<span><?php echo $total; ?>message</span>&nbsp &nbsp
								<button name="logout" class="btn btn-danger">Logout</button>
							</form>
							<?php
								if (isset($_POST['logout'])) {
									$update_msg = mysqli_query($con,"UPDATE users SET log_in='offine' WHERE user_name= $user_name");
									header("Location:logout.php");
									exit();
								}
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div id="scrolling_to-bottom" class="col-md-12 right-header-contentChat">
						<?php 
							$update_msg = mysqli_query($con,"UPDATE users_chat SET status ='read' WHERE sender='$username' AND receiver = '$user_name'");
							$sel_msg = "SELECT * FROM users_chat WHERE (sender = '$user_name' AND receiver = '$username') OR  (receiver = '$user_name' AND sender = '$username') ORDER BY ASC";
							$run_msg = mysqli_query($con,$sel_msg);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>