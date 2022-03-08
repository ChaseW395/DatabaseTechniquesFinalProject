<?php
	require('../../mysqli_connect.php');
	session_start();

	if(empty($_SESSION)) {
		header('Location: /williams_final_project/login.php?error=You Need to Login First');
	}
	$userID = $_SESSION['id'];
	$sql = "SELECT AccountType FROM users WHERE UserID=$userID";
	$r = mysqli_query($connect, $sql);
	if($r) {
		if(mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array($r);
			$accountType = $row['AccountType'];

			if ($accountType == 1) {
				header('Location: /williams_final_project/user_account.php?error=Must be Admin to Access');
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
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
				<li><a href="user_account.php">Account</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>

	<h2 class="bodytitle">Admin Panel</h2>
	<div class="body_admin">

		<?php 
		if(isset($_GET['success'])) {
			echo '<div class="success">';
			echo '<p class="success_update">' . $_GET['success'] . '</p>';
			echo '</div>';
		} 
		?>
		<!-- This is where all of the user accounts will be displayed -->
			<table class="admin_control">
				<tr>
					<th>User's Name</th>
					<th>User's Email</th>
					<th>User's Tool Preference</th>
					<th>Delete User</th>
				</tr>
				
				<?php

					$sql = "SELECT * FROM users";
					$r = mysqli_query($connect, $sql);
					if($r) {
						while($row = mysqli_fetch_array($r)) {
							$name = $row['Name'];
							$email = $row['email'];
							echo '<tr>';
							echo "<td>$name</td>";
							echo "<td>$email</td>";

							// Tool Preference
							$preference = $row['ToolPreferenceNO'];

							$sql2 = "SELECT CategoryName FROM tool_categories WHERE CategoryNumber=$preference";
							$r2 = mysqli_query($connect, $sql2);
							$row2 = mysqli_fetch_array($r2);

							$prefName = $row2['CategoryName'];

							echo "<td>$prefName</td>";

							echo '
							<td>
								<form action="delete_user.php" method="post">';

							$userID = $row['UserID'];
							echo "<button class='deleteUser' name='delete' type='submit' value=$userID>Delete</button>";

							echo '
								</form>
							</td>
							';

							echo "</tr>";
						}
					}
					mysqli_close($connect);
				?>
			</table>
				

	</div>

</body>
</html>