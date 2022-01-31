<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your articles</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/games.css">
    <style>
        section.games h1{
            margin: 0vh 0 2vh;
            padding: 1.5vh 2vw;
            font-weight: bold;
            font-size: 1.6em;
            color: #FFFFFF;
            background: #232323;
            text-shadow: 0 0 5px #FFF, 
                        0 0 10px #FFF, 
                        0 0 15px #FFF, 
                        0 0 20px #8D2914, 
                        0 0 30px #8D2914, 
                        0 0 40px #8D2914, 
                        0 0 55px #8D2914, 
                        0 0 75px #8D2914;
        }
    </style>
</head>
<body>
	<?php 
        include "php/connection.php";
        include "php/functions.php";
		include "php/templates/header.php"; 
	?>
        <section class="games">
                <h1>Your Articles</h1>
                <input onclick="change_location('user_create_article.php')" type="button" name="create_article" value="Create Article">
                <br>
                <br>
                <article>
                <?php
                    $username = $_SESSION['username'];
                    $query = "SELECT first_name, last_name FROM user_data WHERE username = '$username'";
                    $first_last_name = mysqli_fetch_row( mysqli_query($connection, $query) );
                    $FirstLast_name = $first_last_name[0]." ".$first_last_name[1];

                    $query  = "SELECT author FROM game_block_info WHERE author = '$FirstLast_name'";
                    $author = mysqli_fetch_row( mysqli_query($connection, $query) );
                    
                    if($author == null || empty($author) ) 
                        show_message_result("You have not write any article!");
                    else{
                        $author = $author[0];
                        $query_result = mysqli_query($connection, "SELECT * FROM game_block_info");
                        if (mysqli_num_rows($query_result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($query_result) ) {
                                if($author == $row['author'])
                                    print '
                                    <div class="game">
                                        <img src="img/games_background/'.$row['photo_background_name'].'" alt="'.$row['title'].'">
                                        <a><h2>' .$row["title"]. '</h2></a>
                                        <p>' .$row["description"].'</p>
                                        <button onclick="change_location(\'game.php?id='.$row['id'].'\')">View</button>
                                        <button onclick="change_location(\'user_edit_article.php?id='.$row['id'].'\')">Edit</button>
                                        <button onclick="change_location(\'user_delete_article.php?id='.$row['id'].'\')">Delete</button>
                                    </div>
                                    ';
                            }
                        } else
                            echo "<b>0 results</b>";
                    }          



                ?>
                </article>
       </section>
    
<script>
	function change_location(url){
		location.replace(url);
	}
</script>
<!-- == FOOTER ==================================================================================================== -->
	<?php 
		mysqli_close($connection);
		include "php/templates/footer.php"; 
	?>
</body>
</html>