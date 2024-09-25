const TURQUOISE = "#40E0D0";
const WHITE = "#FFFFFF"

let myDiv = document.getElementById("myDiv");
myDiv.addEventListener("mouseover",changeDivColor);
myDiv.addEventListener("mouseout",resetDivColor);

function changeDivColor(){
    myDiv.style.backgroundColor=TURQUOISE;
}

function resetDivColor(){
    myDiv.style.backgroundColor=WHITE;
}