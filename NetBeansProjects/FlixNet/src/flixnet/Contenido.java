package flixnet;
/**
 * Class: Contenido
 * Object Contenido with different attributes such as titulo, productora, año
 * and if the user has seen it. Stablish the core for classes Pelicula and Serie
 * which inherit from this one. 
 * @author Néstor M.
 */
public class Contenido {

//ATTRIBUTES    
    private String titulo;
    private String productora;
    private int anio;
    private boolean visto=false;
    
//CONSTRUCTOR
/**
 * Constructor
 * @param titulo Title of the content
 * @param productora Publisher of the content
 * @param anio Year of publication
 */    
    public Contenido(String titulo, String productora, int anio) {
        try{    
            this.titulo = titulo;
            this.productora = productora;
            this.setAnio(anio);
        }catch(Exception e){
            System.err.println("ERROR: No puede ser tan antigua...");
        }
    }
//GETTERS & SETTERS
    /**
     * Getter
     * @return Title of the content
     */
    public String getTitulo() {
        return titulo;
    }
    
    /**
     * Setter
     * @param titulo Title of the content
     */
    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    /**
     * Getter
     * @return Publisher of the content
     */
    public String getProductora() {
        return productora;
    }
    /**
     * Setter
     * @param productora Publisher of the content
     */
    public void setProductora(String productora) {
        this.productora = productora;
    }
    
    /**
     * Getter
     * @return Content year of publication
     */
    public int getAnio() {
        return anio;
    }
    /**
     * Setter con validación
     * @param anio Year of pubication
     * @throws Exception If the content is older than 1895
     */
    public void setAnio(int anio) throws Exception{
        if(anio<1895) { //Año de estreno de primera película de la historia.
            throw new Exception("ERROR: No puede ser tan antigua.");
            
        }
        
        this.anio = anio;
    }
    
    /**
     * Getter
     * @return Boolean for the status of view of the content (view or not)
     */
    public boolean isVisto() {
        return visto;
    }
    /**
     * Setter
     */
    public void setVisto() {
        this.visto = true;
    }
    

//METHODS    
    
    /**
     * Converts to String the all the content information.
     */
    @Override
    public String toString() {
        String str = "";
        str += this.getTitulo() + " de la productora " + this.getProductora() +
                " del año " + this.getAnio() + ".\n";
        
        if (this.isVisto()){
            str += "El contenido SÍ ha sido visualizado.";
        } else {
            str += "El contenido NO ha sido visualizado.";
        }
        return str;
    }


}
