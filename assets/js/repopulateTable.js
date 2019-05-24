deleteBtn = document.getElementById('btn-delete');
dropdownCourse = document.getElementById('dropdown-course');
searchBox = document.getElementById('filter-search');
tableBody = document.querySelector('#admin-table tbody');

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
        var resultArray =JSON.parse(this.responseText);
        repopulateTable(resultArray);
    }
    xhr.send();
}

function repopulateTable(array) {
    // FOR EVERY ELEMENT OF THE TWO DIMENTIONAL ARRAY, POPULATE A TABLE ROW WITH EACH INDEX DATA
    // CREATE A <tr> NODE FROM EVERY 2D ARRAY ELEMENT
    // CREATE A <td> NODE FOR EVERY ARRAY INSIDE THAT 2D ARRAY
    // array[x][y];

    var columnCount = 6;
    var arrayLen = array.length;
    for(i=0; i<arrayLen; i++) {
        // CREATE <tr>
        row = document.createElement('tr');

        tdata_checkbox = document.createElement('td');
        tdata_img = document.createElement('td');
        // CREATE AND APPEND IMG AND CHECKBOX ELEMENTS
        checkbox = document.createElement('input');
        checkbox.setAttribute("type","checkbox");

        img = document.createElement('img');
        img.setAttribute("src", array[i]['profilepicture']);
        img.setAttribute("width","30px");
        img.setAttribute("height","30px");

        tdata_checkbox.appendChild(checkbox);
        tdata_img.appendChild(img);

        row.appendChild(tdata_checkbox);
        row.appendChild(tdata_img);
        
        for(j=0; j<columnCount; j++) {
            // CREATE <td>
            // CREATE textnode
            // console.log(array[i][j]);
            cell = document.createElement('td');
            textNode = document.createTextNode(array[i][j])
            cell.appendChild(textNode)
            row.appendChild(cell);
            
            

        }
        
        // APPEND ACTION BUTTONS

        tdata_action = document.createElement('td');
        
        tdata_viewlink = document.createElement('a')
        tdata_edit = document.createElement('button');
        tdata_deletelink = document.createElement('a')

        tdata_viewlink.setAttribute("href","admin_page.php?view="+array[i]['idno']);
        view_icon = document.createElement('img');
        view_icon.setAttribute("src", "assets/images/eye.svg")
        view_icon.setAttribute("width", "18px");
        view_icon.setAttribute("height", "18px");
        tdata_viewlink.appendChild(view_icon);

        tdata_edit.setAttribute("class", "btn-edit");
        tdata_edit.setAttribute("sid", array[i]['idno']);
        edit_icon = document.createElement('img');
        edit_icon.setAttribute("src", "assets/images/pencil-edit-button.svg");
        edit_icon.setAttribute("width", "18px");
        edit_icon.setAttribute("height", "18px");
        tdata_edit.appendChild(edit_icon);

        tdata_deletelink.setAttribute("href","admin_page.php?delete="+array[i]['idno']);
        delete_icon = document.createElement('img');
        delete_icon.setAttribute("src", "assets/images/garbage.svg")
        delete_icon.setAttribute("width", "18px");
        delete_icon.setAttribute("height", "18px");
        tdata_deletelink.appendChild(delete_icon);


        tdata_action.appendChild(tdata_viewlink);
        tdata_action.appendChild(tdata_edit);
        tdata_action.appendChild(tdata_deletelink);

        row.appendChild(tdata_action);

        tableBody.appendChild(row);
    }
}