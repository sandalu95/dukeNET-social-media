<?php 
	require 'config/config.php';

	if(isset($_SESSION['username'])){
		$userLoggedIn=$_SESSION['username'];
		$user_details_query=mysqli_query($con,"SELECT * FROM users WHERE username='$userLoggedIn'");
		$user=mysqli_fetch_array($user_details_query);
	}
	else{
		header("location:register.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to DukeNET</title>

	<!-- javscrip -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	<!-- css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="top_bar">
		<div class="logo">
			<a href="index.php">DukeNET</a>
		</div>
		<nav>
			<a href=#>
				<?php 
					echo $user['my_name'];
				?>
			</a>
			<a href="index.php">
				<i class="fas fa-home"></i>
			</a>
			<a href=#>
				<i class="far fa-envelope"></i>
			</a>
			<a href=#>
				<i class="far fa-bell"></i>
			</a>
			<a href=#>
				<i class="fas fa-users"></i>
			</a>
			<a href=#>
				<i class="fas fa-cog"></i>
			</a>
		</nav>
	</div>

	<div class="wrapper">