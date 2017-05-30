<?php
// Autoloads class from the system
function __autoload($class) {
    $filename = "../controller/".$class. ".php";
    include_once($filename);
}
// Instances from the classes
$employee = new Employee;
$nissan = new NissanDatabase;
$self = "http://localhost/nissan/view/employee.php";
// To do set options for limit
$limit = 5;

$value = $employee->showData("employee", $limit);
$rows = $nissan->getNumRows("employee");

// Check if the search key is provided
if(isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
    $key = $_REQUEST['key'];
}

?>
<tr>
    <td colspan="7"><h3>Employees</h3></td>
    <td colspan="1">
        <button type="button" data-toggle="modal" data-target="#employee_dialog" class="btn btn-primary">Add Employee</button>
    </td>
</tr>
<tr>
    <th>First Name</th>
    <th>Middle Initial</th>
    <th>Last Name</th>
    <th>Department</th>
    <th>Status</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Action</th>
</tr>
<?php
if(!empty($key) && isset($key)) {
    $key_result = $employee->searchData($key);
    foreach($key_result as $k) {
        extract($k);
        $status = ($status == 1) ? 'Active' : 'Inactive';
        // $status_color = ($status == 1)
        echo "
        <td>$f_name</td>
        <td>$mi</td>
        <td>$l_name</td>
        <td>$dept</td>
        <td>$status</td>
        <td>$contact</td>
        <td>$email</td>
        <td>
            <button onclick='employeeUpdate(\"$id\", \"$pass\", \"$f_name\", \"$mi\", \"$l_name\", \"$dept\", \"$status\", \"$contact\", \"$email\")' id='btn_update' data-toggle='modal' data-target='#employee_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
            <button onclick='employeeDelete(\"$f_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/employee.php?del_id=$id' data-toggle='modal' data-target='#employee_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
        </td>

    </tr>
    "; 
}
} else {
    foreach($value as $v) {
        extract($v);
        $statusX = ($status == 1) ? 'Active' : 'Inactive';
        echo "
        <tr>
            <td>$f_name</td>
            <td>$mi</td>
            <td>$l_name</td>
            <td>$department</td>
            <td>$statusX</td>
            <td>$contact</td>
            <td>$email</td>
            <td>
                <button onclick='employeeUpdate(\"$id\", \"$pass\", \"$f_name\", \"$mi\", \"$l_name\", \"$dept\", \"$status\", \"$contact\", \"$email\")' id='btn_update' data-toggle='modal' data-target='#employee_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
                <button onclick='employeeDelete(\"$f_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/employee.php?del_id=$id' data-toggle='modal' data-target='#employee_delete_form'><span class='glyphicon glyphicon-remove'></span></button>                   
            </td>
        </tr>
        "; 
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
            </tr></table><?php
        }
    } 
    ?>
    <script>

     function employeeUpdate(id, pass, f_name, mi, l_name, dept, status, contact, email) {
        $('.modal-title').html("Update Employee");
        $('#td_update').html("<input type='submit' name='update' value='Update' class='btn btn-primary'>");
        $('input[name="id"]').val(id);
        $('input[name="pass"]').val(pass);
        $('input[name="f_name"]').val(f_name);
        $('input[name="mi"]').val(mi);
        $('input[name="l_name"]').val(l_name);
        $('select[name="dept"]').val(dept);
        $('select[name="status"]').val(status);
        $('input[name="contact"]').val(contact);
        $('input[name="email"]').val(email);
    }
    function employeeDelete(f_name) {
        $('.modal-header').html("<h4 style='text-align: center'>Are you sure you want to delete '"+f_name+"'</h4>");
    }

</script>
