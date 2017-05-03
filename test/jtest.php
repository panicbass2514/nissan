<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_favicon.png">
	<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/bootstrap.css" type="text/css" rel="stylesheet">
	<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/custom.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/custom.js"></script>
	<title>MyJQuery</title>
</head>
<body>
	<p>This is a paragraph</p>
	<button>Button</button>
	<script>
		$(document).ready(function() {
			$("button").mouseenter(function() {
				$("p").text("Hello");
			});
			$("button").mouseleave(function() {
				$("p").text("Bye");
			});
		});
	</script>
</body>
</html>