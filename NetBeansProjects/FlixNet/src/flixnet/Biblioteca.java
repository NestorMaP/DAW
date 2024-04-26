package flixnet;
import java.util.ArrayList;
/**
 * Class: Biblioteca
 * This class creates an ArrayList for Contents in order to store all of the
 * films and series. Also offers different methods to interact with them.
 * @author Néstor M.
 */
public class Biblioteca {
    //ATTRIBUTES
    ArrayList<Contenido> mi_biblio;
    
    //CONSTRUCTOR
    /**
     * Constructor
     */
    public Biblioteca(){
        mi_biblio = new ArrayList<>();
    }
    
    //METHODS
    //Añadir una Película
    /**
     * Method: Add Film
     * This is used to add a new content (film) to the ArrayList
     * @param titulo Title of the content
     * @param productora Publisher of the content
     * @param anio Year of publication of the content
     * @param oscars_nomin Number of nominations to the Oscars
     * @param oscars_ganados Number of Oscars won
     */
    public void añadirPelicula(String titulo, String productora, int anio,
            int oscars_nomin, int oscars_ganados) {
                
        Pelicula pelicula_añadida = new Pelicula(titulo, productora, anio, 
                oscars_nomin, oscars_ganados);
        mi_biblio.add(pelicula_añadida);
    }
    
    //Añadir una Serie
    /**
     * Method: Add Series
     * This is used to add a new content (Series) to the ArrayList
     * @param titulo Title of the content
     * @param productora Publisher of the content
     * @param anio Year of publication of the content
     * @param Ntemporadas Number of seasons
     * @param finalizada true of false depending if the content is finished or not
     */
    public void añadirSerie(String titulo, String productora, int anio, 
            int Ntemporadas, boolean finalizada) {
                
        Serie serie_añadida = new Serie(titulo, productora, anio, Ntemporadas, 
                finalizada);
        mi_biblio.add(serie_añadida);
    }
    
    //Imprimir Array completo
    /**
     * Method: Print
     * Used to print on the screen all the ArrayList
     * @throws EmptyException If the ArrayList is empty
     */
    public void imprimir() throws EmptyException {
        if(mi_biblio.isEmpty()){
            throw new EmptyException("ERROR: La biblioteca multimedia está vacía");
        }else{    
            for(int i=0;i<mi_biblio.size();i++) {
                System.out.println("Contenido " + (i+1) + ":\n");
                System.out.println(mi_biblio.get(i).toString());
            }
        }    
    }
    
    //Imprimir Array de contenidos no vistos
    /**
     * Method: Print on screen only seen content
     * Used to print from the ArrayList only the content that has been seen.
     * @throws EmptyException If the ArrayList is empty
     */
    public void imprimirNoVistos()throws EmptyException {
        if(mi_biblio.isEmpty()){
            throw new EmptyException("ERROR: La biblioteca multimedia está vacía");
        }else{ 
            for(int i=0;i<mi_biblio.size();i++) {
                if(!mi_biblio.get(i).isVisto()){
                    System.out.println("Contenido " + (i+1) + ":\n");
                    System.out.println(mi_biblio.get(i).toString());
                }
            }
        }
    }
    
    //Imprimir Array mostrando títulos
    /**
     * Method: Print only seen content
     * Used to print from the ArrayList all of our content's titles.
     * @throws EmptyException If the ArrayList is empty
     */
    public void imprimirTitulos()throws EmptyException {
        if(mi_biblio.isEmpty()){
            throw new EmptyException("ERROR: La biblioteca multimedia está vacía");
        }else{ 
            for(int i=0;i<mi_biblio.size();i++) {
                    System.out.print("Contenido " + (i+1) + ": ");
                    System.out.println(mi_biblio.get(i).getTitulo());
            }
        }
    }
    
    //Recorrer el Array para buscar coincidencia con texto.
    /**
     * Method: Look for a content using the title
     * Used to iterate the ArrayList in order to find a coincidence with the 
     * parameter itroduced in the content titles.
     * @param texto Title of the Content
     * @return Index of Content
     * @throws EmptyException If the ArrayList is empty
     */
    public int buscarCoincidencia(String texto) throws EmptyException {
        int indice_encontrado = -1;
        if(mi_biblio.isEmpty()) {
            throw new EmptyException("ERROR: La biblioteca multimedia está vacía");
        }else{
            for(int i=0;i<mi_biblio.size();i++){
                if(mi_biblio.get(i).getTitulo().equalsIgnoreCase(texto)){
                    indice_encontrado = i;
                }
            }
        }
        return indice_encontrado;
    }
    //Eliminar en base a índice
    /**
     * Method: Delete from Arraylist
     * @param indice Index of the content
     */
    public void eliminar(int indice) {
        mi_biblio.remove(indice - 1);
        System.out.println("Se ha eliminado el contenido indicado.");
    }
    
    //Visualizar en base a índice
    /**
     * Method: Show content from Arraylist
     * @param indice Index of the content
     */
    public void visualizarContenido(int indice) {
        mi_biblio.get(indice).setVisto();
        System.out.println("Se ha visualizado el contenido indicado.");
    }
    
    //Conversión de YES/NO a boolean
    /**
     * Method: Convert text ("yes"/"no") to boolean
     * @param text "yes" or "no"
     * @return true of false
     * @throws ConversorBooleanException If the user don't use a valid option
     */
    public boolean conversorBoolean(String text) throws ConversorBooleanException {
        if(text.equalsIgnoreCase("yes")){
            return true;
        } else if(text.equalsIgnoreCase("no")){
            return false;
        } else {
            throw new ConversorBooleanException("ERROR: Respuesta no válida, por favor inserte 'Yes' o 'No'");
        }
    }
    
}
