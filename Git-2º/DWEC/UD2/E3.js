let tableRow = document.getElementById("tableRow");
let mainBtn = document.getElementById("mainBtn");

mainBtn.addEventListener("click", createTable);

function createTable() {
    // First we remove all the info
    tableRow.innerHTML = "";
    let string = document.getElementById("input").value;
    let arrayString = string.toUpperCase().split('');

    // Loop that handles adding cells to the table within the content
    for (let i=0; i<arrayString.length; i++) {
        tableRow.innerHTML += "<td>"+arrayString[i]+"</td>";
    }
}