<?php

function __autoload($class) {
    $filename = "../controller/".$class. ".php";
    include_once($filename);
}

$workstation = new Workstation;
$nissan = new NissanDatabase;
$self = "http://localhost/nissan/view/workstation.php";
$limit = 5;

$value = $nissan->showData("workstation", $limit);
$rows = $nissan->getNumRows("workstation");


if(isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
    $key = $_REQUEST['key'];
}

?>
<tr>
    <td colspan="4"><h3>Workstations</h3></td>
    <td colspan="1">
        <button type="button" data-toggle="modal" data-target="#workstation_dialog" class="btn btn-primary">Add Workstation</button>
    </td>
</tr>
<tr>
    <th>ID</th>
    <th>CPU Name</th>
    <th>Employee</th>
    <th>Blocked Sites</th>
    <th>Action</th>
</tr>
<?php
if(!empty($key) && isset($key)) {
    $key_result = $workstation->searchData($key);
    foreach($key_result as $k) {
        extract($k);
        echo "
        <tr>
            <td>$id</td>
            <td>$cpu_name</td>
            <td>$employee</td>
            <td>$blocked_sites</td>
            <td>
               <button onclick='workstationUpdate(\"$id\", \"$cpu_name\", \"$employee\", \"$blocked_sites\",)' id='btn_update'  data-toggle='modal' data-target='#workstation_dialog' class='btn btn-danger' data-href='/nissan/view/updateWorkstation.php?id=$id'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
               <button onclick='workstationDelete(\"$cpu_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/workstation.php?del_id=$id' data-toggle='modal' data-target='#workstation_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
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
            <td>$cpu_name</td>
            <td>$employee</td>
            <td>$blocked_sites</td>
            <td>
                <button onclick='workstationUpdate(\"$id\", \"$cpu_name\", \"$employee\", \"$blocked_sites\",)' id='btn_update'  data-toggle='modal' data-target='#workstation_dialog' class='btn btn-danger' data-href='/nissan/view/updateWorkstation.php?id=$id'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
                <button onclick='workstationDelete(\"$cpu_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/workstation.php?del_id=$id' data-toggle='modal' data-target='#workstation_delete_form'><span class='glyphicon glyphicon-remove'></span></button>                   
            </td>
        </tr>
        "; 
    }
    if ($rows > 0) {
        ?>
        <tr>
            <td colspan="9">
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
            </tr><?php
        }
    }  
    ?>
    <script>
        $(document).ready(function() {
         function workstationUpdate(id, cpu_name, employee, blocked_sites) {
            $('.modal-title').html("Update Workstation");
            $('#td_update').html("<input type='submit' name='update' value='Update' class='btn btn-primary'>");
            $('input[name="id"]').val(id);
            $('input[name="cpu_name"]').val(cpu_name);
            $('input[name="employee"]').val(employee);
            $('input[name="blocked_sites"]').val(blocked_sites);
        }
        function workstationDelete(cpu_name) {
            $('.modal-header').html("<h4 style='text-align: center'>Are you sure you want to delete '"+cpu_name+"'</h4>");
        }
    });
        function workstationUpdate(id, cpu_name, employee, blocked_sites) {
            $('.modal-title').html("Update Workstation");
            $('#td_update').html("<input type='submit' name='update' value='Update' class='btn btn-primary'>");
            $('input[name="id"]').val(id);
            $('input[name="cpu_name"]').val(cpu_name);
            $('input[name="employee"]').val(employee);
            $('input[name="blocked_sites"]').val(blocked_sites);
        }
        function workstationDelete(cpu_name) {
            $('.modal-header').html("<h4 style='text-align: center'>Are you sure you want to delete '"+cpu_name+"'</h4>");
        }
    </script>
</table>