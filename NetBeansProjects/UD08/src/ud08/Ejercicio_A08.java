package ud08;

import java.util.*;
/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_A08 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner in = new Scanner(System.in);
        
        int A;
        
        try {
            
            System.out.print("Intduce un número entero: ");
            A = in.nextInt();
            System.out.println("Valor introducido: " + A);
            
        }catch(InputMismatchException ime) {
            System.out.println("Valor introducido incorrecto");
            ime.printStackTrace();
        }
        
    }

}
