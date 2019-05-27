dropdownFilterCourse = document.getElementById('dropdown-filter-course');
searchBox = document.getElementById('text-filter-search');
tableBody = document.querySelector('#admin-table tbody');
deleteSelectedBtn = document.getElementById('btn-delete-selected');
editRecordBtn = document.getElementsByClassName('btn-edit');
deleteRowBtn = document.getElementsByClassName('btn-delete');

dropdownFilterCourse.addEventListener('change', dropDownSearch);
searchBox.addEventListener('keyup', textboxSearch);
deleteSelectedBtn.addEventListener('click', deleteSelected);

// This code probably needs to be more dynamic just in case
// that newer programs are added
var selectionValues = ['','BSCE', 'BSEE', 'BSECE', 'BSCpE', 'BSME'];

function deleteSelected() {
    clearTable();
}

function deleteRow() {
    var id = this.getAttribute('id');
    if (confirm("Are you sure you want to delete student no. " + id + "?")) {
        data = 'sid=' + id;
        xhr = new XMLHttpRequest();
        xhr.open('POST', 'includes/handlers/ajax/deleteUserData.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            document.getElementsByClassName('register-form-message')[0].innerHTML = this.responseText;
        }
        xhr.send(data);
    
        var row = this.parentNode.parentNode;
        var index = row.rowIndex;
        document.getElementById('admin-table').deleteRow(index);
    }
}


function dropDownSearch() {
    clearTable();
    var courseid = selectionValues[dropdownFilterCourse.selectedIndex];
    searchData(courseid, 'dropdown');
}

function textboxSearch() {
    clearTable();
    var searchString = searchBox.value;
    searchData(searchString, 'text');
}

function clearTable() {
    var table = document.getElementById('admin-table');
    var numTableRows = table.rows.length-1;

    for (var i=0; i < numTableRows; i++) {
        table.deleteRow(1);
    }
}

// AJAX request to retrieve data
function searchData(key, mode) {
    var xhr = new XMLHttpRequest();
    if (mode == 'dropdown') {
        xhr.open('GET', 'includes/handlers/ajax/getUserData.php?cid=' + key, true);
    } else if(mode == 'text') {
        xhr.open('GET', 'includes/handlers/ajax/getUserData.php?searchstr' + key, true);
    }
    xhr.onload = function () {
        if(this.responseText != "none") {
            var response = JSON.parse(this.responseText);
            console.log(response);
            repopulateTable(response);
        } else {
            console.log("no data");
        }
    }
    xhr.send();
}

function repopulateTable(record) {
    var recordCount = record.length;
    var columnCount = 6;

    for(i=0; i<recordCount; i++) {
        row = document.createElement('tr');

        // CREATE CHECKBOX AND IMAGE ELEMENTS
        cell_checkbox = document.createElement('td');
        cell_image = document.createElement('td');

        // Assign attributes to table elements
        checkbox = document.createElement('input');
        checkbox.setAttribute("type","checkbox");
        image = document.createElement('img');
        image.setAttribute("src", record[i]['profilepicture']);
        image.setAttribute("width","30px");
        image.setAttribute("height","30px");

        // Append checkbox and image elements to row
        cell_checkbox.appendChild(checkbox);
        cell_image.appendChild(image);
        row.appendChild(cell_checkbox);
        row.appendChild(cell_image);
        
        // CREATE AND APPEND TEXT DATA TO THE ROW
        for(j=0; j<columnCount; j++) {
            cell = document.createElement('td');
            texcell = document.createTextNode(record[i][j])
            cell.appendChild(texcell)
            row.appendChild(cell);
        }
        
        // CREATE ACION BUTTONS
        cell_action = document.createElement('td');
        viewButton = document.createElement('a')
        editButton = document.createElement('button');
        deleteButton = document.createElement('button')

        // Button icons; I would probably change these later on to a background image
        view_icon = document.createElement('img');
        edit_icon = document.createElement('img');
        delete_icon = document.createElement('img');
        
        var studentId = record[i]['idno'];

        viewButton.setAttribute("href", "student_record.php");
        viewButton.setAttribute("class", "btn-view")
        view_icon.setAttribute("src", "assets/images/eye.svg")
        view_icon.setAttribute("width", "18px");
        view_icon.setAttribute("height", "18px");

        editButton.setAttribute("id", studentId);
        editButton.setAttribute("class", "btn-edit");
        edit_icon.setAttribute("src", "assets/images/pencil-edit-button.svg");
        edit_icon.setAttribute("width", "18px");
        edit_icon.setAttribute("height", "18px");

        deleteButton.setAttribute("id",studentId)
        deleteButton.setAttribute("class","btn-delete");
        delete_icon.setAttribute("src", "assets/images/garbage.svg")
        delete_icon.setAttribute("width", "18px");
        delete_icon.setAttribute("height", "18px");

        viewButton.appendChild(view_icon);
        editButton.appendChild(edit_icon);
        deleteButton.appendChild(delete_icon);

        cell_action.appendChild(viewButton);
        cell_action.appendChild(editButton);
        cell_action.appendChild(deleteButton);

        row.appendChild(cell_action);
        tableBody.appendChild(row);

    }
    addEditEventListener();
    addDeleteEventListener();
}

// Listen for edit click
function addEditEventListener() {
    for (let i=0; i < editRecordBtn.length; i++) {
        editRecordBtn[i].addEventListener('click', openModal);
    }
}

function addDeleteEventListener() {
    for(let i=0; i < deleteRowBtn.length; i++) {
        deleteRowBtn[i].addEventListener('click', deleteRow)
    }
}

addDeleteEventListener();
addEditEventListener();

// Add a js code that allows the page to scroll to a certain element