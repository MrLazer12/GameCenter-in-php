<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
        $sql = mysqli_fetch_assoc( mysqli_query($connection, "SELECT * FROM game_block_info WHERE id = ".$_GET['id']) );
        $title = $sql['title'];
        $text = str_replace("<br />", "", $sql['text']);
        $description = $sql['description'];
	?>
        <form action="" method="post" class="games php_form">
                <h1>Your Article</h1>
                <br>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php print $title; ?>">
                <br>
                <br>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?php print $description; ?>">
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
                    <b>PS:</b> please save your article in somethere before press the create button, 
                    it might give you sql error syntax, because you do not followed the instructions!!!
                </div>
                <textarea rows="25" type="text" id="text" name="text"><?php print $text; ?></textarea>
                <br>
                <br>
                <input type="submit" name="create_article" value="Update Article">
                <br>
                <?php
                    if(isset($_POST['create_article']) ){
                        $username = $_SESSION['username'];
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $text = $_POST['text'];
                        $text = nl2br($text);

                        $query = "UPDATE game_block_info
                                  SET title = '$title', 
                                      description = '$description',
                                      written_on = NOW(), 
                                      text = '$text'
                                  WHERE id = ".$_GET['id'];

                        if(mysqli_query($connection, $query))
                            show_message_result("Article successfully updated!");
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