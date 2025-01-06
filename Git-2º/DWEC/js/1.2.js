// COMENTAR LÍNEA DE DEBAJO PARA VERLO EN CONSOLA
result = document.getElementById('result');

(function () {
  let contador;
  contador++;
})();

// COMENTAR LÍNEA DE DEBAJO PARA VERLO EN CONSOLA
typeof contador !== 'undefined'
  ? (result.textContent += contador)
  : (result.textContent += 'ReferenceError: contador is not defined');

// Para ver en consola
console.log(contador);
