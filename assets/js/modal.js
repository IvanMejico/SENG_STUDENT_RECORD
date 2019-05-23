// Get modal element
var modal = document.getElementsByClassName('container')[0];
// Get open modal button
// var modalBtn = document.getElementById('modalBtn');
var modalBtn = document.getElementsByClassName('btn-edit');
// Get close button
var cancelBtn = document.getElementsByClassName('btn-cancel')[0];

// Listen for open click
modalBtn[0].addEventListener('click', openModal);
modalBtn[1].addEventListener('click', openModal);
modalBtn[2].addEventListener('click', openModal);
modalBtn[3].addEventListener('click', openModal);
modalBtn[4].addEventListener('click', openModal);
modalBtn[5].addEventListener('click', openModal);
modalBtn[6].addEventListener('click', openModal);
modalBtn[7].addEventListener('click', openModal);


// Listen for close click
cancelBtn.addEventListener('click', closeModal);
// Listen for outside click
window.addEventListener('click', clickOutside);

// Function to open modal
function openModal() {
    modal.style.display = 'block';
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