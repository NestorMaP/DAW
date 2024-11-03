class Ordenador {
    constructor (marca, modelo, memoria_RAM = 4, memoria_disco = 512, pulgadas = 17) {
        this.marca = marca;
        this.modelo = modelo;
        this.memoriaRAM = memoria_RAM;
        this.memoriaDisco = memoria_disco;
        this.pulgadas = pulgadas;
    }
    toString() {
        return `${this.marca} ${this.modelo}: ${this.memoriaRAM}GB RAM; ${this.memoriaDisco}GB; ${this.pulgadas}" pantalla`;
    }
}

class Portatil extends Ordenador {
    constructor (marca,modelo, memoria_RAM = 4, memoria_disco = 256, pulgadas = 12, autonomia = 4) {
        super(marca, modelo, memoria_RAM, memoria_disco, pulgadas);
        this.autonomia = autonomia;
    }
    toString() {
        return `${super.toString()}; ${this.autonomia} horas de autonomía`;
    }
}

pc1 = new Ordenador('Acer','Aspire',8,1024,21);
pc2 = new Ordenador('Acer','Aspire');

laptop1 = new Portatil('Acer','Aspire',8,1024,21,12);
laptop2 = new Portatil('Acer','Aspire');

console.log(pc1.toString());
console.log(pc2.toString());
console.log(laptop1.toString());
console.log(laptop2.toString());