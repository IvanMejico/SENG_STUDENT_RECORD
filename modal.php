<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modal</title>
    <link rel="stylesheet" href="assets/css/css-reset.css">
    <link rel="stylesheet" href="assets/css/global-styles.css">
    <link rel="stylesheet" href="assets/css/modal-styles.css">
</head>
<body>
    <!-- <button id="modalBtn" class="button">Click Here</button> -->
    <div class="container">
        <div class="modal-container">
            <div class="modal-header-container">
                <h1>Edit Record</h1>
            </div>
            <div class="modal-form-container">
                <div>
                    <img src="assets/images/user.svg" alt="" width="100px">
                    <span class="modal-form-message">Student already exists in the record!</span>
                    <p class="modal-formgroup">
                        <input type="text" class="field" placeholder="ID No." style="width: 28.8%">
                        <select name="course" id="" class="field" style="width: 40%">
                            <option value="bsce">BS Civil Engineering</option>
                            <option value="bsee">BS Electrical Engineering</option>
                            <option value="bsece">BS Electronics and Communications Engineering</option>
                            <option value="bscpe">BS Computer Engineering</option>
                            <option value="bsme">BS Mechanical Engineering</option>
    
                        </select>
                        <select name="gender" id="" class="field" style="width: 28.5%">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="lgbtq">LGBTQ</option>
                        </select>
                    </p>
                    <p class="modal-formgroup"><input type="text" class="field" placeholder="Firstname" style="width: 100%"></p>
                    <p class="modal-formgroup"><input type="text" class="field" placeholder="Middlename" style="width: 100%"></p>
                    <p class="modal-formgroup"><input type="text" class="field" placeholder="Lastname" style="width: 100%"></p>
                    <div class="modal-btn-container">
                        <div>
                            <button class="btn btn-save">Save</button>
                            <button class="btn btn-cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/modal.js"></script>
</body>
</html>