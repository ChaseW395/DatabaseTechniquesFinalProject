<?php
	
	require('../../mysqli_connect.php');
	session_start();

	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$preference = intval($_POST['tool_preference']);
	$password = $_POST['password'];

	$sql = "INSERT INTO users (AccountType, Name, Email, Password, ToolPreferenceNo) VALUES (1, '$name', '$email', '$password', '$preference');";

	if(!mysqli_query($connect, $sql)) {
		die('Error: ' . mysql_error());
	}


	$sql = "SELECT UserID FROM users WHERE Email='$email'";
	$r = mysqli_query($connect, $sql);

	if($r) {
		if(mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array($r);
		}
	}

	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
	$_SESSION['id'] = $row['UserID'];

	mysqli_close($connect);
	header("Location: /williams_final_project/shop.php?success=Account Creation Successful")
?>