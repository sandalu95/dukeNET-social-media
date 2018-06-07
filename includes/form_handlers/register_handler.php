<?php
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
				$profile_pic="assets\images\profile_pics\defaults\head_turqoise.png";
			else if($rand==2)
				$profile_pic="assets\images\profile_pics\defaults\head_pete_river.png";
			$query=mysqli_query($con,"INSERT INTO users VALUES('','$myname','$username',$year,$month,'$owner','$email','$pass','$date','$profile_pic','0','0','no',',')");
			array_push($error_array,"<span style='color:#14C800;'>You are all set! Go ahead and login!</span><br>");

			//clear session variables
			$_SESSION['reg_myname']="";
			$_SESSION['reg_owner']="";
			$_SESSION['reg_email']="";
		}
	}
?>