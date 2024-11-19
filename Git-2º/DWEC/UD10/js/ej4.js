import * as calculator from "./modules/calculadora.js";

let num1 = document.getElementById('num1');
let num2 = document.getElementById('num2');
let result = document.getElementById('result')
let sumBtn = document.getElementById('sum');
let subBtn = document.getElementById('substract');
let mulBtn = document.getElementById('multiply');
let divBtn = document.getElementById('divide');

sumBtn.addEventListener('click',() => {
  let value1 = Number(num1.value);
  let value2 = Number(num2.value);
  try {
    result.innerHTML = `Result: ${calculator.sum(value1, value2)}`;
  } catch (e) {
    result.innerHTML = `Result: ${e.message}`;
  }
});

subBtn.addEventListener('click',() => {
    let value1 = Number(num1.value);
    let value2 = Number(num2.value);
    try {
      result.innerHTML = `Result: ${calculator.subtract(value1, value2)}`;
    } catch (e) {
      result.innerHTML = `Result: ${e.message}`;
    }
  });

mulBtn.addEventListener('click',() => {
    let value1 = Number(num1.value);
    let value2 = Number(num2.value);
    try {
      result.innerHTML = `Result: ${calculator.multiply(value1, value2)}`;
    } catch (e) {
      result.innerHTML = `Result: ${e.message}`;
    }
  });

divBtn.addEventListener('click',() => {
    let value1 = Number(num1.value);
    let value2 = Number(num2.value);
    try {
      result.innerHTML = `Result: ${calculator.divide(value1, value2)}`;
    } catch (e) {
      result.innerHTML = `Result: ${e.message}`;
    }
  });
