<?php

//include code database.php
require_once('includes/database.php');

$lastName = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$firstName = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$dateTaken = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'datetaken', FILTER_SANITIZE_STRING)));
$fee = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'fee', FILTER_SANITIZE_NUMBER_FLOAT)));
$negativeNum = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'negativenum', FILTER_SANITIZE_NUMBER_INT)));
$jobType = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'jobtype', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$id = $_POST['id'];
echo $lastName;
echo $firstName;
echo $dateTaken;
echo $fee;
echo $negativeNum;
echo $jobType;
echo $description;

$sql = "UPDATE negatives SET lastname = '$lastName', firstname ='$firstName' datetaken='$dateTaken', fee='$fee', negativenum='$negativeNum', jobtype='$jobType', description='$description' WHERE id =$id";
    
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
$conn->close();

header("Location: editNegative.php");