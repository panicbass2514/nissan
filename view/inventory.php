<?php 
include('header.php');
include('inventory_backend.php');

// Checks if the key is requested or set
if(!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

// Insert Data Verification
if(isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	if($inventory->insertData($name, $label, $model_name, $model_number, $serial_code, $po_no, $date_accquired, $remarks, "item")) {
		header("location:inventory.php?status_insert=success");
	}
}

// Update Data Verification
if(isset($_REQUEST['update'])) {
	extract($_REQUEST);
	if($inventory->updateData($id, $name, $label, $model_name, $model_number, $serial_code, $po_no, $date_accquired, $remarks, "item"))
	{
		header("location:invenetory.php?status=success");
	}
}
?>
<!-- <div class="modal fade" id="inventory_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add inventory</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="inventory_form" action="inventory.php" method="POST">

					<table width="400" class="table-bordered table-custom">
						<tr>
							<th scope="row">CPU Name</th>
							<td><input class="form-control" type="text" name="cpu_name" value="<?php $cpu_name ?>"></td>
						</tr>
						<tr>
							<th scope="row">Employee</th>
							<td><input class="form-control" type="text" name="employee" value="<?php $employee ?>"></td>
						</tr>
						<tr>
							<th scope="row">Blocked Sites</th>
							<td><input class="form-control" type="text" name="blocked_sites" value="<?php $blocked_sites ?>"></td>
						</tr>
						<tr>
							<td><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
							<td><button class="btn btn-danger"><a href="inventory.php">Cancel</a></button></td>
						</tr>
					</table>
				</form>
			</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="button" id="submitForm" class="btn btn-default">Send</button>
</div>
</div>
</div>
</div> -->