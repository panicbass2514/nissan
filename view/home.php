<?php
// Header Include
include('header.php');

function __autoload($class) {
	$filename = '../controller/'.$class. '.php';
	include_once($filename);
}

$nissan = new NissanDatabase;
?>
<!-- <section class="section-update">
	<div class="update-item">
		<header class="item-header">
			<h4>Updates</h4>
			
			<ul>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07242017.xls" download="inventory_07242017.xls">07/24/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07182017.xls" download="inventory_07182017.xls">07/18/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07102017.xls" download="inventory_07102017.xls">07/10/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07052017.xls" download="inventory_07052017.xls">07/05/2017</a></span>
				</li>
			</ul>
		</header>
	</div>
	<div class="update-item">
	</div>
	<div class="update-item">
		
	</div>
</section> -->
<div id="pricing" class="container-fluid">
	<!-- <div class="row slideanim"> -->
	<div class="col-sm-4 col-xs-12">
		<div class="panel panel-default text-center">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-lock logo-small" style="color: #fff"></span>
				<h3>Updates</h3>
			</div>
			<!-- <div class="panel-body">
				<p><strong>20</strong> Lorem</p>
				<p><strong>15</strong> Ipsum</p>
				<p><strong>5</strong> Dolor</p>
				<p><strong>2</strong> Sit</p>
				<p><strong>Endless</strong> Amet</p>
			</div>
			<div class="panel-footer">
				<h3>$19</h3>
				<h4>per month</h4>
				<button class="btn btn-lg">Sign Up</button>
			</div> -->
			<ul>
				<li>
					<span style="color: #ff0000;"> Updated </span><span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_08072017_updated.xls" download="inventory_08072017_updated.xls">08/07/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_08072017.xls" download="inventory_08072017.xls">08/07/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07312017.xls" download="inventory_07312017.xls">07/31/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07242017.xls" download="inventory_07242017.xls">07/24/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07182017.xls" download="inventory_07182017.xls">07/18/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07102017.xls" download="inventory_07102017.xls">07/10/2017</a></span>
				</li>
				<li>
					<span>Fast Moving Inventory Update - <a href="../res/downloads/inventory_07052017.xls" download="inventory_07052017.xls">07/05/2017</a></span>
				</li>
			</ul>
		</div>      
	</div>     
	<div class="col-sm-4 col-xs-12">
		<div class="panel panel-default text-center">
			<div class="panel-heading">
				<span style="color: #fff" class="glyphicon glyphicon-wrench logo-small"></span>
				<h3>Tools</h3>
			</div>
			<a href="evaluation.php">Performance Evaluation Form</a>
		</div>      
	</div>
	<div class="col-sm-4 col-xs-12">
		<div class="panel panel-default text-center">
			<div class="panel-heading">
				<span style="color: #fff" class="glyphicon glyphicon-calendar logo-small"></span>
				<h3>Events</h3>
			</div>
			<!-- <a href="evaluation.php">Events</a> -->
		</div>      
	</div>          

</div>