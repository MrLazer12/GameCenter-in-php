<?php
print <<<EOT
<header>
<main>
EOT;

if(isset($_SESSION) )
    if(!empty($_SESSION['username']) )
        user_mod();
else
    guest_mod();

print <<<EOT
    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
    <div class="search_block">
        <form action="search_article.php" method="POST">
            <input type="text" name="input_search">
            <button type="submit" name="submit">Search</button>
        </form>
    </div>

</main>

<div>
    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="games.php">Games</a></li>
        <li><a href="contacts.php">Contacts</a></li>
    </nav>
</div>
</header>
EOT;

function guest_mod(){
    print <<<EOT
    <h3>
        YOU HAVE NOT YET REGISTERED TO OUR CLUB? 
        <a href="login.php">LOGIN</a> 
        OR
        <a href="registration.php">REGISTER</a>
    </h3>
    EOT;
}

function user_mod(){
    print <<<EOT
    <h3>
        <main>
            <img src="img/users_fotos/user_default.png" alt="user_foto">
            <br>
            <a href="edit_accaunt.php">Change Accaunt Settings</a>
            <br>
            <a href="user_articles.php">Your articles</a>
            <br>
            <a href="logout.php">Logout</a>
        </main>
    </h3>
    EOT;
}