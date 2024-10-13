// TO BE ABLE TO SEE THE RESULT IN THE CONSOLE PLEASE COMMENT ALL 'myDiv' RELATED ELEMENTS
myDiv = document.getElementById('P8');

numbers = []

// Filling the array
for (let i=0;i<10000;i++) {
    numbers.push(Math.floor((Math.random()*10)+1));
}

console.log('Frequencies');
myDiv.innerHTML += '<p>Frequencies</p>';
// Counting repetitions
for (let i=1;i<=10;i++) {
    counter = 0;
    for(let j=0;j<numbers.length;j++) {
        if(numbers[j] === i) {
            counter++;
        }
    }
    console.log(`Number: ${i}: ${counter}`);
    myDiv.innerHTML += `<p>Number: ${i}: ${counter}</p>`;
}
