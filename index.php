<?php
session_start();
	if(!isset($_SESSION['userlogin'])){
		header("location: login.php");
	}

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("location: login.php");
    }
    
?>

<p>Welcome!</p>

<a href="index.php?logout=true">Logout</a>