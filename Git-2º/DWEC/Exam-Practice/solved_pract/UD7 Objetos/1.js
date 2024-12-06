// Creación de un objeto literal con un método
const persona = 
{
    nombre: 'Juan',
    edad: 30,
    profesion: 'Ingeniero',
    presentarse: function() {
        return `Hola, soy ${this.nombre} y soy ${this.profesion}.`;
    }
};

console.log(persona.presentarse());
// Salida: "Hola, soy Juan y soy Ingeniero."