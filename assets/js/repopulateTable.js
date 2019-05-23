deleteBtn = document.getElementById('btn-delete');
dropdownCourse = document.getElementById('dropdown-course');
searchBox = document.getElementById('filter-search');

deleteBtn.addEventListener('click', deleteRow);
dropdownCourse.addEventListener('change', dropDownSearch);
searchBox.addEventListener('keydown', textboxSearch);

var selection = ['BSCE', 'BSEE', 'BSECE', 'BSCpE', 'BSME'];

function clearTable() {
    var table = document.getElementById('admin-table');
    var numTableRows = table.rows.length-1;

    for (var i=0; i < numTableRows; i++) {
        table.deleteRow(1);
    }
}


function deleteRow() {
    clearTable();
}

function dropDownSearch() {
    // GET SELECTED ITEM
    // PERFORM QUERY OUT OF THAT VALUE
    // RETURN ROWS OUT OF THAT QUERY
    // CLEAR TABLE
    // DISPLAY ALL RETURNED ROWS FROM THE QUERY
    clearTable();
    
    // searchData(queryString);
    cid=selection[dropdownCourse.selectedIndex];
    searchData(cid);
}

function textboxSearch() {

}


// PERFORM AJAX REQUEST FOR DATA
function searchData(course) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'includes/handlers/ajax/getUserData.php?cid=' + course, true);
    xhr.onload = function () {
        // REPOPULATE TABLE
        // var tableData = JSON.parse(this.responseText);
        console.log(JSON.parse(this.responseText));
    }
    xhr.send();
}