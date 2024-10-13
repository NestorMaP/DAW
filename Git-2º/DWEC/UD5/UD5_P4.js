myDiv = document.getElementById('P4');

let numbers = [4,8,15,16,23,42];
myDiv.innerHTML += `Numbers: ${numbers}<br><br>`;

// Destructuring array
let num1,num2,remainder;
[num1,num2,...remainder] = numbers;
myDiv.innerHTML += `Number 1: ${num1}<br>`;
myDiv.innerHTML += `Number 2: ${num2}<br>`;
myDiv.innerHTML += `Remaining Array: [${remainder}]`;
console.log(num2);
console.log(remainder);