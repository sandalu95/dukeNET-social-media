<?php  
include("../../config/config.php");
include("../classes/User.php");

$query = $_POST['query'];
$userLoggedIn = $_POST['userLoggedIn'];

	$usersReturned = mysqli_query($con, "SELECT * FROM users WHERE (username LIKE '$query%')OR(my_name LIKE '$query%') AND user_closed='no' LIMIT 8");


if($query != "") {
	while($row = mysqli_fetch_array($usersReturned)) {

		$user = new User($con, $userLoggedIn);

		if($row['username'] != $userLoggedIn) {
			$mutual_friends = $user->getMutualFriends($row['username']) . " friends in common";
		}
		else {
			$mutual_friends = "";
		}

		if($user->isFriend($row['username'])) {
			echo "<div class='resultDisplay'>
					<a href='messages.php?u=" . $row['username'] . "' style='color: #000'>
						<div class='liveSearchProfilePic'>
							<img src='". $row['profile_pic'] . "'>
						</div>

						<div class='liveSearchText'>
							".$row['my_name'] ."
							<p style='margin: 0;'>". $row['username'] . "</p>
							<p id='grey'>".$mutual_friends . "</p>
						</div>
					</a>
				</div>";


		}


	}
}

?>