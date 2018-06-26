<?php
require_once('includes/database.php');
include('includes/header.php');
 
//retrieve user id from a querystring
if (!filter_has_var(INPUT_POST, 'id')) {
    echo "<h1 style='padding-top:50px'>Error: File id was not found.</h1>";
    require_once ('includes/footer.php');
    exit();
}
 
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
 
//define the MySQL delete statement
 $sql = "DELETE FROM negatives WHERE id=$id";
 
//execute the query
 $query = @$conn->query($sql);
 
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}

//confirm delete
echo "<div class='alert alert-success' role='alert'><h3>Delete completed.</h3></div>";

// close the connection.
$conn->close();
 
include ('includes/footer.php');