<?php 
    if (isset($_SESSION['userLoggedIn'])) {
        header("Location: admin_login.php");
    }
?>
<?php include('includes/config.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/classes/Student.php') ?>
<?php $student = new Student($con) ?>
<?php include('includes/handlers/register-handler.php') ?>

<div class="admin-content">
    <div class="admin-content__register-form">
        <h1>Register Student</h1>
        <span class="register-form-message"><?php echo $response_message ?></span>
        <div>
            <form action="admin_page.php" method="POST" id="addform">
                <div>
                    <img src="assets/images/profile.svg" name="profilepic" alt="" class="profile-picture-large">
                    <button class="btn btn-upload-photo">Upload Photo</button>
                </div>
                <div>
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
                <div>
                    <button type="reset" class="btn btn-reset" name="btn-reset" >Reset Form</button>
                    <button type="submit" class="btn btn-register-student" name="btn-register-student" style="margin-right: 5px">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Add PHP code for pagination -->
    <div class="admin-pagination-container">
        <span>
        <?= $student->getCount() ?>
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
        <div class="manage-container__header">
            <h1>Manage Students</h1>
            <div>
                <!-- I'll probably remove the btn-selectall and btn-delete-selected class
                    later on and apply the styles to the id of the elements if I don't see
                    purpose of keeping them -->
                <button class="btn btn-selectall" id="btn-selectall">
                    <img src="assets/images/task-complete.svg" alt="" width="20px" height="20px">
                    <span>Select all</span>
                </button>
                <button class="btn btn-delete-selected" id="btn-delete-selected">
                    <img src="assets/images/minus-sign-inside-a-black-circle.svg" alt="" width="20px" height="20px">
                    <span>Delete</span>
                </button>
            </div>
            <div>
                <select id="dropdown-filter-course" class="field-filter-course">
                    <option value="" disabled selected>Select a course</option>
                    <option value="BSCE">BS Civil Engineering</option>
                    <option value="BSEE">BS Electrical Engineering</option>
                    <option value="BSECE">BS Electronics Engineering</option>
                    <option value="BSCpE">BS Computer Engineering</option>
                    <option value="BSME">BS Mechanical Engineering</option>
                </select>
                <input type="text" id="text-filter-search" class="text-filter-search" placeholder="Search">
            </div>
        </div>
        <div class="manage-container__body">
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
                <?php $student->populateTable() ?>
            </table>
        </div>
    </div>
</div>
<?php include('modal.php')?>
<?php include('includes/footer.php') ?>
<script src="assets/js/modal.js"></script>
<script src="assets/js/manageAdminTable.js"></script>