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
<style>
/*    table, th, td {
        border: 1px solid black;
    }
    td {
        vertical-align: bottom;
    }*/
</style>
<h2 class="jumbotron">Negative Details</h2>

<table align="center">
    <tr>
        <th>ID</th>
        <td><?php echo $row['ID'] ?></td>
    </tr>
    <tr>
        <th>Lastname</th>
        <td><?php echo $row['LastName'] ?> </td>
    </tr>    
    <tr>
        <th>Firstname</th>
        <td><?php echo $row['FirstName'] ?> </td>
    </tr>    
    <tr>
        <th>Date Taken</th>
        <td><?php echo $row['DateTaken'] ?> </td>
    </tr>    
    <tr>
        <th>Fee</th>
        <td><?php echo $row['Fee'] ?> </td>
    </tr>    
    <tr>
        <th>Negative</th>
        <td><?php echo $row['NegativeNum'] ?> </td>
    </tr>    
    <tr>
        <th>Job</th>
        <td><?php echo $row['JobType'] ?> </td>
    </tr>    
    <tr>
        <th>Description</th>
        <td><?php echo $row['Description'] ?> </td>
    </tr>    
</table>
<p align="center">

<form action="deleteNegative.php" onsubmit="return confirm('Confirm this action if you wish to delete history.')" align='center'>
    <input type="submit" value="Delete">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'negativeList.php'" value="Cancel">
    <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
</form>
</p>

<?php
//finish the query to remove results
$query->close();

// close the connection.
$conn->close();

require_once ('includes/footer.php');