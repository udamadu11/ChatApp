<!DOCTYPE html>
<?php 
session_start();
include("include/connection.php");
if (!isset($_SESSION['email'])) {
	header('Location:login.php');
}
else{
 ?>
<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center><a href="include/findFiend.php"><button class="btn btn-danger search-icon" name="searchUser" type="submit">Add New user</button></a></center>
					</div>
				</div>
				<div class="left-chat">
					<ul>
						<?php include("getUserData.php"); ?> 
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar" >
				<div class="row">
					<?php 
						$user = $_SESSION['email'];
						$getUser = "SELECT * FROM users WHERE email = '$user'";
						$rUser =mysqli_query($con,$getUser);
						$row = mysqli_fetch_array($rUser);

						$userId = $row['user_id'];
						$user_name = $row['user_name'];
					?>
					<?php 
						if (isset($_GET['user_name'])) {
							global $con;

							$get_username = $_GET['user_name'];
							$get_user = "SELECT * FROM users WHERE user_name= '$get_username'";
							$rUser = mysqli_query($con,$get_user);
							$row_user = mysqli_fetch_array($rUser);

							$username =$row_user['user_name'];
							$user_profile_image = $row_user['profilepic'];

						}

						$total_message = "SELECT * FROM users_chat WHERE(sender = '$user_name' AND receiver = '$username') OR (receiver = '$user_name' AND sender = '$username')";
						$rMessage = mysqli_query($con,$total_message);
						$total = mysqli_num_rows($rMessage);

					?>
					<div class="col-md-12 right-header">
						<div class="right-header-img">
							<img src="<?php echo "$user_profile_image"; ?>" width="80px" height="80px">
						</div>
						<div class="right-header-details">
							<form method="post">
								<p><?php echo "$username"; ?></p>
								<span><?php echo $total; ?>message</span>&nbsp &nbsp
								<button name="logout" class="btn btn-danger">Logout</button>
							</form>
							<?php
								if (isset($_POST['logout'])) {
									$update_msg = mysqli_query($con,"UPDATE users SET log_in='offline' WHERE user_name= '$user_name'");
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
							$sel_msg = "SELECT * FROM users_chat WHERE (sender = '$user_name' AND receiver = '$username') OR  (receiver = '$user_name' AND sender = '$username') ORDER BY 1 ASC";
							$run_msg = mysqli_query($con,$sel_msg);

							while($row = mysqli_fetch_array($run_msg)) {
								$sender = $row['sender'];
								$receiver = $row['receiver'];
								$msg_content = $row['msg_content'];
								$date = $row['mdate'];
						
							?>
								<ul>
									<?php

										if ($user_name == $sender AND $username == $receiver) {
											echo "
												<li>
													<div class='rightside-right-chat'>
														<span>$username<small>$date</small></span><br><br>
														<p>$msg_content</p>
													</div>
												</li>

											";
										}

										else if($user_name == $receiver AND $username == $sender) {
											echo "
												<li>
													<div class=\"rightside-left-chat\">
														<span>$username<small>$date</small></span><br><br>
														<p>$msg_content</p>
													</div>
												</li>

											";
										}


									 ?>
								</ul>
						<?php 
							}
						 ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 rightside-chat-textbox">
						<form method="post">
							<input type="text" name="msg_content" autocomplete="off" placeholder="write your msg ....">
							<button class="btn" name="submit"><i class="fa fa-telegram"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		if (isset($_POST['submit'])) {
			$msg = htmlentities($_POST['msg_content']);
			if ($msg == "") {
				echo "
					<div class='alert alert-danger'>
						<strong><center>Message was unable to send</center></strong>
					</div>
				";
			}
			else if (strlen($msg) > 100) {
				echo "
					<div class='alert alert-danger'>
						<strong><center>Message is too long.use 100 characters</center></strong>
					</div>
				";
			}
			else{
				$insert = "INSERT INTO users_chat(sender,receiver,msg_content,status,mdate) VALUES('$user_name','$username','$msg','unread',NOW())";
				$rInsert = mysqli_query($con,$insert);
			}
		}
	 ?>
	 <script>
	 	$('#scrolling_to-bottom').animate({
	 		scrollTop: $('#scrolling_to-bottom').get(0).scrollHeight
	 	}, 1000);
	 </script>
	 <script type="text/javascript">
	 	$(document).ready(function(){
	 		var height = $(window).height();
	 		$('.left-chat').css('height', (height - 92) + 'px');
	 		$('.right-header-contentChat').css('height', (height - 163) + 'px');
	 	});
	 </script>
</body>
</html>
<?php } ?>