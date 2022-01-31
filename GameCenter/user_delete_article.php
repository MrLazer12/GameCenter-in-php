<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Article</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/games.css">
    <style>
        form.php_form h1{
            width: 100%;
            display: block;
            padding: 1.5vh 2vw;
            font-weight: bold;
            font-size: 1.6em;
            text-transform: uppercase;
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

        $id_page = $_GET['id'];
        $query = "SELECT title, photo_logo_name, photo_background_name 
                  FROM game_block_info 
                  WHERE id = $id_page";
        $sql_res = mysqli_fetch_assoc( mysqli_query($connection, $query) );
	?>
        <form action="" method="post" class="php_form">
            <h1>Are you sure you want to delete article: <?php print $sql_res['title']; ?></h1>
            <input type="submit" name="submit" value="Yes">
            <input type="submit" name="submit" value="No">

            <?php
                if(isset($_POST['submit']) ){
                    if($_POST['submit'] == "Yes"){
                        mysqli_query($connection, "DELETE FROM game_block_info WHERE id = $id_page");
                        mysqli_query($connection, "DELETE FROM articles_rating WHERE id_game_block = $id_page");
                        mysqli_query($connection, "DELETE FROM articles_comments WHERE id_article = $id_page");

                        $succes = false;
                        $photoname = $sql_res['photo_background_name'];
                        (unlink("img/games_background/$photoname") ) ? $succes = true : $succes = false;

                        $photoname = $sql_res['photo_logo_name'];
                        (unlink("img/games_logo/$photoname") ) ? $succes = true : $succes = false;
                        
                        if($succes == true)
                            header("Location: user_articles.php");
                        else
                            show_message_result("Could not delete image from the server");
                    }
                    else
                        header("Location: user_articles.php");
                }
            ?>
       </form>
<!-- == FOOTER ==================================================================================================== -->
	<?php 
		mysqli_close($connection);
		include "php/templates/footer.php"; 
    ?>
</body>
</html>