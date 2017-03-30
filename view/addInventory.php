	<?php
	include('header.php'); 
	function __autoload($class) {
		$filename ="../controller/" .$class. ".php";
		include_once($filename);
	}

	$obj = new Inventory;

	if(isset($_REQUEST['insert'])) {
		extract($_REQUEST);

		if($obj->insertData($name, $label, $model_name, $model_number, $serial_code, $po_no, $date_accquired, $remarks, "item")) {
			header("location:inventory.php?status_insert=success");
		}
	}
echo @<<<show
<div class="div-center">
<form action="addInventory.php" method="post">
<table width="400" class="table-bordered table-custom">
<tr>
	<td colspan="10"><h3>Add Inventory</h3></td>
</tr>
<tr>
<th scope="row">Name</th>
<td><input type="text" name="name" value="$name"></td>
</tr>
<tr>
<th scope="row">Label</th>
<td><input type="text" name="label" value="$label"></td>
</tr>
<tr>
<th scope="row">Model Name</th>
<td><input type="text" name="model_name" value="$model_name"></td>
</tr>
<tr>
<th scope="row">Model Number</th>
<td><input type="text" name="model_number" value="$model_number"></td>
</tr>
<tr>
<th scope="row">Serial Code</th>
<td><input type="text" name="serial_code" value="$serial_code"></td>
</tr>
<tr>
<th scope="row">PO Number</th>
<td><input type="text" name="po_no" value="$po_no"></td>
</tr>
<tr>
<th scope="row">Date Accquired</th>
<td><input type="date" id="Date" name="date_accquired" value="$date_accquired"></td>
</tr>
<tr>
<th scope="row">Remarks</th>
<td><input type="text" name="remarks" value="$remarks"></td>
</tr>
<tr>
<td><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
<td><button class="btn btn-danger"><a href="inventory.php">Cancel</a></button></td>
</tr>
</table>
</form>
</div>		
</div>
show;
