<?php 
// Includes all the header menu and functions
include('header.php');
// Backend process
// -Search
// -Sort
include('employee_backend.php');

// Checks if the key is request or set
// Searches employee record
if (!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

// Insert Data Verification
// Adds employee record
if(isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	$pass = substr(strrev($f_name), -1).''.$l_name;
	if($employee->insertData(md5(strtolower($pass)), $f_name, $mi, $l_name, $dsg, $dept, $bch, $status, $contact, $email, "employee")) {
		header("location:employee.php");
	}
}

// Update Data Verification
// Updates employee record
if (isset($_REQUEST['update'])) {
	extract($_REQUEST);
	if ($employee->updateData($id, $pass, $f_name, $mi, $l_name, $dsg, $dept, $bch, $status, $contact, $email, "employee")) {
		header("location:employee.php");
	}
}

// Delete Data
// Deletes employee record
if (isset($_REQUEST['del_id'])) {
	if ($nissan->deleteData($_REQUEST['del_id'], "employee")) {
		header("location:employee.php");
	}
}
?>
<!-- ================ -->
<!-- Modal for delete -->
<!-- ================ -->
<div class="modal fade" id="employee_delete_form" role="dialog">
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
<!-- ==================== -->
<!-- Modal for add/update -->
<!-- ==================== -->
<div class="modal fade" id="employee_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Employee</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="employee_form" action="employee.php" method="POST">
					<input type="hidden" name="id" value="">
					<input type="hidden" name="pass" value="">
					<table width="400" class="table-custom">
						<tr>
							<th>First Name</th>
							<td><input class="form-control" type="text" name="f_name" value=""></td>
						</tr>
						<tr>
							<th>MI</th>
							<td><input class="form-control" type="text" name="mi" value=""></td>
						</tr>
						<tr>
							<th>Last Name</th>
							<td><input class="form-control" type="text" name="l_name" value=""></td>
						</tr>
						<tr>
							<th>Designation</th>
							<td>
								<select name="dsg" id="myselect" class="form-control">
									<option value="0">Select Designation</option>
									<?php 
									$designation = $employee->getDesignation("designation");
									foreach($designation as $dg) {
										extract($dg);
										echo "<option value='$id'>$name</option>";
									}	
									?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Department</th>
							<td>
								<select id="myselect" class="form-control" name="dept">
									<option value="0">Select Department</option>
									<?php 
									$department = $employee->getDepartment("department");
									foreach($department as $d) {
										extract($d);
										echo "<option value='$id'>$name</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Branch</th>
							<td>
								<select name="bch" id="myselect" class="form-control">
									<option value="0">Select Branch</option>
									<?php 
									$branch = $employee->getBranch("branch");
									foreach($branch as $b) {
										extract($b);
										echo "<option value='$id'>$name</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								<select class="form-control" name="status" id="#">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>Contact</th>
							<td><input class="form-control" type="text" name="contact" value=""></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><input class="form-control" type="text" name="email" value=""></td>
						</tr>
						<tr>
							<td id="td_update">
								<input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
								<td><button class="btn btn-danger"><a href="employee.php">Cancel</a></button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		/*=======================*/
		/*Srcipt for delete form*/
		/*=====================*/
		$(document).ready(function () {
			$('#employee_delete_form').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
			});
		});
	</script>
