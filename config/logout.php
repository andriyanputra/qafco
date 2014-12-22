<?php	
	require_once "connection_.php";
	require_once "function.core.php";
	session_start();
	
	$db->close();
	
	setcookie('user','',0);
	//setcookie('level','',0);
	session_unset();
	session_destroy();
	header("location:../index.php");
?>