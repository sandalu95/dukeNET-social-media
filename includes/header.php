<?php 
	require 'config/config.php';
	include("includes/classes/Message.php");
	include("includes/classes/User.php");
	include("includes/classes/Post.php");
	

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
	<script src="assets/js/main.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/jquery.jcrop.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>


	<!-- css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />
	
</head>
<body>
	<div class="top_bar">
		<div class="logo">
			<a href="index.php">DukeNET</a>
		</div>
		<nav>
			<?php 
				//Unread messages 
				$messages = new Message($con, $userLoggedIn);
				$num_messages = $messages->getUnreadNumber();
			?>
			<a href="<?php echo $userLoggedIn; ?>">
				<?php 
					echo $user['my_name'];
				?>
			</a>
			<a href="index.php">
				<i class="fas fa-home"></i>
			</a>
			<a href="javascript:void(0);"onclick="getDropdownData('<?php echo $userLoggedIn;?>','message')">
				<i class="far fa-envelope"></i>
				<?php
				if($num_messages>0)  
				echo '<span class="notification_badge" id="unread_message">'.$num_messages.'</span>';
				?>
			</a>
			<a href=#>
				<i class="far fa-bell"></i>
			</a>
			<a href="requests.php">
				<i class="fas fa-users"></i>
			</a>
			<a href=#>
				<i class="fas fa-cog"></i>
			</a>
			<a href="includes/handlers/logout.php">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</nav>

		<div class="dropdown_data_window" style="height:0px; border:none;"></div>
		<input type="hidden" id="dropdown_data_type" value="">
	</div>

	<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('.dropdown_data_window').scroll(function() {
			var inner_height = $('.dropdown_data_window').innerHeight(); //Div containing data
			var scroll_top = $('.dropdown_data_window').scrollTop();
			var page = $('.dropdown_data_window').find('.nextPageDropdownData').val();
			var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

			if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {

				var pageName; //Holds name of page to send ajax request to
				var type = $('#dropdown_data_type').val();


				if(type == 'notification')
					pageName = "ajax_load_notifications.php";
				else if(type = 'message')
					pageName = "ajax_load_messages.php"


				var ajaxReq = $.ajax({
					url: "includes/handlers/" + pageName,
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage 
						$('.dropdown_data_window').find('.noMoreDropdownData').remove(); //Removes current .nextpage 


						$('.dropdown_data_window').append(response);
					}
				});

			} //End if 

			return false;

		}); //End (window).scroll(function())


	});

	</script>

	<div class="wrapper">