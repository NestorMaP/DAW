package EjerciciosBEjercicio3CuentasBancarias;

public class CuentaAhorro extends CuentaCorriente{
    
    //ATTRIBUTES
    final int MAX_OPERACIONES = 3;
    int contadorOperaciones = 0;
    final double interesMensual = 0.1;
    final double comisionMensual = 0;
    
    //CONSTRUCTOR
    public CuentaAhorro(String nombre_completo, double saldo){
        super(nombre_completo, saldo);
    }
    
    //GETTERS && SETTERS
    
    
    //METHODS
       
    @Override
    public void ingresar(double cantidad){
        if (contadorOperaciones < MAX_OPERACIONES){
            this.setSaldo(getSaldo()+ cantidad - comisionOperacion);
            contadorOperaciones +=1;
        }
        
    }
    
    @Override
    public void retirar (double cantidad){
        if (contadorOperaciones < MAX_OPERACIONES && cantidad <= getSaldo() - comisionOperacion){
            this.setSaldo(getSaldo() - cantidad - comisionOperacion);
            contadorOperaciones +=1;
        }
    }
    
    @Override
    public void actualizar(){
        
        if(this.getSaldo()>=5){
            this.setSaldo(this.getSaldo()*(1+interesMensual) - comisionMensual);
        }
    }
}
