function Punto(x, y) {
    // Verificamos si los valores de x e y son números, si no lo son, los asignamos a 0.
    if (typeof x === 'number') {
        this.x = x;
    } else {
        this.x = 0;
    }

    if (typeof(y) === 'number') {
        this.y = y;
    } else {
        this.y = 0;
    }
}

// Método para cambiar las coordenadas del punto
Punto.prototype.cambiar = function (newX, newY) {
    // Verificamos si los valores son números y los actualizaremos
    if (typeof(newX) === 'number') {
        this.x = newX;
    } else {
        this.x = 0;
    }

    if (typeof(newY) === 'number') {
        this.y = newY;
    } else {
        this.y = 0;
    }
}

// Método para devolver una copia del objeto
Punto.prototype.copia = function() {
    return new Punto(this.x, this.y);
}

// Método para sumar dos puntos y devolver un nuevo punto con el resultado
Punto.prototype.suma = function (otroPunto) {
    return new Punto(this.x + otroPunto.x, this.y + otroPunto.y);
}

// CÓDIGO PARA VALIDAR LAS FUNCIONALIDADES

// Crear un punto inicial con valores válidos
let punto1 = new Punto(5, 10);
console.log('Punto 1:', punto1); // Debería mostrar: Punto 1:{ x: 5, y: 10 }

// Crear un punto con valores inválidos (no numéricos)
let punto2 = new Punto('hola','mundo');
console.log('Punto 2 (valores inválidos):', punto2); // Debería mostrar: Punto 2:{ x: 0, y: 0 }

// Cambiar las coordenadas de punto1
punto1.cambiar(20, 30);
console.log('Punto 1 después de cambiar coordenadas:', punto1); // Debería mostrar: Punto: { x: 20, y: 30 }

// Obtener una copia de punto1
let copiaPunto1 = punto1.copia();
console.log('Copia de Punto 1:', copiaPunto1); // Debería mostrar: Punto 1:{ x: 20, y: 30 }

// Sumar dos puntos (punto1 y un nuevo punto)
let puntoSuma = punto1.suma(new Punto(10, 15));
console.log('Resultado de la suma de puntos:', puntoSuma); // Debería mostrar: Punto { x: 30, y: 45 }