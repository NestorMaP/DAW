let result1 = document.getElementById('result1');
let result2 = document.getElementById('result2');
let result3 = document.getElementById('result3');

const array1 = [4, 8, 15, 16, 23, 42];
const array2 = ['cuatro', 'ocho', 'quince', 'dieciseis', 'veintitrés'];
const array3 = [2, 3, 5, 7, 11, 17];

function filtro(array, funcion) {
  for (let i = 0; i < array.length; i++) {
    array[i] = funcion(array[i]);
  }
}

function duplicate(num) {
  return (num *= 2);
} //num=>num*2

function toUppercase(word) {
  word = word.toUpperCase();
  return word;
}

function factorial(num) {
  let result = 1;
  while (num > 0) {
    result *= num;
    num--;
  }
  return result;
}

filtro(array1, duplicate);
result1.textContent += array1 + ']';

filtro(array2, toUppercase);
result2.textContent += array2 + ']';

filtro(array3, factorial);
result3.textContent += array3 + ']';
