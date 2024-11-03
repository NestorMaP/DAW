let persona = new Object();

persona = {
    nombre:"Juan",
    edad:30,
    profesion:"Ingeniero",
    presentarse: function(){
        return `${this.nombre}: ${this.profesion}.`;
    },
    cumplirAnios: function(){
        this.edad++;
    }
}

// Print age
console.log(`${persona.nombre}: ${persona.edad} años.`);

console.log('Pasa un año y tenemos: ');

// Increment age by 1
persona.cumplirAnios();

console.log(`${persona.nombre}: ${persona.edad} años.`);