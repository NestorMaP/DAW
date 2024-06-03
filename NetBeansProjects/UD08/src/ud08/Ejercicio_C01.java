package ud08;

import java.util.*;
/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_C01 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner in = new Scanner(System.in);
        int num;
        
        for (int i=0;i<5;i++) {
            try {
                
                System.out.println("Introduce un entero positivo: ");
                num = in.nextInt();
                imprimePositivo(num);
                
                System.out.println("Introduce un entero negativo: ");
                num = in.nextInt();
                imprimeNegativo(num);
                
            } catch (InputMismatchException ime) {
                System.out.println("El valor introducido es incorrecto.");
                ime.printStackTrace();
            } catch (Exception e) {
                System.out.println(e);
            }
        }
        
    }

    static void imprimePositivo(int p) throws Exception {
        if (p<0) {
            throw new Exception("Error: número negativo");
        }
        System.out.println("El número posiivo es el: " + p);
    }
    static void imprimeNegativo(int n) throws Exception {
        if (n>=0) {
            throw new Exception("Error: número positivo");
        }
        System.out.println("El número negativo es el: " + n);
    }
}
