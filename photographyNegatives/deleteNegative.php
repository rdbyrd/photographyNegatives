<?php 
include('includes/db_connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM negatives WHERE negativeNum=$id";

if(mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: editNegative.php');
    exit;
} else {
    echo "Error deleting item.";
}