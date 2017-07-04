<?php 

function __autoload($class) {
	$filename = "../controller/".$class. ".php";
	include_once($filename);
}

$inventory = new Inventory;
$nissan = new NissanDatabase;
$self = "http://it/nissan/view/inventory.php";
$limit = 5;

$value = $nissan->showData("item", $limit);
$rows = $nissan->getNumRows("item");

$inventoryJson = $inventory->getInventory("hr_inventory");

print($inventoryJson);

if (isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}
?>
<div id="inventory_list" ng-app="inventory_list" ng-controller="InventoryListCtrl">
	<input type="text" id="query" ng-model="query" />

	<select ng-model="orderList">
		<option value="name">By name</option>
		<option value="-age">Newest</option>
		<option value="age">Oldest</option>
	</select>
	<ul id="inventory_ul">
		<li ng-repeat="inventory in inventory_list | filter:query | orderBy: orderList">
			name : {{inventory.name}} <br/>
			procesor: {{inventory.procesor}} <br/>
			<div class="right top">{{inventory.age}}</div>
		</li>
	</ul>

	<span>Number of Inventory: {{inventory_list.length}}</span>
</div>
</table>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js'></script>


<script src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/inventory.js"></script>

