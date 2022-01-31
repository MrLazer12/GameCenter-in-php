<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Game Center News</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php 
		include "php/connection.php";
		include "php/functions.php";
		include "php/templates/header.php"; 
	?>

<!--== Slider ============================================================== -->
	<!-- Slideshow container -->
	<div class="slideshow-container">
		<?php
		$query = "SELECT id_game_block FROM `articles_rating` WHERE star = 5 AND numbers_voted >= 400 LIMIT 3";
		$result = mysqli_query($connection, $query);
		$titles = "";
		while($sql = mysqli_fetch_assoc($result) ){
			$sql_game_block = mysqli_fetch_assoc( mysqli_query($connection, "SELECT title, photo_background_name FROM game_block_info WHERE id = ".$sql['id_game_block']) );			
			print '
			<div class="mySlides fade">
				<img src="img/games_background/'.$sql_game_block['photo_background_name'].'" alt="'.$sql_game_block['title'].'">
			</div>
			';
			$titles .= $sql_game_block['title']."|";
		}
		$titles = explode("|", $titles);
		?>
		<!-- The dots/circles -->
		<div class="dots">
			<span title="<?php print $titles[0]; ?>" class="dot" onclick="currentSlide(1)"></span>
			<span title="<?php print $titles[1]; ?>" class="dot" onclick="currentSlide(2)"></span>
			<span title="<?php print $titles[2]; ?>" class="dot" onclick="currentSlide(3)"></span>
		</div>
	</div>
	
<script src="js/slideshow_script.js"></script>
<!--==END Slider ============================================================== -->




<!--==Section Three best Games ============================================================== -->
<section class="Three_best_Games">
		<h3>Three best Games</h3>
		<article>
			<?php
				$result = mysqli_query($connection, $query);
				while($sql = mysqli_fetch_assoc($result) ){
					$sql_game_block = mysqli_fetch_assoc( mysqli_query($connection, "SELECT id,title, photo_background_name FROM game_block_info WHERE id = ".$sql['id_game_block']) );
					$link = "game.php?id=".$sql_game_block['id'];
					print '
						<div class="game_block">
							<img src="img/games_background/'.$sql_game_block['photo_background_name'].'" alt="'.$sql_game_block['title'].'">
							<span onclick="change_location(\''.$link.'\')">'.$sql_game_block['title'].'</span>
						</div>				
					';
				}
			?>
		</article>
	</section>
<!--==END Section Three_best_Games ============================================================== -->




<!--==Section latest updates and featured games ============================================================== -->
	<section class="latest_updates_and_featured_games">
		<article>
			<h1>LATEST UPDATES</h1>
			<div class="normalize_blocks">
				<?php
				$query = "SELECT * 
							FROM `game_block_info`
							WHERE written_on >= DATE_SUB(NOW(), INTERVAL 1 DAY)
							LIMIT 4";

				if(mysqli_query($connection, $query) ){
					$result = mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
					if(mysqli_num_rows($result) == 0)
						show_message_result("No latest article updated!");
					else
					while($sql_game_block = mysqli_fetch_assoc($result) ){
						$link = "game.php?id=".$sql_game_block['id'];
						print '
							<div class="game">
								<img src="img/games_background/'.$sql_game_block['photo_background_name'].'" alt="'.$sql_game_block['title'].'">
								<a><h2>'.$sql_game_block['title'].'</h2></a>
								<p>'.$sql_game_block['description'].'</p>
								<button onclick="change_location(\''.$link.'\')">Read More</button>
							</div>			
						';
					}
				} else
					show_message_result("Error: ".mysqli_error($connection));
				?>
			</div>
		</article>

		<article>
			<h1>FEATURED GAMES</h1>
			<div class="normalize_blocks">
				<?php
					$query = "SELECT id_game_block FROM `articles_rating` 
								WHERE star = 5 AND numbers_voted >= 500 LIMIT 5";
					$result = mysqli_query($connection, $query);        
					while($sql = mysqli_fetch_assoc($result) ){
						$sql_game_block = mysqli_fetch_assoc( mysqli_query($connection, "SELECT id,title, description, photo_background_name FROM game_block_info WHERE id = ".$sql['id_game_block']) );			
						$link = "game.php?id=".$sql_game_block['id'];

						print '
						<div class="game">
							<img src="img/games_background/'.$sql_game_block['photo_background_name'].'" alt="'.$sql_game_block['title'].'">
							<a><h2>'.$sql_game_block['title'].'</h2></a>
							<p>'.$sql_game_block['description'].'</p>
							<button onclick="change_location(\''.$link.'\')">Read More</button>
						</div>';
					}
				?>
			</div>
		</article>
		<a href="games.php">See All Games</a>
	</section>
<!--==END Section latest updatesa and featured games ============================================================== -->


<!-- == FOOTER ==================================================================================================== -->
	<?php 
		mysqli_close($connection);
		include "php/templates/footer.php"; 
	?>
	<script src="js/mini_js_scripts.js"></script>
</body>
</html>