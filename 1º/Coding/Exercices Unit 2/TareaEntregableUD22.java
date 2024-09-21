
package tareaentregableud22;

import java.util.Scanner;
public class TareaEntregableUD22 {

    public static void main(String[] args) {
       double numA, numB;
       Scanner reader = new Scanner(System.in);
       
       System.out.print("Introduce un primer número decimal: ");
       numA = reader.nextDouble();
       System.out.print("Introduce un segundo número decimal: ");
       numB = reader.nextDouble();
       
       /*1.*/
       System.out.println("El primer número redondeado al entero más próximo es: " + Math.round(numA));
       
       /*2.*/
       System.out.println("El segundo número redondeado al entero más próximo es: " + Math.round(numB));
       
       /*3.*/
       System.out.println("El mayor de ambos números introducidos es: " + Math.max(numA, numB));
       
       /*4.*/
       System.out.println("El menor de ambos números introducidos es: " + Math.min(numA, numB));
       
       /*5.*/
       System.out.println("Un número aleatorio comprendido entre ambos números introducios puede ser: " + (int)(Math.random()*numB + numA));  
      

    }
    
}
