<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contacts</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/Contacts.css">
</head>
<body>
    <?php 
        include "php/connection.php";
        include "php/templates/header.php"; 
    ?>

<!-- == SECTION CONTACTS =============================================================== -->
        <section class="Contacts">
            <div>
                <h1>CONTACT INFO</h1>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21787.58118518253!2d28.765386050000004!3d46.952894099999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c98025dc65dd95%3A0xe7b2f7550c5497a6!2z0JDQutCy0LDQv9Cw0YDQug!5e0!3m2!1sru!2s!4v1595062526103!5m2!1sru!2s" width="600" height="450" frameBorder="0" allowFullScreen="" aria-hidden="false" tabIndex="0"></iframe>

                <address>
                    <dl>
                        <dt>
                            The Company Name Inc.<br />
                            9863 - 9867 Mill Road,<br />
                            Cambridge, MG09 99HT.
                        </dt>
                        <dd>Freephone: +1 800 559 6580</dd>
                        <dd>Telephone: +1 800 603 6035</dd>
                        <dd>FAX: +1 800 889 9898</dd>
                        <dd>E-mail:<a href=""> mail@demolink.org</a></dd>
                    </dl>
                </address>
                
            </div>

            <form action="" method="post" class="column">
                <h1>GET IN TOUCH</h1>
                <input type="text" placeholder="Name:" name="name" />
                <input type="email" placeholder="Email:" name="email"/>
                <input type="text" placeholder="Phone:" name="phone"/>
                <textarea id="message" name="message"></textarea>

                <div>
                    <button name="clear">Clear</button>
                    <button name="submit">Submit</button>
                </div>

                <?php
                    if(isset($_POST['clear']) )
                        header("Refresh: 0");
                    
                    if(isset($_POST['submit']) ){
                        $name  = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $message = $_POST['message'];
                        
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                        $headers .= "From: staffordtony03@gmail.com" . "\r\n";
                        $message = '<!DOCTYPE html>
                                    <html lang="en">
                                    <head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <title>Document</title>
                                    </head>
                                    <body>
                                        <b>Nume: </b>'.$name.'
                                        <br>
                                        <b>Email: </b>'.$email.'
                                        <br>
                                        <b>Phone: </b>'.$phone.'
                                        <br>
                                        <b>Message: </b>'.$message.'
                                    </body>
                                    </html>';
                                    
                        ini_set("SMTP","aspmx.l.google.com");
                        mail($email,"Information send from website", $message, $headers);
                    }
                ?>
            </form>
        </section>

<!-- == FOOTER =============================================================== -->
    <?php 
        mysqli_close($connection);
        include "php/templates/footer.php"; 
    ?>
</body>
</html>