<?php  
	//Author : Dwiky Putra R R T
	//Description : logout page to clear session and cookie
	//Last Modified by : Dwiky Putra R R T 2-12-2018
	session_start();
	$_SESSION = [];
	session_unset();
	session_destroy();

	setcookie('id','',time() - 60);
	setcookie('key','',time() - 60);

	header("Location: menu.php");
	exit;

?>