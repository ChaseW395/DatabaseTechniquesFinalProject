<?php
	
	require("../../mysqli_connect.php");

	$userID = $_POST['delete'];

	$sql = "DELETE FROM users WHERE UserID=$userID";

	mysqli_query($connect, $sql);

	mysqli_close($connect);

	header("Location: /williams_final_project/admin_control.php?success=Account has been Deleted");



?>