package ud10;

/**
 *
 * @author NéstorMaP
 */

import java.io.File;

public class Ejercicio_A4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        // Instancias a la clase File con las rutas relativas de las carpetas nuevas
        File misCosas = new File ("src/ud10documentos/Documentos/Mis Cosas");
        File alfabeto = new File("src/ud10documentos/Documentos/Alfabeto");
        
        // Creamos las carpetas
        boolean resultado1 = misCosas.mkdir();
        System.out.println("¿Se ha creado la carpeta 'Documentos/Mis Cosas'? " + resultado1);
        boolean resultado2 = alfabeto.mkdir();
        System.out.println("¿Se ha creado la carpeta 'Documentos/Alfabeto'? " + resultado2);
        
        // Instanciamos a la clase File con las rutas de origen y destino relativas
        File fotOrigen = new File("src/ud10documentos/Fotografias");
        File fotDestino = new File("src/ud10documentos/Mis Cosas/Fotografias");
        
        File libOrigen = new File("src/ud10documentos/Libros");
        File libDestino = new File("src/ud10documentos/Mis Cosas/Libros");
        
        // Movemos las carpetas 'Fotografias' y 'Libros' dentro de 'Mis Cosas'
        resultado1 = fotOrigen.renameTo(fotDestino);
        System.out.println("¿Se ha movido la carpeta 'Fotografias' a 'Mis Cosas/Fotografias? " + resultado1);
        
        resultado2 = libOrigen.renameTo(libDestino);
        System.out.println("¿Se ha movido la carpeta 'Libros' a 'Mis Cosas/Libros? " + resultado1);
        
        //Creamos dentro de la carpeta 'Alfabeto', una carpeta por cada letra del alfabeto (en mayúsculas)
        for (int i=65;i<=90;i++) {
            File newFolder = new File(alfabeto.getParent() + "/" + alfabeto.getName() + "/" + (char) i);
            newFolder.mkdir();
        }
        
    }

}
