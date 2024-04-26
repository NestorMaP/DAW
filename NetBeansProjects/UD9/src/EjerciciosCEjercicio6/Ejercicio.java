/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package EjerciciosCEjercicio6;

/**
 *
 * @author nesxr
 */
public class Ejercicio {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Vehiculo v = new Vehiculo("AAA", 1000);
        Coche c = new Coche ("BBB", 1000);
        
        v.incrementar_precio(100);
        System.out.print(v.devolver_marca() + " ");
        System.out.println(v.devolver_precio());
        
        c.incrementar_precio(100);
        System.out.print(c.devolver_marca() + " ");
        System.out.println(c.devolver_precio());
        
        v = c;
        v.incrementar_precio(100);
        System.out.print(v.devolver_marca() + " ");
        System.out.println(v.devolver_precio());
    }
    
}
