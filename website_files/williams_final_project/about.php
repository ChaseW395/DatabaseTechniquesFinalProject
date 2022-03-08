<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>About</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="titlebar">
		<h1>RedTeam Market</h1>

		<div class="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>About</li>
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

	<h2 class="bodytitle">About this Page</h2>
	<div class="body_about">
		<p>
			The tools on this page are broken up into different categories.  The categories represent how a tool will be used.
			<br>
			The categories are:
			<br>

			<div class="list">
				<ul>
					<li>Physical Tools</li>
					<br>
					&emsp;The physical Tools category defines tools designed to test entry points into different facilities, making fake employee ID's, and accessing restricted areas in a building.
					<br>
					<br>
	
					<li>Software</li>
					<br>
					&emsp;The software category defines software that can be used to investigate known vulnerabilities and further access into machines.
					<br>
					<br>
	
					<li>Hotplug Attacks</li>
					<br>
					&emsp;The hotplug attack category defines physical devices that can be plugged into machines that exfiltrate data and control different aspects of that machine
					<br>
					<br>
	
					<li>Man-in-the-Middle Attacks</li>
					<br>
					&emsp;The man-in-the-middle attack category defines devices that can be planted into the ports of machines that will capture data for later use.  This data can either be sent to an outside server or saved locally to be picked up at a later date.
					<br>
					<br>
	
					<li>Wireless Attacks</li>
					<br>
					&emsp;The wireless attack category defines tools that can be used when accessing wifi networks and capturing wirelessly transmitted credentals.
				</ul>
			</div>
		</p>
	</div>

</body>
</html>