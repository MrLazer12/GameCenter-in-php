<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Article</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/games.css">
    <style>
        form.games input[type=text], form.games textarea{
            border: 1px solid #ccc!important;
            padding: 8px;
            width: 100%;
        }
        form.games h1, form.games label{
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
        form.games h1{ 
            margin: 0vh 0 2vh;
            text-align: center;
        }
        form.games label{
            font-weight: bold;
            font-size: 1.3em;
        }
        .span_instructions{
            font-size: medium;
            font-weight: bold;
            width: 100%;
            background: #232323;
            color: white;
            padding: 1vw;
        }
    </style>
</head>
<body>
	<?php 
        include "php/connection.php";
        include "php/functions.php";
		include "php/templates/header.php"; 
	?>
        <form action="" method="post" class="games php_form" enctype="multipart/form-data">
                <h1>Your Article</h1>
                <br>
                <label for="title">Title</label>
                <input  type="text" id="title" name="title">
                <br>
                <br>
                <label for="description">Description</label>
                <input  type="text" id="description" name="description">
                <br>
                <br>
                <label for="text">Text</label>
                <div class="span_instructions">
                    <h4><b>INSTRUCTIONS</b></h4>
                    <hr>
                    <table>
                        <tr>
                            <td>to write new line type:</td>
                            <td>\n</td>
                        </tr>
                        <tr>
                            <td>to write " type:</td>
                            <td>\"</td>
                        </tr>
                        <tr>
                            <td>to write ' type:</td>
                            <td>\'</td>
                        </tr>
                        <tr>
                            <td>to write text bold type:</td>
                            <td><?php echo htmlspecialchars("<b>Your text</b>");?></td>
                        </tr>
                        <tr>
                            <td>to write text italic type:</td>
                            <td><?php echo htmlspecialchars("<i>Your text</i>");?></td>
                        </tr>
                        <tr>
                            <td>to write text underline type:</td>
                            <td><?php echo htmlspecialchars("<u>Your text</u>");?></td>
                        </tr>
                        <tr>
                            <td>to unit all this type:</td>
                            <td><?php echo htmlspecialchars("<b><i><u>Your Text</u></i></b>");?></td>
                        </tr>
                    </table>
                    <br>
                    PS: please save your article in somethere before press the create button, it might give you sql error syntax, because you do not followed the instructions!!!
                </div>
                <textarea  rows="30" type="text" id="text" name="text" placeholder="Your article..."></textarea>
                <br>
                <br>
                <label for="background_foto">Photo for background</label>
                <input  type="file" name="fileToUpload_background_foto" id="fileToUpload">
                <br>
                <br>
                <label for="logo_foto">Photo for logo</label>
                <input type="file" name="fileToUpload_logo_foto" id="fileToUpload">
                <br>
                <br>
                <input type="submit" name="create_article" value="Create Article">
                <?php
                    if(isset($_POST['create_article']) ){
                        $username = $_SESSION['username'];
                        $sql = mysqli_fetch_assoc( mysqli_query($connection, "SELECT first_name, last_name FROM user_data WHERE username = '$username'") );
                        $author = $sql['first_name']." ".$sql['last_name'];
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $text = $_POST['text'];
                        $text = nl2br($text);
                        
                        $query1 = "INSERT INTO game_block_info(id, author, written_on, photo_logo_name, photo_background_name, title, description, text)
                                   VALUES('', '$author', NOW(), '', '', '$title', '$description', '$text')";

                        if(mysqli_query($connection, $query1) ){
                            $result = mysqli_query($connection, "SELECT MAX(id) as max_id FROM game_block_info") or die("Error: ".mysqli_error($connection));
                            $id_game_block = mysqli_fetch_assoc($result);
                            $id_game_block = $id_game_block['max_id'];
                            $query2 = "INSERT INTO articles_rating(id, id_game_block, star, numbers_voted)
                                    VALUES
                                    ('', '$id_game_block', '5', '1'),
                                    ('', '$id_game_block', '4', '1'),
                                    ('', '$id_game_block', '3', '1'),
                                    ('', '$id_game_block', '2', '1'),
                                    ('', '$id_game_block', '1', '1')
                                    "; 

                            if(mysqli_query($connection, $query2) ){
                                //============================================================================================
                                //=== UPLOAD IMAGE TO DB =====================================================================
                                $directoria_games_background = "img/games_background/";
                                $directoria_games_logo = "img/games_logo/";

                                include "php/upload.php";
                                upload_photo($connection, $directoria_games_background, "fileToUpload_background_foto", "photo_background_name", $id_game_block);
                                upload_photo($connection, $directoria_games_logo, "fileToUpload_logo_foto", "photo_logo_name", $id_game_block);                                 
                                show_message_result("Article successfully created!");
                            }
                            else
                                show_message_result("Error: ".mysqli_error($connection) );
                        }
                        else
                            show_message_result("Error: ".mysqli_error($connection) );
                    }
                ?>
       </form>
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