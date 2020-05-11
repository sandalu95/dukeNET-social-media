<?php 
	include ("includes/header.php");
?>
	<div class="user_details column">
			<a href="<?php echo $userLoggedIn; ?>"> <img src="<?php echo $user['profile_pic'];?>"></a>
			<div class="user_details_left_right">
				<a href="<?php echo $userLoggedIn; ?>">
				<?php 
					echo $user['my_name'];
				?>
				</a>
				<br>
				<br>
				<?php 
					echo "Posts: ".$user['num_posts']."<br>";
					echo "Likes: ".$user['num_likes'];
				?>
			</div>
		</div>
		<div class="main_column column">
			<form class="post_form" action="index.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="fileToUpload" id="fileToUpload">
				<textarea name="post_text" id="post_text" placeholder="Got something to say?"></textarea>
				<input type="submit" name="post" id="post_button" value="Post">
				<hr>
			</form> 

			<div class="posts_area"></div>
			<img src="assets/images/icons/loading.gif" id="loading"> <!-- loading.gif -->
		</div>

		<div class="user_details column">

		<h4>Popular</h4>

		<div class="trends">
			<?php 
			$query = mysqli_query($con, "SELECT * FROM trends ORDER BY hits DESC LIMIT 9");

			foreach ($query as $row) {
				
				$word = $row['title'];
				$word_dot = strlen($word) >= 14 ? "..." : "";

				$trimmed_word = str_split($word, 14);
				$trimmed_word = $trimmed_word[0];

				echo "<div style'padding: 1px'>";
				echo $trimmed_word . $word_dot;
				echo "<br></div><br>";


			}

			?>
		</div>


	</div>

		<script>
			var userLoggedIn='<?php echo $userLoggedIn;?>';
			$(document).ready(function (){
				$('#loading').show();
				//Original ajax request for loading first posts
				$.ajax({
					url:"includes/handlers/ajax_load_posts.php",
					type:"POST",
					data:"page=1&userLoggedIn="+userLoggedIn,
					cache:false,

					success:function(data){
						$('#loading').hide();
						$('.posts_area').html(data);
					}
				});

				$(window).scroll(function(){
					var height=$('.posts_area').height(); //Div containing posts
					var scroll_top=$(this).scrollTop(); //the toppest position in the window. changes when we scroll
					var page=$('.posts_area').find('.nextPage').val();
					var noMorePosts=$('.posts_area').find('.noMorePosts').val();

					//check whether the scrolled height is scrolltop+innerheight and whether the no.of posts finished
					
					if((document.body.scrollHeight==document.body.scrollTop+window.innerHeight)&&noMorePosts=='false'){

						$('#loading').show(); //to show the .gif
						

						var ajaxReq=$.ajax({
							url:"includes/handlers/ajax_load_posts.php",
							type:"POST",
							data:"page"+page+"&userLoggedIn="+userLoggedIn,
							cache:false,

							success:function(response){
								$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
								$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage
								$('#loading').hide();
								$('.posts_area').append(response);
							}
						});
					} //End if
					return false;
				}); //End (window).scroll(function()
			});
		</script>

	</div>
</body>
</html>