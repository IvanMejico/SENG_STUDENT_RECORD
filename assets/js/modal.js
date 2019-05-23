// Get modal element
var modal = document.getElementsByClassName('container')[0];
// Get open modal button
// var modalBtn = document.getElementById('modalBtn');
var modalEditBtn = document.getElementsByClassName('btn-edit');
// Get close button
var cancelBtn = document.getElementsByClassName('btn-cancel')[0];

// Listen for open click
for (let i=0; i < modalEditBtn.length; i++) {
    modalEditBtn[i].addEventListener('click', openModal);
}

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
    if(e.target == modal){
        modal.style.display = 'none'
    }
}

function populateForm(sid) {
    var xhr = new XMLHttpRequest();
    console.log(sid);
    xhr.open('GET', 'includes/handlers/ajax/getUserData.php?sid='+sid, true);

    xhr.onload = function(){
        console.log(this.responseText);
    }

    xhr.send();
}