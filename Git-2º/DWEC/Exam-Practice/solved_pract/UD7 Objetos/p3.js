// Clase Ordenador
class Ordenador {
    constructor(marca, modelo, ram = 4, discoDuro = 512, plugadas = 17) {
        this.marca = marca;
        this.modelo = modelo;
        this.ram = ram;
        this.discoDuro = discoDuro;
        this.pulgadas = pulgadas;
    }

    // Método toString para mostrar los detalles del ordenador
    toString() {
        return `Ordenador: ${this.marca} ${this.modelo}, RAM: ${this.ram}GB, Disco Duro: ${this.discoDuro}GB, Pantalla: ${this.pulgadas} pulgadas`;
      }
}

// Clase Portátil que extiende de Ordenador
class Portatil extends Ordenador {
    constructor(marca, modelo, ram = 4, discoDuro = 256, pulgadas = 12, autonomia = 4) {
        // Llama al constructor de Ordenador con los valores por defecto o los dados
        super(marca, modelo, ram, discoDuro, pulgadas);
        this.autonomia = autonomia; // Nueva propiedad 'autonomia'
    }

    // Sobreescribe el método toString para añadir la autonomía
    toString() {
        return `${super.toString()}, Autonomía: ${this.autonomia} horas`;
    }
}

// Ejemplo de uso:

// Crear un ordenador con valores por defecto
const ordenador1 = new Ordenador('Dell', 'XPS');
console.log(ordenador1.toString());
// "Ordenador: Dell XPS, RAM: 4GB, Disco Duro: 512GB, Pantalla: 17 pulgadas"

// Crear un ordenador portátil con valores por defecto
const portatil1 = new Portatil('Apple', 'MacBook Air');
console.log(portatil1.toString());
// "Ordenador: Apple MacBook Air, RAM: 4GB, Disco Duro: 256GB, Pantalla: 12 pulgadas, Autonomía: 4 horas"

// Crear un portátil con valores personalizados
const portatil2 = new Portatil('HP', 'Spectre', 8, 512, 13, 10);
console.log(portatil2.toString());
// "Ordenador: HP Spectre, RAM: 8GB, Disco Duro: 512GB, Pantalla: 13 pulgadas, Autonomía: 10 horas"