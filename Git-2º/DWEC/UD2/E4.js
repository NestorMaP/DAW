let mainBtn = document.getElementById("mainBtn");
let binRes = document.getElementById("binRes");
let octRes = document.getElementById("octRes");
let hexRes = document.getElementById("hexRes");

mainBtn.addEventListener("click",convert)

function convert() {
    let num = parseInt(document.getElementById("mainInput").value);
    binRes.innerText = num.toString(2);
    octRes.innerText = num.toString(8);
    hexRes.innerText = num.toString(16).toUpperCase();
}