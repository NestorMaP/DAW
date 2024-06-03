package ud08;

import java.util.*;
/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_A10 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner in = new Scanner(System.in);
        
        double[] vector = new double[5];
        
        for (int i=0; i<vector.length;i++) {
            try {
                System.out.println("Introduce el valor en la posición " + i);


            } catch(InputMismatchException ime) {
                System.out.println("Valor introducido incorrecto. Vueleve a introducir el valor...");
                ime.printStackTrace();
                in.nextLine();
                i--;
            }
        }
        
        mostrarVector(vector);
    }

    public static void mostrarVector(double[] v){
        
        System.out.print("Datos del vector [");
        
        for (int i=0; i<v.length;i++) {
            System.out.print(v[i] + ", ");
        }
        System.out.println("\b\b ]");
    }
}
