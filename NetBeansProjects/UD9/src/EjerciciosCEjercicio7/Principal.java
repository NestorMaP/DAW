package EjerciciosCEjercicio7;

public class Principal {

    public static void main(String[] args) {
        
        Alumno alumno1;
        //alumno1 = new Alumno("Felix", 5.0);
        //System.out.println(alumno1.calcularnota());
        alumno1 = new Alumno_Ordinario("Lucia",7.0,'1');
        System.out.println(alumno1.calcularnota());
    }
}
// Class alumno1 is abstract and cannot be instantiated