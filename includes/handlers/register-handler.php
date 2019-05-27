 <?php
    // Ad some sanitization functions here
    $response_message = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['btn-register-student']))
            $studId = $_POST['idno'];
            $fName = $_POST['firstname'];
            $mName = $_POST['middlename'];
            $lName = $_POST['lastname'];
            $gender = $_POST['gender'];
            $course = $_POST['course'];
            $profPic = "assets/images/profile.svg"; // Change this code into something more dynamic

            $wasSuccessful = $student->registerStudent($studId, $fName, $mName, $lName, 
                                            $gender, $course, $profPic);
            if($wasSuccessful) {
                $response_message = "Student added to the database.";
            } else {
                $response_message = "Student not added to the database";
            }
    }
?>