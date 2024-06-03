package ud08;

/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_C05 {

    public static void agotar(Ejercicio_C05_Runner c) {
        try {
            while (true)
                c.correr();
        } catch (Ejercicio_C05_AgotadoException ae) {
            System.out.println(ae.getMessage());
        }
    }
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Ejercicio_C05_Runner paco = new Ejercicio_C05_Runner(50);
        agotar(paco);
        paco.recargarEnergia(30);
        agotar(paco);
        paco.recargarEnergia(10);
        agotar(paco);
        System.out.println("Entrenamiento completado");
    }

}
