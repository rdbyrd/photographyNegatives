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
            <form action="manageEdit.php" method="get">
                <table>
                    <tr>
                        <td>Family Name: </td>
                        <td><input name="familyname" type="text" value="<?php echo $row['familyname'] ?>"></td>
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
                        <td>Address: </td>
                        <td><input name="address" type="number" value="<?php echo $row['address'] ?>"></td>
                    </tr>
                    <tr>
                        <td>File Number:</td>
                        <td><input name="negativenum" type="number" value="<?php echo $row['negativenum'] ?>"></td>
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
                        <!--<td><input type="submit" class='btn btn-danger'  value="Delete">&nbsp;&nbsp;</td>-->
                    </form>
                    <form>
                        <td><form action='deleteConfirm.php' method="post">
                                <input type="hidden" name="name" value="">
                                <input type="submit" class='btn btn-danger' name="submit" value="Delete">
                            </form>
                            </tr>

                            </table>

                    <br/>

                    <?php
                    echo "<a class='btn btn-info' href='negativeList.php'>View Negatives</a>";
                    ?>

                    </div>
                    </div>
                    </div>

                    <?php
                    require_once 'includes/footer.php';
                    