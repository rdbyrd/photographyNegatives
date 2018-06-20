<?php
include('includes/header.php');
include('includes/database.php');
?>

<?php
require_once 'includes/database.php';
require_once 'includes/header.php';

$sql = "SELECT * FROM negatives WHERE id='$id'";

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
        <div class = 'col-md-6'>
            <h2>Update Information</h2>
            <form action="manageEdit.php" method="post">
                <table>
                    <tr>
                        <td>Lastname: </td>
                        <td><input name="lastname" type="text" value="<?php echo $row['lastname'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Firstname: </td>
                        <td><input name="firstname" type="text" value="<?php echo $row['firstname'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Date: </td>
                        <td><input name="datetaken" type="date" value="<?php echo $row['datetaken'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Fee: </td>
                        <td><input name="fee" type="number" value="<?php echo $row['fee'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Negative:</td>
                        <td><input name="negativenum" type="text" value="<?php echo $row['negativenum'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Job:</td>
                        <td><input name="jobtype" type="text" value="<?php echo $row['jobtype'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><input name="description" type="text" value="<?php echo $row['description'] ?>"></td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <input type="submit" value="Update" />
                            <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />                    
                        </td>
                    </tr>
                </table>
            </form>
<?php
echo "<br>";

echo "<a class='btn btn-danger' href=userdelete.php?id=", $row['user_id'], ">Delete</a>";
echo "<br><a class='btn btn-outline-secondary' href='negativeList.php'>View Negatives</a>";
?>    
        </div>

    </div>
</div>

<?php
require_once 'includes/footer.php';
