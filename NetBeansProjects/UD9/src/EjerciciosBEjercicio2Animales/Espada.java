package EjerciciosBEjercicio2Animales;

public class Espada extends Pez{
    
    //ATTRIBUTES
    private String clase;
    private String canto;
    
    //CONSTRUCTOR
    public Espada(){
        clase = super.getClase() + "Espada";
        canto = super.getCanto() + " " + "ríndete";
    };
    //METHODS
    @Override
    public String cantar(){
        return clase + " " + canto;
    }
    
}
