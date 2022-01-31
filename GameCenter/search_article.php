<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        form.php_form a{
            font-size: large;
            color: brown;
        }
        form.php_form a:hover{
            transition: 1s ease;
            color: black;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    include "php/connection.php";
    include "php/functions.php";
    include "php/templates/header.php"; 

    print "<form class=\"php_form\">";
    print "<h1>Results:</h1><hr><br>";
    if(isset($_POST['submit']) ){
        $input_search = $_POST['input_search'];
        $query = "SELECT id,title FROM  game_block_info WHERE title like '$input_search%'";
        $result = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($result) == 0)
            show_message_result("Such article with this title: $input_search does not exist...");
        else{
            while($sql = mysqli_fetch_row($result) )
                print '<a href="game.php?id='.$sql[0].'">=> '.$sql[1].'</a><br><br>';
        }
    }
    mysqli_close($connection);
    print "</form>";
    include "php/templates/footer.php";
    ?>
</body>
</html>