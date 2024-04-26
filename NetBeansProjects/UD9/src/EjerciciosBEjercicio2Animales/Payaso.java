package EjerciciosBEjercicio2Animales;

public class Payaso extends Pez{
    
    //ATTRIBUTES
    private String clase;
    private String canto;
    
    //CONSTRUCTOR
    public Payaso(){
        clase = super.getClase() + "Payaso";
        canto = super.getCanto() + " " + "chorprecha";
    };
    //METHODS
    @Override
    public String cantar(){
        return clase + " " + canto;
    }
    
}
