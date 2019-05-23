<?php
    include('../../config.php');

    echo "connected!";

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['sid'])) {
            $queryString = "SELECT * FROM students WHERE idno='" . $_GET['sid'] . "'";
            $query = mysqli_query($con, $queryString);
            $num_rows = mysqli_num_rows($query);
            
            if($num_rows > 0) {
                echo "record found!";
            } else {
                echo "no record found!";
            }
        } else {
            echo "query unsuccessful";
        }
    }
?>