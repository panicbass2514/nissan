<?php
// Autoloads class from the system
function __autoload($class) {
	$filename = "../controller/".$class. ".php";
	include_once($filename);
}
// Instances from the classes
$supplier = new Supplier;
$nissan = new NissanDatabase;
$self = "http://localhost/nissan/view/supplier.php";
// Limit options on the table
$limit = 5;

$value = $nissan->showData("supplier", $limit);
$rows = $nissan->getNumRows("supplier");

// Checks the key provided
if(isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

?>
<tr>
	<td colspan="9"><h3>Suppliers</h3></td>
	<td colspan="1">
		<button type="button" data-toggle="modal" data-target="#supplier_dialog" class="btn btn-primary">Add Supplier</button>
	</td>
</tr>
<tr>
	<th>Type</th>
	<th>Name</th>
	<th>Address 1</th>
	<th>Address 2</th>
	<th>Zipcode</th>
	<th>Telephone</th>
	<th>Cellphone</th>
	<th>Faxphone</th>
	<th>Contact Person</th>
	<th>Action</th>
</tr>
<?php
if(!empty($key) && isset($key)) {

	$key_result = $supplier->searchData($key);
	foreach($key_result as $k) {
		extract($k);
		echo "
		<tr>
			<td>$sup_type</td>
			<td>$sup_name</td>
			<td>$sup_address_1</td>
			<td>$sup_address_2</td>
			<td>$sup_zipcode</td>
			<td>$sup_telephone</td>
			<td>$sup_cphone</td>
			<td>$sup_faxphone</td>
			<td>$sup_contact_person</td>
			<td>
				<button onclick='supplierUpdate(\"$id\", \"$sup_type\", \"$sup_name\", \"$sup_address_1\", \"$sup_address_2\", \"$sup_zipcode\", \"$sup_telephone\", \"$sup_cphone\", \"$sup_faxphone\", \"$sup_contact_person\")' id='btn_update' data-toggle='modal' data-target='#supplier_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
				<button onclick='supplierDelete(\"$sup_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/supplier.php?del_id=$id' data-toggle='modal' data-target='#supplier_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
			</td>

		</tr>
		";  
	}
} else {
	foreach($value as $v) {
		extract($v);
		echo "
		<tr>
			<td>$sup_type</td>
			<td>$sup_name</td>
			<td>$sup_address_1</td>
			<td>$sup_address_2</td>
			<td>$sup_zipcode</td>
			<td>$sup_telephone</td>
			<td>$sup_cphone</td>
			<td>$sup_faxphone</td>
			<td>$sup_contact_person</td>
			<td>
				<button onclick='supplierUpdate(\"$id\", \"$sup_type\", \"$sup_name\", \"$sup_address_1\", \"$sup_address_2\", \"$sup_zipcode\", \"$sup_telephone\", \"$sup_cphone\", \"$sup_faxphone\", \"$sup_contact_person\")' id='btn_update' data-toggle='modal' data-target='#supplier_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
				<button onclick='supplierDelete(\"$sup_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/supplier.php?del_id=$id' data-toggle='modal' data-target='#supplier_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
			</td>

		</tr>
		";  
	}
	if ($rows > 0) {
		?>
		<tr>
			<td colspan="11">
				<?php 
				$total_no_of_pages = ceil($rows/5);

				$current_page = 1;
				if (isset($_GET['page_no'])) {
					$current_page = $_GET['page_no'];
				}
				if ($current_page != 1) {
					$previous = $current_page - 1;
					echo "<a class='btn btn-primary' href='".$self."'?page_no=1'>First</a>&nbsp;&nbsp";
					echo "<a class='btn btn-primary' href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
				}
				for ($i = 1; $i <= $total_no_of_pages; $i++) {
					if ($i == $current_page) {
						echo "<strong><a class='btn btn-primary' href='".$self."?page_no=".$i."'>".$i."</a></strong>&nbsp;&nbsp;";
					} else {
						echo "<a class='btn btn-primary' href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp";
					}
				}
				if($current_page != $total_no_of_pages) {
					$next = $current_page + 1;
					echo "<a class='btn btn-primary' href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
					echo "<a class='btn btn-primary' href='".$self."?page_no=".$total_no_of_pages."'>Last</a>";
				}
				?></td>
			</tr></table><?php
		}
	} 
	?>
	<script>
		
		function supplierUpdate(id, sup_type, sup_name, sup_address_1, sup_address_2, sup_zipcode, sup_telephone, sup_cphone, sup_faxphone, sup_contact_person ) {

			$('.modal-title').html('Update Suplier');
			$('#td_update').html("<input type='submit' name='update' value='Update' class='btn btn-primary'>");
			$('input[name="id"').val(id);
			//$('select[name="sup_type[]"').val(sup_type);
			$('input[name="sup_name"]').val(sup_name);
			$('input[name="sup_address_1"]').val(sup_address_1);
			$('input[name="sup_address_2"]').val(sup_address_2);
			$('input[name="sup_zipcode"]').val(sup_zipcode);
			$('input[name="sup_telephone"]').val(sup_telephone);
			$('input[name="sup_cphone"]').val(sup_cphone);
			$('input[name="sup_faxphone"]').val(sup_faxphone);
			$('input[name="sup_contact_person"]').val(sup_contact_person);

		}
		function employeeDelete(cpu_name) {
			$('.modal-header').html("<h4 style='text-align: center'>Are you sure you want to delete '"+sup_name+"'</h4>");
		}
	</script>