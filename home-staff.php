<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>King Faisal - Staff Portal</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			<div>
				<p>What do you want to do?</p>
				<input type="radio" id="male" name="gender" value="male">
				<label for="male">View a patient's records</label><br>

				<input type="radio" id="female" name="gender" value="female">
				<label for="female">Assign a patient to a doctor</label><br>

				<input type="radio" id="other" name="gender" value="see">
				<label for="other">Modify doctor-patients assignments</label><br>

				<input type="radio" id="other" name="gender" value="other">
				<label for="other">Delete an assignment</label>

			</div>
		</div>
	</body>
</html>