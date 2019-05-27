// Get modal element
// var modal = document.getElementsByClassName('container')[0];
var modal = document.getElementById('m1');

// Get cancel button
var cancelBtn = document.getElementsByClassName('btn-cancel')[0];
// Get save button
var saveBtn = document.getElementsByName('modal-btn-save')[0];

// GET THE MODAL FORM ELEMENTS
var studentId = document.getElementsByName('modal-idno')[0];
var firstName = document.getElementsByName('modal-fname')[0];
var middleName = document.getElementsByName('modal-mname')[0];
var lastName = document.getElementsByName('modal-lname')[0];
var course = document.getElementsByName('modal-course')[0];
var gender = document.getElementsByName('modal-gender')[0];

// Listen for close click
cancelBtn.addEventListener('click', closeModal);
// Listen for save click
saveBtn.addEventListener('click', sumbitForm);
// Listen for outside click
window.addEventListener('click', clickOutside);

// Function to open modal
function openModal() {
    modal.style.display = 'block';

    sid = this.getAttribute('sid');
    populateForm(sid);
}

// Function to close modal
function closeModal() {
    modal.style.display = 'none'
}

// Function to close modal if outside click
function clickOutside(e) {
    if (e.target == modal) {
        modal.style.display = 'none'
    }
}

function populateForm(sid) {
    var xhr = new XMLHttpRequest();
    // console.log(sid);
    xhr.open('GET', 'includes/handlers/ajax/getUserData.php?sid=' + sid, true);

    xhr.onload = function () {
        var user = JSON.parse(this.responseText);

        studentId.value = user['idno'];
        firstName.value = user['firstname'];
        middleName.value = user['middlename'];
        lastName.value = user['lastname'];
        course.value = user['course'];
        gender.value = user['gender'];

        // console.log(user);
    }
    xhr.send();
}

function sumbitForm(sid) {
    //get form data
    //retrieve record by id
    //save record to database
    //populated table with new data

    var idno = studentId.value;
    var fname = firstName.value;
    var mname = middleName.value;
    var lname = lastName.value;
    var crse = course.value;
    var gndr = gender.value;

    var data = 'idno=' + idno + '&firstname=' + fname + '&middlename=' + mname 
                + '&lastname=' + lname + '&course=' + crse +'&gender=' + gndr;

    var xhr = new XMLHttpRequest();
    // console.log(sid);
    xhr.open('POST', 'includes/handlers/ajax/saveUserData.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        document.getElementsByClassName('register-form-message')[0].innerHTML = this.responseText;
        // console.log(user);
    }
    xhr.send(data);
    
    console.log('submitted!');
    closeModal();
}