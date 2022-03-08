<?php
	session_start();
	require("../../mysqli_connect.php");

	$userID = $_POST['delete'];

	$sql = "DELETE FROM users WHERE UserID=$userID";

	mysqli_query($connect, $sql);
	session_destroy();

	mysqli_close($connect);

	header("Location: /williams_final_project/login.php?success=Account has been Deleted");



?>