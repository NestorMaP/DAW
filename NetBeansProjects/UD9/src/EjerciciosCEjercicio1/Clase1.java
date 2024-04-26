package EjerciciosCEjercicio1;

public class Clase1 {
    protected int prop1 = 10, prop2 = 4;
    public void imprimir(int i) {
        prop1 = prop1 + i;
        prop2 = prop2 + i;
        System.out.println(prop1 + " " + prop2 + " ");
    }
}
