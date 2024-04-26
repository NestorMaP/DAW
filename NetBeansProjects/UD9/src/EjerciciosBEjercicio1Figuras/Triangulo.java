package EjerciciosBEjercicio1Figuras;

public class Triangulo extends Figura{
    
    //ATTRIBUTES
    private double base;
    private double altura;
    
    //CONSTRUCTOR    
    public Triangulo(double base, double altura){
        this.base = base;
        this.altura = altura;
    }
    
    //GETTERS && SETTERS
    public double getBase(){
        return base;
    }
    public void setBase(double base){
        this.base = base;
    }
    public double getAltura(){
        return altura;
    }
    public void setAltura(double altura){
        this.altura = altura;
    }
    
    //METHODS
    @Override
    public double area(){
        
        return ((this.getBase()*this.getAltura())/2);
        
    }
    
}
