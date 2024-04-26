package EjerciciosBEjercicio2Animales;

public class Carpintero extends Pajaro{
    
    //ATTRIBUTES
    private String clase;
    private String canto;
    
    //CONSTRUCTOR
    public Carpintero(){
        clase = super.getClase() + "Carpintero";
        canto = super.getCanto() + " " + "picomadera";
    };
    //METHODS
    @Override
    public String cantar(){
        return clase + " " + canto;
    }
       
}
