<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles.css">
	<title>Home</title>
</head>

<body>
	<div class="titlebar">
		<h1>RedTeam Market</h1>

		<div class="nav">
			<ul>
				<li>Home</li>
				<li><a href="about.php">About</a></li>
				<li><a href="shop.php">Shop</a></li>
				<?php
					session_start();
					if(isset($_SESSION['id'])) {
						echo '<li><a href="user_account.php">Account</a></li>';
						echo '<li><a href="logout.php">Logout</a></li>';
					}
					else {
						echo '<li><a href="login.php">Login</a></li>';
					}
				?>
			</ul>
		</div>
	</div>

	<h2 class="bodytitle">Welcome to The Market!</h2>
	<div class="body">
		<p>
			This marketplace is designed to give the average ethical hacker all the tools he needs to get started.  This is where many will find comfort in their physical and digital security.
			<br>
			<img src="Cybersecurity.png" alt="Cybersecurity Photo">
			<br>
			<em><strong>Note: this site is not responsible for the malicious use of these tools.</strong></em>
		</p>
	</div>

</body>
</html>