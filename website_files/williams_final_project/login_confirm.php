<?php
	require('../../mysqli_connect.php');
	session_start();

	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email'";

	$r = mysqli_query($connect, $sql) or die('Error: ' . mysql_error());

	if (mysqli_num_rows($r) == 1)	{
		$row = mysqli_fetch_array($r);
		$hash = hash('sha256', $password);
		if($hash == $row['password']) {
			$_SESSION['email'] = $row['email'];
			$_SESSION['name'] = $row['Name'];
			$_SESSION['id'] = $row['UserID'];

			mysqli_close($connect);
			header('Location: /williams_final_project/shop.php?success=You are now logged in');
		}
		else {
			mysqli_close($connect);
			header('Location: /williams_final_project/login.php?error=Email or Password is Incorrect');
		}
	}
	else {
		mysqli_close($connect);
		header('Location: /williams_final_project/login.php?error=Email or Password is Incorrect');
	}
?>