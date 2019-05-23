// Get modal element
// var modal = document.getElementsByClassName('container')[0];
var modal = document.getElementById('m1');
// Get open modal button
// var modalBtn = document.getElementById('modalBtn');
var modalEditBtn = document.getElementsByClassName('btn-edit');
// Get cancel button
var cancelBtn = document.getElementsByClassName('btn-cancel')[0];
// Get save button
var saveBtn = document.getElementsByName('btn-save')[0]


// Listen for open click
for (let i = 0; i < modalEditBtn.length; i++) {
    modalEditBtn[i].addEventListener('click', openModal);
}

// GET THE MODAL FORM ELEMENTS
var studentId = document.getElementsByName('modal-idno')[0];
var firstName = document.getElementsByName('modal-fname')[0];
var middleName = document.getElementsByName('modal-mname')[0];
var lastName = document.getElementsByName('modal-lname')[0];
var course = document.getElementsByName('modal-course')[0];
var gender = document.getElementsByName('modal-gender')[0];

// Listen for close click
cancelBtn.addEventListener('click', closeModal);
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
    console.log(sid);
    xhr.open('GET', 'includes/handlers/ajax/getUserData.php?sid=' + sid, true);

    xhr.onload = function () {
        var user = JSON.parse(this.responseText);

        studentId.value = user['idno'];
        firstName.value = user['firstname'];
        middleName.value = user['middlename'];
        lastName.value = user['lastname'];
        course.value = user['course'];
        gender.value = user['gender'];

        console.log(user);
    }

    xhr.send();
}