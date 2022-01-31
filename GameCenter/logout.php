<?php
session_start();
session_destroy();
// unset($_SESSION['username']);
// $_SESSION = [];
session_unset();

header("Location: index.php");