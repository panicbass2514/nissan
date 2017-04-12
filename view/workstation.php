<?php
/*Includes all the header menu and functions*/
include('header.php');
include('workstation_backend.php');

// Checks if the key is requested or set
if(!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

/*Insert Data Verification*/
if(isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	if($workstation->insertData($cpu_name, $employee, $blocked_sites,"workstation")) {
		header("location:workstation.php?status_insert=success");
	}
}

/*Update Data Verification*/
if(isset($_REQUEST['update'])) {
	extract($_REQUEST);
	if($workstation->updateData($id, $cpu_name, $employee, $blocked_sites, "workstation"))
	{
		header("location:workstation.php?status=success");
	}
}
?>

<div class="modal fade" id="workstation_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Workstation</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="workstation_form" action="workstation.php" method="POST">

					<table width="400" class="table-bordered table-custom">
						<tr>
							<th scope="row">CPU Name</th>
							<td><input class="form-control" type="text" name="cpu_name" value="<?php $cpu_name ?>"></td>
						</tr>
						<tr>
							<th scope="row">Employee</th>
							<td><input class="form-control" type="text" name="employee" value="<?php $employee ?>"></td>
						</tr>
						<tr>
							<th scope="row">Blocked Sites</th>
							<td><input class="form-control" type="text" name="blocked_sites" value="<?php $blocked_sites ?>"></td>
						</tr>
						<tr>
							<td><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
							<td><button class="btn btn-danger"><a href="workstation.php">Cancel</a></button></td>
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
		$("#workstation_form").on("submit", function(e) {
			// var postData = $(this).serializeArray();
			// var formURL = $(this).attr("action");
			// $.ajax({
			// 	url: formURL,
			// 	type: "POST",
			// 	data: postData,
			// 	success: function(data, textStatus, varmess) {
			// 		$('#contact_dialog .modal-header .modal-title').html("Result");
			// 		$('contact_dialog .modal-body').html(data);
			// 		$('#submitForm').remove();
			// 	},
			// 	error: function(varmess, status, error) {
			// 		console.log(status + ": " + error);
			// 	}
			// });
			// e.preventDefault();

			$('#workstation_dialog .modal-header .modal-title').html("Success");
			// $('contact_dialog .modal-body').html(data);
			// $('#submitForm').remove();
		});

		// $("#submitForm").on('click', function() {
		// 	$("#contact_form").submit();
		// });
	});

	function getUserDetails(id) {
		$('#hidden_user_id').val(id);
		$.post("ajax/readUserDetails.php", {
			id: id
		},
		function (data, status) {
			// PARSE json data
			var user = JSON.parse(data);
			// Using existing values to the modal popup fields
			$("#update_first_name").val(user.first_name);
			$("#update_last_name").val(user.last_name);
			$("#update_email").val(user.email);
		}
		);
		// Open modal popup
		$("#update_user_modal").modal("show");
	}	

	function UpdateUserDetails() {

		// get values
		var first_name = $("#update_first_name").val();
		var last_name = $("#update_last_name").val();
		var email = $("#update_email").val();

		// Get hidden field value
		var id = $("#hidden_user_id").val();

		// Update the details by requesting to the server using ajax
		$.post("ajax/updateUserDetails.php",  {
			id: id,
			first_name: first_name,
			last_name: last_name,
			email: email
		},
		function (data, status) {
			// Hide modal popup
			$("#update_user_modal").modal("hide");
			// Reload Users by using readRecords();
			readRecords();
		});
	}
</script>
