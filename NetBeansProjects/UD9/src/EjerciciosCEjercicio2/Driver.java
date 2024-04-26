package EjerciciosCEjercicio2;

public class Driver {

   public static void main(String[] args) {
        Uno[] lista = new Uno[2];
        lista[0] = new Dos();
        lista[1] = new Tres();
        for (int i=0; i<2; i++) {
            lista[i].frase();
        }
    }
}
