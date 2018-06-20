<?php

// define parameters
$host = "localhost";
$login = "root";
$password = "";
$database = "negative_db";
// connect to mysql server
$conn = @new mysqli($host, $login, $password, $database);
if ($conn->connect_errno) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection to database failed: ($errno) $errmsg.");
}
// select statement
$sql = "SELECT * FROM negatives";
// execute query
$query = $conn->query($sql);
