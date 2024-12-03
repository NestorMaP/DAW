myDiv = document.getElementById('P6');

// Creating the Map
let myMap = new Map([['Sarene',18],['Kaladin',21],['Shallan',35]]);

// Adding info to the Map
myMap.set('Dalinar',43).set('Adolin',23);

// Updating the Map
myMap.set('Dalinar',41);

let outputString = '';
for (let [name, age] of myMap) {
    outputString += `${name} is ${age} years old.<br>`;
}
myDiv.innerHTML = outputString;