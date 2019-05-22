<?php
    class Student {
        private $con;
        private $id;
        private $course;
        private $firstname;
        private $middlename;
        private $lastname;
        private $gender;
        private $profilepic;


        function __construct($con) {
            $this->con = $con;
        }

        function getTable($queryString) {
            $query = mysqli_query($this->con, $queryString);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows) {
                while($row = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['profilepicture'] . "' width='40px' height='40px'></td>"
                    . "<td>" . $row['idno'] . "</td>"
                    . "<td>" . $row['firstname'] . "</td>"
                    . "<td>" . $row['middlename'] . "</td>"
                    . "<td>" . $row['lastname'] . "</td>"
                    . "<td>" . $row['course'] . "</td>"
                    . "<td>" . $row['gender'] . "</td>";
                    echo "</tr>";
                }
            }
        }
    }
?>