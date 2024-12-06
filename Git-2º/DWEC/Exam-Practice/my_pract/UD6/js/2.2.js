let result = document.getElementById('result');

const products = [
  {name: 'T-Shirt', price: 20},
  {name: 'Pantalón', price: 30},
  {name: 'Zapatos', price: 50}
];

products.forEach(function (product) {
  product.price *= 1.1;
  result.textContent += parseInt(Math.floor(product.price)) + ' ';
});