<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<?php 
	$con = mysqli_connect("localhost","root","","chatap");
	$user = "SELECT * FROM users";
	$rUser = mysqli_query($con,$user);

	while ($row_user = mysqli_fetch_array($rUser)) {
		$userId = $row_user['user_id'];
		$user_name = $row_user['user_name'];
		$user_profile = $row_user['profilepic'];
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
					echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";
				}
				"
				</div>
			</li>
			";
	
	}
?>

</body>
</html>