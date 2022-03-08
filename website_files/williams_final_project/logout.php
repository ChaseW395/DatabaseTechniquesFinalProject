<?php 
	session_start();
	session_destroy();

	header("Location: /williams_final_project/login.php?success=You have Successfully Logged Out")
?>