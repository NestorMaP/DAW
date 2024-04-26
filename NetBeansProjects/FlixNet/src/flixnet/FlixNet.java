package flixnet;

import java.util.InputMismatchException;
import java.util.Scanner;
    /**
     * Class FlixNet
     * Main
     * @author Néstor M.
     */
public class FlixNet {
    
    public static void main(String[] args) {
        //CREAMOS EL OBJETO BIBLIOTECA
        Biblioteca MiFlixNet = new Biblioteca();
        Scanner reader = new Scanner(System.in);
        int option; // Variable recurso
        String eleccion; //Variable recurso
        int indice; // Variable recurso
        
        //ATRIBUTOS
        //Contenido
        String titulo;
        String productora;
        int anio;
             
        //Pelicula
        int oscars_nomin;
        int oscars_ganados;
        
        //Serie
        int nTemporadas;
        boolean finalizada;
        
        //MAIN MENU
        try{
            do{
                showMenu();
                option = reader.nextInt();
                reader.nextLine();

                switch(option){
                    case 1: //Dar de alta una película
                        try{
                            System.out.println("Indique a continuación los datos de la película "
                            + "a añadir:");

                            System.out.print("Título: ");
                            titulo = reader.nextLine();

                            System.out.print("Productora: ");
                            productora = reader.nextLine();

                            System.out.print("Año de publicación: ");
                            anio = reader.nextInt();

                            System.out.print("Número de nominaciones a los Oscar: ");
                            oscars_nomin = reader.nextInt();

                            System.out.print("Número de Oscar ganados: ");
                            oscars_ganados = reader.nextInt();

                            //Creamos la peli como objeto y la añadimos al ArrayList
                            MiFlixNet.añadirPelicula(titulo, productora, anio, 
                                    oscars_nomin, oscars_ganados);
                        }catch(InputMismatchException ime){
                            System.err.println("ERROR: El valor introducido no es "
                                    + "correcto. Por favor introduce un valor válido.");
                        }
                    break;    
                    case 2: //Dar de alta una serie
                        System.out.println("Indique a continuación los datos de la serie "
                        + "a añadir:");

                        try{
                            System.out.print("Título: ");
                            titulo = reader.nextLine();

                            System.out.print("Productora: ");
                            productora = reader.nextLine();

                            System.out.print("Año de publicación: ");
                            anio = reader.nextInt();

                            System.out.print("Número de temporadas: ");
                            nTemporadas = reader.nextInt();
                            reader.nextLine();

                            System.out.print("¿Está finalizada?(YES/NO): ");
                            eleccion = reader.nextLine();

                            finalizada = MiFlixNet.conversorBoolean(eleccion);

                            //Creamos la peli como objeto y la añadimos al ArrayList
                            MiFlixNet.añadirSerie(titulo, productora, anio, 
                                nTemporadas, finalizada);
                        }catch(ConversorBooleanException e){
                            System.err.println("ERROR: Escriba YES o NO");
                        }catch(InputMismatchException ime) {
                            System.err.println("ERROR: El valor introducido no es "
                                    + "correcto. Por favor introduce un valor válido.");
                        }

                    break;
                    case 3: //Eliminar un contenido
                        try{    
                            MiFlixNet.imprimirTitulos();
                            System.out.print("Eliga el número de contenido a eliminar: ");
                            indice = reader.nextInt();
                            MiFlixNet.eliminar(indice);
                        }catch(InputMismatchException ime) {
                            System.err.println("ERROR: El valor introducido no es "
                                    + "correcto. Por favor introduce un valor válido.");
                        }catch(EmptyException ee){
                            System.err.println("ERROR: La biblioteca multimedia está vacía");
                        }catch(ArrayIndexOutOfBoundsException AIOBE) {
                            System.out.println("ERROR: El valor no está en la lista");
                        }


                    break;
                    case 4: //Ver un contenido.
                        try{    
                            System.out.println("Introduzca el título del contenido "
                                    + "que desea ver: ");
                            eleccion=reader.nextLine();
                            indice = MiFlixNet.buscarCoincidencia(eleccion);
                            if(indice == -1) {
                                System.err.println("No se han encontrado coincidencias");
                            }else {
                                MiFlixNet.visualizarContenido(indice);
                            }
                        }catch(InputMismatchException ime) {
                            System.err.println("ERROR: El valor introducido no es "
                                    + "correcto. Por favor introduce un valor válido.");
                        }catch(EmptyException ee){
                            System.out.println("ERROR: La biblioteca multimedia está vacía");
                        }
                    break;
                    case 5: //Listar contenido.
                        try{
                            MiFlixNet.imprimir();
                        }catch(EmptyException ee){
                            System.err.println("ERROR: La biblioteca multimedia está vacía");
                        }
                    break;
                    case 6: //Listar contenido pendiente de ver.
                        try{
                            MiFlixNet.imprimirNoVistos();
                        }catch(EmptyException ee){
                            System.err.println("ERROR: La biblioteca multimedia está vacía");
                        }
                    break;
                    case 7: //Salir
                        System.out.println("La aplicación FlixNet se apagará a "
                                + "continuación...");
                    break;
                    default:
                        System.err.println("Opción no disponible.");
                }
            
            }while(option!=7);
        }catch(InputMismatchException ime){
            System.err.println("ERROR: El valor introducido no es "
                                    + "correcto. Por favor introduce un valor válido.");
        }
    }
    
    //MENÚ DE USUARIO
    /**
     * Method: Show menu
     * Used to show the menu on screen in order to select an option.
     */
    public static void showMenu(){
        System.out.print(
                    "\nEscoge tu acción entre: \n"
                    + "     1. Dar de alta una película.\n"
                    + "     2. Dar de alta una serie.\n"
                    + "     3. Eliminar un contenido.\n"
                    + "     4. Ver un contenido.\n"
                    + "     5. Listar contenido.\n"
                    + "     6. Listar contenido pendiente por ver.\n"
                    + "     7. Salir.\n"
                    + "Acción escogida: "             
        );
    }
}   

