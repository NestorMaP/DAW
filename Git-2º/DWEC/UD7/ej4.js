// Función constructora (constructor)
function Coche(marca, modelo, anio) {
    this.marca = marca;
    this.modelo = modelo;
    this.anio = anio;
    this.printInfo = function(){
        return `Marca: ${this.marca} // Modelo: ${this.modelo} // Año: ${this.anio}`;
    }
}

let coche1 = new Coche('Chevrolet','Impala','1967');
let coche2 = new Coche('KITT','Fantástico','1982');

console.log(coche1.printInfo());
console.log(coche2.printInfo());