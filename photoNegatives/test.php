<?php

require_once 'includes/header.php';
require_once 'includes/database.php';

?>

<div class="jumbotron"> 
    <h1>Negative Details</h1>
</div>

<!-- <table>
    <tr>
        <td style="width: 150px;">
            <h4>Destination:</h4>
            <h4>Time Period:</h4>
            <h4>Cost:</h4>
        </td>
        <td>
            <p><?php echo $row['NegativeNum'] ?></p>
            <p><?php echo $row['DateTaken'] ?></p>
            <p><?php echo "$" . $row['cost'] ?></p>
        </td>
    </tr>
</table> -->
<div class="container">
    <?php 
        echo "<h1 class='my-4'>", $row['ID'] ,"</h1>";
        echo "<div class='row'>";
        echo "<div class='col-md-8'>";
        echo "<img class='img-fluid' src=" , $row['images'],  " alt='Image Here'></div>";
        echo "<div class='col-md-4'>";
        echo "<h3 class='my-3'> Trip Details </h3> ";
        echo "<p>Trip Description Here: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
        echo "<h4>$", $row['cost'], "</h4>";
        echo "<a class='btn btn-primary' href=addtocart.php?id=", $row['ticket_num'], ">Add to Cart </a></div></div>";
    ?>
</div>
</form>

<?php

include_once 'includes/footer.php';