<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "nissan");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}










// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);

if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM workstation WHERE cpu_name LIKE '" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<tr>
            <td colspan='4'><h3>Workstations</h3></td>  
            <td colspan='1'>
                <button type='button' data-toggle='modal' data-target='#workstation_dialog' class='btn btn-primary'>Add Workstation</button>
            </td>
        </tr>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>CPU Name</th>
          <th scope='col'>Employee</th>
          <th scope='col'>Blocked Sites</th>
          <th scope='col'>Action</th>
          </tr> ";
      while($row = mysqli_fetch_array($result)){
        echo  "<tr>";
        echo  "<td>".$row['id']."</td>";
        echo  "<td>".$row['cpu_name']."</td>";
        echo  "<td>".$row['employee']."</td>";
        echo  "<td>".$row['blocked_sites']."</td>";
        echo  "<td><button type='button' data-toggle='modal' data-target='#workstation_dialog' class='btn btn-danger'><a href='#'><span class='glyphicon glyphicon-wrench'>Modal</span></a></button>&nbsp;&nbsp;
        <button class='btn btn-danger'><a href='updateWorkstation.php?id=#'><span class='glyphicon glyphicon-wrench'>Link</span></a></button>&nbsp;&nbsp;
        <button class='btn btn-danger'><a href='workstation.php?del_id=#'><span class='glyphicon glyphicon-remove'></span></a></button></td>";
        echo "</tr>";
    }
            // Close result set
    mysqli_free_result($result);
} else{
    echo "<p>No matches found for <b>$term</b></p>";
}
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// close connection
mysqli_close($link);
?>