<?php
include 'includes/header.php';
?>

<body>
    <!-- Jumbotron header to be used in INCLUDES file -->
    <div class="jumbotron main-header">
        <h1>Image Files</h1>
        <p>Add a new record.</p>
        <form class='container' id='fieldInput' action="addNegative.php" method="post">
            <div class='row'>
                <div class ='col-md-6'>


                    <label for='familyname'>Family Name:</label>
                    <input type="text" name ="familyname"><br/>

                    <label for='firstname'>Firstname:</label>
                    <input type="text" name ="firstname" required><br/>

                    <label for='datetaken'>Date:</label>
                    <input type="text" name ="datetaken" required><br/>

                    <label for='address'>Address:</label>
                    <input type="text" name ="address"><br/>

                    <label for='negativenum'>File Number:</label>
                    <input type="number" name ="negativenum" required><br/>

                    <label for='jobtype'>Job Type:</label>
                    <input type="text" name ="jobtype"><br/>

                    <label for='description'>Description:</label>
                    <textarea rows="4" cols="30" name ="description"></textarea><br/><br/>

                    <div class='button'>
                        <button type="submit" class="btn btn-success" value="submit">Submit</button>
                        <button type="submit" class="btn btn-danger" value="cancel" onClick="window.location.reload()">Restart</button><br/><br/>
                        <a class='btn btn-info' href='negativeList.php'>File List</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</body>

<?php
include 'includes/footer.php';
