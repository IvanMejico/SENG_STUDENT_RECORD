<?php include('includes/config.php')?>
<?php include('includes/header.php')?>
<?php include('includes/classes/Student.php')?>

<?php
    $student = new Student($con);
?>
<!-- navbar -->
<div class="main-container">
        <div class="navbar">
            <div><h1>programs</h1></div>
            <div>
                <ul>
                    <!-- use pseudo-element for triangle for each link-->
                    <li>BS Civil Engineering</li>
                    <li>BS Electrical Engineering</li>
                    <li>BS Electronics and Communication Engineering</li>
                    <li>BS Computer Engineering</li>
                    <li>BS Mechanical Engineering</li>
                </ul>
            </div>
        </div>
        <!-- table -->
        <div class="main-area">
            <div class="table-container">
                <!-- pagination -->
                <div>
                    <div class="results-stat">
                        <span>Showing 10 out of 230 entries</span>
                    </div>
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
                    <tr>
                        <td><img src="assets/images/profile.svg" alt="" width="40px" height="40px"></td>
                        <td>21H-2213</td>
                        <td>Ivan</td>
                        <td>Sotto</td>
                        <td>Mejico</td>
                        <td>BSCpE</td>
                        <td>Male</td>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM students";
                        $student->getTable($query); 
                    ?>
                </table>
                     
            </div>
        </div>
    </div>

<?php include('includes/footer.php')?>