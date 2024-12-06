// Función constructora para crear objetos de tipo Coche
function Coche(marca, model, anio) {
    this.marca = marca;
    this.modelo = modelo;
    this.anio = anio;
    this.detalles = function () {
        return `Marca: ${this.marca}, Modelo: ${this.modelo}, Año: ${this.año}`;
    };
}

// Crear dos instancias de Coche
const coche1 = new Coche('Toyota', 'Corolla', 2020);
const coche2 = new Coche('Ford', 'Mustang', 1969);

console.log(coche1.detalles());
// Salida: "Marca: Toyota, Modelo: Corolla, Año: 2020"

console.log(coche2.detalles());
// Salida: "Marca: Ford, Modelo: Mustang, Año: 1969"