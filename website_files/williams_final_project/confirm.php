<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Confirm</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="titlebar">
		<h1>RedTeam Market</h1>

		<div class="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
	</div>

	<h2 class="bodytitle">Confirm</h2>
	<div class="body">
		<h3>Do these look correct?</h3>
		<p>
			<?php

				require('../../mysqli_connect.php');
				$email = mysqli_real_escape_string($connect, $_POST['email']);

				if(empty($email)) {
					header('Location:/williams_final_project/account_create.php?error=Email is Required');
				}

				//check to see if email is already used in the database
				
				$sql = "SELECT * FROM users WHERE email='$email'";
				$r = mysqli_query($connect, $sql) or die('Error: ' . mysql_error());
				
				if(mysqli_num_rows($r) > 0) {
					header('Location: /williams_final_project/account_create.php?error=Email Already Exists');
				}


				$name = mysqli_real_escape_string($connect, $_POST['name']);

				if(empty($name)){
					header('Location:/williams_final_project/account_create.php?error=Name is Required');
				}


				$preference = $_POST['tool_preference'];

				echo "Email: <br> $email";
				echo "<br><br> Name: <br> $name";
				echo "<br><br> Tool Preference: <br>";

				if($preference == 1) {
					echo "No Preference";
				}
				else if($preference == 2) {
					echo "Physical Tools";
				}
				else if($preference == 3) {
					echo "Software";
				}
				else if($preference == 4) {
					echo "Hotplug Attacks";
				}
				else if($preference == 5) {
					echo "Man-in-the-Middle Attacks";
				}
				else {
					echo "Wireless Attacks";
				}

				// Password handling and hashing

				$plainText = $_POST['password'];

				if(empty($plainText)) {
					header('Location:/williams_final_project/account_create.php?error=Password is Required');
				}

				$hash = hash('sha256', $plainText);

				mysqli_close($connect);

			?>
			<br><br>
			<form action="create.php" method="post">
				<input type="hidden" name="email" value="<?php echo htmlentities($email); ?>">
				<input type="hidden" name="name" value="<?php echo htmlentities($name); ?>">
				<input type="hidden" name="tool_preference" value="<?php echo htmlentities($preference); ?>">
				<input type="hidden" name="password" value="<?php echo htmlentities($hash); ?>">
				<input class="submit" type="submit" value="Yes">
			</form>

			<button class="submit" type="button" onClick="window.location = 'account_create.php'">No</button>
			<!-- This will not submit any of the values to the database and will redirect back to the account creation page -->

		</p>
	</div>

</body>
</html>