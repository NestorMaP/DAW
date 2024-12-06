let tableRow = document.getElementById("tableRow");
let input = document.getElementById("input");
let mainBtn = document.getElementById("mainBtn");

mainBtn.addEventListener("click", createTable);

function createTable() {
    // First we remove all the info
    tableRow.innerHTML = '';
    let input = document.getElementById("input").value;
    let array = input.toUpperCase().split('');

    // Loop that handles the cells creation
    for (let i=0; i<array.length; i++) {
        tableRow.innerHTML += '<td>'+array[i]+'</td>';
    }
} 