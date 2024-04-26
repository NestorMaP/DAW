package EjerciciosCEjercicio7;

abstract class Alumno {
    
    protected String nombre;
    protected double nota;
    public Alumno (String nombre, double nota) {
        this.nombre = nombre;
        this.nota = nota;
    }
    abstract public double calcularnota();
    
}
