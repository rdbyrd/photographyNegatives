<?php
include('includes/header.php');
include('includes/database.php');
?>
<body>
    <div class='container-fluid' id='fieldInput'>
        <div class='row'>
            <div class = 'col-md-5'>
                <br/>
                <br/>

                <h1>Search Page</h1>

                <?php
                if (isset($_POST['search'])) {
                    $search = mysqli_real_escape_string($conn, $_POST['search']);
                    $sql = "SELECT * FROM negatives WHERE lastname LIKE '%$search%' OR firstname LIKE '%$search%' OR datetaken LIKE '%$search%' OR fee LIKE '%$search%' OR negativenum LIKE '%$search%' OR jobtype LIKE '%$search%' OR description LIKE '%$search%S'";
                    $result = mysqli_query($conn, $sql);
                    $queryResult = mysqli_num_rows($result);

                    echo $queryResult . " results found. <hr/>";
                                        
                    if ($queryResult > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div><a href='editNegative.php?id=" . $row['id'] . "&negativenum=" . $row['negativenum'] . "'><h3>" . $row['negativenum'] . "</a></h3>
                <p>Lastname: " . $row['lastname'] . "</p>
                <p>Firstname: " . $row['firstname'] . "</p>
                <p>Date Taken: " . $row['datetaken'] . "</p>
                <p>Fee: $" . $row['fee'] . "</p>
                <p>Job Type: " . $row['jobtype'] . "</p>
                <p>" . $row['description'] . "</p>
                </div><hr/>";
                        }
                    }
                } else {
                    echo "No results.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
<?php

include('includes/footer.php');