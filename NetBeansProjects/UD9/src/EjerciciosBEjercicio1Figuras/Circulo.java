package EjerciciosBEjercicio1Figuras;

public class Circulo extends Figura{
    
    //ATTRIBUTES 
    private double radio;
    
    //CONSTRUCTOR
    public Circulo(double radio){
        this.radio = radio;
    }
    
    //SETTERS & GETTERS
    public void setRadio (double radio){
        this.radio = radio;
    }
    public double getRadio(){
        return radio;
    }
    
    //METHODS
    @Override
    public double area(){
        
        return (super.getPI()*Math.pow(radio, 2));
        
    }
    
}
