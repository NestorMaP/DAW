const TURQUOISE = "#40E0D0";

let myDiv = document.getElementById("myDiv");
myDiv.addEventListener("mouseover",changeDivColor);

function changeDivColor(){
    myDiv.style.backgroundColor=TURQUOISE;
}