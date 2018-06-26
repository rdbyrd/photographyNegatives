<?php

//include code from header.php and database.php
require_once('includes/database.php');

$familyname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'familyname', FILTER_SANITIZE_STRING)));
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$datetaken = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'datetaken', FILTER_SANITIZE_STRING)));
$address = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING)));
$negativenum = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'negativenum', FILTER_SANITIZE_NUMBER_INT)));
$jobtype = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'jobtype', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$sql = "INSERT INTO negatives (familyname, firstname, datetaken, address, negativenum, jobtype, description)
        VALUES ('$familyname', '$firstname', '$datetaken', '$address', '$negativenum', '$jobtype', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
