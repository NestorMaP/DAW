package ud10;

/**
 *
 * @author NéstorMaP
 */

import java.io.*;
import java.util.*;

public class Ejercicio_B3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            
            String strOrigen;
            String strDestino;
            
            //Pedimos nombre de ficheros para leer y escribir;
            Scanner in = new Scanner(System.in);
            System.out.print("Ruta de fichero a leer: ");
            strOrigen = in.nextLine();
            System.out.print("Ruta de fichero a escribir: ");
            strDestino = in.nextLine();
            
            //Creamos los File
            File fileOrigen = new File(strOrigen);
            File fileDestino = new File(strDestino);
            
            //Comprobamos si el fichero de origen existe
            if (!fileOrigen.exists()) {
                throw new FileNotFoundException();
            }
            
            //Objetos para lectura y escritura
            Scanner reader = new Scanner(fileOrigen);
            FileWriter writer = new FileWriter(fileDestino);
            
            //Leemos el fichero de origen y almacenamos todo en un ArrayList
            ArrayList<String> nomPersonas = new ArrayList();
            while (reader.hasNext()) {
                nomPersonas.add(reader.nextLine());
            }
            
            //Ordenamos el ArrayList
            Collections.sort(nomPersonas);
            
            for (String nom : nomPersonas) {
                writer.write(nom + "\n");
            }
            
            //Cerramos Scanner y el FileWriter
            reader.close();
            writer.close();
            
            System.out.println("El fichero " + fileDestino.getName() + " ha sido creado correctamente.");
            
            
        } catch (FileNotFoundException e) {
            System.err.println("ERROR: Archivo no encontrado");
        } catch (Exception e) {
            System.err.println("ERROR: " + e);
        }
    }

}
