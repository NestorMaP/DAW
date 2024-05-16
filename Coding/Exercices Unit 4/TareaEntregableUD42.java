package tareaentregableud42;
import java.util.Arrays;
import java.util.Scanner;

public class TareaEntregableUD42 {


    public static void main(String[] args) {
    
        Scanner reader = new Scanner(System.in);
        int array_length;
        int[] array1;
        String array1_str; // PEDIMOS STRING Y LUEGO PASAMOS A ARRAY
        int[] array2;
        String array2_str;
        int[] array_aux; 
        /* ESTE ARRAY NOS AYUDA PARA SABER SI DEBEMOS SUMAR 
        ALGO DE LA ANTERIOR SUMA, EL LO TÍPICO DE 8+5 = 3
        Y ME LLEVO UNA PARA LA SIGUIENTE SUMA*/
        int[] suma_array;
        
        System.out.print("Introduce cuántas cifras tendrán los binarios a sumar: ");
        array_length = reader.nextInt();
        
        array1 = new int[array_length];
        array2 = new int[array_length];
        array_aux = new int[array_length + 1]; //EL AUXILIAR SIEMPRE TENDRÁ UNO MÁS
        Arrays.fill(array_aux, 0);
        suma_array = new int[array_length + 1]; //CREAMOS LA SUMA CONTANDO QUE HAY UNO MÁS, LUEGO LO QUITAREMOS SI ES UN 0 EL PRIMER VALOR
        
        // PEDIR VALORES DE ARRAY AL USUARIO EN STRING
        System.out.print("Dime el binario A: ");
        array1_str = reader.next();
        
        System.out.print("Dime el binario B: ");
        array2_str = reader.next();
        
        
        // CONVERTIMOS LA ANTERIOR STRING A ARRAY
        for (int i=0; i<array1_str.length();i++){
            
            char c = array1_str.charAt(i);
            array1[i] = Character.getNumericValue(c);
        }
        
        for (int i=0; i<array1_str.length();i++){
            
            char c = array2_str.charAt(i);
            array2[i] = Character.getNumericValue(c);
            
        }
        

        
        // CALCULAR    
        for (int i=array_length;i>0;i--){

            switch ((array1[i-1] + array2[i-1] + array_aux[i])){

                case 0:

                    suma_array[i] = 0;
                    break;

                case 1:

                    suma_array[i] = 1;
                    break;

                case 2:

                    suma_array[i] = 0;
                    array_aux[i-1] = 1;
                    break;

                case 3:

                    suma_array[i] = 1;
                    array_aux[i-1] = 1;
                    break;

            }
        }
        
        
        System.out.print("A + B en binario: ");
        if(array_aux[0] == 1){ //COMPROBAMOS SI EL PRIMER VALOR DEBERÍA SER 1
            
            suma_array[0] = 1; 

            //BUCLE PARA IMPRIMIR ARRAY DE LENGTH == ARRAY INSERTADO + 1            
            for (int i=0;i<suma_array.length;i++){ 
                
                System.out.print(suma_array[i]);
                
            }
            
        }
        else {
            
            //BUCLE PARA IMPRIMIR UN ARRAY DE LENGTH == ARRAY INSERTADO
            for (int i=1;i<suma_array.length;i++){
                
                System.out.print(suma_array[i]);
                
            }
        }
    }    
}
