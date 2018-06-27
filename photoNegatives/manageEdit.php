<?php

//include code database.php
require_once('includes/database.php');

$id = ''; 
if( isset( $_POST['id'])) {
    $id = $_POST['id']; 
} else {
    echo "Did not post an id.";
}

$familyname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'familyname', FILTER_SANITIZE_STRING)));
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$datetaken = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'datetaken', FILTER_SANITIZE_STRING)));
$address = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_NUMBER_FLOAT)));
$negativenum = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'negativenum', FILTER_SANITIZE_NUMBER_INT)));
$jobtype = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'jobtype', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$sql = "UPDATE negatives SET familyname ='$familyname', firstname ='$firstname', datetaken='$datetaken', address='$address', negativenum='$negativenum', jobtype='$jobtype', description='$description' WHERE id='$id'";
    
//execut the insert query
$query = @$conn->query($sql);

//Handle selection errors

if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $error = "Insertion failed with: ($errno) $error.";
    $conn->close();
    header("Location: negativeList.php");
    die();
}

//Close the connection
$conn->close();

//page showing the user the edit is complete.
header("Location: negativeList.php");