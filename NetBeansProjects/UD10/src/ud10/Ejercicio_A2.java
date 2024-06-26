package ud10;

import java.io.*;
import java.util.*;

/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_A2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner reader = new Scanner(System.in);
        String rutaIntroducida ="";
        boolean info = false;
        // Mientras la ruta introducida sea distinta de vacía (tecla intro)
        do {
            try {
                System.out.print("Introduce la ruta (intro para salir): ");
                rutaIntroducida=reader.nextLine();
                
                if(!rutaIntroducida.equals("")) {
                    File f = new File(rutaIntroducida);
                    muestraInfoRuta(f, true);
                }
            } catch (FileNotFoundException e) {
                System.out.println(e);
            }
        } while (!rutaIntroducida.equals(""));
        
        System.out.println("Fin del programa");
        
    }
    
    public static void muestraInfoRuta(File ruta, boolean info) throws FileNotFoundException {
        // Si la ruta no existe lanza una excepción
        if (!ruta.exists()) {
            throw new FileNotFoundException("La ruta introducida no existe");
        }
        // Si la ruta es un archivo muestra el nombre del archivo
        if (ruta.isFile()) {
            System.out.println("Nombre del archivo: " + ruta.getName());
        } else if (ruta.isDirectory()) //Si la ruta es carpeta primero muestra lista de carpetas y después archivos.
        {
            File[] lista = ruta.listFiles();
            // Ordena la lista alfabéticamente
            Arrays.sort(lista);            
            // Recorre la lista y muestra las carpetas
            for (int i=0;i<lista.length;i++) {
                if (lista[i].isDirectory()) {
                    if (info) {
                        System.out.println("[*] " + lista[i].getName() + "\t" 
                                + lista[i].length() + " bytes\t" + new Date(lista[i].lastModified()));
                    } else {
                        System.out.println("[*] " + lista[i].getName());
                    }
                }
            }    
            // Recorre la lista y muestra los archivos    
            for (int i=0;i<lista.length;i++) {
                if (lista[i].isFile()) {
                    
                    if (info) {
                        System.out.println("[A] " + lista[i].getName() + "\t" 
                                + lista[i].length() + " bytes\t" + new Date(lista[i].lastModified()));
                    } else {
                        System.out.println("[A] " + lista[i].getName());
                    }
                }
                
            }
        }
        
        System.out.println("");
    }
    
}
