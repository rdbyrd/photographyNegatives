<?php
include('includes/header.php');
include('includes/database.php');
?>

<?php
require_once 'includes/database.php';
require_once 'includes/header.php';

$sql = "SELECT * FROM negatives WHERE id='$ID'";

$query = $conn->query($sql);

if (!$query) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection to database failed: ($errno) $errmsg.");
} else {
    $row = $query->fetch_assoc();
}
?>

<div class='container'>
    <div class='row'>
        <div class = 'col-md-5'>
            <h2>Update Information</h2>
            <form action="manageEdit.php" method="post">
                <table>
                    <tr>
                        <td>Lastname: </td>
                        <td><input name="lastname" type="text" value="<?php echo $row['LastName'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Firstname: </td>
                        <td><input name="firstname" type="text" value="<?php echo $row['FirstName'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Date: </td>
                        <td><input name="datetaken" type="date" value="<?php echo $row['DateTaken'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Fee: </td>
                        <td><input name="fee" type="number" value="<?php echo $row['Fee'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Negative:</td>
                        <td><input name="negativenum" type="text" value="<?php echo $row['NegativeNum'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Job:</td>
                        <td><input name="jobtype" type="text" value="<?php echo $row['JobType'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea rows="4" cols="30" name ="description" value="<?php echo $row['Description'] ?>"></textarea></td>
                    </tr>
                    <tr>
            <td><input class='btn btn-success' type="submit" value="Update" /></td>
            <td><input class='btn btn-info'type="button" value="Cancel" onclick="window.location.href = 'index.php'" /></td>
                    </tr>
                   
                </table>
            </form>

            <br/>

            <?php
            echo "<td><a class='btn btn-danger' href=userdelete.php?id=", $row['ID'], ">Delete</a></td>";
            
            echo "<br/>";
            echo "<br/>";
            
            echo "<a class='btn btn-info' href='negativeList.php'>View Negatives</a>";
            ?>    
        </div>

    </div>
</div>

<?php
require_once 'includes/footer.php';
