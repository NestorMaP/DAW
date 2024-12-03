result = document.getElementById('result');

function square(num) {
  return Math.pow(num,2);
}

let mySquareNumber = square(5);

result.textContent += mySquareNumber;