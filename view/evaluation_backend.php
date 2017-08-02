<?php 

// Autoloads class from the system

function __autoload($class) {
	$filename = "../controller/".$class.".php";
	include_once($filename);
}
// Instances from the classes
$evaluation = new Evaluation;
$nissan = new NissanDatabase;
$self = "http://it/nissan/view/evaluation.php";


?>
