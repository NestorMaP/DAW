// Añadimos el método 'media' al prototipo de los arrays
Array.prototype.media = function() {
    // Si el array está vacía, devolvemos null para evitar divisiones por 0
    if (this.length === 0) {
        return null;
    }

    // Usamos reduce para calcular la suma de los elementos del array
    const suma = this.reduce(function (accum, value) {
        return accum + value;
    }, 0);

    // Devolvemos la media aritmética
    return suma / this.length;
}

// CÓDIGO PARA VALIDAR LAS FUNCIONALIDADES

// Crear algunos array de prueba
let numeros = [10, 20, 30, 40, 50];
let numerosVacios = [];
let numerosNegativos = [-5, -10, -15, -20];
let numerosMixtos = [5, -3, 7, 12, 0];

// Probar los arrays
console.log('Media del array [10, 20, 30, 40, 50]:', numeros.media()); // Debería mostrar: 30
console.log('Media de un array vacío:', numerosVacios.media()); // Debería mostrar: null
console.log('Media de [-5, -10, -15, -20]:', numerosNegativos.media()); // Debería mostrar: -12.5
console.log('Media de [5, -3, 7, 12, 0]:', numerosMixtos.media()); // Debería mostrar: 4.2
