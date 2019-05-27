<?php include('includes/config.php')?>
<?php include('includes/header.php')?>

<?php //include('includes/classes/Student.php')?>

<?php
    // $student = new Student($con);
?>
<!-- navbar -->
<?php
    $queryString="";
    $resultString="";
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['course'])) {
            $queryString = "SELECT * FROM students WHERE course = '" . $_GET['course'] . "'";
        } else {
            $queryString = "SELECT * FROM students";
        }
    }

    if (isset($_GET['search'])) {
        $searchString = $_GET['search'];
        $queryString = "SELECT * FROM students WHERE course LIKE '%$searchString%'"
        . "OR firstName LIKE '%$searchString%' OR middleName LIKE '%$searchString%'"
        . "OR lastName LIKE '%$searchString%'";
    }
    
    $query = mysqli_query($con, $queryString);
    $num_rows = mysqli_num_rows($query);
?>
<div class="main-container">
        <div class="navbar">
            <div><h1>programs</h1></div>
            <div>
                <ul>
                    <!-- use pseudo-element for triangle for each link-->
                    <!-- add function to make selected menu active -->
                    <a href="index.php?course=bsce"><li>BS Civil Engineering</li></a>
                    <a href="index.php?course=bsee"><li>BS Electrical Engineering</li></a>
                    <a href="index.php?course=bsece"><li>BS Electronics and Communication Engineering</li></a>
                    <a href="index.php?course=bscpe"><li>BS Computer Engineering</li></a>
                    <a href="index.php?course=bsme"><li>BS Mechanical Engineering</li></a>
                </ul>
            </div>
        </div>
        <!-- table -->
        <div class="main-area">
            <div class="table-container">
                <!-- pagination -->
                <div>
                    <div class="results-stat">
                        <!-- IF rows  >= 10 show 10
                             ELSE IF rows >  -->
                        <span><?php
                            if ($num_rows) {
                                if($num_rows >= 10) {
                                    $resultString = "Showing 10 out of " . $num_rows . " entries";
                                } else {
                                    $resultString = "Showing " . $num_rows . " out of " . $num_rows . " entries";
                                }
                            } else {
                                $resultString = "No records found!";
                            }

                            echo $resultString; ?>
                            </span>
                    </div>
                    <!-- I'll add pagination code later -->
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a class="active" href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>  
                </div>

                <table class="records-table">
                    <tr>
                        <th></th>
                        <th>ID No.</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Course</th>
                        <th>Gender</th>
                    </tr>
                    <?php 
                        // $query = "SELECT * FROM students";
                        // $student->getTable($query); 
                        if ($num_rows > 0) {
                            $i=0;
                            while($row = mysqli_fetch_array($query)) {
                                if($i < 10) {
                                    echo "<tr>";
                                    echo "<td><img src='" . $row['profilepicture'] . "' width='40px' height='40px'></td>"
                                    . "<td>" . $row['idno'] . "</td>"
                                    . "<td>" . $row['firstname'] . "</td>"
                                    . "<td>" . $row['middlename'] . "</td>"
                                    . "<td>" . $row['lastname'] . "</td>"
                                    . "<td>" . $row['course'] . "</td>"
                                    . "<td>" . $row['gender'] . "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            } 
                        }
                    ?>
                </table>
                     
            </div>
        </div>
    </div>

<?php include('includes/footer.php')?>