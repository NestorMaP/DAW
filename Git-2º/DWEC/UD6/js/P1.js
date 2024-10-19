import { createArray } from './userInput.js';

let result = document.getElementById('result');

let words = createArray();

const uniqueWords = [...new Set(words)];
uniqueWords.sort((a, b) => b.localeCompare(a));

result.textContent += uniqueWords.join(', ');
