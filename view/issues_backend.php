<?php 

if (!isset($_SESSION['user_session'])) {
	session_start();
}

function __autoload($class) {
	$filename = '../controller/'.$class. '.php';
	include_once($filename);
}

$issues = new Issues;
$employee = new Employee;
$nissan = new NissanDatabase;
$self = 'http://it/nissan/view/issues.php';
$limit = 5;
$value = $issues->showData('issues', $limit);
$rows = $nissan->getNumRows('issues');
$session_id = $_SESSION['user_session'];
$adm = '';



$employee = new Employee;

$admin_issue = $employee->getEmployee($session_id);
foreach($admin_issue as $s) {
	$adm .= $s['admin'];
}





if (isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}
?>
<tr>
	<td colspan="11"><h3>Issues</h3></td>
	<td colspan="1">
		<button type="button" data-toggle="modal" data-target="#issue_dialog" class="btn btn-primary">Add Issues</button>
	</td>
</tr>
<tr class="table-custom-header" id="sort_header">
	<th id="cas_reference_no">CAS Reference No</th>
	<th id="issue_concern">Concern</th>
	<th id="description">Description</th>
	<th id="module_location">Module</th>
	<th id="date_reported">Date Reported</th>
	<th id="status">Status</th>
	<th id="user">User</th>
	<th id="qa_in_charge">QA</th>
	<th id="date_closed">Date Closed</th>
	<th id="reason_of_error">Reason of Error</th>
	<?php 
	if ($adm == 1) {

		?>
		<th id="remarks">Remarks</th>
		<th >Action</th>
		<?php }
		else {
			?>
			<th colspan="2" id="remarks">Remarks</th>
			<?php } ?>
		</tr>
		<?php

		if (!empty($key) && isset($key)) {
			$key_result = $issues->searchData($key);
			
			foreach($key_result as $k) {

				extract($k);
				$stat_val = ($status == 1) ? '<span class="btn btn-success" disabled>Open</span>':'<span class="btn btn-danger" disabled>Closed</span>';
				echo "<tr>
				<td>$cas_reference_no</td>	
				<td>$issue_concern</td>
				<td>$description</td>
				<td>$module</td>
				<td>$date_reported</td>
				<td>$stat_val</td>
				<td>$user</td>
				<td>$qa_in_charge</td>
				<td>$date_closed</td>
				<td>$reason_of_error</td>";
				if ($adm == 1) {
					echo "
					<td>$remarks</td>
					<td>
						<button onclick='issueUpdate(\"$id\", \"$issue_concern\", \"$description\", \"$module_location\", \"$date_reported\", \"$status\", \"$user\", \"$qa_in_charge\", \"$cas_reference_no\", \"$date_closed\", \"$reason_of_error\", \"$remarks\")' id='btn_update' data-toggle='modal' data-target='#issue_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
						<button onclick='issueDelete(\"$issue_concern\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/issues.php?del_id=$id' data-toggle='modal' data-target='#issue_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
					</td>";
				} else {
					echo "<td colspan='2'>$remarks</td>";
				}
				echo "</tr>"; 
			}
		} else if( isset($_REQUEST['sort']) && !empty($_REQUEST['sort'])) {
			$condition = $_REQUEST['sort'];
			$sort = $issues->sortData($condition, $limit);
			foreach ($sort as $s) {
				extract($s);
				$stat_val = ($status == 1) ? '<span class="btn btn-success" >Open</span>':'<span class="btn btn-danger">Closed</span>';
				echo "<tr>
				<td>$cas_reference_no</td>	
				<td>$issue_concern</td>
				<td>$description</td>
				<td>$module</td>
				<td>$date_reported</td>
				<td>$stat_val</td>
				<td>$user</td>
				<td>$qa_in_charge</td>
				<td>$date_closed</td>
				<td>$reason_of_error</td>";
				if ($adm == 1) {
					echo "
					<td>$remarks</td>
					<td>
						<button onclick='issueUpdate(\"$id\", \"$issue_concern\", \"$description\", \"$module_location\", \"$date_reported\", \"$status\", \"$user\", \"$qa_in_charge\", \"$cas_reference_no\", \"$date_closed\", \"$reason_of_error\", \"$remarks\")' id='btn_update' data-toggle='modal' data-target='#issue_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
						<button onclick='issueDelete(\"$issue_concern\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/issues.php?del_id=$id' data-toggle='modal' data-target='#issue_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
					</td>";
				} else {
					echo "<td colspan='2'>$remarks</td>";
				}
				echo "</tr>"; 
			}

			if ($rows > 0) {
				?>
				<tr>
					<td colspan="10">
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
					</tr>
					<?php
				}

			}
			else {
				foreach($value as $v) {
					extract($v);
					$stat_val = ($status == 1) ? '<span class="btn btn-success" >Open</span>':'<span class="btn btn-danger">Closed</span>';
					echo "
					<tr>
						<td>$cas_reference_no</td>	
						<td>$issue_concern</td>
						<td>$description</td>
						<td>$module</td>
						<td>$date_reported</td>
						<td>$stat_val</td>
						<td>$user</td>
						<td>$qa_in_charge</td>
						<td>$date_closed</td>
						<td>$reason_of_error</td>
						";
						if ($admin_status == 1) {
							echo "
							<td>$remarks</td>
							<td>
								<button onclick='issueUpdate(\"$id\", \"$issue_concern\", \"$description\", \"$module_location\", \"$date_reported\", \"$status\", \"$user\", \"$qa_in_charge\", \"$cas_reference_no\", \"$date_closed\", \"$reason_of_error\", \"$remarks\")' id='btn_update' data-toggle='modal' data-target='#issue_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
								<button onclick='issueDelete(\"$issue_concern\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/issues.php?del_id=$id' data-toggle='modal' data-target='#issue_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
							</td>";
						} else {
							echo "<td colspan='2'>$remarks</td>";
						}
						echo "</tr>"; 
					}
					if ($rows > 0) {
						?>
						<tr>
							<td colspan="12">
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
							</tr>
						</table>
					</section>
					<?php
				}
			} 
			?>
		</main>


		<!-- *************************** -->
		<!-- Front end dynamic functions -->
		<!-- *************************** -->
		<script>

			var localhost = "http://it/nissan";

        // Sorts the data provided by header type
        $('#sort_header > th').unbind().click(function(){

        	var headerVal = $(this).attr('id');
        	var resultDropdown = $(".result");

        	$.get(localhost+"/view/issues_backend.php", {sort: headerVal}).done(function(data){
        		resultDropdown.html(data);

        		$(this).remove(); 
        		$(".sort_header > th").append(this); 
        	});

        });

	 // Generates a pre-rendered values for the update modal
	 function issueUpdate(id, issue_concern, description, module_location, date_reported, status, user, qa_in_charge, cas_reference_no, date_closed, reason_of_error, remarks) {

	 	$('.modal-title').html("Update Issue");
	 	$('#td_update').html("<input type='submit' name='update' value='Update' class='btn btn-primary'/>");
	 	$('input[name="id"]').val(id);
	 	$('input[name="issue_concern"]').val(issue_concern);
	 	$('textarea[name="description"]').val(description);
	 	$('select[name="module_location"]').val(module_location);
	 	$('input[name="date_reported]').val(date_reported);
	 	$('select[name="status"]').val(status);
	 	$('input[name="user"]').val(user);
	 	$('input[name="qa_in_charge"]').val(qa_in_charge);
	 	$('input[name="cas_reference_no"]').val(cas_reference_no);
	 	$('input[name="date_reported"]').val(date_reported);
	 	$('input[name="reason_of_error"]').val(reason_of_error);
	 	$('textarea[name="remarks"]').val(remarks);
	 }

	 // Generates a confirmation notification for data deletion
	 function issueDelete(issue_concern) {
	 	$('.modal-header').html("<h4 style='text-align: center'>Are you sure you want to delete '"+issue_concern+"'</h4>");
	 }
	</script>
