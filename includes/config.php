<?php 
    define("ROOT", "/SSRS/");
    define("HOST_NAME", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "SENG_STUDENT_RECORD");

    ob_start();
    session_start(); 

    // Establish database connection
    $con = new mysqli(HOST_NAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) {
        die('Connection failed: ' . $con->connect_error);
    }
?>