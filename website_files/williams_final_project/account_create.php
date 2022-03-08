<!DOCTYPE html>
<html lang="en">

<?php
	session_start();

	if(!empty($_SESSION)) {
		header('Location: /williams_final_project/shop.php?error=You Are Already Logged in');
	}
?>

<head>
	<meta charset="utf-8">
	<title>Create Account</title>
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

	<h2 class="bodytitle">Create Account</h2>
	<div class="body">
		<div class="bodyerror">
			<?php
				if(isset($_GET['error'])) {
					echo "<p class='error'>" . $_GET['error'] . "</p>";
				}
			?>
		</div>
		<form  action="confirm.php" method="post">
			<label for="email">Email:</label>
			<br>
			<input class="textbox" type="text" name="email" placeholder="example@example.com">
			<br>
			<label for="name">Name:</label>
			<br>
			<input class="textbox" type="text" name="name" placeholder="John Doe">
			<br>
			<label for="password">Password:</label>
			<br>
			<input class="textbox" type="password" name="password">
			<br>
			<label for="tool_preference">Tool Preference:</label>
			<br>
			<select name="tool_preference" id="preference">
				<option value="1">No Preference</option>
				<option value="2">Physical Tools</option>
				<option value="3">Software</option>
				<option value="4">Hotplug Attacks</option>
				<option value="5">Man-in-the-Middle Attacks</option>
				<option value="6">Wireless Attacks</option>
			</select>
			<br>
			<input class="submit" type="submit" value="submit">
		</form>

	</div>

	<br>
</body>
</html>