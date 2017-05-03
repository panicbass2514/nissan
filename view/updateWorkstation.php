	<?php
	include('header.php'); 
	// Autoload the class Workstation
	function __autoload($class) {
		$filename ="../controller/" .$class. ".php";
		include_once($filename);
	}

	$nissan = new NissanDatabase;
	// Verify if the request is an update then the page will redirect to the parent module
	if(isset($_REQUEST['update'])) {
		extract($_REQUEST);
		if($nissan->updateData($id, $cpu_name, $employee, $blocked_sites, "workstation"))
		 {
			header("location:workstation.php?status=success");
		}
	}

extract($nissan->getById($_REQUEST['id'], "workstation"));	
echo @<<<show
<div class="well div-center">
<form class="form-group" action="updateWorkstation.php" method="post">
<table class="table-bordered table-custom">
<tr>
	<td colspan="2"><h3>Update Workstation</h3></td>
</tr>
<tr>
<th scope="row">Id</th>
<td><input class="form-control" type="text" name="id" value="$id" readonly="readonly"></td>
</tr>
<tr>
<th scope="row">CPU Name</th>
<td><input class="form-control" type="text" name="cpu_name" value="$cpu_name"></td>
</tr>
<tr>
<th scope="row">Employee</th>
<td><input class="form-control" type="text" name="employee" value="$employee"></td>
</tr>
<tr>
<th scope="row">Blocked Sites</th>
<td><input class="form-control" type="text" name="blocked_sites" value="$blocked_sites"></td>
</tr>
<tr>
<td scope="row"><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
<td><button class="btn btn-danger"><a href="workstation.php">Cancel</a></button></td>
</tr>
</table>
</form>
</div>		
</div>
show;

?>	