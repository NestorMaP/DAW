package ud10;

/**
 *
 * @author NéstorMaP
 */

import java.util.*;
import java.io.*;

public class Ejercicio_B6 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner keyb = new Scanner(System.in);
        
        try {
            
            //Pedimos el número enter a buscar
            System.out.println("Introduce el número entero a buscar: ");
            String numeroBuscar = keyb.nextLine();
            
            //Intentamos abrir el fichero 'pi-million.txt'
            File fileNumeroPi = new File("src/ud10documentos/Documentos/pi-million.txt");
            Scanner reader = new Scanner(fileNumeroPi);
            
            //Cogemos todos los decimales del numero PI del fichero
            String decimalesPI = (reader.nextLine().substring(2));
            reader.close();
            
            boolean found = false;
            
            for (int i=0;i<decimalesPI.length() - numeroBuscar.length(); i++) {
                //Comparamos si 'numeroBuscarj' está en el substring de 'decimalesPI'
                if(numeroBuscar.equals(decimalesPI.substring(i, i + numeroBuscar.length()))) {
                    found = true;
                    break;
                }
            }
            
            if (found) {
                System.out.println("El número " + numeroBuscar + " ha sido encontrado.");
            } else {
                System.err.println("El número " + numeroBuscar + " NO ha sido encontrado.");
            }
            
        } catch (FileNotFoundException e) {
            System.err.println("ERROR: Archivo no encontrado.");
        } catch (Exception e) {
            System.err.println("ERROR: " + e);
        }
    }

}
