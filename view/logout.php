<?php
session_start();
echo $_SESSION['user_session'];

function __autoload($class) {
	$filename = "../controller/".$class.".php";
	include_once($filename);
}

$user = new Employee;

$user_id = $_SESSION['user_session'];

$date = date_create();
$log_date = date_format($date, 'Y-m-d H:i:s');
$user->logout_detail($user_id, $logout_date);


// Unset all of the session variables.

$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
		);
}

session_destroy();

header("location: http://".$_SERVER['SERVER_NAME']."/nissan/index.php");
?>