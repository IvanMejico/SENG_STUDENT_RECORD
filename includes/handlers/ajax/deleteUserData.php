<?php
    include('../../config.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['sid'])) {
            $queryString = "DELETE FROM students WHERE idno='" . $_POST['sid'] . "'";
            if (mysqli_query($con, $queryString) == TRUE) {
                echo "Record deleted!";
            }
        }
    }
    
?>