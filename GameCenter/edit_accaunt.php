<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/edit_accaunt.css">
</head>
<body>
    <?php 
        include "php/templates/header.php";
        include "php/connection.php";
        include "php/functions.php";

        $log_username = $_SESSION["username"];
        $result = mysqli_query($connection, "SELECT * FROM user_data WHERE username = '$log_username'");
           $sql = mysqli_fetch_assoc($result);
        
        $id_user    = $sql['id'];
        $username   = $sql['username'];
        $password   = $sql['password'];
        $first_name = $sql['first_name'];
        $last_name  = $sql['last_name'];
        $sex        = $sql['sex'];
        $email      = $sql['email'];
        $birthday   = $sql['birthday'];
    ?>

    <form action="" method="post" class="edit php_form">
        <table border="0" width="100%" cellpadding="10" cellspacing="0">
			<tbody>
                <caption>Change your accaunt settings</caption>
                <tr>
					<td><label>username</label></td>
					<td><input type="text" name="username" value="<?php echo $username ?>"></td>
                </tr>

				<tr>
					<td><label>password</label></td>
					<td><input type="password" name="password" value="<?php echo $password ?>"></td>
                </tr>
                
				<tr>
					<td><label>Nume</label></td>
					<td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
				</tr>

				<tr>
					<td><label>Prenume</label></td>
					<td><input type="text" name="last_name" value="<?php echo $last_name ?>"></td>
				</tr>

				<tr>
					<td><label>sex</label></td>
					<td><input type="text" name="sex" value="<?php echo $sex ?>"></td>
				</tr>

				<tr>
					<td><label>Email</label></td>
					<td><input type="email" name="email" value="<?php echo $email ?>"></td>
				</tr>

				<tr>
					<td><label>birthday</label></td>
					<td><input type="date" name="birthday" value="<?php echo $birthday ?>"></td>
				</tr>
                </tbody>
            </table>
            <input type="submit" name="update" value="Update" />
            <br>
            <?php
                if(isset($_POST['update']) ){
                    $username   = $_POST['username'];
                    $password   = $_POST['password'];
                    $first_name = $_POST['first_name'];
                    $last_name  = $_POST['last_name'];
                    $sex        = $_POST['sex'];
                    $email      = $_POST['email'];
                    $birthday   = $_POST['birthday'];


                    $query = "UPDATE user_data
                              SET username = '$username',
                                  password = '$password',
                                  first_name = '$first_name',
                                  last_name = '$last_name',
                                  sex = '$sex',
                                  email = '$email',
                                  birthday = '$birthday'
                              WHERE username = '$log_username'";

                    if(mysqli_query($connection, $query) ){
                        $new_first_last_name = $first_name." ".$last_name;
                        //CHANGE IN ARTICLE COMMENTS SECTION the author comment =====
                        $query = "UPDATE articles_comments
                                  SET first_last_name_user = '$new_first_last_name'
                                  WHERE id_user = $id_user";
                        mysqli_query($connection, $query)
                        or die("Error: ".mysqli_error($connection) );

                        //CHANGE AUTHOR ARTICLE ======================================
                        $old_author_name = $sql['first_name']." ".$sql['last_name'];
                        $query = "UPDATE game_block_info
                                  SET author = '$new_first_last_name'
                                  WHERE author = '$old_author_name'";
                        mysqli_query($connection, $query)
                        or die("Error: ".mysqli_error($connection) );

                        show_message_result("Data changed successful!");
                    }
                    else
                        show_message_result("Error: ".mysqli_error($connection) );
                        
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