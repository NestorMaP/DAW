package EjerciciosDEjercicio1;


public class Cuadrado extends Figura{
    
    //ATTRIBUTES 
    private double lado;
    
    //CONSTRUCTOR
    public Cuadrado(double lado) {
        this.lado = lado;
    }
    
    //SETTERS & GETTERS
    public double getLado(){
        return lado;
    }
    public void setLado(double lado){
        this.lado = lado;
    }
    
    //METHODS
    @Override
    public double area(){
        
        return Math.pow(this.getLado(), 2);
        
    }
    
}
