<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: index.html');
?><?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>