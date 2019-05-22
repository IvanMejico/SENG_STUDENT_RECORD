<?php include('includes/header.php')?>

<div class="admin-main-container">
    <div class="register-container">
        <h1>Register Student</h1>
        <span class="register-form-message">Student registered successfully</span>
        <div>
            <form action="" class="register-form">
                <!-- upload photo -->
                <div>
                    <img src="assets/images/profile.svg" alt="" class="profile-picture-large">
                    <button class="btn btn-upload-photo">Upload Photo</button>
                </div>
                <!-- fields -->
                <div>
                    <p class="formgroup">
                        <input type="text" class="field" style="width:30%" placeholder="ID No.">
                        <!-- <input type="text" class="field" style="width:36.89%" placeholder="Course"> -->
                        <select name="course" id="" class="field field-dropdown" style="width:37%">
                            <option value="bsce">BS Civil Engineering</option>
                            <option value="bsee">BS Electrical Engineering</option>
                            <option value="bsece">BS Electronics Engineering</option>
                            <option value="bscpe">BS Computer Engineering</option>
                            <option value="bsme">BS Mechanical Engineering</option>
                        </select>
                        <select name="gender" id="" class="field field-dropdown" style="width:30%">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="lgbtq"Male>LGBTQ</option>
                        </select>
                    </p>
                    <p class="formgroup">
                        <input type="text" class="field" style="width:100%" placeholder="Firstname">
                    </p>
                    <p class="formgroup">
                        <input type="text" class="field" style="width:100%" placeholder="Middlename">
                    </p>
                    <p class="formgroup">
                        <input type="text" class="field" style="width:100%" placeholder="Lastname">
                    </p>
                </div>
                <!-- buttons -->
                <div>
                    <button class="btn btn-reset">Reset Form</button>
                    <button class="btn btn-add" style="margin-right: 5px">Add</button>
                </div>
            </form>
        </div>
    </div>

    <div class="admin-pagination-container">
        <span>Showing 10 out of 230 entries</span>
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
                <button class="btn btn-selectall"><img src="assets/images/task-complete.svg" alt="" width="20px" height="20px"> <span>Select all</span></button>
                <button class="btn btn-delete"><img src="assets/images/minus-sign-inside-a-black-circle.svg" alt="" width="20px" height="20px"><span>Delete</span></button>
            </div>
            <div>
                <select name="course" id="" class="field-filter-course">
                    <option value="bsce">BS Civil Engineering</option>
                    <option value="bsee">BS Electrical Engineering</option>
                    <option value="bsece">BS Electronics Engineering</option>
                    <option value="bscpe">BS Computer Engineering</option>
                    <option value="bsme">BS Mechanical Engineering</option>
                </select>
                <input type="text" class="field-filter-search" placeholder="Search">
            </div>
        </div>
        <div>
            <table clas="admin-table">
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
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td><img src="assets/images/profile.svg" alt="" width="30px" height="30px"></td>
                    <td>21h-1192</td>
                    <td>Ivan</td>
                    <td>Sotto</td>
                    <td>Mejico</td>
                    <td>BSCpE</td>
                    <td>Male</td>
                    <td>
                        <a href=""><img src="assets/images/eye.svg" alt="" width="18px" height="18px"></a>
                        <a href=""><img src="assets/images/pencil-edit-button.svg" alt="" width="18px" height="18px"></a>
                        <a href=""><img src="assets/images/garbage.svg" alt="" width="18px" height="18px"></a>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td><img src="assets/images/profile.svg" alt="" width="30px" height="30px"></td>
                    <td>21h-1192</td>
                    <td>Ivan</td>
                    <td>Sotto</td>
                    <td>Mejico</td>
                    <td>BSCpE</td>
                    <td>Male</td>
                    <td>
                        <a href=""><img src="assets/images/eye.svg" alt="" width="18px" height="18px"></a>
                        <a href=""><img src="assets/images/pencil-edit-button.svg" alt="" width="18px" height="18px"></a>
                        <a href=""><img src="assets/images/garbage.svg" alt="" width="18px" height="18px"></a>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td><img src="assets/images/profile.svg" alt="" width="30px" height="30px"></td>
                    <td>21h-1192</td>
                    <td>Ivan</td>
                    <td>Sotto</td>
                    <td>Mejico</td>
                    <td>BSCpE</td>
                    <td>Male</td>
                    <td>    
                        <a href=""><img src="assets/images/eye.svg" alt="" width="18px" height="18px"></a>
                        <a href=""><img src="assets/images/pencil-edit-button.svg" alt="" width="18px" height="18px"></a>
                        <a href=""><img src="assets/images/garbage.svg" alt="" width="18px" height="18px"></a>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</div>

<?php include('includes/footer.php') ?>