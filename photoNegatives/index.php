<?php
include 'includes/header.php';
?>

<body>
    <!-- Jumbotron header to be used in INCLUDES file -->
    <div class="jumbotron main-header">
        <h1>Photography Negatives</h1>
        <p>Add a negative</p>
        <form class='container-fluid' id='fieldInput' action="addNegative.php" method="post">
            <div class='row'>
                <div class ='col-md-6'>

                    <label for='lastname'>Lastname:</label>
                    <input type="text" name ="lastname" required><br/>

                    <label for='firstname'>Firstname:</label>
                    <input type="text" name ="firstname"><br/>

                    <label for='datetaken'>Date Taken:</label>
                    <input type="date" name ="datetaken" required><br/>

                    <label for='fee'>Fee: $</label>
                    <input type="number" step=".01" name ="fee"><br/>

                    <label>Negative Number:</label>
                    <input type="number" name ="negativenum" required><br/>

                    <label>Job Type:</label>
                    <input type="text" name ="jobtype"><br/>

                    <label>Description:</label>
                    <textarea rows="4" cols="30" name ="description"></textarea><br/><br/>

                    <div class='button'>
                        <button type="submit" class="btn btn-success" value="submit">Submit</button>
                        <button type="submit" class="btn btn-danger" value="cancel" onClick="window.location.reload()">Restart</button><br/><br/>
                        <a class='btn btn-info' href='negativeList.php'>View Negatives</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</body>

<?php
include 'includes/footer.php';
