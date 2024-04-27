package ud10;

/**
 *
 * @author NéstorMaP
 */
import java.io.*;
import java.util.*;

public class Ejercicio_B1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // Declaramos e inicializamos las variables
        int maximo = Integer.MIN_VALUE;
        int minimo = Integer.MAX_VALUE;
        int numero = 0;
        
        try {
            //Intentamos abrir el fichero
            File f = new File("src/ud10documentos/Documentos/numeros.txt");
            Scanner reader = new Scanner(f);
            
            // Mientras queden elementos vamos leyendo los enteros
            while (reader.hasNext()) {
                numero = reader.nextInt();
                
                // Comprobamos si el número leído es mayor que el máximo
                if (numero > maximo) {
                    maximo = numero;
                }
                
                // Comprobamos si el número leído es menor que el mínimo
                if (numero < minimo) {
                    minimo = numero;
                }
            }
            System.out.println("El valor máximo es: " + maximo);
            System.out.println("El valor mínimo es: " + minimo);
            
        } catch (FileNotFoundException e) {
            System.err.println("ERROR: El fichero no existe");
        } catch (Exception e) {
            System.err.println("ERROR: " + e);
        }
    }

}
