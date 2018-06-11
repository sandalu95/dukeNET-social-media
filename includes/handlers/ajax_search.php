<?php
include("../../config/config.php");
include("../../includes/classes/User.php");

$query = $_POST['query'];
$userLoggedIn = $_POST['userLoggedIn'];


//If query contains an underscore, assume user is searching for usernames
if(strpos($query, '_') !== false) 
	$usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '$query%' AND user_closed='no' LIMIT 8");
//If there are two words, assume they are mynames respectively
else
	$usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE my_name LIKE '$query%' AND user_closed='no' LIMIT 8");


if($query != ""){

	while($row = mysqli_fetch_array($usersReturnedQuery)) {
		$user = new User($con, $userLoggedIn);

		if($row['username'] != $userLoggedIn)
			$mutual_friends = $user->getMutualFriends($row['username']) . " friends in common";
		else 
			$mutual_friends == "";

		echo "<div class='resultDisplay'>
				<a href='" . $row['username'] . "' style='color: #1485BD'>
					<div class='liveSearchProfilePic'>
						<img src='" . $row['profile_pic'] ."'>
					</div>

					<div class='liveSearchText'>
						" . $row['my_name'] . "
						<p>" . $row['username'] ."</p>
						<p id='grey'>" . $mutual_friends ."</p>
					</div>
				</a>
				</div>";

	}

}

?>