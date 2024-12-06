// Función constructora para crear objetos de tipo Coche
function Coche(marca, model, anio) {
    this.marca = marca;
    this.modelo = modelo;
    this.anio = anio;
    }

// Añadir el método encender al prototipo de Coche
Coche.prototype.encender = function() {
    console.log(`El coche ${this.marca} ${this.modelo} ha sido encendido.`);
}

// Crear una instancia de Coche
const coche1 = new Coche('Toyota', 'Corolla', 2020);

// Llamar al método encender
coche1.encender();
// Salida: "El coche Toyota Corolla ha sido encendido"