/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */

package ud10;

/**
 *
 * @author NéstorMaP
 */

import java.io.*;
import java.util.*;

public class Ejercicio_B4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //Declaramos variables
        int numPersonas;
        String ruta;
        
        Scanner keyb = new Scanner(System.in);
        
        try {
            
            System.out.print("Número de nombres de personas a generar: ");
            numPersonas = keyb.nextInt();
            keyb.nextLine();
            
            System.out.print("Ruta donde se guardará el archivo generado: ");
            ruta = keyb.nextLine();
            
            //Ficheros para lectura
            File fileNombres = new File("src/ud10documentos/Documentos/usa_nombres.txt");
            File fileApellidos = new File("src/ud10documentos/Documentos/usa_apellidos.txt");
            
            //ArrayList con los datos de ficheros de lectura
            ArrayList listaNombres = leerDatosFichero(fileNombres);
            ArrayList listaApellidos = leerDatosFichero(fileApellidos);
            
            //FileWriter para escritura
            FileWriter writer = new FileWriter(new File(ruta));
            
            //Generamos el nombre y apellido aleatoriamente y lo escribimos en el fichero
            for (int i=0;i<numPersonas; i++) {
                int indexNom = (int) (Math.random() * listaNombres.size());
                int indexApe = (int) (Math.random() * listaApellidos.size());
                writer.write(listaNombres.get(indexNom) + " " + listaApellidos.get(indexApe) + "\n");
            }
            
            //Cerramos el FileWriter y mensaje final
            writer.close();
            System.out.println("Fichero generado correctamente: " + ruta);
            
        } catch (FileNotFoundException e) {
            System.err.println("ERROR: Archivo no encontrado.");
        } catch (IOException e) {
            System.err.println("ERROR: " + e);
        } catch (Exception e) {
            System.err.println("ERROR: " + e);
        }
        
        
    }
    
    // Devuelve un ArrayList con los datos leídos del fichero
    public static ArrayList leerDatosFichero(File f) throws FileNotFoundException {
        Scanner reader = new Scanner(f);
        ArrayList lista = new ArrayList();
        while (reader.hasNext()) {
            lista.add(reader.nextLine());
        }
        reader.close();
        return lista;
    }

}
