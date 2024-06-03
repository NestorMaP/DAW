package ud08;

import java.util.*;
/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_C04 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        //Creamos ArrayList de tipo Gato
        ArrayList<Ejercicio_C04_Gato> listaGatos = new ArrayList();
        
        Scanner in = new Scanner(System.in);
        
        String nombre="";
        int edad = 0;
        
        do {
            try {
                //Pedimos por teclado el nombre y la edad del gato
                System.out.println("Introduce elos datos del gato " + (listaGatos.size()+1));
                System.out.print("Nombre: ");
                nombre = in.nextLine();
                System.out.print("Edad: ");
                edad = in.nextInt();
                in.nextLine();
                
                // Creamos el objeto Gato
                Ejercicio_C04_Gato g = new Ejercicio_C04_Gato(nombre,edad);
                
                // Lo añadimos al ArrayList
                listaGatos.add(g);
            }catch (Exception e) {
                System.err.println(e);
                in.nextLine();
            }
        }while (listaGatos.size()<5);
        
        //Imprime por pantalla la información de todos los gatos de la lista
        for (int i=0; i<listaGatos.size(); i++) {
            System.out.print("GATO " + (i+1) + ": ");
            listaGatos.get(i).imprimir();
        }
    }

}
