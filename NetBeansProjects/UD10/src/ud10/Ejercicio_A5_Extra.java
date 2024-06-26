package ud10;

import java.io.*;

/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_A5_Extra {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        File documentos = new File("src/ud10documentos/Documentos");
        
        try {
            // Borramos la carpeta 'Documentos' y todo su contenido de forma recursiva
            boolean res = borrarTodo(documentos);
            if (res) {
                System.out.println("La carpeta 'Documentos' ha sido borrada");
            }
        }catch (FileNotFoundException e) {
            System.out.println(e);
        }
    }
    
    // Borra los archivos y carpetas de una ruta
    public static boolean borrarTodo(File ruta) throws FileNotFoundException {
        // Si no existe la ruta muestra una excepción
        if (!ruta.exists()){
            throw new FileNotFoundException("La ruta introducida no existe");
        }
        
        // Si es un archivo lo borro
        if (ruta.isFile()) {
            return ruta.delete();
        }
        
        // Si es una carpeta primero borro sus archivos y luego borro la carpeta
        if (ruta.isDirectory()) {
            
            // Recorremos todos los elementos y los borramos
            for (File f: ruta.listFiles()) {
                
                // Si es un archivo se borra
                if (f.isFile()){
                    f.delete();
                }
                
                // Si es una carpeta la borramos con borraTodo() usando recursividad
                if (f.isDirectory()) {
                    borrarTodo(f);
                }
                
            }
            // Borramos la propia carpeta
            return ruta.delete();
        }
        
        // No debería llegar aquí
        return false;        
    }

}
