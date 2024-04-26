package EjerciciosBEjercicio2Animales;

public class Pajaro extends Animal {
        
    //ATTRIBUTES
    private String clase;
    private String canto;
    
    //CONSTRUCTOR
    public Pajaro(){
        
        clase = "Pajaro";
        canto = "pio pio";
    };
    
    //GETTERS & SETTERS
    @Override
    public String getClase(){
        return clase;
    }
    @Override
    public String getCanto(){
        return canto;
    }
    
    //METHODS
    @Override
    public String cantar(){
        return clase + canto;
    }
}
