package EjerciciosBEjercicio3CuentasBancarias;

public class CuentaCorriente {
    
    //ATTRIBUTES
    private String nombre_completo;
    private double saldo;
    final double comisionOperacion = 1;
    final double comisionMensual = 5;
    final double interesMensual = 0.01;
    

    //CONSTRUCTOR
    public CuentaCorriente(String nombre_completo, double saldo){
        this.nombre_completo = nombre_completo;
        this.setSaldo(saldo);
    }
    
    //GETTERS && SETTERS
    public String getNombre(){
        return nombre_completo;
    }
    public void setNombre(String nombre_completo){
        this.nombre_completo = nombre_completo;
    }
    public double getSaldo(){
        return saldo;
    }
    public void setSaldo(double saldo){
        if (saldo>=0){
            this.saldo = saldo;
        }
    }
        
    //METHODS
    public void actualizar(){
        
        if(this.getSaldo()>=5){
            this.setSaldo(this.getSaldo()*(1+this.interesMensual) - this.comisionMensual);
        }
    }
    
    public void ingresar(double cantidad){
        this.setSaldo(this.getSaldo()+ cantidad - this.comisionOperacion);
        
    }
    
    public void retirar (double cantidad){
        if(cantidad <= getSaldo() -this.comisionOperacion){
            this.setSaldo(this.getSaldo() - cantidad - this.comisionOperacion);
        }
    }
    @Override
    public String toString(){
        return nombre_completo + " tiene " + saldo;
    }
    
}
