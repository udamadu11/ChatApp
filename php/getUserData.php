<?php 
	$con = mysqli_connect("localhost","root","","chatap");
	$user = "SELECT * FROM users";
	$rUser = mysqli_query($con,$user);

	while ($row_user = mysqli_fetch_array($rUser)) {
		$userId = $row_user['user_id'];
		$user_name = $row_user['user_name'];
		$user_profile = $row_user['profilePic'];
		$login = $row_user['log_in'];

		echo "
			<li>
				<div class= 'chat-left-img'>
					<img src='$user_profile'>
				</div>
				<div class='chat-left-datails'>
					<p><a href='home.php?user_name=$user_name'>$user_name</a></p>";
				if ($login == "online") {
					echo "<span><i class='fa fa-circle' aria-hidden='true'></i>Online<span>";
				}else{
					echo "<span><i class='fa fa-circle' aria-hidden='offline'></i>Online<span>";
				}
				"
				</div>
			</li>
			";
	
	}
?>