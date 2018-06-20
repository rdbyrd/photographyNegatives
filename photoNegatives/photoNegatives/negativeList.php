<?php

require_once ('includes/header.php');
require_once('includes/database.php');

//define the select statement
$sql = "SELECT * FROM negatives";

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}

//display results in a table
?>
<h2 class="jumbotron">Negative List</h2>
<table class='table table-hover'>
    <thead class='thead-dark'>
        <tr>
            <th width="50px">ID</th>
            <th width="100px">Lastname</th>
            <th width="100px">Firstname</th>
            <th width="100px">Date</th>
            <th width="100px">Fee</th>
            <th width="100px">Negative</th>
            <th width="100px">Job Type</th>
            <th width="100px">Description</th>
            <!--consider adding a reviews tab later.-->
        </tr>
    </thead>
    <?php
    //insert a row into the table for each row of data
    while (($row = $query->fetch_assoc()) !== NULL) {
        echo "<tr>";
        echo "<td><a href=negativeDetails.php?id=", $row['id'], ">", $row['id'], "</td>";
        echo "<td>", $row['lastname'], "</td>";
        echo "<td>", $row['firstname'], "</td>";
        echo "<td>", $row['date'], "</td>";
        echo "<td>", $row['fee'], "</td>";
        echo "<td>", $row['negativenumber'], "</td>";
        echo "<td>", $row['jobtype'], "</td>";
        echo "<td>", $row['description'], "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php

// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');
