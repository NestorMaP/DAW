package ud10;

/**
 *
 * @author NéstorMaP
 */

import java.util.*;
import java.io.*;

public class Ejercicio_B5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        //Instanciamos la clase File con ruta relativa
        File dirDiccionario = new File("src/ud10documentos/Documentos/Diccionario");
        
        //Creamos la carpeta 'Diccionario'
        boolean resultado = dirDiccionario.mkdir();
        
        if(resultado) {
            try {
                //ArrayList donde vamos a almacenar todas las palabras del archivo diccionario.txt
                ArrayList<String> alDiccionario = new ArrayList();
                
                //Lectura de diccionario.txt
                File fileDiccionario = new File("src/ud10documentos/Documentos/diccionario.txt");
                Scanner reader = new Scanner(fileDiccionario);
                
                //Recorremos el archivo y vamos añadiendo las palabras al ArrayList
                while(reader.hasNext()) {
                    alDiccionario.add(reader.nextLine());
                }
                
                //Cerramos archivo
                reader.close();
                
                //Creamos dentro de la carpeta 'Diccionario' tantos archivos como letras del abecedario.
                for (int i=65;i<=90;i++) {
                    //Escritura
                    FileWriter writer = new FileWriter(new File(dirDiccionario.getParent() + "/" + dirDiccionario.getName() + "/" + (char) i + ".txt"));
                    
                    //Recorremos las palabras del ArrayList
                    for (String palabra : alDiccionario) {
                        //Escribimos en cada archivo las palabras que empiecen por el nombre del archivo
                        if (palabra.toUpperCase().startsWith(Character.toString((char) i))) {
                            writer.write(palabra + "\n");
                        }
                    }
                    
                    //Cerramos archivo
                    writer.close();
                }
                
            } catch (FileNotFoundException e) {
                System.err.println("ERROR: Archivo no encontrado.");
            } catch (IOException e) {
                System.err.println("ERROR: " + e);
            } catch (Exception e) {
                System.err.println("ERROR: " + e);
            }
            
            
        } else {
            System.err.println("La carpeta " + dirDiccionario.getName() + " no se ha podido crear.");
        }
        
    }

}
