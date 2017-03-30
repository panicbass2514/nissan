<?php 


	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "nissan";

	try {
		$DB_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOExecption $e) {
		echo $e->getMessage();
	}

	include_once 'Paging.php';
	$paginate = new Paging($DB_con);