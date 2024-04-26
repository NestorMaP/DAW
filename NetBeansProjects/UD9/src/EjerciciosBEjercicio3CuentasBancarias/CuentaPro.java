package EjerciciosBEjercicio3CuentasBancarias;

public class CuentaPro extends CuentaCorriente{
    
    //ATTRIBUTES
    final double comisionOperacion = 0;
    final double comisionMensual = 100;
    final double interesesMensual = 0;    

    //CONSTRUCTOR
    public CuentaPro(String nombre_completo, double saldo){
        super(nombre_completo, saldo);
    }
    
    //GETTERS && SETTERS
    
    
    //METHODS
    @Override
    public void actualizar(){
        
        if(this.getSaldo()>=5){
            this.setSaldo(this.getSaldo()*(1+interesesMensual) - comisionMensual);
        }
    }
    
    @Override
    public void ingresar(double cantidad){
        this.setSaldo(this.getSaldo()+ cantidad - comisionOperacion);
        
    }
    
    @Override
    public void retirar (double cantidad){
        if(cantidad <= getSaldo() -comisionOperacion){
            this.setSaldo(this.getSaldo() - cantidad - comisionOperacion);
        }
    }    
    
}
