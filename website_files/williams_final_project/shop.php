<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Shop</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="titlebar">
		<h1>RedTeam Market</h1>

		<div class="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li>Shop</li>
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

	<h2 class="bodytitle">Shop</h2>
	<div class="body">
		<?php
			if(isset($_GET['success'])) {
				echo'<div class="success">';
				echo '<p class="success_login_out">' . $_GET['success'] . '</p>';
				echo '</div>';
			}

			if(isset($_GET['error'])) {
				echo '<div class="usererror">';
				echo '<p class="logged_in_error">' . $_GET['error'] . '</p>';
				echo '</div>';
			}

			require('../../mysqli_connect.php');
			if(!empty($_SESSION)) {


				$usrID = $_SESSION['id'];

				$sql = "SELECT ToolPreferenceNO FROM users WHERE UserID=$usrID";

				$r = mysqli_query($connect, $sql);

				if($r) {
					if(mysqli_num_rows($r) == 1) {
						$row = mysqli_fetch_array($r);
						$preference = $row['ToolPreferenceNO'];
					}
				}

				if($preference != 1) {
					echo '<h4>Preferred Items</h4>';
					$sql = "SELECT * FROM products WHERE CategoryNumber=$preference";
					$r = mysqli_query($connect, $sql);

					if($r) {
						while ($row = mysqli_fetch_array($r)) {

							echo "<div class='shop_item'>";
							echo "<h3>" . $row["ProductName"] . "</h3>";
							echo "<p class='description'>" . $row["ProductDescription"] . "</p>";
							echo "<p>\$" . $row["Cost"] . "</p>";
		
							$type = $row["CategoryNumber"];
		
							if($type == 2) {
								echo '<p>Physical</p>';
							}
							elseif($type == 3) {
								echo '<p>Software</p>';
							}
							elseif($type == 4) {
								echo '<p>Hotplug</p>';
							}
							elseif($type == 5) {
								echo '<p>Man-in-the-Middle</p>';
							}
							elseif($type == 6) {
								echo '<p>Wireless</p>';
							}
		
							$prodID = $row['ProductNumber'];
		
							echo "
							<form action='buy.php' method='post'>
								<label for='amount'>Amount:</label>
								<input class='amount' type='text' name='amount' id='amount'>
								<button class='shop_submit' type='submit' name='product' value='$prodID'>Buy</button>
							</form>
							";
							echo "</div>";

						}


					}

					echo '<h4>Other Items </h4>';

					$sql = "SELECT * FROM products WHERE CategoryNumber!=$preference";
					$r = mysqli_query($connect, $sql);
					if($r) {
						while($row = mysqli_fetch_array($r)) {
							echo "<div class='shop_item'>";
							echo "<h3>" . $row["ProductName"] . "</h3>";
							echo "<p class='description'>" . $row["ProductDescription"] . "</p>";
							echo "<p>\$" . $row["Cost"] . "</p>";
		
							$type = $row["CategoryNumber"];
		
							if($type == 2) {
								echo '<p>Physical</p>';
							}
							elseif($type == 3) {
								echo '<p>Software</p>';
							}
							elseif($type == 4) {
								echo '<p>Hotplug</p>';
							}
							elseif($type == 5) {
								echo '<p>Man-in-the-Middle</p>';
							}
							elseif($type == 6) {
								echo '<p>Wireless</p>';
							}
		
							$prodID = $row['ProductNumber'];
		
							echo "
							<form action='buy.php' method='post'>
								<label for='amount'>Amount:</label>
								<input class='amount' type='text' name='amount' id='amount'>
								<button class='shop_submit' type='submit' name='product' value='$prodID'>Buy</button>
							</form>
							";
							echo "</div>";
						}
					}
				}
				else {
					$q = "SELECT * FROM products";
					$r = mysqli_query($connect, $q);
					if ($r) {
						while ($row = mysqli_fetch_array($r)) {
							echo "<div class='shop_item'>";
							echo "<h3>" . $row["ProductName"] . "</h3>";
							echo "<p class='description'>" . $row["ProductDescription"] . "</p>";
							echo "<p>\$" . $row["Cost"] . "</p>";
		
							$type = $row["CategoryNumber"];
		
							if($type == 2) {
								echo '<p>Physical</p>';
							}
							elseif($type == 3) {
								echo '<p>Software</p>';
							}
							elseif($type == 4) {
								echo '<p>Hotplug</p>';
							}
							elseif($type == 5) {
								echo '<p>Man-in-the-Middle</p>';
							}
							elseif($type == 6) {
								echo '<p>Wireless</p>';
							}
		
							$prodID = $row['ProductNumber'];
		
							echo "
							<form action='buy.php' method='post'>
								<label for='amount'>Amount:</label>
								<input class='amount' type='text' name='amount' id='amount'>
								<button class='shop_submit' type='submit' name='product' value='$prodID'>Buy</button>
							</form>
							";
							echo "</div>";
						}
					}
				}


			}
			else {

				$q = "SELECT * FROM products";
				$r = mysqli_query($connect, $q);
				if ($r) {
					while ($row = mysqli_fetch_array($r)) {
						echo "<div class='shop_item'>";
						echo "<h3>" . $row["ProductName"] . "</h3>";
						echo "<p class='description'>" . $row["ProductDescription"] . "</p>";
						echo "<p>\$" . $row["Cost"] . "</p>";
	
						$type = $row["CategoryNumber"];
	
						if($type == 2) {
							echo '<p>Physical</p>';
						}
						elseif($type == 3) {
							echo '<p>Software</p>';
						}
						elseif($type == 4) {
							echo '<p>Hotplug</p>';
						}
						elseif($type == 5) {
							echo '<p>Man-in-the-Middle</p>';
						}
						elseif($type == 6) {
							echo '<p>Wireless</p>';
						}
	
						$prodID = $row['ProductNumber'];
	
						echo "
						<form action='buy.php' method='post'>
							<label for='amount'>Amount:</label>
							<input class='amount' type='text' name='amount' id='amount'>
							<button class='shop_submit' type='submit' name='product' value='$prodID'>Buy</button>
						</form>
						";
						echo "</div>";
					}
				}
			}
			mysqli_close($connect);
		?>
	
	</div>

</body>
</html>