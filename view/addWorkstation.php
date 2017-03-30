	<?php 
	include('header.php');
	function __autoload($class) {
		$filename ="../controller/" .$class. ".php";
		include_once($filename);
	}

	$obj = new Workstation;

	if(isset($_REQUEST['insert'])) {
		extract($_REQUEST);

		if($obj->insertData($cpu_name, $employee, $blocked_sites,"workstation")) {
			header("location:workstation.php?status_insert=success");
		}
	}
echo @<<<show
<div class="well div-center">
<form class="form-group" action="addWorkstation.php" method="post">
<table width="400" class="table-bordered table-custom">
<tr>
<td colspan="2"><h3>Add Workstation</h3></td></tr>
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
<td><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
<td><button class="btn btn-danger"><a href="workstation.php">Cancel</a></button></td>
</tr>
</table>
</form>
</div>		
show;
include('footer.php');
