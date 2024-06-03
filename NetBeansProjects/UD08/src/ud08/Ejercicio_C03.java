package ud08;

/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_C03 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        try {
            //Creamos varios objetos de cada Gato
            Ejercicio_C03_Gato g1 = new Ejercicio_C03_Gato("Cati",5);
            Ejercicio_C03_Gato g2 = new Ejercicio_C03_Gato("Miau",3);
            Ejercicio_C03_Gato g3 = new Ejercicio_C03_Gato("Milu",2);
            
            //Mostramos datos de los gatos
            System.out.println("GATOS:");
            g1.imprimir();
            g2.imprimir();
            g3.imprimir();
            
            //Modificamos los gatos
            g1.setNombre("Gatito");
            g1.setEdad(10);
            g2.setNombre("Do"); // Lanza excepción
            g2.setEdad(-5); // Lanza excepción
            
            //Mostramos datos de gatos
            System.out.println("GATOS:");
            g1.imprimir();
            g2.imprimir();
            g3.imprimir();
            
        } catch (Exception e) {
            System.err.println(e);
        }
        
    }

}
