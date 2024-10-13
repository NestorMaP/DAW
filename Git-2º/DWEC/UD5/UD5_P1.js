myDiv = document.getElementById('P1');

let countries = ['Spain', 'France', 'Germany', 'Italy'];

// Iterate the array and print each country
myDiv.innerHTML += '<p>';
for (let i = 0; i < countries.length; i++) {
  myDiv.innerHTML += countries[i];
  if (i < countries.length - 1) {
    myDiv.innerHTML += ', ';
  }
}
myDiv.innerHTML += '</p>';

// Delete the first item of the array
let deleted = countries.shift();
myDiv.innerHTML += '<p>Deleted country: ' + deleted + '</p>';

// Iterate the array for the second time
myDiv.innerHTML += '<p>';
for (let i = 0; i < countries.length; i++) {
  myDiv.innerHTML += countries[i];
  if (i < countries.length - 1) {
    myDiv.innerHTML += ', ';
  }
}
myDiv.innerHTML += '</p>';
