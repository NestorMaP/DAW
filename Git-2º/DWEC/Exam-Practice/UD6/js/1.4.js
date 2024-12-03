// COMENTAR LÍNEA DE DEBAJO PARA VERLO EN CONSOLA
result = document.getElementById('result');

const trueFalse = (num) => {
  return num % 2 === 0 ? 'Es par' : 'Es impar';
};

result.textContent += trueFalse()