<?php

include('includes/database.php');

$id = $_POST['id'];

// sql to delete a record
$sql = "DELETE FROM negatives WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
/*

$sql = "DELETE FROM negatives WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: negativeList.php');
    exit;
} else {
    echo "Error deleting item.";
}
 * 
 */