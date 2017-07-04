<?php 
session_start();
// Set variable for session
$email = '';
$pass = '';
$temp_pass = '';
$user_id = '';

// Autoloads class from the system
function __autoload($class) {
	$filename = "../controller/".$class.".php";
	include_once($filename);
}


if (isset($_POST['email']) && isset($_POST['password'])) {

	$email = trim($_POST['email']);
	$pass = trim($_POST['password']);
	$pass = md5($pass);



	try {

		$user = new Employee;
		
		$user_result = $user->login($email, $pass);

		foreach($user_result as $r) {
			$user_id.= $r[0]['id'];
			$temp_pass.= $r[0]['pass'];
		}

		if ($temp_pass == $pass) {

			$_SESSION['user_session'] = $user_id;
			$date = date_create();
			$log_date = date_format($date, 'Y-m-d H:i:s');
			$user->login_detail($user_id, $login_date);

			header("location: http://".$_SERVER['SERVER_NAME']."/nissan/index.php");

		} else {
			echo "email or password does not exists.";
		}


	}  catch(PDOEXCEPTION $e) {
		$e->getMessage();
	}
} 



/*if (isset($_POST['btn-login'])) {
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$password = md5($password);

	try {
		$user->login("employee", $email, $password);
	}
}*/
