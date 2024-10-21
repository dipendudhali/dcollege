<?php
ob_start();
	session_start();

	$_SESSION['loggedin'] = false;

    $_SESSION['username'] = '';
    $_SESSION['email'] = '';
	//header("location : index.php");
	echo '<script>window.location.href="index.php";</script>';
	ob_end_flush();
//echo "logged out";
?>