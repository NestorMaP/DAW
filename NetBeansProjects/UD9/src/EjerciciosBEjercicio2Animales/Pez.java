package EjerciciosBEjercicio2Animales;

public class Pez extends Animal{
    
   //ATTRIBUTES
    private String clase;
    private String canto;
    
    //CONSTRUCTOR
    public Pez(){
        
        clase = "Pez";
        canto = "glu glu";
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
