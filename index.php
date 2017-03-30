<?php 
// include('view/menu_header.php');



// include('view/footer.php');
include_once('Dbconfig.php');
 ?>
<table align="center" width="50%" border="1">
	<tr>
		<td><a href="#">Test Pagination Nissan</a></td>
	</tr>
	<tr>
		<td>
			<table align="center" border="1" width="100%" height="100%">
				<?php 
					$query = "SELECT * FROM workstation";
					$records_per_page = 3;
					//
					$newquery = $paginate->paging($query, $records_per_page);
					$paginate->dataview($newquery);
					//
					$paginate->paginglink($query, $records_per_page);
				 ?>
			</table>
		</td>
	</tr>
</table>
<!-- INDEX ENDS HERE -->
