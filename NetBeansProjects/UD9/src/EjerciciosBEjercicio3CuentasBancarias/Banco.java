package EjerciciosBEjercicio3CuentasBancarias;
import java.util.ArrayList;

public class Banco {

    public static void main(String[] args) {
        
        ArrayList <CuentaCorriente> cuentas = new ArrayList <>();
        
        CuentaAhorro a = new CuentaAhorro("Pepito", 1000);
        CuentaAhorro b = new CuentaAhorro("Jorgito", 2000);
        CuentaAhorro c = new CuentaAhorro("Jaimito", 3000);
        CuentaPro d = new CuentaPro("Jesusito", 4000);
        CuentaPro e = new CuentaPro("Jorgito", 5000);
        
        cuentas.add(a);
        cuentas.add(b);
        cuentas.add(c);
        cuentas.add(d);
        cuentas.add(e);
        
        a.actualizar();
        b.retirar(100);
        c.ingresar(1000);
        d.ingresar(10);
        e.actualizar();
        
        for(CuentaCorriente cuenta:cuentas){
            System.out.println(cuenta.toString());
        }
        
        
    }
    
}
