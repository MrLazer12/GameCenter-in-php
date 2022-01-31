<?php
    // Set sessions
    if(!isset($_SESSION)) {
      session_start();
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DB_name = "gamecenter";
            
    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $DB_name);
            
    // Check connection
    if (!$connection)
      die("Connection failed: " . mysqli_connect_error());