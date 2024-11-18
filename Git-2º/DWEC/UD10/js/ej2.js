let num1 = document.getElementById('num1');
let num2 = document.getElementById('num2');
let result = document.getElementById('result')
let submitBtn = document.getElementById('submitBtn');

submitBtn.addEventListener('click',() => {
  let numerator = num1.value;
  let denominator = num2.value;
  try {
    result.innerHTML = `Result: ${divide(numerator, denominator)}`;
  } catch (e) {
    result.innerHTML = `Result: ${e.message}`;
  }
})

function divide(num1, num2) {
  let n1 = Number(num1);
  let n2 = Number(num2);
  if (n2 === 0) {
    throw new Error('No se puede dividir por cero');
  }
  return n1/n2;
}
