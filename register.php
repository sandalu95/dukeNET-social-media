<?php 
	//to start session inorder to store variables
	session_start();
	// DB Connection
	$host='localhost';
	$db='dukeNET';
	$uname='root';
	$pass='';
	$con=mysqli_connect($host,$uname,$pass,$db);
	if($con->connect_error){
		echo $con->error;
	}
	// Variable declaration
	$myname=""; //MyName
	$age=""; //age
	$owner=""; //owner
	$username="";//username
	$email=""; //Email
	$pass=""; //Password
	$pass2=""; //Confirm password
	$date=""; //SignUp date
	$error_array=array(); //holds error msgs

	if(isset($_POST['reg_button'])){ //to check whether register button clicked
		//myname
		$myname=strip_tags($_POST['reg_myname']); //remove html tags and assign to variable
		$myname=str_replace(' ','',$myname); // remove spaces
		$myname=ucfirst(strtolower($myname)); //first all converted to lower case and next make the first into upper
		$_SESSION['reg_myname']=$myname; //to store myname

		//year
		$year=strip_tags($_POST['reg_year']); //remove html tags and assign to variable

		//month
		$month=strip_tags($_POST['reg_month']); //remove html tags and assign to variable

		//myname
		$owner=strip_tags($_POST['reg_owner']); //remove html tags and assign to variable
		$owner=str_replace(' ','',$owner); // remove spaces
		$owner=ucfirst(strtolower($owner)); //first all converted to lower case and next make the first into upper
		$_SESSION['reg_owner']=$owner;//to store owner

		//email
		$email=strip_tags($_POST['reg_email']); //remove html tags and assign to variable
		$email=str_replace(' ','',$email); // remove spaces
		// $email=ucfirst(strtolower($email)); //first all converted to lower case and next make the first into upper
		$_SESSION['reg_email']=$email;//to store email

		//password
		$pass=strip_tags($_POST['reg_pass']); //remove html tags and assign to variable

		//confirm password
		$pass2=strip_tags($_POST['reg_pass2']); //remove html tags and assign to variable

		$date=date("Y-m-d"); //current date

		//to check existing emails and validate email
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			//to validate email
			$email=filter_var($email,FILTER_VALIDATE_EMAIL);
			//to check existing emails
			$e_check=mysqli_query($con,"SELECT email FROM users WHERE email='$email'");
			$num_rows=mysqli_num_rows($e_check);

			if($num_rows>0){
				array_push($error_array, "Email already in use<br>");
			}
		}else{
			array_push($error_array, "Invalid Email Format<br>");
		}

		//to check whether passwords match
		if($pass!=$pass2){
			array_push($error_array, "Passwords don't match<br>");			
		}
		else{
			//to check whether pass within characters and num
			if(preg_match('/[^A-Za-z0-9]/', $pass)){
				array_push($error_array, "Your password can only contain english characters or numbers<br>");
			}
		}
		//to check whether pass within 5-30
		if(strlen($pass>30||strlen($pass)<5)){
			array_push($error_array, "Your password must be between 5 and 30 characters<br>");
		}
		if(empty($error_array)){
			$pass=md5($pass); //Encrypt password before sending to database
			//generate username by concatenating first name and last name
			$username=strtolower($myname);
			$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");

			$i=0;

			//if username exists add number to username
			while(mysqli_num_rows($check_username_query)!=0){
				$i++;
				$username=$username."_".$i;//Add suffix to username if the username exists
				$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
			}
			//Profile picture assignment
			$rand=rand(1,2);//Random number 1 and 2
			if($rand==1)
				$profile_pic="assets\images\profile_pics\defaults\my_avatar.png";
			else if($rand==2)
				$profile_pic="assets\images\profile_pics\defaults\my_avatar.png";

			$query=mysqli_query($con,"INSERT INTO users VALUES('','','',$year,$month,'','','',$date,'','0','0','no',',')");
			// $query=mysqli_query($con,"INSERT INTO users VALUES('','sandy','sandy','1995','mar','sandalu','sandalu@gmail.com','sdfgh','','','0','0','no',',')");
		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>dukeNET</title>
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="reg_myname" placeholder="My Name" value="<?php
			if(isset($_SESSION['reg_myname'])){
				echo $_SESSION['reg_myname'];
			}
		?>" required>
		<br>

		<select name="reg_year" >
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
	</form>
</body>
</html>