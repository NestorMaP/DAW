package EjerciciosDEjercicio1;

public class Rectangulo extends Figura{
    //ATTRIBUTES
    private double base;
    private double altura;
    
    //CONSTRUCTOR    
    public Rectangulo(double base, double altura){
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
        
        return ((this.getBase()*this.getAltura()));
        
    }
}
