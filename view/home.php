<?php
// Header Include
include('header.php');

function __autoload($class) {
	$filename = '../controller/'.$class. '.php';
	include_once($filename);
}

$nissan = new NissanDatabase;
?>
<section class="section-update">
	<div class="update-item">
		<header class="item-header">
			<h4>Updates</h4>
			
			<ul>
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
</section>
