// Añadir un método para incrementar la edad
const persona = 
{
    nombre: 'Juan',
    edad: 30,
    profesion: 'Ingeniero',
    presentarse: function() {
        return `Hola, soy ${this.nombre} y soy ${this.profesion}.`;
    },
    cumpliranios: function() {
        this.edad++;
    },
};

// Llamamos al método para incrementar la edad
persona.cumpliranios();
console.log(persona.edad);
// Salida: 31