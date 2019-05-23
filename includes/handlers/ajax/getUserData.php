<?php
    include('../../config.php');

    // echo "connected!";

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['sid'])) {
            $queryString = "SELECT * FROM students WHERE idno='" . $_GET['sid'] . "'";
            $query = mysqli_query($con, $queryString);
            $num_rows = mysqli_num_rows($query);
            
            if($num_rows > 0) {
                $row = mysqli_fetch_array($query);
                echo json_encode($row);
                // echo "record found!";
            } else {
                echo "no record found!";
            }
        } 

        if (isset($_GET['cid'])) {
            $queryString = "SELECT * FROM students WHERE course='" . $_GET['cid'] . "'";
            $query = mysqli_query($con, $queryString);
            $row_cnt = mysqli_num_rows($query);
            echo json_encode($row_cnt);

            if($num_rows > 0) {
                // LOOP THROUGH ALL THE ROW DATA
                // POPULATE ARRAY WITH ROW DATA
                while($row = mysqli_fetch_array($query)) {
                    $tableResult
                }
            }
        }
    }
?>