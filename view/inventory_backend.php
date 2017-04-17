<?php 

function __autoload($class) {
	$filename = "../controller/".$class. ".php";
	include_once($filename);
}

$inventory = new Inventory;
$nissan = new NissanDatabase;
$self = "http://localhost/nissan/view/inventory.php";
$limit = 5;

$value = $nissan->showData("item", $limit);
$rows = $nissan->getNumRows("item");

if (isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}
?>
<tr>
	<td colspan="9"><h3>Inventories</h3></td>
	<td colspan="1" >

		<button type="button" data-toggle="modal" data-target="#inventory_dialog" class="btn btn-primary">Add Inventory</button>

	</td>
</tr>
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Label</th>
	<th>Model Name</th>
	<th>Model Number</th>
	<th>Serial Code</th>
	<th>PO Number</th>
	<th>Date Accquired</th>
	<th>Remarks</th>
	<th width="130">Action</th>
</tr>
<?php 
if (!empty($key) && isset($key)) {

	$key_result = $inventory->searchData($key);
	foreach($key_result as $k) {
		extract($k);
		echo "
		<tr>
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
} else {
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
        ?>
        <tr>
            <td colspan="5">
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