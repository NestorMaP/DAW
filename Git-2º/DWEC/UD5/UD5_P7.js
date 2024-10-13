// TO BE ABLE TO SEE THE RESULT IN THE CONSOLE PLEASE COMMENT ALL 'myDiv' RELATED ELEMENTS
myDiv = document.getElementById('P7');

lottery50 = [];

for (let i=0;i<50;i++) {
    let currentCombination = [];
    for (let j=0;j<6;j++) {
        value = Math.floor((Math.random()*49)+1);
        if (currentCombination.indexOf(value) == -1) {
            currentCombination.push(value);
        } else {
            j--;
        }
    }
    lottery50.push(currentCombination);
    myDiv.innerHTML += `[${currentCombination}] `;
}
console.log(lottery50);
