<?php
include('includes/header.php');
include('includes/database.php');

//retrieve search term
if (!isset($_GET['term'])) {
    $error = "No matches were found from your search.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

// retrieve search term
$term = $_GET['term'];

//explode the search terms into an array
$terms = explode(" ", $term);
$count = 0;

//select statement using pattern search. Multiple terms are concatnated in the loop.
$sql = "SELECT id, lastname, firstname, datetaken, negativenum, jobtype, description FROM negatives";
foreach ($terms as $term) {
    if ($count > 0) {
        $sql .= " AND";
    }
    $sql .= " destination LIKE '%$term%'";
    ++$count;
}

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

?>

<body>

    <div class="jumbotron">
        <h1>Search Results</h1>
    </div>

    <div class="container">

        <?php
        if ($query->num_rows == 0) {
            echo "Your search '$term' did not match any potential destinations in our inventory.";
            exit;
        }
        while (($row = $query->fetch_assoc()) !== NULL) {

//            echo "<div class='row'>";
//            echo "<div class='col-md-7'>";
//            echo "<a href='#'>";
//            echo "<img class='img-fluid rounded mb-3 mb-md-0' src=", $row['images'], "alt='Image Here'>";
//            echo "</a>";
//            echo "</div>";
//            echo "<div class='col-md-5'>";
//            echo "<h3>", $row['negativenum'], "</h3>";
//            echo "<p>To be replace with descriptions : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
//            echo "<a class='btn btn-primary' href=itemdetails.php?id=", $row['ticket_num'], "> Trip Details </a></div></div>";
//            echo "<hr>";
        }
        ?>

    </div>
</body>

<?php
include('includes/footer.php');
