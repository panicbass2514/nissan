<?php  

//Includes all the header menu and functions
include('header.php');
include('supplier_backend.php');

//Checks if the key is requested or set
if (!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

//Insert Data Verification
if (isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	$sup_types = "<pre>".implode(",\n",$sup_type)."</pre>";
	if ($supplier->insertData($sup_types, $sup_name, $sup_address_1, $sup_address_2, $sup_zipcode, $sup_telephone, $sup_cphone, $sup_faxphone, $sup_contact_person, 'supplier')) {

		header('location:supplier.php?status_insert=success');
	}
}

//Update Data Verification
if (isset($_REQUEST['update'])) {
	extract($_REQUEST);
	if ($supplier->udpateData($sup_type, $sup_name, $sup_address_1, $sup_address_2, $sup_zipcode, $sup_telephone, $sup_cphone, $sup_faxphone, $sup_contact_person, 'supplier')) {

		header('location:supplier.php?status=success');
	}
}

// Delete Data
if (isset($_REQUEST['del_id'])) {
	if ($nissan->deleteData($_REQUEST['del_id'], 'supplier')) {
		header('location:supplier.php');
	}
}
?>
<div class="modal fade" id="supplier_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Supplier</h4>
			</div>
			<div class="modal-body">
				<form action="supplier.php" id="supplier_form" class="form-group" method="POST">
					<table class="table-bordered table-custom" width="400">
						<tr>
							<th scope="row">Type</th>
							<td>
								<select class="form-control" name="sup_type[]" multiple="multiple">
									<option value="Computer Parts and Acesories">Computer Parts and Accessories</option>
									<option value="Printers and Cartridges">Printers and Cartridges</option>
									<option value="Phone Systems">Phone Systems</option>
								</select>
							</tr>
							<tr>
								<th scope="row">Name</th>
								<td><input class="form-control" type="text" name="sup_name" value=""></td>
							</tr>
							<tr>
								<th scope="row">Address 1</th>
								<td><input class="form-control" type="text" name="sup_address_1" value=""></td>
							</tr>
							<tr>
								<th scope="row">Address 2</th>
								<td><input class="form-control" type="text" name="sup_address_2" value=""></td>
							</tr>
							<tr>
								<th scope="row">Zipcode</th>
								<td><input class="form-control" type="text" name="sup_zipcode" value=""></td>
							</tr>
							<tr>
								<th scope="row">Telephone</th>
								<td><input class="form-control" type="text" name="sup_telephone" value=""></td>
							</tr>
							<tr>
								<th scope="row">Cellphone</th>
								<td><input class="form-control" type="text" name="sup_cphone" value=""></td>
							</tr>
							<tr>
								<th scope="row">Faxphone</th>
								<td><input class="form-control" type="text" name="sup_faxphone" value=""></td>
							</tr>
							<tr>
								<th scope="row">Contact Person</th>
								<td><input class="form-control" type="text" name="sup_contact_person" value=""></td>
							</tr>
							<tr>
								<td><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
								<td><button class="btn btn-danger"><a href="supplier.php">Cancel</a></button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#supplier_form").on("submit", function(e) {
				$("#supplier_dialog .modal-header .modal-title").html("Success");
			});
		});
	</script>