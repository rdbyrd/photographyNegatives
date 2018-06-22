<?php

include('includes/database.php');

$id = $_GET['id'];

$sql = "DELETE FROM negatives WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: negativeList.php');
    exit;
} else {
    echo "Error deleting item.";
}