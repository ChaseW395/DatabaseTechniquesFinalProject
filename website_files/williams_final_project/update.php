<?php
	session_start();
	require('../../mysqli_connect.php');

	$usrID = $_SESSION['id'];

	if(!empty($_POST['email'])) {
		$email = mysqli_real_escape_string($connect, $_POST['email']);

		$sql = "SELECT * FROM users WHERE email=\"$email\"";
		$r = mysqli_query($connect, $sql) or die('Error: ' . mysql_error());
				
		if(mysqli_num_rows($r) > 0) {
			mysqli_close($connect);
			header('Location: /williams_final_project/user_account.php?error=Email Already Exists');
		}
		else {
			$sql = "UPDATE users SET email=\"$email\" WHERE UserID=$usrID";
			mysqli_query($connect, $sql);

			if(!empty($_POST['name'])) {
				$name = mysqli_real_escape_string($connect, $_POST['name']);
				$sql = "UPDATE users SET name=\"$name\" WHERE UserID=$usrID";
				mysqli_query($connect, $sql);
			}
	
			if($_POST['tool_preference'] != 0) {
				$preference = $_POST['tool_preference'];
				echo $preference;
				$sql = "UPDATE users SET ToolPreferenceNO=$preference WHERE UserID=$usrID";
				mysqli_query($connect, $sql);
			}
			
			if(!empty($_POST['password'])) {
				$plaintext = $_POST['password'];
				$hash = hash('sha256', $plaintext);

				$sql = "UPDATE users SET password=\"$hash\" WHERE UserID=$usrID";
				mysqli_query($connect, $sql);
			}

			mysqli_close($connect);
			header('Location: /williams_final_project/user_account.php?success=Successfully updated Information');
		}
	}
	else {
		if(!empty($_POST['name'])) {
			$name = mysqli_real_escape_string($connect, $_POST['name']);
			$sql = "UPDATE users SET name=\"$name\" WHERE UserID=$usrID";
			mysqli_query($connect, $sql);
		}
	
		if($_POST['tool_preference'] != 0) {
			$preference = $_POST['tool_preference'];
			echo $preference;
			$sql = "UPDATE users SET ToolPreferenceNO=$preference WHERE UserID=$usrID";
			mysqli_query($connect, $sql);
		}

		if(!empty($_POST['password'])) {
			$plaintext = $_POST['password'];
			$hash = hash('sha256', $plaintext);

			$sql = "UPDATE users SET password=\"$hash\" WHERE UserID=$usrID";
			mysqli_query($connect, $sql);
		}
		
		mysqli_close($connect);
		header('Location: /williams_final_project/user_account.php?success=Successfully updated Information');
	}

?>