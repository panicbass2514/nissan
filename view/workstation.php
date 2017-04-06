<?php
/*Includes all the header menu and functions*/
include('header.php');

/*Autoloads a controller file*/
function __autoload($class) {
	$filename ="../controller/" .$class. ".php";
	include_once($filename);
}

/*An instance to Nissan Class*/
$nissan = new NissanDatabase;
/*An instance to Workstation Class*/
$workstation = new Workstation;

$value = $nissan->showData("workstation", 5);
$rows = $nissan->getNumRows("workstation");

$self = $_SERVER['PHP_SELF'];

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
<tr>
	<td colspan="4"><h3>Workstations</h3></td>
	<td colspan="1">
		<button type="button" data-toggle="modal" data-target="#workstation_dialog" class="btn btn-primary">Add Workstation</button>
	</td>
</tr>
<tr>
	<th scope="col">ID</th>
	<th scope="col">CPU Name</th>
	<th scope="col">Employee</th>
	<th scope="col">Blocked Sites</th>
	<th scope="col">Action</th>
</tr>
<?php
if (!isset($key)) {
	foreach($value as $v) {
		// var_dump($value);
		extract($v);
		echo "
			<tr>
				<td>$id</td>
				<td>$cpu_name</td>
				<td>$employee</td>
				<td>$blocked_sites</td>
				<td>
					<button type='button' data-toggle='modal' data-target='#workstation_dialog' class='btn btn-danger'><a href='#'><span class='glyphicon glyphicon-wrench'>Modal</span></a></button>&nbsp;&nbsp;
					<button class='btn btn-danger'><a href='updateWorkstation.php?id=$id'><span class='glyphicon glyphicon-wrench'>Link</span></a></button>&nbsp;&nbsp;
					<button class='btn btn-danger'><a href='workstation.php?del_id=$id'><span class='glyphicon glyphicon-remove'></span></a></button>
				</td>

			</tr>
			";	
		}
	} elseif(!empty($key) && isset($key)) {
		$key_result = $workstation->searchData($key);
		var_dump($key_result);

		foreach($key_result as $k) {
			extract($k);
			echo "
				<tr>
					<td>$id</td>
					<td>$cpu_name</td>
					<td>$employee</td>
					<td>$blocked_sites</td>
					<td>
						<button type='button' data-toggle='modal' data-target='#workstation_dialog' class='btn btn-danger'><a href='#'><span class='glyphicon glyphicon-wrench'>Modal</span></a></button>&nbsp;&nbsp;
						<button class='btn btn-danger'><a href='updateWorkstation.php?id=$id'><span class='glyphicon glyphicon-wrench'>Link</span></a></button>&nbsp;&nbsp;
						<button class='btn btn-danger'><a href='workstation.php?del_id=$id'><span class='glyphicon glyphicon-remove'></span></a></button>
					</td>

				</tr>
				";	
			}
		} 

		if ($rows > 0) {
			?><tr>
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
			</tr></div><?php
		}
		?>
	</table>
</main>
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
