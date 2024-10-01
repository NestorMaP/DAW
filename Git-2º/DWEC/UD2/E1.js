let button = document.getElementById("btn");
let res1 = document.getElementById("res1");
let res2 = document.getElementById("res2");
let res3 = document.getElementById("res3");
let res4 = document.getElementById("res4");

button.addEventListener("click",convert);

function convert() {
    let input = document.getElementById("input").value;
    
    reverse (input);
    caps (input);
    repeat(input);
    reverseCaps(input);
}

function reverse(text) {
    let array = text.split('');
    let reversedString = '';
    for (let i=array.length -1; i>=0;i--) {
        reversedString += array[i];
    }
    res1.value = reversedString;
}

function caps(text) {
    res2.value = text.toUpperCase();
}

function repeat(text) {
    res3.value = text.repeat(3);
}

function reverseCaps(text) {
    let array = text.split('');
    let reversedString = '';
    for (let i=array.length -1; i>=0;i--) {
        reversedString += array[i];
    }
    res4.value = reversedString.toUpperCase();
}