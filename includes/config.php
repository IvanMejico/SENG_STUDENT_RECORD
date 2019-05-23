<?php 
    $con = new mysqli("localhost", "root", "", "SENG_STUDENT_RECORD");

    if ($con->connect_error) {
        die('Connection failed: ' . $con-connect_error);
    } else {
        // echo "connected";
    }
?>