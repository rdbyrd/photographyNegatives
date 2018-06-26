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
<body>

    <h2 class="jumbotron">File List</h2>
    <table id="myTable2" class='table table-hover'>
        <thead class='thead-dark'>
            <tr>
                <th onclick="sortTable(0)" width="100px">Number</th>
                <th onclick="sortTable(1)" width="100px">Family Name</th>
                <th onclick="sortTable(2)" width="100px">Firstname</th>
                <th onclick="sortTable(3)" width="100px">Date</th>
                <th onclick="sortTable(4)" width="100px">Address</th>
                <th onclick="sortTable(5)" width="100px">Job Type</th>
                <th onclick="sortTable(6)" width="100px">Description</th>
            </tr>
        </thead>
        <?php
        //insert a row into the table for each row of data
        while (($row = $query->fetch_assoc()) !== NULL) {
            echo "<tr>";
            echo "<td><a href=editNegative.php?id=", $row['id'], ">", $row['negativenum'], "</td>";
            echo "<td>", $row['familyname'], "</td>";
            echo "<td>", $row['firstname'], "</td>";
            echo "<td>", $row['datetaken'], "</td>";
            echo "<td>", $row['address'], "</td>";
            echo "<td>", $row['jobtype'], "</td>";
            echo "<td>", $row['description'], "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

<script>
    function sortTable(n) {

        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable2");
        switching = true;

        // Set the sorting direction to ascending:
        dir = "asc";

        /* Make a loop that will continue until
         no switching has been done: */
        while (switching) {

            // Start by saying: no switching is done:
            switching = false;
            rows = table.getElementsByTagName("TR");

            /* Loop through all table rows (except the
             first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {

                // Start by saying there should be no switching:
                shouldSwitch = false;

                /* Get the two elements you want to compare,
                 one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];

                /* Check if the two rows should switch place,
                 based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {

                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {

                /* If a switch has been marked, make the switch
                 and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;

                // Each time a switch is done, increase this count by 1:

                switchcount++;
            } else {

                /* If no switching has been done AND the direction is "asc",
                 set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');
