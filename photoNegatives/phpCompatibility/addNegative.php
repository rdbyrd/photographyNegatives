<?php

//include code from header.php and database.php
require_once('includes/database.php');

$lastName = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$firstName = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$dateTaken = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'datetaken', FILTER_SANITIZE_STRING)));
$fee = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'fee', FILTER_SANITIZE_STRING)));
$negativeNum = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'negativenum', FILTER_SANITIZE_STRING)));
$jobType = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'jobtype', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));


//insert statement. The id field is an auto field.
$sql = "INSERT INTO tickets VALUES (NULL, '$lastName', '$firstName', '$dateTaken', '$fee' , '$negativeNum', '$jobType', '$description')";

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
