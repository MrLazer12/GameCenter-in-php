<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/games.css">
    <style>
        section.games h1{
            width: 100%;
            color: white;
            padding: 2vh 1vw;
            background: black;
        }
    </style>
</head>
<body>
    <?php 
        include "php/connection.php";
        include "php/templates/header.php"; 
    ?>
<!-- == GAMES SECTION ============================================================================================= -->
    <section class="games">
        <h1>GAME LIST</h1>
        <br>
        <article>
            <?php
                include "PHP/connection.php";

                $SQL_query = "SELECT * FROM game_block_info";
                $query_result = mysqli_query($connection, $SQL_query);

                if (mysqli_num_rows($query_result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($query_result)) {
                        $link = "game.php?id=".$row['id'];
                        print '
                        <div class="game">
                            <img src="img/games_background/'.$row['photo_background_name'].'" alt="'.$row['title'].'">
                            <a><h2>' .$row["title"]. '</h2></a>
                            <p>' .$row["description"]. '</p>
                            <button onclick="change_location(\''.$link.'\')">Read More</button>
                        </div>
                        ';
                    }
                } else {
                    echo "<b>0 results</b>";
                }
            ?>            
        </article>
    </section>
<!-- == END GAMES SECTION ============================================================================================= -->


<!-- == FOOTER ==================================================================================================== -->
    <?php 
        mysqli_close($connection);
        include "php/templates/footer.php"; 
    ?>
    <script src="js/mini_js_scripts.js"></script>
</body>
</html>