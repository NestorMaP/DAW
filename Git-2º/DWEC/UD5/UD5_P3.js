let myDiv = document.getElementById('P3');

let data = [
  { name: 'Nacho', telephone: '966112233', age: 40 },
  { name: 'Ana', telephone: '911223344', age: 35 },
  { name: 'Mario', telephone: '611998877', age: 15 },
  { name: 'Laura', telephone: '633663366', age: 17 },
];
console.log(data);

// a) Add two elements at the end
data.push(
  { name: 'Pedro', telephone: '611944444', age: 25 },
  { name: 'Julia', telephone: '633232323', age: 37 }
);

// b) Test if they have been added
console.log(data);

// c) Sort by age
//data.sort(((a,b) => a.age - b.age));
for (let i = 0; i < data.length - 1; i++) {
  currentAge = data[i].age;
  nextAge = data[i + 1].age;

  if (currentAge > nextAge) {
    [data[i], data[i + 1]] = [data[i + 1], data[i]];
    i = -1;
  }
}
console.log(data);

// d) Sort by name
//data.sort((a,b) => a.name.localeCompare(b.name));
for (let i = 0; i < data.length - 1; i++) {
  let currentName = data[i].name;
  let nextName = data[i + 1].name;

  if (currentName > nextName) {
    [data[i], data[i + 1]] = [data[i + 1], data[i]];
    i = -1;
  }
}
console.log(data);

// e) New vector with >30 years
let adultData = [];
for (let i = 0; i < data.length; i++) {
  if (data[i].age > 30) {
    adultData.push(data[i]);
  }
}
console.log(adultData);
let stringArray = '';
for (let person of adultData) {
    stringArray += `
        <p>${person.name} --> ${person.age} years. Phone: ${person.telephone}</p>`
}
myDiv.innerHTML = stringArray;