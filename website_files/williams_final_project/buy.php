<?php

	require('../../mysqli_connect.php');
	session_start();

	if(!empty($_SESSION)) {
		$usrID = $_SESSION['id'];
		$amount = mysqli_real_escape_string($connect, $_POST['amount']);
		$prodID = $_POST['product'];

		if(is_numeric($amount)) {
			$sql = "INSERT INTO orders (UserID, ProductNumber, ItemAmount) VALUES ($usrID, $prodID, $amount)";

			mysqli_query($connect, $sql);

			header('Location: /williams_final_project/shop.php?success=Purchase Successful');

		}
		else {
			header('Location: /williams_final_project/shop.php?error=Enter a Numerical Value');
		}

	}
	else {
		header('Location: /williams_final_project/login.php?error=You are not Logged in');
	}
	mysqli_close($connect);
?>