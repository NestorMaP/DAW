const numeros = [1, 2, 3, 4, 5, 6];

// Desestructuración con el operador rest
const [num1, num2, ...rest] = numeros;

console.log(num1); // 1
console.log(num2); // 2
console.log(resto); // [3, 4, 5, 6]