
package tareaentregableud2.pkg1;

import java.util.Scanner;
public class TareaEntregableUD21 {

    public static void main(String[] args) {
        int finalGrade1, finalGrade2, finalGrade3;
        Scanner reader = new Scanner(System.in);
        
        System.out.print("Indica la nota de la primera evaluación: ");
        finalGrade1 = reader.nextInt();
        System.out.print("Indica la nota de la segunda evaluación: ");
        finalGrade2 = reader.nextInt();
        System.out.print("Indica la nota de la tercera evaluación: ");
        finalGrade3 = reader.nextInt();
        
        double averageGrade = ((double)finalGrade1+(double)finalGrade2+(double)finalGrade3)/3;
        System.out.print("Tu nota media es: " + averageGrade);
    }
    
}
