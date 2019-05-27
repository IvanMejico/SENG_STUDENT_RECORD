logout = document.getElementById('btn-logout');
logout.addEventListener('click', logoutUser);

function logoutUser() {
    var xhr = new XMLHttpRequest();
    params="logout";
    // console.log(sid);
    xhr.open('POST', 'includes/handlers/ajax/logout-handler.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        console.log(this.responseText);
    }
    xhr.send(params);
}