class Punto {
    constructor (x,y){
        if (typeof x === 'number' && !isNaN(x) && isFinite(x)) {
            this.x = x;
        } else {
            this.x = 0;
        }
        if (typeof y === 'number' && !isNaN(y) && isFinite(y)) {
            this.y = y;
        } else {
            this.y = 0;
        }
    }
    cambiar() {
        [this.x, this.y] = [this.y, this.x];
    }
    
    copy() {
        // return JSON.parse(JSON.stringify(this)); // (deep copy)
        return new Punto(this.x,this.y); // (superficial copy) 
    }
    suma(otroPunto) {
        return new Punto(this.x+otroPunto.x, this.y+otroPunto.y);
    }
}
let punto1 = new Punto(15,16)
let punto2 = new Punto(4,8);

// Chech constructor
console.log (punto1);
console.log (new Punto('patata', 10/0));

// Check method cambiar
punto1.cambiar();
console.log(punto1);

// Check method copia
let punto1_copia = punto1.copy();
console.log(punto1_copia);

// Check method suma
let punto3_suma = punto1.suma(punto2);
console.log(punto3_suma);

