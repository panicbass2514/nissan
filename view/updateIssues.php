	<?php
	include('header.php');
	// Autoload the class Workstation 
	function __autoload($class) {
		$filename ="../controller/" .$class. ".php";
		include_once($filename);
	}
	$obj = new NissanDatabase;
	$issues = new Issues;

	if(isset($_REQUEST['update'])) {
		extract($_REQUEST);
		if($issues->updateData($id, $issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, $update_status, "issues"))
		 {
			header("location:issues.php?status=success");
		}
	}

extract($obj->getById($_REQUEST['id'], "issues"));	
echo @<<<show
<div class="div-center">
<form action="updateIssues.php" method="post">
<table class="table-bordered table-custom">
<tr>
	<td colspan="2"><h3>Update Issues</h3></td>
</tr>
<tr>
<td scope="row">Id</td>
<td><input type="text" name="id" value="$id" readonly="readonly"></td>
</tr>
<tr>
<th scope="row">Issue Concern</th>
<td><input type="text" name="issue_concern" value="$issue_concern"></td>
</tr>
<tr>
<th scope="row">Description</th>
<td><input type="text" name="description" value="$description"></td>
</tr>
<tr>
<th scope="row">Module Location</th>
<td><input type="text" name="module_location" value="$module_location"></td>
</tr>
<tr>
<th scope="row">Date Reported</th>
<td><input type="date" name="date_reported" value="$date_reported"></td>
</tr
<tr>
<th scope="row">Status</th>
<td><input type="text" name="status" value="$status"></td>
</tr
<tr>
<th scope="row">User</th>
<td><input type="text" name="user" value="$user"></td>
</tr
<tr>
<th scope="row">QA in Charge</th>
<td><input type="text" name="qa_in_charge" value="$qa_in_charge"></td>
</tr
<tr>
<th scope="row">CAS Reference No</th>
<td><input type="text" name="cas_reference_no" value="$cas_reference_no"></td>
</tr>
<tr>
<th scope="row">Date Closed</th>
<td><input type="date" name="date_closed" value="$date_closed"></td>
</tr>
<tr>
<th scope="row">Reason of Error</th>
<td><input type="text" name="reason_of_error" value="$reason_of_error"></td>
</tr>
<tr>
<th scope="row">Remarks</th>
<td><input type="text" name="remarks" value="$remarks"></td>
</tr>
<tr>
<th scope="row">Update Status</th>
<td><input type="text" name="update_status" value="$update_status"></td>
</tr>
<tr>
<td scope="row"><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
<td><button class="btn btn-danger"><a href="issues.php">Cancel</a></button></td>
</tr>
</table>
</form>
</div>		
</div>
show;
