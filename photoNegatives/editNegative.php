<?php
include('includes/header.php');
include('includes/database.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM negatives WHERE id=$id";

//execute the query
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
            <br/>
            <br/>
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
                        <td>Date Taken: </td>
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
                        <td>Job Type:</td>
                        <td><input name="jobtype" type="text" value="<?php echo $row['jobtype'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea rows="4" cols="30" name ="description" value="<?php echo $row['description'] ?>"></textarea></td>
                    </tr>
                    <tr>
                        <td><input class='btn btn-success' type="submit" value="Update"/></td>
                        <td><input type="submit" class='btn btn-danger' value="Delete">&nbsp;&nbsp;</td>
                    </tr>

                </table>
            </form>

            <br/>

            <?php
            echo "<a class='btn btn-info' href='negativeList.php'>View Negatives</a>";
            ?>

        </div>

    </div>
</div>

<?php
require_once 'includes/footer.php';
