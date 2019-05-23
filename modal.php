    <!-- <button id="modalBtn" class="button">Click Here</button> -->
    
    <div class="container" id="m1">
        <div class="modal-container">
            <div class="modal-header-container">
                <h1>Edit Record</h1>
            </div>
            <div class="modal-form-container">
                <div>
                    <img src="assets/images/user.svg" name="modal-profpic" alt="" width="100px">
                    <span class="modal-form-message">Student already exists in the record!</span>
                    <p class="modal-formgroup">
                        <input type="text" class="field" name="modal-idno" placeholder="ID No." style="width: 28.8%">
                        <select name="modal-course" id="" class="field" name="modal-course" style="width: 40%">
                            <option value="BSCE">BS Civil Engineering</option>
                            <option value="BSEE">BS Electrical Engineering</option>
                            <option value="BSECE">BS Electronics and Communications Engineering</option>
                            <option value="BSCpE">BS Computer Engineering</option>
                            <option value="BSME">BS Mechanical Engineering</option>
    
                        </select>
                        <select name="modal-gender" id="" class="field" name="modal-gender" style="width: 28.5%">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBTQ">LGBTQ</option>
                        </select>
                    </p>
                    <p class="modal-formgroup"><input type="text" class="field" name="modal-fname" placeholder="Firstname" style="width: 100%"></p>
                    <p class="modal-formgroup"><input type="text" class="field" name="modal-mname" placeholder="Middlename" style="width: 100%"></p>
                    <p class="modal-formgroup"><input type="text" class="field" name="modal-lname" placeholder="Lastname" style="width: 100%"></p>
                    <div class="modal-btn-container">
                        <div>
                            <button class="btn btn-save" name="modal-btn-save">Save</button>
                            <button class="btn btn-cancel" name="modal-btn-cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/modal.js"></script>