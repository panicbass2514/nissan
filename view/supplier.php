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

		header('location:supplier.php');
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

<!-- Modal for delete -->
<div class="modal fade" id="supplier_delete_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<a href="#" class="btn btn-danger btn-ok">Delete</a>
				<a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal for add/update -->
<div class="modal fade" id="supplier_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Supplier</h4>
			</div>
			<div class="modal-body">
				<form action="supplier.php" id="supplier_form" class="form-group" method="POST">
				<input type="hidden" name="id" value="">
					<table class="table-custom" width="400">
						<tr>
							<th>Type</th>
							<td>
								<select class="form-control" name="sup_type[]" multiple="multiple">
									<option value="Computer Parts and Acesories">Computer Parts and Accessories</option>
									<option value="Printers and Cartridges">Printers and Cartridges</option>
									<option value="Phone Systems">Phone Systems</option>
								</select>
							</tr>
							<tr>
								<th>Name</th>
								<td><input class="form-control" type="text" name="sup_name" value=""></td>
							</tr>
							<tr>
								<th>Address 1</th>
								<td><input class="form-control" type="text" name="sup_address_1" value=""></td>
							</tr>
							<tr>
								<th>Address 2</th>
								<td><input class="form-control" type="text" name="sup_address_2" value=""></td>
							</tr>
							<tr>
								<th>Zipcode</th>
								<td><input class="form-control" type="text" name="sup_zipcode" value=""></td>
							</tr>
							<tr>
								<th>Telephone</th>
								<td><input class="form-control" type="text" name="sup_telephone" value=""></td>
							</tr>
							<tr>
								<th>Cellphone</th>
								<td><input class="form-control" type="text" name="sup_cphone" value=""></td>
							</tr>
							<tr>
								<th>Faxphone</th>
								<td><input class="form-control" type="text" name="sup_faxphone" value=""></td>
							</tr>
							<tr>
								<th>Contact Person</th>
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
			$('#button_delete').click(function() {
				var idx = $(this).val();
				$('.modal-header').val(idx);
			});
			$('#supplier_delete_form').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
			});
		});
	</script>