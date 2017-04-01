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
            while($row = mysqli_fetch_array($result)){
                echo "<table>";
                echo "<tr>";
                echo "<td>";
                echo "<p>" . $row['cpu_name'] . "</p>";
                echo "<p>" . $row['employee'] . "</p>";
                echo "<p>" . $row['blocked_sites'] . "</p>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";

            }
            
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found for <b>$query</b></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// close connection
mysqli_close($link);
?>