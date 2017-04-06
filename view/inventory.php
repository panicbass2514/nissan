<?php 
include('header.php');

function __autoload($class) {
	$filename ="../controller/" .$class. ".php";
	include_once($filename);
}
$obj = new Inventory;
$value = $obj->showData("item", 5);
$rows = $obj->getNumRows("item");
$self = $_SERVER['PHP_SELF'];
?>
		<tr>
			<td colspan="9"><h3>Inventories</h3></td>
			<td colspan="1" >
				
					<button class="btn btn-primary" title="Add Inventory"><a href="addInventory.php">Add Inventory</a></button>
				
			</td>
		</tr>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Label</th>
			<th scope="col">Model Name</th>
			<th scope="col">Model Number</th>
			<th scope="col">Serial Code</th>
			<th scope="col">PO Number</th>
			<th scope="col">Date Accquired</th>
			<th scope="col">Remarks</th>
			<th width="130" scope="col">Action</th>
		</tr>
		<?php 
		foreach($value as $v) {
			extract($v);
			echo "
			<tr >
				<td>$id</td>
				<td>$name</td>
				<td>$label</td>
				<td>$model_name</td>
				<td>$model_number</td>
				<td>$serial_code</td>
				<td>$po_no</td>
				<td>$date_accquired</td>
				<td>$remarks</td>
				<td>
					<button class='btn btn-danger' title='Update'><a href='updateInventory.php?id=$id' hover='update'><span class='glyphicon glyphicon-wrench'></a></button>&nbsp;&nbsp;
					<button class='btn btn-danger' title='Delete'><a href='inventory.php?del_id=$id'><span class='glyphicon glyphicon-remove'></span></a></button>
				</td>
			</tr>
			";	
		}
		if ($rows > 0) {
			?><tr>
			<td colspan="10"><?php 
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
			</tr><?php
		}
		?>
	</table>
</div>