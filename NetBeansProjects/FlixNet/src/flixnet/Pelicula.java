package flixnet;
/**
 * Class: Pelicula
 * Inherits from class Contenido and adds new features such as attributes to 
 * store the number of oscars won and nominated for.
 * @author Néstor M.
 */
public class Pelicula extends Contenido{

//ATTRIBUTES    
    private int oscars_nomin;
    private int oscars_ganados;
    
//CONSTRUCTOR
/**
 * Constructor
 * @param titulo Title of the film
 * @param productora Publisher of the film
 * @param anio Year of publication
 * @param oscars_nomin Number of nominations to the Oscars
 * @param oscars_ganados Number of Oscars won
 */    
    public Pelicula(String titulo, String productora, int anio,
            int oscars_nomin, int oscars_ganados) {
        super(titulo, productora, anio);
        try{
            this.setOscarsNomin(oscars_nomin);
            this.setOscarsGanados(oscars_ganados);
        }catch(NominException ne){
            System.out.println("ERROR: El número de nominaciones a los Oscars "
                    + "no puede ser inferior a 0.");
        }catch(OscarException oe){
            System.out.println("ERROR: El número de Oscars ganados no puede "
                    + "ser superioral númro de oscars recibidos.");
        }
    }
    
//GETTERS & SETTERS
    /**
     * Getter 
     * @return Oscar nominations.
     */
    public int getOscarsNomin() {
        return oscars_nomin;
    }
    
    /**
     * Setter
     * @param oscars_nomin Number of nominations to the Oscars
     * @throws NominException If the number of nominations is less than 0
     */
    public void setOscarsNomin(int oscars_nomin) throws NominException {
        if(oscars_nomin < 0) {
            throw new NominException("ERROR: El número de nominaciones a los Oscars "
                    + "no puede ser inferior a 0.");
        }
        this.oscars_nomin = oscars_nomin;
    }
    
    /**
     * Getter
     * @return Oscars won
     */
    public int getOscarsGanados(){
        return oscars_ganados;
    }
    
    /**
     * Setter
     * @param oscars_ganados Number of Oscars Won
     * @throws OscarException If the number of Oscars won is higher than the nominations
     */
    public void setOscarsGanados(int oscars_ganados) throws OscarException {
        if (oscars_ganados>this.getOscarsNomin()){
            throw new OscarException("ERROR: El número de Oscars ganados no puede "
                    + "ser superioral númro de oscars recibidos.");
        }
        this.oscars_ganados = oscars_ganados;
    }   
    
   

//METHODS    
    


}
