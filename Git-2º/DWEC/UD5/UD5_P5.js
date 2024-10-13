myDiv = document.getElementById('P5');

let values = [6, 3, 5, 6, 5, 4, 2, 4];
myDiv.innerHTML += `Values: [${values}]<br>`;

myDiv.innerHTML += 'List: {';
const list = new Set(values);
for (let element of list) {
  myDiv.innerHTML += `${element}, `;
}
myDiv.innerHTML = myDiv.innerHTML.slice(0,-2) + '}';
