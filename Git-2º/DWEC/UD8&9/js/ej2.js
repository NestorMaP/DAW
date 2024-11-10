let axisX = document.getElementById('x_pos');
let axisY = document.getElementById('y_pos');

function updatePosition(event) {
  let x = event.clientX;
  let y = event.clientY;
  axisX.textContent = `Axis X: ${x}`;
  axisY.textContent = `Axis Y: ${y}`;
}

document.addEventListener('mousemove', updatePosition);
