<?php

//include code database.php
require_once('includes/database.php');

$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$datetaken = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'datetaken', FILTER_SANITIZE_STRING)));
$fee = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'fee', FILTER_SANITIZE_NUMBER_FLOAT)));
$negativenum = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'negativenum', FILTER_SANITIZE_NUMBER_INT)));
$jobtype = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'jobtype', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$id = $_POST['id'];

$sql = "UPDATE negatives SET lastname ='$lastname', firstname ='$firstname', datetaken='$datetaken', fee='$fee', negativenum='$negativenum', jobtype='$jobtype', description='$description' WHERE id ='$id'";
    
//execut the insert query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $error = "Insertion failed with: ($errno) $error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//Close the connection
$conn->close();

//Confirmation page showing the user the edit is complete.
header("Location: negativeList.php");