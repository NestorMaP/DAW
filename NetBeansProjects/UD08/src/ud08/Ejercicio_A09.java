package ud08;

import java.util.*;
/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_A09 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner in = new Scanner(System.in);
        int A,B,result;
        
        try {
            
            System.out.print("Introduce el numerador: ");
            A = in.nextInt();
            
            System.out.print("Introduce el denominador: ");
            B = in.nextInt();
            
            result = A/B;
            System.out.println(A + "/" + B + "=" + result);
            
        } catch (InputMismatchException ime) {
            System.out.println("Valor introducido incorrecto");
            ime.printStackTrace();
        } catch (ArithmeticException ae) {
            System.out.println("División entre cero: " + ae);
            ae.printStackTrace();
        }
        
    }

}
