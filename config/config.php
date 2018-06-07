<?php 
	ob_start();//Turns output buffering(dont send outputs otherthan from headers. save in to inner buffer)
	//to start session inorder to store variables
	session_start();
	$timezone=date_default_timezone_set("Asia/Colombo");
	// DB Connection
	$host='localhost';
	$db='dukeNET';
	$uname='root';
	$pass='';
	$con=mysqli_connect($host,$uname,$pass,$db);
	if($con->connect_error){
		echo $con->error;
	}
?>