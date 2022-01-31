<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/games.css">
    <link rel="stylesheet" href="css/game.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> -->
</head>
<body>
    <?php 
        include 'php/connection.php';
        include 'php/functions.php';
        include "php/templates/header.php"; 
    ?>

<!-- == GAME SECTION ============================================================================================= -->
    <section class="games">
        <?php
            
            $id_article = $_GET['id'];
            $query = "SELECT * FROM game_block_info WHERE id = '$id_article'";
            $query_result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($query_result);


            print '<h1>'.$row['title'].'</h1>';
            print '<br><h3><b>Author:</b> <i>'.$row['author'].'</i></h3><br>';
            print "<main>";
                print "<p>".$row['text']."</p>";
                print '<div class="logo">
                        <img src="img/games_logo/'.$row['photo_logo_name'].'" alt="Logo '.$row['title'].'">
                        <br>
                        ';
        ?>
                        <form action="" method="post" id="ratingForm">
                            <fieldset class="rating">
                                <legend>Please rate:</legend>
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Very bad">1 star</label>
                            </fieldset>
                            <input type="submit" name="submit" value="Rate">
                        </form>
        <?php    
        //== CALCULATING RATING FOR ARTICLE ====================================================================
        // EXAMPLE: 
        // 5 star - 252
        // 4 star - 124
        // 3 star - 40
        // 2 star - 29
        // 1 star - 33    
        // (5*252 + 4*124 + 3*40 + 2*29 + 1*33) / (252+124+40+29+33) = 4.11
        $result = mysqli_query($connection, "SELECT * FROM articles_rating WHERE id_game_block = $id_article");
        $sum1 = 0;
        $sum2 = 0;
        while($sql = mysqli_fetch_assoc($result) ){
            $sum1 += ($sql['star']*$sql['numbers_voted']);
            $sum2 += $sql['numbers_voted'];
        }
        //== END CALCULATING RATING FOR ARTICLE ==================================================================== 


        //== START ADD RATING FOR ARTICLE ========================================================================== 
                if(isset($_POST['submit']) == 1){
                    if(empty($_POST['rating'])){
                        print "To rate select a star!";
                        exit;                        
                    }
                    else{
                        $query = "UPDATE articles_rating
                                    SET numbers_voted = numbers_voted + 1
                                    WHERE star = ".$_POST['rating'];
                        mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
                        print "Thank you for selecting a rating!";                     
                    }
                }   
        //== END ADD RATING FOR ARTICLE ============================================================================ 
            print '<br><span><b>Rating: </b>'.round($sum1/$sum2, 1).'</span>';
            print '<br>';             
            print '</div>';
            print "</main>";
            ?>
        <!-- == START COMENTS SECTION ================================================================================== -->
            <br><br>
            <form action="" method="post" class="comments">
                <fieldset>
                    <legend>COMENTS</legend>
                    <?php 
                        $result = mysqli_query($connection, "SELECT * FROM articles_comments WHERE id_article = $id_article");
                        $rows = mysqli_num_rows($result);

                        if($rows == 0)
                            echo "no coments";
                        else{
                            while($sql = mysqli_fetch_assoc($result) )
                            print '
                            <div class="comment">
                                <div>
                                    <img src="img/users_fotos/user_default.png" alt="user_default">
                                    <h1>'.$sql['first_last_name_user'].'</h1>
                                </div>
                                <p>'.$sql['comment'].'</p>                    
                            </div>
                            ';
                        }
                    ?>

                </fieldset>
                <br>
                <br>
                <fieldset>
                    <legend>Add a comment</legend>
                    <?php
                        if(!empty($_SESSION))
                            print '
                                <label for="comment">Your comment:</label>
                                <br>
                                <textarea id="comment" name="comment"></textarea>
                                <input type="submit" name="add_comment" value="Add">                            
                            ';
                        else
                            show_message_result("To write comments you need to log in..");

                        if(isset($_POST['add_comment']) ){
                            $username = $_SESSION['username'];
                            $sql = mysqli_fetch_assoc( mysqli_query($connection, "SELECT id, first_name, last_name FROM user_data WHERE username = '$username'") );
                            $id_user = $sql['id'];
                            $first_last_name_user = $sql['first_name']." ".$sql['last_name'];
                            $comment = $_POST['comment'];

                            $query = "INSERT INTO articles_comments(id, id_user, id_article, first_last_name_user, comment)
                                      VALUES ('', '$id_user', '$id_article', '$first_last_name_user', '$comment')";
                        
                            if(mysqli_query($connection, $query) )
                                show_message_result("Comment add!");
                            else
                                show_message_result("Error: ".mysqli_error($connection) );
                        }
                    ?>

                </fieldset>
            </form>
        <!-- == END COMENTS SECTION ==================================================================================== -->
    </section>
<!-- == END GAME SECTION ============================================================================================= -->


<!-- == FOOTER ==================================================================================================== -->
    <?php 
        mysqli_close($connection);
        include "php/templates/footer.php"; 
    ?>
</body>
</html>