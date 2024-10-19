let result = document.getElementById('result');

const productos = [
  { nombre: 'Camiseta', precio: 20 },
  { nombre: 'Pantalón', precio: 30 },
  { nombre: 'Zapatos', precio: 50 },
];

productos.forEach(function (producto, index) {
  producto.precio *= 1.1;
  // No es necesario utilizar el segundo parámetro
  result.textContent += Math.floor(producto.precio) + ' ';
});
