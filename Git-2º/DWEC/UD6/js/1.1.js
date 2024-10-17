// COMENTAR LÍNEA DE DEBAJO PARA VERLO EN CONSOLA
result = document.getElementById('result');

function square(num) {
  return Math.pow(num, 2);
}

let mySquareNumber = square(5);

// COMENTAR LÍNEA DE DEBAJO PARA VERLO EN CONSOLA
result.textContent += mySquareNumber;

// Para ver en consola
console.log(mySquareNumber);
