// COMENTAR LÍNEA DE DEBAJO PARA VERLO EN CONSOLA
result = document.getElementById('result');

const trueFalse = (num) => {
  return num % 2 === 0 ? 'Es par' : 'Es impar';
};

// COMENTAR LÍNEAS DE DEBAJO PARA VERLO EN CONSOLA
const trueFalse2 = (num) => {
  return num % 2 === 0 ? 'Es par' : 'Es impar';
};
result.textContent += trueFalse2(4);

// Para ver en consola
console.log(trueFalse(3));
