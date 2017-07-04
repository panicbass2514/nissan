<?php 
include('header.php');
include('issues_backend.php');


// Checks if the key is requested or set
if (!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

// Insert Data Verification
if (isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	if ($issues->insertData($issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, "issues")) {
		header("location:issues.php");
	}
}

// Update Data Verification
if (isset($_REQUEST['update'])) {
	extract($_REQUEST);
	if ($issues->updateData($id, $issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, "issues")) {
		header("location:issues.php");
	}
}

// Delete Data
if (isset($_REQUEST['del_id'])) {
	if ($nissan->deleteData($_REQUEST['del_id'], "issues")) {
		header("location:issues.php");
	}
}
?>

<!-- Modal for delete -->
<div class="modal fade" id="issue_delete_form" role="dialog">
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

<!-- Modal for udpate -->
<div class="modal fade" id="issue_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Issues</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="issues_form" action="issues.php" method="POST">
					<input type="hidden" name="id" value="">
					<table width="400" class="table-bordered table-custom">
						<tr>
							<th>Issue Concern</th>
							<td><input class="form-control" type="text" name="issue_concern" value=""></td>
						</tr>
						<tr>
							<th>Description</th>

							<td><textarea class="form-control" name="description" rows="3"></textarea></td>
						</tr>
						<tr>
							<th>Module Location</th>
							<td>
								<?php 
								$module_location = $issues->getModule("eric_module");
								echo '<select id="myselect" class="form-control" name="module_location"><option value="11">Select Module</option>';
								foreach($module_location as $m) {
									extract($m);
									echo "<option value='$id'>$module</option>";
								}
								echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<th>Date Reported</th>
							<td><input class="form-control"  type="date" name="date_reported" value=""></td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								<select name="status" class="form-control" id="status">
									<option value="1">Open</option>
									<option value="0">Closed</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>User</th>
							<td><input class="form-control"  type="text" name="user" value=""></td>
						</tr>
						<tr>
							<th>QA in Charge</th>
							<td><input class="form-control"  type="text" name="qa_in_charge" value=""></td>
						</tr>
						<tr>
							<th>CAS Reference No</th>
							<td><input class="form-control"  type="text" name="cas_reference_no" value=""></td>
						</tr>
						<tr>
							<th>Date Closed</th>
							<td><input class="form-control"  type="date" name="date_closed" value=""></td>
						</tr>
						<tr>
							<th>Reason of Error</th>
							<td><input class="form-control"  type="text" name="reason_of_error" value=""></td>
						</tr>
						<tr>
							<th>Remarks</th>
							<td><textarea class="form-control" name="remarks" rows="3" value=""></textarea></td>
						</tr>
						<tr>
							<td id="td_update"><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
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
		// $("#issues_form").on("submit", function(e) {
		// 	$('#workstation_dialog .modal-header .modal-title').html("Success");

		// });

		$('#issue_delete_form').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});

	});
</script>