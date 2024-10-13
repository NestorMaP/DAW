myDiv = document.getElementById('P2');

// Declaration of the array
let letters = [];

//Insertion of first elements
/* 
By using 'unshift', the array will be [C, B, A].
If we wanted the array to be [A, B, C, D, E], we could use the 'push()' method
for all the letters. However, this example demonstrates the use of 'unshift()' 
to add to the front and 'push()' to add to the back.
*/
letters.unshift('A');
letters.unshift('B');
letters.unshift('C');
letters.push('D');
letters.push('E');

// Elimination of the first element
let deleted2 = letters.shift();
myDiv.innerHTML += '<p>First item deleted: ' + deleted2 + '</p>';

// Elimination of the first element
deleted2 = letters.pop();
myDiv.innerHTML += '<p>Last item deleted: ' + deleted2 + '</p>';

// Print the array
myDiv.innerHTML += '<p>Remaining array: ' + letters.toString() + '</p>';
