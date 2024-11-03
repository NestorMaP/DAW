let persona = new Object();

persona = {
    nombre:"Juan",
    edad:30,
    profesion:"Ingeniero",
    presentarse: function(){
        return `${this.nombre}: ${this.profesion}.`;
    }
}
console.log(persona.presentarse());