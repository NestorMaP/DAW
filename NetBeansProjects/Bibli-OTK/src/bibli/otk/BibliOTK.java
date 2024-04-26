package bibli.otk;

import bibli.otk.Book.genres;
import java.util.Scanner;
public class BibliOTK {

    public static void main(String[] args) {
        
        Scanner reader = new Scanner(System.in);
        
        
        String library_name;
        int chosenOption;
        String title;
        String author;
        genres genre;
        int total_qty;
        String look_for_text;
        

        //Book book1 = new Book("El Quijote", "Cervantes", genres.DRAMA, 5);
        //library.addBook(book1);
        
        //Pedimos el nombre de la biblioteca y se lo ponemos
        
        System.out.print("Escoja un nombre para su biblioteca: ");
        library_name = reader.nextLine();
        
        Library library = new Library();
        library.setName(library_name);
        System.out.println("Se ha creado con éxito la librería " + library.getName() + "!!");
        
        do {
        
            
            chosenOption = showMenu();
            
            switch (chosenOption) {
                case 1://CONSULTAR TODOS LOS LIBROS
                    
                    library.showLibrary();
                    
                break;
                
                case 2://CONSULTAR LIBROS DISPONIBLES
                    
                    library.showAvailableLibrary();
                    
                break;
                
                case 3://AÑADIR LIBRO NUEVO
                     
                    //Primero pedimos los datos
                    System.out.print("Introduzca el título: ");
                    title = reader.nextLine();
                    System.out.print("Introduzca el autor: ");
                    author = reader.nextLine();
                    genre = validarGenero(); //Utilizamos esta función para evitar error del usuario.
                    System.out.print("Introduzca el número de ejemplares: ");
                    total_qty = reader.nextInt();
                    reader.nextLine();
                    
                    //Creamos el libro y lo añadimos
                    Book book = new Book(title,author,genre,total_qty);
                    library.addBook(book);
                    
                break;
                
                case 4://BORRAR LIBRO
                    
                    library.removeBook();
                    
                break;
                
                case 5://INCREMENTAR EJEMPLARES
                    
                    library.addCopy();
                    
                break;
                
                case 6://REDUCIR EJEMPLARES
                    
                    library.substractCopy();
                    
                break;
                
                case 7://DEVOLVER LIBRO A LA BIBLIOTECA
                    
                    
                    library.returnCopy();
                    
                    
                break;
                
                case 8://PRESTAR LIBRO DE LA BIBLIOTECA
                    
                    library.renderCopy();
                    
                break;
                
                case 9://BUSCAR LIBROS POR TÍTULO O AUTOR
                    
                    //Primero pedimos los datos a buscar
                    System.out.print("Introduzca el título o autor: ");
                    look_for_text = reader.nextLine();
                    
                    //Mostramos libros con esos datos
                    library.showFoundBooks(look_for_text);
                    
                break;
                
                case 10://SALIR DEL PROGRAMA
                    
                    
                    System.out.println("La librería " + library.getName() + " ha cerrado sus puertas...");
                    
                break;
                
            }
        } while (chosenOption != 10);
    }
    //MÉTODO PARA MOSTRAR LISTA DE OPCIONES
    public static int showMenu() {
        
        Scanner reader = new Scanner(System.in);
        
        System.out.print(
            "\n\nEscoja una de las siguientes opciones:\n\n" +
            "1. Consultar colección de libros.\n" +
            "2. Consultar libros disponibles.\n" +
            "3. Añadir libro nuevo.\n" +
            "4. Borrar libro.\n" +
            "5. Incrementar ejemplares.\n" + 
            "6. Reducir ejemplares.\n" +
            "7. Devolver libro a la biblioteca.\n" +
            "8. Prestar libro de la biblioteca.\n" +
            "9. Buscar libros por título o autor.\n" +
            "10. Salir del programa.\n\n" +
            "Número de opción escogida:");
        
        int chosenOption = reader.nextInt();
        System.out.println();
        return chosenOption;
    }
    
    //MÉTODO PARA VALIDAR EL GÉNERO DEL LIBRO CON EL ENUM
    
    public static genres validarGenero(){
    
        Scanner reader = new Scanner(System.in);
        boolean genero_correcto = false;
        String genero_provisional;
        
        do {
            System.out.print("Introduzca el género (fantasia, drama, "
            + "histórico, comedia, ciencia_ficción, educativo, otros): ");
            genero_provisional = reader.nextLine();
            
            if (
                genero_provisional.equalsIgnoreCase("fantasia") ||
                genero_provisional.equalsIgnoreCase("drama") ||        
                genero_provisional.equalsIgnoreCase("historico") ||
                genero_provisional.equalsIgnoreCase("comedia") ||
                genero_provisional.equalsIgnoreCase("ciencia ficcion") ||
                genero_provisional.equalsIgnoreCase("educativo") ||
                genero_provisional.equalsIgnoreCase("otros")
                ){
                genero_correcto = true;
            }               
            
            else {
                System.err.println("Género no correcto, introdúcelo de nuevo ");
            }
        }    
        while(genero_correcto == false);
        
        if (genero_provisional.equalsIgnoreCase("ciencia ficcion")) {
            
            genero_provisional = "ciencia_ficcion";
            
        }
        
        return genres.valueOf(genero_provisional.toUpperCase());
        
    }
}

                    
        
