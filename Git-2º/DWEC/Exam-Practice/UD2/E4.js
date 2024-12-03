let mainBtn = document.getElementById("mainBtn");
let binRes = document.getElementById("binRes");
let octRes = document.getElementById("octRes");
let hexRes = document.getElementById("hexRes");

mainBtn.addEventListener("click",convert);

function convert() {
    let input = parseInt(document.getElementById("mainInput").value);
    binRes.textContent = input.toString(2);
    octRes.textContent = input.toString(8);
    hexRes.textContent = input.toString(16).toUpperCase();
}