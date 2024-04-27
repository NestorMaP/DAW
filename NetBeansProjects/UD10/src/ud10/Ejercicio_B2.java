package ud10;

/**
 *
 * @author NéstorMaP
 */

import java.io.*;
import java.util.*;

public class Ejercicio_B2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        try {
            //Intentamos abrir el fichero
            File f = new File("src/ud10documentos/Documentos/alumnos_notas.txt");
            Scanner reader = new Scanner(f);
            
            //ArrayList de alumnos
            ArrayList<String> alumnos = new ArrayList<String>();
            
            //Contador número de líneas
            int nLinea = 1;
            
            //Recorremos el fichero. Para cada línea (alumno)
            while (reader.hasNextLine()) {
                //Troceamos la línea en palabras y cogemos la info del alumno
                String[] trozosLinea = (reader.nextLine()).split(" ");
                
                //Si la línea no tiene el formato correcto la saltamos
                if (trozosLinea.length<2) {
                    System.err.println("Línea " + nLinea + " mal formateada. Se ignora.");
                    continue;
                }
                
                //Cogemos la info de alumnos
                String nombre = trozosLinea[0];
                String apellido = trozosLinea[1];
                
                //Calculamos su nota media
                int suma=0;
                for (int i=2;i<trozosLinea.length;i++) {
                    suma +=Integer.valueOf(trozosLinea[i]);
                }
                double media = (double)(suma) / (double)(trozosLinea.length - 2);
                
                //Creamos una cadena con nota media, nombre y apellido y la añadimos al ArrayList
                alumnos.add(String.format("%.2f %s", media, nombre + " " + apellido));
                
                //Actualizamos contador de lineas
                Collections.sort(alumnos, Collections.reverseOrder());
                
            }
            
            System.out.println("LISTADO DE NOTAS MEDIAS DE LOS ALUMNOS");
            System.out.println("--------------------------------------");

            //Mostramos primero alumnos con un 10 de media (si los hay)
            for (String a : alumnos) {
                if (a.split(" ")[0].equals("10.00")){
                    System.out.println(a);
                }
            }
            for (String a : alumnos) {
                if (!a.split(" ")[0].equals("10.00")) {
                    System.out.println(a);
                }
            }
            
        } catch (FileNotFoundException e) {
            System.out.println("ERROR: Archivo no encontrado");
        } catch (Exception e) {
            System.err.println("ERROR: " + e);
        }
        
    }

}
