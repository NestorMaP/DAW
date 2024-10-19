import { createArray } from './userInput.js';

let result = document.getElementById('result');

let words = createArray();
let mapWords = new Map();

function countWords(array) {
  array.forEach((element) => {
    if (!mapWords.has(element)) {
      mapWords.set(element, 1);
    } else {
      mapWords.set(element, mapWords.get(element) + 1);
    }
  });
}

countWords(words);

let mapHTML = '<ul>';

mapWords.forEach((value, key) => {
  mapHTML += `<li>${key}: ${value}</li>`;
});
mapHTML += '</ul></p>';
result.innerHTML = '<p>Resultados: ' + mapHTML;
