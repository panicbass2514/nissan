<?php 
// Includes all the header menu and functions
include('header.php');
include('employee_backend.php');

// Checks if the key is request or set
if (!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

// Insert Data Verification
if(isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	$pass = substr(strrev($f_name), -1).''.$l_name;
	if($employee->insertData(md5(strtolower($pass)), $f_name, $mi, $l_name, $dept, $status, $contact, "employee")) {
		header("location:employee.php");
	}
}

// Update Data Verification
// if (isset($_REQUEST['update'])) {
// 	extract($_REQUEST);
// 	if ($employee->updateData($id, $pass, $f_name, $mi, $l_name, $dept, $status, $contact, "employee")) {
// 		header("location:employee.php?status=success");
// 	}
// }

// Delete Data
if (isset($_REQUEST['del_id'])) {
	if ($nissan->deleteData($_REQUEST['del_id'], "employee")) {
		header("location:employee.php");
	}
}
?>

<div class="modal fade" id="employee_delete_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> Are you sure you want to delete this employee
			</div>
			<div class="modal-body">
				<a href="#" class="btn btn-danger btn-ok">Delete</a>
				<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="employee_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Employee</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="employee_form" action="employee.php" method="POST">

					<table width="400" class="table-bordered table-custom">
						<tr>
							<th scope="row">First Name</th>
							<td><input class="form-control" type="text" name="f_name" value=""></td>
						</tr>
						<tr>
							<th scope="row">MI</th>
							<td><input class="form-control" type="text" name="mi" value=""></td>
						</tr>
						<tr>
							<th scope="row">Last Name</th>
							<td><input class="form-control" type="text" name="l_name" value=""></td>
						</tr>
						<tr>
							<th scope="row">Department</th>
							<td>
								<?php 
								$department = $employee->getDepartment("department");
								echo '<select class="form-control" name="dept">
								<option value="0">Select Department</option>';
								foreach($department as $d) {
									extract($d);
									echo "<option value='$id'>$name</option>";
								}
								echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<th scope="row">Status</th>
							<td>
								<select class="form-control" name="status" id="#">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Contact</th>
							<td><input class="form-control" type="text" name="contact" value=""></td>
						</tr>
						<tr>
							<td><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
							<td><button class="btn btn-danger"><a href="employee.php">Cancel</a></button></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	/*Must apply only after HTML has loaded*/
	$(document).ready(function () {
		$("#employee_form").on("submit", function(e) {
			$('#employee_dialog .modal-header .modal-title').html("Success");
		});
		$('#employee_delete_form').on('submit', function(e) {
			$('#employee_delete_form')
		});
		$('#button_delete').click(function() 
		{
			var idx = $(this).val();

			$('.modal-header').val(idx);
		});
		$('#employee_delete_form').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	});
</script>
