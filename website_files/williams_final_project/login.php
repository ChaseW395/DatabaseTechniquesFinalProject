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
	<link rel="stylesheet" href="styles.css">
	<title>Login</title>
</head>

<body>
	<div class="titlebar">
		<h1>RedTeam Market</h1>

		<div class="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li>Login</li>
			</ul>
		</div>
	</div>

	<h2 class="bodytitle">Login</h2>
	<div class="body">
		<?php 
		if(isset($_GET['success'])) {
			echo '<div class="success">';
			echo '<p class="success_login_out">' . $_GET['success'] . '</p>';
			echo '</div>';
		} 
		?>
		<div class="bodyerror">
			<?php
				if(isset($_GET['error'])) {
					echo "<p class='login_error'>" . $_GET['error'] . "</p>";
				}
			?>
		</div>
		<form  action="login_confirm.php" method="post">
			<label for="email">Email:</label>
			<br>
			<input class="textbox" type="text" name="email" placeholder="example@example.com" required>
			<br>
			<label for="password">Password:</label>
			<br>
			<input class="textbox" type="password" name="password" required>
			<br>
			<input class="submit" type="submit" value="submit">

		</form>

		<p>If you do not already have an account, <a href="account_create.php">Create One</a></p>
	</div>

	<br>
	
</body>
</html>