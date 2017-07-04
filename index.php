<?php

@session_start();

if (isset($_SESSION['user_session']) && !empty($_SESSION['user_session'])) {
	include('view/header.php');
	
} else {

	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_favicon.png">
		<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/navbar-fixed-side.css" type="text/css" rel="stylesheet">
		<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/custom.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/jquery-3.2.0.min.js"></script>
		<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/custom.js"></script>
		<title>Nissan IT Monitoring - Login</title>
	</head>
	<body>
		<main class="signin-form">
			<header class="masthead">
				<div class="centered">
					<div class="site-title">
						<img src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_logo_test.png" alt="">
						<span>IT Monitoring</span>
					</div><!-- .site-title -->
				</div><!-- .centered -->
			</header>
			<section class="container well form-container">
				<form action='<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/view/login.php' class="form-signin" method="post" id="login-form" >
					<h2 class="form-signin-heading">Nissan</h2><hr>

					<div id="error">
						<!-- error will be shown here! -->
					</div>

					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email address" name="email" id="email">
					</div>

					<div class="form-group">
						<input type="password" class="form-control " placeholder="Password" name="password" id="password">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
							Sign In
						</button>
					</div>
				</form>
			</section>
		</main>	
	</body>

	</html>
	<?php

	// $date = date_create();


	// echo date_format($date, 'Y-m-d H:i:s') . "\n";

	// date_timestamp_set($date, 1171502725);
	// echo date_format($date, 'U = Y-m-d H:i:s') . "\n";
}



?>