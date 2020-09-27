<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href='style.css?version=1'>
	</head>
	<body>
			<nav class="navtop">
			<div class="center">
				<h1>King Faisal Hospital</h1>
			</div>
		</nav>

<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// First we check if the email and code exists...
if (isset($_POST['email'], $_POST['code'])) {
	if ($stmt = $con->prepare('SELECT * FROM accounts WHERE email = ? AND activation_code = ?')) {
		$stmt->bind_param('ss', $_POST['email'], $_POST['code']);
		$stmt->execute();
		// Store the result so we can check if the account exists in the database.
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			// Account exists with the requested email and code.
			if ($stmt = $con->prepare('UPDATE accounts SET activation_code = ? WHERE email = ? AND activation_code = ?')) {
				// Set the new activation code to 'activated', this is how we can check if the user has activated their account.
				$newcode = 'activated';
				$stmt->bind_param('sss', $newcode, $_POST['email'], $_POST['code']);
				$stmt->execute();
				echo '<div class="center"><h1>Your account is now activated, you can now login!</h1><br><a href="index.html">Login</a></div>';
			}
		} else {
			echo '<div class="center">
			<h1>The account is already activated or doesn\'t exist!</h1>
			<br/>
			<h2><a href="index.html">Login here</a> or <a href="register.html">Create an account</a></h2>
			</div>' ;
		}
	}
}

if (is_null($_POST["email"])){
 echo '<h2><a href="index.html">Login here</a> or <a href="register.html">Create an account</a></h2>
			</div>' ;
}

?>
</body>
</html>