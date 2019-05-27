<?php
    class Student {
        private $con;
        private $count;
        private $idNo;
        private $firstName;
        private $middleName;
        private $lastName;
        private $course;
        private $gender;
        private $profilePicture;

        function __construct($con) {
            $this->con = $con;
        }

        public function registerStudent($studId, $fName, $mName, $lName, 
                            $gender, $course, $profPic) {
            // Call some validation functions here
            // This might be on a separate funciton when validation is finally available
            $queryString = "INSERT INTO students (idno, firstname, middlename, lastname, gender, course, profilepicture) 
                            VALUES ('$studId', '$fName', '$mName', '$lName', '$gender', '$course', '$profPic')";
            
            $result = mysqli_query($this->con, $queryString);
            return $result;
        }
        // Declare some validation functions here

        // This code feels a bit inefficient. Do I really need to query twice
        // just to get the student count and to render the table rows?
        public function getCount() {
            $queryString = "SELECT * FROM students";
            $query = mysqli_query($this->con, $queryString);
            $this->count = mysqli_num_rows($query);
            $resultstring = "";
            
            if ($this->count > 0) {
                if($this->count >= 10) {
                    $resultString = "Showing 10 out of " . $this->count . " entries";
                } else {
                    $resultString = "Showing " . $this->count . " out of " . $this->count . " entries";
                }
            } else {
                $resultString = "No records found!";
            }

            return $resultString;
        }
        
        public function populateTable() {
            $queryString = "SELECT * FROM students";
            $query = mysqli_query($this->con, $queryString);
            $num_rows = mysqli_num_rows($query);

            if ($num_rows > 0) {
                $i = 0;
                while($row = mysqli_fetch_array($query)) {
                    if($i < 10) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='checkbox' id='checkbox'></td>";
                        echo "<td><img src='" . $row['profilepicture'] . "' width='30px' height='30px'></td>"
                        . "<td>" . $row['idno'] . "</td>"
                        . "<td>" . $row['firstname'] . "</td>"
                        . "<td>" . $row['middlename'] . "</td>"
                        . "<td>" . $row['lastname'] . "</td>"
                        . "<td>" . $row['course'] . "</td>"
                        . "<td>" . $row['gender'] . "</td>"
                        . "<td>"
                        . " <a href='student_record.php' class='btn-view'><img src='assets/images/eye.svg' alt='' width='18px' height='18px'></a>"
                        . "<button id='" . $row['idno'] . "' class='btn-edit'><img src='assets/images/pencil-edit-button.svg' alt='' width='18px' height='18px'></button>"
                        . " <button id='". $row['idno'] . "' class='btn-delete'><img src='assets/images/garbage.svg' alt='' width='18px' height='18px'></button>"
                        . "</td>";
                        echo "</tr>";
                        $i++;
                    }
                }
            }
        }
    }
?>