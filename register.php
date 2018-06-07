<?php 
	require 'config/config.php';
	require 'includes/form_handlers/register_handler.php';
	require 'includes/form_handlers/login_handler.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>dukeNET</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>
	<?php 
		if(isset($_POST['reg_button'])){
			echo '
				<script>
					$(document).ready(function(){
						$("#first").hide();
						$("#second").show();
						});
				</script>
			';
		}

	?>
	<div class="wrapper">

		<div class="login_box">
			<div class="login_header">
				<h1>DukeNET</h1>
				Login or Sign Up below!
			</div>
			<div id="first">
				<form action="register.php" method="POST">
					<input type="email" name="log_email" placeholder="Email Address" value="<?php
						if(isset($_SESSION['log_email'])){
							echo $_SESSION['log_email'];
						}
					?>" required>	
					<br>	
					<input type="password" name="log_password" placeholder="Password">	
					<br>
					<?php 
						if(in_array("Email or password was incorrect<br>",$error_array)) echo "Email or password was incorrect<br>";
					?>
					<input type="submit" name="login_button" value="Login">	
					<br>
					<a href="#" id="signup" class="signup"> Need an account. Register Here </a>
				</form>
			</div>
			<div id="second">
				<form action="register.php" method="POST">
					<input type="text" name="reg_myname" placeholder="My Name" value="<?php
						if(isset($_SESSION['reg_myname'])){
							echo $_SESSION['reg_myname'];
						}
					?>" required>
					<br>

					<select name="reg_year">
						<option disabled="" selected="">Year</option>
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
					</select>
					<br>
					<select name="reg_month">
						<option disabled="" selected="">Month</option>
						<option value="1">Jan</option>
						<option value="2">Feb</option>
						<option value="3">Mar</option>
						<option value="4">Apr</option>
						<option value="5">May</option>
						<option value="6">Jun</option>
						<option value="7">Jul</option>
						<option value="8">Aug</option>
						<option value="9">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
					<br>
					<input type="text" name="reg_owner" placeholder="Owner Name" value="<?php
						if(isset($_SESSION['reg_owner'])){
							echo $_SESSION['reg_owner'];
						}
					?>" required>
					<br>
					<input type="email" name="reg_email" placeholder="Email" value="<?php
						if(isset($_SESSION['reg_email'])){
							echo $_SESSION['reg_email'];
						}
					?>" required>
					<br>
					<?php
					if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
					
					else if(in_array("Invalid Email Format<br>", $error_array)) echo "Invalid Email Format<br>";
					?>
					<input type="password" name="reg_pass" placeholder="Password" required>
					<br>
					<input type="password" name="reg_pass2" placeholder="Confirm Password" required>
					<br>
					<?php
					if(in_array("Passwords don't match<br>", $error_array)) echo "Passwords don't match<br>";
					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					
					else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo "Your password must be between 5 and 30 characters<br>";
					?>
					<input type="submit" name="reg_button" value="Register">
					<br>

					<?php
					if(in_array("<span style='color:#14C800;'>You are all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color:#14C800;'>You are all set! Go ahead and login!</span><br>";
					?>
					<a href="#" id="signin" class="signin">Already have an account? Log In Here!</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>