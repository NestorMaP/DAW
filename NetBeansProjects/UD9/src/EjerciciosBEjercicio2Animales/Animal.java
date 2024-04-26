package EjerciciosBEjercicio2Animales;

public class Animal {
    
    //ATTRIBUTES
    private String clase;
    private String canto;
    
    //CONSTRUCTOR
    public Animal(){
        clase = "Animal";
        canto = "";
    };
    
    //GETTERS & SETTERS
    public String getClase(){
        return clase;
    }
    public void setClase(String clase){
        this.clase = clase;
    }
    public String getCanto(){
        return canto;
    }
    public void setCanto(String canto){
        this.canto = canto;
    }
    
    //METHODS
    public String cantar(){
        return clase + canto;
    }
    
}


