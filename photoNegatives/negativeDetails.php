<?php
require_once ('includes/header.php');
require_once ('includes/database.php');

//retrieve negative id as it relates to the database
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "<h2>Something is wrong.</h2>";
    require_once ('includes/footer.php');
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM negatives WHERE id=" . $id;

//execute the query
$query = $conn->query($sql);

//retrieve the results
$row = $query->fetch_assoc();

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();

    //include the footer
    require_once ('includes/footer.php');
    exit;
}

//display results in a table
?>

<h2 class="jumbotron">Negative Details</h2>

<table align="center">
    <tr>
        <th>ID</th>
        <td><?php echo $row['id'] ?></td>
    </tr>
    <tr>
        <th>Lastname</th>
        <td><?php echo $row['familyname'] ?> </td>
    </tr>    
    <tr>
        <th>Firstname</th>
        <td><?php echo $row['firstname'] ?> </td>
    </tr>    
    <tr>
        <th>Date Taken</th>
        <td><?php echo $row['datetaken'] ?> </td>
    </tr>    
    <tr>
        <th>Fee</th>
        <td><?php echo $row['address'] ?> </td>
    </tr>    
    <tr>
        <th>Negative</th>
        <td><?php echo $row['negativenum'] ?> </td>
    </tr>    
    <tr>
        <th>Job Type</th>
        <td><?php echo $row['jobtype'] ?> </td>
    </tr>    
    <tr>
        <th>Description</th>
        <td><?php echo $row['description'] ?> </td>
    </tr>    
</table>
<p align="center">

<form action="deleteNegative.php" onsubmit="return confirm('Confirm this action if you wish to delete history.')" align='center'>
    <?php echo "<a class='btn btn-info' href=editNegative.php?id=", $row['id'], ">Edit Negative</a>"; ?>
    <input type="button" onclick="window.location.href = 'negativeList.php'" class='btn btn-info' value="Cancel"><br/><br/>
    <input type="submit" class='btn btn-danger' value="Delete">&nbsp;&nbsp;
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
</form>
</p>

<?php
//finish the query to remove results
$query->close();

// close the connection.
$conn->close();

require_once ('includes/footer.php');
