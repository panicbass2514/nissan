<?php
/*Includes all the header menu and functions*/
include('header.php');
include('workstation_backend.php');

// Checks if the key is requested or set
if(!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

// Insert Data Verification
if(isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	if($workstation->insertData($cpu_name, $employee, $blocked_sites,"workstation")) {
		header("location:workstation.php?status_insert=success");
	}
}

// Update Data Verification
if(isset($_REQUEST['update'])) {
	extract($_REQUEST);
	if($workstation->updateData($id, $cpu_name, $employee, $blocked_sites, "workstation"))
	{
		header("location:workstation.php");
	} 
}
// Delete Data
if (isset($_REQUEST['del_id'])) {
	if ($nissan->deleteData($_REQUEST['del_id'], "workstation")) {
		header("location:workstation.php");
	}
}
?>


<div class="modal fade" id="workstation_delete_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">		
			</div>
			<div class="modal-body">
				<a href="#" class="btn btn-danger btn-ok">Delete</a>
				<a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="workstation_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Workstation</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="workstation_form" action="workstation.php" method="POST">
					<input type="hidden" name="id" value="">
					<table width="400" class="table-bordered table-custom">
						
						<tr>
							<th scope="row">CPU Name</th>
							<td><input class="form-control" type="text" name="cpu_name" value=""></td>
						</tr>
						<tr>
							<th scope="row">Employee</th>
							<td><input class="form-control" type="text" name="employee" value=""></td>
						</tr>
						<tr>
							<th scope="row">Blocked Sites</th>
							<td><input class="form-control" type="text" name="blocked_sites" value=""></td>
						</tr>
						<tr>
							<td id="td_update">
								<input id="update_input" type="submit" name="insert" value="Insert" class="btn btn-primary">
							</td>
							<td><a class="btn btn-danger" href="workstation.php">Cancel</a></td>
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

		$("#btn_update").on('click', function() {
			$(".modal-title").html("Update Workstation");
		});

		$('#workstation_delete_form').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	});
</script>
