package bibli.otk;

import java.util.ArrayList;
import java.util.Scanner;
public class Library {
    
    //ATRIBUTOS
    private ArrayList<Book> library;
    private String name;
    Scanner reader = new Scanner(System.in);
    /* Entiendo que la clase Scanner NO debería de ponerla en una clase y
    solamente en el main, pero no se me ocurría otra forma de evitar preguntar
    al usuario que introdujese un libro a borrar, o reducir ejemplares etc
    en el caso en que la biblioteca estuviese vacía.
    */
    
    //SIN CONSTRUCTOR YA QUE SOLO QUEREMOS CREAR LA BIBLIOTECA VACÍA
    public Library() {
        
        library = new ArrayList<>();
        
    }
    
    //GETTERS
    public ArrayList<Book> getLibrary() {
        return library;
    }
    
    public int size() {
        return library.size();
    }
    
    public String getName() {
        return name;
    }

    
    //SETTERS
    
    public void setName(String name) {
        this.name = name;
    }
    
    
    //MÉTODOS DE FUNCIONAMIENTO DE LA BIBLIOTECA
    
    //1.Imprimir todos los libros
    public void showLibrary(){
        
        if (library.isEmpty()) {
            
            System.err.println("No existen libros.");
            
        }
        else {
            for(int i=0;i<library.size();i++) {

                System.out.println("Libro número " + (i+1) + ":");
                library.get(i).showBook();

            }
        }
    }
    //2.Imprimir libros disponibles
    public void showAvailableLibrary(){
        
        if(!library.isEmpty()) {
        
            for(int i=0;i<library.size();i++) {

                if(library.get(0).getEjemplaresDisponibles()>0) {

                    System.out.println("Libro número " + (i+1) + ": " + 
                            library.get(i).getTitulo() + ".\n" + 
                            "Ejemplares disponibles: " + 
                            library.get(i).getEjemplaresDisponibles() + ".\n\n");

                }
                else {

                    System.err.println("No existen libros disponibles");

                }   
            }
        }
        else {
            System.err.println("ERROR: La biblioteca está vacía");
        }
    }
    
    //Mostrar lista de libros totales
    public void showLibraryTitles(){
        
        if (library.isEmpty()) {
            
            System.err.println("No existen libros.");
            
        }
        else {
            for(int i=0;i<library.size();i++) {

                System.out.println("Libro número " + (i+1) + ": " +
                library.get(i).getTitulo());

            }
        }
        
    }
    
    //Mostrar lista de libros disponibles
    public void showAvailableLibraryTitles(){
        
        if (library.isEmpty()) {
            
            System.err.println("No existen libros.");
            
        }
        else {
            for(int i=0;i<library.size();i++) {

                if (library.get(i).getEjemplaresDisponibles()>0) {
                
                    System.out.println("Libro número " + (i+1) + ":" +
                    library.get(i).getTitulo());
                
                }
                else {
                    System.err.println("ERROR: No hay ejemplares disponibles de ningún libro.");
                }
            }
        }
        
    }
    
    //3.Añadir libro a la biblioteca
    public void addBook(Book libro) {
        
        if (checkExistence(libro.getTitulo())) {
        
            System.err.println("ERROR: El libro introducido ya existe, no se ha agregado.");
            
        }
        else {
        
            library.add(libro);
            System.out.println("\nEl libro se ha introducido correctamente!");
        
        }
    }
    
    //Comprobar si un libro existe
    public boolean checkExistence(String titulo) {
        
        for (int i=0;i<library.size();i++) {
            
            if (library.get(i).getTitulo().equalsIgnoreCase(titulo)) {
                return true;
            }
        }
        return false;
    }

    //4. Eliminar libros
    public void removeBook() {
        
        if(!library.isEmpty()) {
        
            //Mostramos por pantalla la lista de títulos
            showLibraryTitles();

            //Pedimos al usuario que seleccione un libro
            System.out.print("Introduzca el número de libro que desee eliminar: ");
            int chosenBook = reader.nextInt();
            
            if ((chosenBook-1)<0||(chosenBook-1)>=library.size()) {
                
                System.err.println("ERROR: El libro seleccionado no existe en la librería.\n");
                
            }
            else {
                library.remove(chosenBook-1);
                System.out.println("El libro se ha eliminado correctamente!");
            }
        }
        else {
            
            System.err.println("ERROR: La biblioteca está vacía");
            
        }
        
    }
    
    //5. Añadir ejemplares
    public void addCopy () {
        
        if(!library.isEmpty()) {
        
            //Mostramos por pantalla la lista de títulos
            showLibraryTitles();
            
            //Pedimos al usuario que seleccione un libro
            System.out.print("Introduzca el número de libro al que desee añadir ejemplares: ");
            int chosenBook = reader.nextInt();
            
            if ((chosenBook-1)<0||(chosenBook-1)>=library.size()) {
                
                System.err.println("ERROR: El libro seleccionado no existe en la librería.\n");
                
            }
            else {
            
                //Pedimos al usuario que nos diga el número de ejemplares a añadir
                System.out.print("Introduzca el número de ejemplares a añadir: ");
                int book_qty = reader.nextInt();

                int totalQty = library.get(chosenBook-1).getEjemplaresTotales();
                int dispQty = library.get(chosenBook-1).getEjemplaresDisponibles();

                library.get(chosenBook-1).setEjemplaresTotales(totalQty + book_qty);
                library.get(chosenBook-1).setEjemplaresDisponibles(dispQty + book_qty);
                System.out.println("Los ejemplares se han añadido correctamente!");
            }
        }
        else {
            
            System.err.println("ERROR: La biblioteca está vacía");
            
        }
    }
    
    //6. Reducir ejemplares
    public void substractCopy () {
        
        if(!library.isEmpty()){    
        
            //Mostramos por pantalla la lista de títulos
            showLibraryTitles();
            
            //Pedimos al usuario que seleccione un libro
            System.out.print("Introduzca el número de libro al que desee reducir ejemplares: ");
            int chosenBook = reader.nextInt();
            
            if ((chosenBook-1)<0||(chosenBook-1)>=library.size()) {
                
                System.err.println("ERROR: El libro seleccionado no existe en la librería.\n");
                
            }
            else {    
            
                //Pedimos al usuario que nos diga el número de ejemplares a quitar
                System.out.print("Introduzca el número de ejemplares a quitar: ");
                int book_qty = reader.nextInt();

                int totalQty = library.get(chosenBook-1).getEjemplaresTotales();
                int dispQty = library.get(chosenBook-1).getEjemplaresDisponibles();

                if (dispQty<book_qty) {

                    System.err.println("ERROR: No hay tantos ejemplares de ese libro.");

                }
                else{

                    library.get(chosenBook-1).setEjemplaresTotales(totalQty - book_qty);
                    library.get(chosenBook-1).setEjemplaresDisponibles(dispQty - book_qty);
                    System.out.println("Los ejemplares se han quitado correctamente!");

                }
            }
        }
        else {
            
            System.err.println("ERROR: La biblioteca está vacía");
            
        }
    }
    
    //7. Devolver libro
    public void returnCopy () {
        
        if (!library.isEmpty()){
        
            //Mostramos por pantalla la lista de títulos
            showLibraryTitles();    

            //Pedimos al usuario que seleccione un libro
            System.out.print("Introduzca el número de libro del que desee devolver un ejemplar: ");
            int chosenBook = reader.nextInt();
        
            if ((chosenBook-1)<0||(chosenBook-1)>=library.size()) {
                
                System.err.println("ERROR: El libro seleccionado no existe en la librería.\n");
                
            }
            else {
            
                int totalQty = library.get(chosenBook-1).getEjemplaresTotales();
                int actualQty = library.get(chosenBook-1).getEjemplaresDisponibles();

                if (actualQty >= totalQty) {

                    System.err.println("ERROR: No hay ejemplares prestados de ese libro.");

                }
                else{

                    library.get(chosenBook-1).setEjemplaresDisponibles(actualQty + 1);
                    System.out.println("El libro se ha devuelto correctamente!");

                }
            }
        }
        else {
            
            System.err.println("ERROR: La biblioteca está vacía");
            
        }
    }
    

    //8. Prestar libro
    public void renderCopy () {
        
        if (!library.isEmpty()) {
        
            //Mostramos por pantalla la lista de títulos
            showAvailableLibraryTitles();
            
            //Pedimos al usuario que seleccione un libro
            System.out.print("Introduzca el número de libro que desee prestar una copia: ");
            int chosenBook = reader.nextInt();
            
            if ((chosenBook-1)<0||(chosenBook-1)>=library.size()) {
                
                System.err.println("ERROR: El libro seleccionado no existe en la librería.\n");
                
            }
            else {
            
                int actualQty = library.get(chosenBook-1).getEjemplaresDisponibles();

                if (actualQty <=0) {

                    System.err.println("ERROR: No hay ejemplares disponibles de ese libro.");

                }
                else{

                    library.get(chosenBook-1).setEjemplaresDisponibles(actualQty - 1);
                    System.out.println("El libro se ha prestado correctamente!");

                }
            }
        }
        else {
            
            System.err.println("ERROR: La biblioteca está vacía");
            
        }
    }
    
    //9.Imprimir por pantalla datos de libros encontrados
    public void showFoundBooks(String look_for_text){
        
        if (library.isEmpty()) {
                
            System.err.println("No existen libros disponibles");
                
        }        
        else {
        
            for(int i=0;i<library.size();i++) {
            
                if (library.get(i).getTitulo().contains(look_for_text) || 
                    library.get(i).getAutor().contains(look_for_text)) {

                    library.get(i).showBook();

                }
            }
        }
    }
}



