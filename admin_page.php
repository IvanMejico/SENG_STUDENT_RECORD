<?php include('includes/header.php')?>
<?php include('includes/config.php')?>

<?php
    // FOR INSERTING DATA TO THE DATABASE
    $message = "";
    // Add some validation later on
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['btn-add'])) {
            //save data to the database
            // echo "okay";
            $idno = $_POST['idno'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $course = $_POST['course'];
            $profpic = "assets/images/profile.svg";
            
            $queryString = "INSERT INTO students (idno, firstname, middlename, lastname, gender, course, profilepicture) 
                            VALUES ('$idno', '$firstname', '$middlename', '$lastname', '$gender', '$course', '$profpic');";
            if(mysqli_query($con, $queryString) == TRUE) {
                $message = "Student added to the database.";
            } else {
                // echo "not added";
                // echo "";
            }
            // print_r($_POST);
        } else {
            // echo "not set";
        }

    }
?>

<?php 
    // FOR DELETING DATA FROM THE DATABASE
    IF ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['delete'])) {
            $studentId = $_GET['delete'];
            $queryString = "DELETE FROM students WHERE idno='$studentId'";
		    if(mysqli_query($con, $queryString) == TRUE) {
                $message = "Student no. $studentId deleted";
		    } else {
                $message = "Student no. $studentId not deleted";
            }
        }
    }
?>
<div class="admin-main-container">
    <div class="register-container">
        <h1>Register Student</h1>
        <span class="register-form-message"><?= $message ?></span>
        <div>
            <form action="#" method="POST" id="#addform" class="register-form">
                <!-- upload photo -->
                <div>
                    <img src="assets/images/profile.svg" name="profilepic" alt="" class="profile-picture-large">
                    <button class="btn btn-upload-photo">Upload Photo</button>
                </div>
                <!-- fields -->
                <div>
                    <!-- Add name properties -->
                    <p class="formgroup">
                        <input type="text" name ="idno" class="field" style="width:30%" placeholder="ID No.">
                        <select name="course" class="field field-dropdown" style="width:37%">
                            <option value="BSCE">BS Civil Engineering</option>
                            <option value="BSEE">BS Electrical Engineering</option>
                            <option value="BSECE">BS Electronics Engineering</option>
                            <option value="BSCpE">BS Computer Engineering</option>
                            <option value="BSME">BS Mechanical Engineering</option>
                        </select>
                        <select name="gender" id="" class="field field-dropdown" style="width:30%">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBTQ"Male>LGBTQ</option>
                        </select>
                    </p>
                    <p class="formgroup">
                        <input type="text" name="firstname" class="field" style="width:100%" placeholder="Firstname">
                    </p>
                    <p class="formgroup">
                        <input type="text" name="middlename" class="field" style="width:100%" placeholder="Middlename">
                    </p>
                    <p class="formgroup">
                        <input type="text" name="lastname" class="field" style="width:100%" placeholder="Lastname">
                    </p>
                </div>
                <!-- buttons -->
                <div>
                    <button class="btn btn-reset" name="btn-reset">Reset Form</button>
                    <button class="btn btn-add" name="btn-add" style="margin-right: 5px">Add</button>
                </div>
            </form>
        </div>
    </div>

    <?php
        // FOR RETRIEVING DATA FROM THE DATABASE
        $resultString = "";
        $queryString = "SELECT * FROM students";
        $query = mysqli_query($con, $queryString);
        $num_rows = mysqli_num_rows($query);
    ?>

    <div class="admin-pagination-container">
        <span>
        <?php
            if ($num_rows > 0) {
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
        <div class="admin-pagination">
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
    <div class="manage-container">
        <div class="manage-header-container">
            <h1>Manage Students</h1>
            <div>
                <button class="btn btn-selectall" id="btn-selectall"><img src="assets/images/task-complete.svg" alt="" width="20px" height="20px"> <span>Select all</span></button>
                <button class="btn btn-delete" id="btn-delete"><img src="assets/images/minus-sign-inside-a-black-circle.svg" alt="" width="20px" height="20px"><span>Delete</span></button>
            </div>
            <div>
                <select name="course" id="dropdown-course" class="field-filter-course">
                    <option value="bsce">BS Civil Engineering</option>
                    <option value="bsee">BS Electrical Engineering</option>
                    <option value="bsece">BS Electronics Engineering</option>
                    <option value="bscpe">BS Computer Engineering</option>
                    <option value="bsme">BS Mechanical Engineering</option>
                </select>
                <input type="text" id="filter-search" class="field-filter-search" placeholder="Search">
            </div>
        </div>
        <div>
            <table class="admin-table" id="admin-table">
                <tr>
                    <th></th>
                    <th></th>
                    <th>ID No.</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Course</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    // $query = "SELECT * FROM students";
                    // $student->getTable($query); 
                    
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
                                . " <a href='admin_page.php?view=" . $row['idno'] . "'><img src='assets/images/eye.svg' alt='' width='18px' height='18px'></a>"
                                . "<button class='btn-edit' sid='". $row['idno'] . "'><img src='assets/images/pencil-edit-button.svg' alt='' width='18px' height='18px'></button>"
                                . " <a href='admin_page.php?delete=" . $row['idno'] . "'><img src='assets/images/garbage.svg' alt='' width='18px' height='18px'></a>"
                                . "</td>";
                                echo "</tr>";
                                $i++;
                            }
                        }
                    }
                ?>
            </table>
        </div>

    </div>
    <script src="assets/js/repopulateTable.js"></script>
</div>
<!-- INCLUDE MODAL HERE -->
<?php include('modal.php')?>
<?php include('includes/footer.php') ?>