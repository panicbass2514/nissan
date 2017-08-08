<?php
// Autoloads class from the system

if (!isset($_SESSION['user_session'])) {
    session_start();
}
function __autoload($class) {
    $filename = "../controller/".$class. ".php";
    include_once($filename);
}

/*Access to Employee database*/
$employee = new Employee;
/*Access to Nissan general database*/
$nissan = new NissanDatabase;
/*Self domain*/
$self = "http://it/nissan/view/employee.php";
/*Set options for limit result*/
$limit = 5;
/*Gets the current session*/
$session_id = $_SESSION['user_session'];
/*Sets a temporary variable for the admin status*/
$adm = '';

/*Selects row from the employee database*/
$value = $employee->showData("employee", $limit);
/*Gets the number of rows from employee database*/
$rows = $nissan->getNumRows("employee");


$admin_employee = $employee->getEmployee($session_id);
foreach($admin_employee as $s) {
    $adm .= $s['admin'];
}

/*Check if the search key is provided from the searchbox*/ 
if(isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
    $key = $_REQUEST['key'];
}
?>
<tr>
    <?php
    /*Admin status
     1 = Admin
     0 = Not Admin
    */
     /*Admin*/ 
     if ($adm == 1) {
       ?>
       <td colspan="9"><h3>Employees</h3></td>
       <td colspan="1">
        <button type="button" data-toggle="modal" data-target="#employee_dialog" class="btn btn-primary">Add Employee</button>
    </td>
    <?php }
    /*Not Admin*/
    else {
       ?>
       <td colspan="10"><h3>Employees</h3></td>
       <?php } 
       ?>
   </tr>
   <tr class="sort_header">
    <th id="f_name">First Name</th>
    <th id="mi">Middle Initial</th>
    <th id="l_name">Last Name</th>
    <th id="designation">Designation</th>
    <th id="dept">Department</th>
    <th id="branch">Branch</th>
    <th id="status">Status</th>
    <th id="contact">Contact</th>

    <?php
    if ($adm == 1) {
        ?>
        <th id="email">Email</th>
        <th>Action</th>
        <?php }
        else { ?>
        <th id="email" colspan="2">Email</th>
        <?php } ?>  
    </tr>
    <?php
    /*==================================================*/
    /*If a text is provided on the search bar for a key*/
    /*================================================*/
    if(!empty($key) && isset($key)) {
        $key_result = $employee->searchData($key);
        foreach($key_result as $k) {
            extract($k);
            /*========================================*/
            /*Select if  status is active or inactive*/
            /*=======================================*/
            $statusVal = ($status == 1) ? 'Active' : 'Inactive';
            echo "
            <tr>
                <td>$f_name</td>
                <td>$mi</td>
                <td>$l_name</td>
                <td>$designation</td>
                <td>$department</td>
                <td>$branch</td>
                <td>$status</td>
                <td>$contact</td>
                ";
                if ($adm == 1) {
                    echo "   
                    <td>$email</td>
                    <td>
                        <button onclick='employeeUpdate(\"$id\", \"$pass\", \"$f_name\", \"$mi\", \"$l_name\", \"$dsg\", \"$dept\", \"$bch\", \"$status\", \"$contact\", \"$email\")' id='btn_update' data-toggle='modal' data-target='#employee_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
                        <button onclick='employeeDelete(\"$f_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/employee.php?del_id=$id' data-toggle='modal' data-target='#employee_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
                    </td>";
                } else {
                    echo "<td colspan='2'>$email</td>";
                }

                echo "</tr>"; 
            }
            /*================================*/
            /*If header is clicked for sorting*/
            /*================================*/
        }else if(isset($_REQUEST['sort']) && !empty($_REQUEST['sort'])) {

            $condition = $_REQUEST['sort'];   
            $sort = $employee->sortData($condition, $limit);

            foreach ($sort as $s) {
                extract($s);
                echo 
                "<tr>
                <td>$f_name</td>
                <td>$mi</td>
                <td>$l_name</td>
                <td>$designation</td>
                <td>$department</td>
                <td>$branch</td>
                <td>$status</td>
                <td>$contact</td>";
                if ($adm == 1) {
                    echo 
                    "<td>$email</td>
                    <td>
                        <button onclick='employeeUpdate(\"$id\", \"$pass\", \"$f_name\", \"$mi\", \"$l_name\", \"$dsg\", \"$dept\", \"$bch\", \"$status\", \"$contact\", \"$email\")' id='btn_update' data-toggle='modal' data-target='#employee_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
                        <button onclick='employeeDelete(\"$f_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/employee.php?del_id=$id' data-toggle='modal' data-target='#employee_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
                    </td>";
                } else {
                    echo "<td colspan='2'>$email</td>";
                }
                echo "</tr>";
            }
            /*===========*/
            /*Pagination*/
            /*===========*/    
            if ($rows > 0) { ?>
            <tr>
                <td colspan="12">
                    <?php 
                    $total_no_of_pages = ceil($rows/5);
                    $current_page = 1;
                    /*===============*/
                    /*If page exists*/
                    /*==============*/
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
            /*===========================*/
            /*Default Value of the table*/
            /*==========================*/   
        }else {
            foreach($value as $v) {
                extract($v);
                $statusX = ($status == 1) ? 'Active' : 'Inactive';
                echo "
                <tr>
                    <td>$f_name</td>
                    <td>$mi</td>
                    <td>$l_name</td>
                    <td>$designation</td>
                    <td>$department</td>
                    <td>$branch</td>
                    <td>$status</td>
                    <td>$contact</td>
                    ";
                    if ($adm == 1) {
                        echo "   
                        <td>$email</td>
                        <td>
                            <button onclick='employeeUpdate(\"$id\", \"$pass\", \"$f_name\", \"$mi\", \"$l_name\", \"$dsg\", \"$dept\", \"$bch\", \"$status\", \"$contact\", \"$email\")' id='btn_update' data-toggle='modal' data-target='#employee_dialog' class='btn btn-danger'><span class='glyphicon glyphicon-wrench'></span></button>&nbsp;&nbsp;
                            <button onclick='employeeDelete(\"$f_name\")' id='btn_delete' class='btn btn-danger' data-href='/nissan/view/employee.php?del_id=$id' data-toggle='modal' data-target='#employee_delete_form'><span class='glyphicon glyphicon-remove'></span></button> 
                        </td>";
                    } else {
                        echo "<td colspan='2'>$email</td>";
                    }
                    echo "</tr>"; 
                }
                /*===========*/
                /*Pagination*/
                /*==========*/
                if ($rows > 0) { ?>
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
                    </tr></table><?php
                }
            } 
            ?>

            <!-- *************************** -->
            <!-- Front end dynamic functions -->
            <!-- *************************** -->
            <script>

                var localhost = "http://it/nissan";

        // Sorts the data provided by header type
        $('.sort_header > th').unbind().click(function(){
            var headerVal = $(this).attr('id');
            var resultDropdown = $(".result");

            $.get(localhost+"/view/employee_backend.php", {sort: headerVal}).done(function(data){
                resultDropdown.html(data);

                $(this).remove(); 
                $(".sort_header > th").append(this); 
            });

        });

        // Generates a pre-rendered values for the update modal
        function employeeUpdate(id, pass, f_name, mi, l_name, designation, dept, branch, status, contact, email) {
            $('.modal-title').html("Update Employee");
            $('#td_update').html("<input type='submit' name='update' value='Update' class='btn btn-primary'>");
            $('input[name="id"]').val(id);
            $('input[name="pass"]').val(pass);
            $('input[name="f_name"]').val(f_name);
            $('input[name="mi"]').val(mi);
            $('input[name="l_name"]').val(l_name);
            $('select[name="designation"]').val(designation);
            $('select[name="dept"]').val(dept);
            $('select[name="branch"]').val(branch);
            $('select[name="status"]').val(status);
            $('input[name="contact"]').val(contact);
            $('input[name="email"]').val(email);
        }

        // Generates a confirmation notification for data deletion
        function employeeDelete(f_name) {
            $('.modal-header').html("<h4 style='text-align: center'>Are you sure you want to delete '"+f_name+"'</h4>");
        }
    </script>
