<?php 
include('header.php');

function __autoload($class) {
	$filename ="../controller/" .$class. ".php";
	include_once($filename);
}
$obj = new NissanDatabase;
$issues = new Issues;
$value = $obj->showData("issues", 5);
$rows = $obj->getNumRows("issues");
$self = $_SERVER['PHP_SELF'];

if(isset($_REQUEST['insert'])) {
	extract($_REQUEST);

	if($issues->insertData($issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, $update_status, "issues")) {
		header("location:issues.php?status_insert=success");
	}
}

/*if (isset($_REQUEST['status'])) {
	echo "Your Data Successfully Updated";
}

if (isset($_REQUEST['status_insert'])) {
	echo "You Data Successfully Inserted";
}

if (isset($_REQUEST['del_id'])) {
	if ($obj->deleteData($_REQUEST['del_id'], "issues")) {
		echo "You Data Has Succecssfully Deleted";
	}
}*/
?>
<tr>
	<td colspan="13"><h3>Issues</h3></td>
	<th colspan="1" >
		<button type="button" data-toggle="modal" data-target="#issues_dialog" class="btn btn-primary" title="Add Issues">Add Issues</button>
	</th>
</tr>
<tr>
	<th scope="col">ID</th>
	<th scope="col">Issue Concern</th>
	<th scope="col">Description</th>
	<th scope="col">Module Location</th>
	<th scope="col">Date Reported</th>
	<th scope="col">Status</th>
	<th scope="col">User</th>
	<th scope="col">QA in Charge</th>
	<th scope="col">CAS Reference No</th>
	<th scope="col">Date Closed</th>
	<th scope="col">Reason of Error</th>
	<th scope="col">Remarks</th>
	<th scope="col">Update Status</th>
	<th width="130" scope="col">Action</th>
</tr>
<?php 
foreach($value as $v) {
	extract($v);
	echo "
	<tr >
		<td>$id</td>
		<td>$issue_concern</td>
		<td>$description</td>
		<td>$module_location</td>
		<td>$date_reported</td>
		<td>$status</td>
		<td>$user</td>
		<td>$qa_in_charge</td>
		<td>$cas_reference_no</td>
		<td>$date_closed</td>
		<td>$reason_of_error</td>
		<td>$remarks</td>
		<td>$update_status</td>
		<td>
			<button class='btn btn-danger' title='Update'><a href='updateIssues.php?id=$id' hover='update'><span class='glyphicon glyphicon-wrench'></a></button>
		</td>
	</tr>
	";	
}
if ($rows > 0) {
	?><tr>
	<td colspan="14">
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
	</tr><?php
}
?>
</table>
</main>
<div class="modal fade" id="issues_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Issues</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="issues_form" action="issues.php" method="POST">

					<table width="400" class="table-bordered table-custom">
						<tr>
							<th scope="row">Issue Concern</th>
							<td><input class="form-control" type="text" name="issue_concern" value="<?php $issue_concern ?>"></td>
						</tr>
						<tr>
							<th scope="row">Description</th>
							<td><input class="form-control"  type="text" name="description" value="<?php $description ?>"></td>
						</tr>
						<tr>
							<th scope="row">Module Location</th>
							<td><input class="form-control"  type="text" name="module_location" value="<?php $module_location ?>"></td>
						</tr>
						<tr>
							<th scope="row">Date Reported</th>
							<td><input class="form-control"  type="date" name="date_reported" value="<?php $date_reported ?>"></td>
						</tr>
						<tr>
							<th scope="row">Status</th>
							<td><input class="form-control"  type="text" name="status" value="<?php $status ?>"></td>
						</tr>
						<tr>
							<th scope="row">User</th>
							<td><input class="form-control"  type="text" name="user" value="<?php $user ?>"></td>
						</tr>
						<tr>
							<th scope="row">QA in Charge</th>
							<td><input class="form-control"  type="text" name="qa_in_charge" value="<?php $qa_in_charge ?>"></td>
						</tr>
						<tr>
							<th scope="row">CAS Reference No</th>
							<td><input class="form-control"  type="text" name="cas_reference_no" value="<?php $cas_reference_no ?>"></td>
						</tr>
						<tr>
							<th scope="row">Date Closed</th>
							<td><input class="form-control"  type="date" name="date_closed" value="<?php $date_closed ?>"></td>
						</tr>
						<tr>
							<th scope="row">Reason of Error</th>
							<td><input class="form-control"  type="text" name="reason_of_error" value="<?php $reason_of_error ?>"></td>
						</tr>
						<tr>
							<th scope="row">Remarks</th>
							<td><input class="form-control"  type="text" name="remarks" value="<?php $remarks ?>"></td>
						</tr>
						<tr>
							<th scope="row">Update Status</th>
							<td><input class="form-control"  type="text" name="update_status" value="<?php $update_status ?>"></td>
						</tr>
						<tr>
							<td><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
							<td><button class="btn btn-danger"><a href="issues.php">Cancel</a></button></td>
						</tr>
					</table>
				</form>
			</div>
<!-- 			<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="button" id="submitForm" class="btn btn-default">Send</button>
</div> -->
</div>
</div>
</div>

<script>
	/*Must apply only after HTML has loaded*/
	$(document).ready(function () {
		$("#issues_form").on("submit", function(e) {
			$('#workstation_dialog .modal-header .modal-title').html("Success");

		});

	});
</script>