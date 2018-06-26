<?php

//include code from header.php and database.php
require_once('includes/database.php');

$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$datetaken = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'datetaken', FILTER_SANITIZE_STRING)));
$fee = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'fee', FILTER_SANITIZE_NUMBER_FLOAT)));
$negativenum = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'negativenum', FILTER_SANITIZE_NUMBER_INT)));
$jobtype = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'jobtype', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$sql = "INSERT INTO negatives (lastname, firstname, datetaken, fee, negativenum, jobtype, description)
        VALUES ('$lastname', '$firstname', '$datetaken', '$fee', '$negativenum', '$jobtype', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
