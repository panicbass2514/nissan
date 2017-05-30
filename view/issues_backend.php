<?php 

function __autoload($class) {
	$filename = '../controller/'.$class. '.php';
	include_once($filename);
}

$issues = new Issues;
$nissan = new NissanDatabase;
$self = 'http://localhost/nissan/view/issues.php';
$limit = 5;

$value = $nissan->showData('issues', $limit);
$rows = $nissan->getNumRows('issues');

if (isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}
?>
<tr>
	<td colspan="12"><h3>Issues</h3></td>
	<td colspan="1">
		<button type="button" data-toggle="modal" data-target="#issues_dialog" class="btn btn-primary">Add Issues</button>
	</td>
</tr>
<tr class="table-custom-header">
	<th>ID</th>
	<th>Concern</th>
	<th>Description</th>
	<th>Module</th>
	<th>Date Reported</th>
	<th>Status</th>
	<th>User</th>
	<th>QA</th>
	<th>CAS Reference No</th>
	<th>Date Closed</th>
	<th>Reason of Error</th>
	<th>Remarks</th>
	<th width="130">Action</th>
</tr>
<?php 
if (!empty($key) && isset($key)) {
	$key_result = $issues->searchData($key);
	foreach($key_result as $k) {
		extract($k);
		echo "
		<tr>
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
			<td>
				<button onclick='issueUpdate(\"$id\", \"$issue_concern\", \"$description\", \"$module_location\", \"$date_reported\", \"$status\", \"$user\", \"$qa_in_charge\", \"$cas_reference_no\", \"$date_closed\", \"$reason_of_error\", \"$remarks\")' id='btn_update' data-toggle='modal' data-target='#issue_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
				<button onclick='issueDelete(\"$issue_concern\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/issues.php?del_id=$id' data-toggle='modal' data-target='#issue_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
			</td>
		</tr>
		";
	}
} else {
	foreach($value as $v) {
		extract($v);
		echo "
		<tr>
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
			<td>
				<button onclick='issueUpdate(\"$id\", \"$issue_concern\", \"$description\", \"$module_location\", \"$date_reported\", \"$status\", \"$user\", \"$qa_in_charge\", \"$cas_reference_no\", \"$date_closed\", \"$reason_of_error\", \"$remarks\")' id='btn_update' data-toggle='modal' data-target='#issue_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
				<button onclick='issueDelete(\"$issue_concern\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/issues.php?del_id=$id' data-toggle='modal' data-target='#issue_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
			</td>
		</tr>
		";
	}
	if ($rows > 0) {
		?>
		<tr>
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
			</tr>
		</table>
	</section>
	<?php
}
} 
?>
</main>
<script>
	
	function issueUpdate(id, issue_concern, description, module_location, date_reported, status, user, qa_in_charge, cas_reference_no, date_closed, reason_of_error, remarks) {

		$('.modal-title').html("Update Issue");
		$('#td_update').html("<input type='submit' name='update' value='Update' class='btn btn-primary'/>");
		$('input[name="id"]').val(id);
        $('input[name="issue_concern"]').val(issue_concern);
        $('textarea[name="description"]').val(description);
        $('select[name="module_location"]').val(module_location);
        $('input[name="date_reported]').val(date_reported);
        $('input[name="status"]').val(status);
        $('input[name="user"]').val(user);
        $('input[name="qa_in_charge"]').val(qa_in_charge);
        $('input[name="cas_reference_no"]').val(cas_reference_no);
        $('input[name="date_reported"]').val(date_reported);
        $('input[name="reason_of_error"]').val(reason_of_error);
        $('textarea[name="remarks"]').val(remarks);
	}

	function issueDelete(issue_concern) {
		$('.modal-header').html("<h4 style='text-align: center'>Are you sure you want to delete '"+issue_concern+"'</h4>");
	}
</script>
