<?php
    include('../../config.php');

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['sid'])) {
            $queryString = "SELECT * FROM students WHERE idno='" . $_GET['sid'] . "'";
            $query = mysqli_query($con, $queryString);
            $num_rows = mysqli_num_rows($query);
            
            if($num_rows > 0) {
                $row = mysqli_fetch_array($query);
                echo json_encode($row);
            } else {
                echo "no record found!";
            }
        } 

        if (isset($_GET['cid'])) {
            $tableResult = array();
            $queryString = "SELECT * FROM students WHERE course='" . $_GET['cid'] . "'";
            $query = mysqli_query($con, $queryString);
            $row_count = mysqli_num_rows($query);

            if($row_count > 0) {
                while($row = mysqli_fetch_array($query)) {
                    array_push($tableResult, $row);
                }
                echo json_encode($tableResult);
            } else {
                echo 'none';
            }
        }

        if (isset($_GET['searchstr'])) {
            $searchString = $_GET['searchstr'];
            $tableResult = [];

            $queryString = "SELECT * FROM students WHERE course LIKE '%$searchString%'"
            . "OR firstName LIKE '%$searchString%' OR middleName LIKE '%$searchString%'"
            . "OR lastName LIKE '%$searchString%'";

            $query = mysqli_query($con, $queryString);
            $row_cnt = mysqli_num_rows($query);
            // echo json_encode($row_cnt);

            if($row_cnt > 0) {
                // LOOP THROUGH ALL THE ROW DATA
                // POPULATE ARRAY WITH ROW DATA
                while($row = mysqli_fetch_array($query)) {
                    array_push($tableResult, $row);
                }
                echo json_encode($tableResult);
            }
        }
    }
?>