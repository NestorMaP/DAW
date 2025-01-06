result = document.getElementById('result');

const personas = [
  { nombre: 'Juan', edad: 17 },
  { nombre: 'Ana', edad: 22 },
  { nombre: 'Pedro', edad: 19 },
  { nombre: 'Laura', edad: 16 },
];

const adultPeople = personas.filter((persona) => persona.edad > 18);
const olderAdultPeople = adultPeople.map((persona) => (persona.edad *= 2));
let sumAges = olderAdultPeople.reduce((accu, value) => accu + value, 0);

result.textContent += sumAges;
