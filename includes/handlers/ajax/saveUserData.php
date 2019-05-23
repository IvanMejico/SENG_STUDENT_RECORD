<?php
    include('../../config.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['idno'])) {
            // Add update of profile picture later on
            $idno = $_POST['idno'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $course = $_POST['course'];

            $queryString = "UPDATE students SET idno='$idno', firstname='$firstname', 
                            middlename='$middlename', lastname='$lastname', 
                            gender='$gender', course='$course' WHERE idno='$idno'";
            if (mysqli_query($con, $queryString) == TRUE) {
                echo "Record updated!";
            } else {
                echo "Record not updated!";
            }
        } else {
            echo "something went wrong!";
        }
    }
?>