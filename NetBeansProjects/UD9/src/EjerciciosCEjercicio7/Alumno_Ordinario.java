package EjerciciosCEjercicio7;

public class Alumno_Ordinario extends Alumno{
    
    private char curso;
    public Alumno_Ordinario(String nombre, double nota, char curso) {
        super(nombre,nota);
        this.curso = curso;
    }
    @Override
    public double calcularnota() {
        return nota;
    }
    
}
