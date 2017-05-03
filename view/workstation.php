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
		header("location:workstation.php?status=success");
	} 
}
// Delete Data
if (isset($_REQUEST['del_id'])) {
	if ($nissan->deleteData($_REQUEST['del_id'], "workstation")) {
		// echo "You Data Has Succecssfully Deleted";
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
				<!-- <form class="form-group" id="workstation_delete_form" method="POST"> -->
				<!-- <input id="btn_confirm" type="submit" name="delete" value="Yes" class="btn btn-danger">	 -->
				<a class="btn btn-danger btn-ok">Delete</a>
				<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<!-- </form> -->
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

					<table width="400" class="table-bordered table-custom">
						<tr>
							<th scope="row">CPU Name</th>
							<td><input class="form-control" type="text" name="cpu_name" value=""></td>
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

		$('#workstation_delete_form').on('submit', function(e) {
			$('#workstation_delete_form')
		});


		$('#button_delete').click(function() 
		{
			var idx = $(this).val();

			$('.modal-header').val(idx);
		});

		$('#workstation_delete_form').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	});


</script>
