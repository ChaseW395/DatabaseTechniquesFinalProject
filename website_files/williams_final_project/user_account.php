<?php
	session_start();
	if(empty($_SESSION)) {
		header('Location: /williams_final_project/login.php?error=You Need to Login First');
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>User Account Settings</title>
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
				<li>Account</li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<h2 class="bodytitle">User Account Settings</h2>
	<div class="body">

		<?php 

			if(isset($_GET['error'])) {
				echo '<div class="bodyerror">';
				echo '<p class=error>' . $_GET['error'] . '</p>';
				echo '</div>';
			}

			if(isset($_GET['success'])) {

				echo '<div class="success">';
				echo '<p class="success_update">' . $_GET['success'] . '</p>';
				echo '</div';
			}
		?>

		<p>
			<!-- This will only show up to admin accounts once I figure out cookies -->
			<?php
				require('../../mysqli_connect.php');
				$id = $_SESSION['id'];
				$sql = "SELECT * FROM users WHERE UserID='$id';";
				$r = mysqli_query($connect, $sql);
				if(mysqli_num_rows($r) == 1) {
					$row = mysqli_fetch_array($r);
					if ($row['AccountType'] == 2) {
						echo '<a href="admin_control.php">Admin Control Panel</a>';
					}
					else {
						echo "<p>You are a User</a>";
					}
					echo '<br><br>';
					$name = $row['Name'];
					$email = $row['email'];
					$preference = $row['ToolPreferenceNO'];
					echo "Name: $name";
					echo '<br>';
					echo "Email: $email";
					echo "<br>";

					$sql2 = "SELECT CategoryName FROM tool_categories WHERE CategoryNumber=$preference";
					$r2 = mysqli_query($connect, $sql2);
					if(mysqli_num_rows($r2) == 1) {
						$row2 = mysqli_fetch_array($r2);
						$prefName = $row2['CategoryName'];
						echo "Tool Preference: $prefName";
					}
					
				}
			?>
		</p>
		<p>
			<!-- update information -->
			<form action="update.php" method="post">
				<label for="email">Change Email:</label>
			<br>
			<input class="textbox" type="text" name="email" placeholder="example@example.com">
			<br>
			<label for="name">Change Name:</label>
			<br>
			<input class="textbox" type="text" name="name" placeholder="John Doe">
			<br>
			<label for="password">Change Password:</label>
			<br>
			<input class="textbox" type="password" name="password">
			<br>
			<label for="tool_preference">Change Tool Preference:</label>
			<br>
			<select name="tool_preference" id="preference">
				<option value="0">Select Preference</option>
				<option value="1">No Preference</option>
				<option value="2">Physical Tools</option>
				<option value="3">Software</option>
				<option value="4">Hotplug Attacks</option>
				<option value="5">Man-in-the-Middle Attacks</option>
				<option value="6">Wireless Attacks</option>
			</select>
			<br>
			<input class="submit" type="submit" value="Submit">
			</form>
			<br>
			<br>
			<form action="deleteAccount.php" method="post">
				<?php

					$usrID = $_SESSION['id'];
					echo "<button class='deleteUserAcc' name='delete' type='submit' value='$usrID'>Delete Account</button>";

				?>
			</form>

		</p>
		<p>

			<h2>Order History</h2>

			<div class="order">

				<h3>Product Name</h3>
				<h3>Amount Bought</h3>

			</div>

			<?php 

				$sql = "SELECT * FROM orders WHERE UserID=$id";

				$r = mysqli_query($connect, $sql);

				if($r) {
					while($row = mysqli_fetch_array($r)) {
						echo '<div class="order">';

						$prodID = $row['ProductNumber'];
						$amount = $row['ItemAmount'];

						$sql2 = "SELECT ProductName FROM products WHERE ProductNumber=$prodID";

						$r2 = mysqli_query($connect, $sql2);

						if($r2) {
							if(mysqli_num_rows($r2) == 1) {
								$row2 = mysqli_fetch_array($r2);
								$prodName = $row2['ProductName'];
								
							}
						}

						echo "<p>$prodName</p>";
						echo '<p>-</p>';
						echo "<p>$amount</p>";

						echo "</div>";

					}
				}
				mysqli_close($connect);
			?>

		</p>
	</div>

</body>
</html>