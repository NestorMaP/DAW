package ud08;

/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_C05_Runner {

    /**
     * @param args the command line arguments
     */
    private int energia;
    
    public Ejercicio_C05_Runner(int e) {
        
        energia = e;
    }

    public int getEnergia() {
        return energia;
    }

    public void recargarEnergia(int e) {
        energia += e;
    }

    public void correr() throws Ejercicio_C05_AgotadoException {
        if (energia >= 10) {
            energia -= 10;
            System.out.println("Energia: " + energia);
        } else {
            Ejercicio_C05_AgotadoException ae = new Ejercicio_C05_AgotadoException("Sin energía.... Plof!");
            throw ae;
        }
    }
    
    public static void main(String[] args) {
        
        //Creo corredor con energia de 25
        Ejercicio_C05_Runner pepe = new Ejercicio_C05_Runner(25);
        System.out.println("Energia: " + pepe.getEnergia());
        //Recargo energía en 5 y muestro por pantalla
        pepe.recargarEnergia(5);
        System.out.println("Energia: " + pepe.energia);
        // Corro hasta que se queda sin energia para comprobar que la excepción salta correctamente
        try {
            pepe.correr();
            pepe.correr();
            pepe.correr();
            pepe.correr();
            pepe.correr();
            pepe.correr();
            pepe.correr();
        } catch (Ejercicio_C05_AgotadoException ae) {
            System.err.println(ae.getMessage());
        }
        
    }

}
