<?php

function __autoload($class) {
	$filename = "../controller/".$class. ".php";
	include_once($filename);
}

$supplier = new Supplier;
$nissan = new NissanDatabase;
$self = "http://localhost/nissan/view/supplier.php";
$limit = 5;

$value = $nissan->showData("supplier", $limit);
$rows = $nissan->getNumRows("supplier");

if(isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

?>
<table class="result well table-hover table-custom table-bordered ">
	<tr>
	<td colspan="10"><h3>Suppliers</h3></td>
		<td colspan="1">
			<button type="button" data-toggle="modal" data-target="#supplier_dialog" class="btn btn-primary">Add Supplier</button>
		</td>
	</tr>
	<tr>
		<th>ID</th>
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
				<td>$id</td>
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
					<button type='button' data-toggle='modal' data-target='#supplier_dialog' class='btn btn-danger'><a href='#'><span class='glyphicon glyphicon-wrench'>Modal</span></a></button>&nbsp;&nbsp;
					<button class='btn btn-danger'><a href='updateSupplier.php?id=$id'><span class='glyphicon glyphicon-wrench'>Link</span></a></button>&nbsp;&nbsp;
					<button class='btn btn-danger'><a href='supplier.php?del_id=$id'><span class='glyphicon glyphicon-remove'></span></a></button>
				</td>

			</tr>
			";  
		}
	} else {
		foreach($value as $v) {
			extract($v);
			echo "
			<tr>
				<td>$id</td>
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
					<button class='btn btn-danger'><a href='updateSupplier.php?id=$id'><span class='glyphicon glyphicon-wrench'>Link</span></a></button>&nbsp;&nbsp;
					<button class='btn btn-danger'><a href='supplier.php?del_id=$id'><span class='glyphicon glyphicon-remove'></span></a></button>
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
				</tr></table></main><?php
			}
		} 
		?>