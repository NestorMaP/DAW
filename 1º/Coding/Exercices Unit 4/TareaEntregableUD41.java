package tareaentregableud41;

import java.util.Scanner;

public class TareaEntregableUD41 {


    public static void main(String[] args) {

        Scanner reader = new Scanner(System.in);
        
        String T;
        int word_ini = 0; // CONTADOR DE PRINCIPIO DE PALABRA
        int word_end = 1; // CONTADOR DE FINAL DE PALABRA
        boolean on_off = true; // ENCENDIDO/APAGADO DEL PROGRAMA
        
        while (on_off == true) { //BUCLE QUE NOS DICE SI EL PROGRAMA DEBE CONTINUAR
            System.out.print("Introduce el texto completo "
                    + "que quieras convertir en siglas: ");

            T = reader.nextLine();

            if (T.length()>0) {
                System.out.print("Sigla: ");

                for (int i=0; i<T.length(); i++) {
                    
                    char c = T.charAt(i); // VAMOS ITERANDO POR CADA CHAR DE LA STRING

                    if (Character.isWhitespace(c)) {
                        
                        if ((word_end - word_ini-1)>3) { //CREAMOS UNA SIGLA
                            
                            char sigla = T.charAt(word_ini);
                            System.out.print(Character.toUpperCase(sigla));
                            word_ini = (i+1);
                            word_end = (i+1);
                        }
                        else { // RECONOCEMOS PALABRA SIN CREAR SIGLA
                            
                            word_ini = (i+1);
                            word_end = (i+1);
                        }
                    }
                    word_end++;  
                    
                }
                
                /* COMO AL FINAL NO TENEMOS ESPACIO, HACEMOS UNA ÚLTIMA 
                COMPROBACIÓN DEL TAMAÑO DE LA PALABRA POR SI SE CREA SIGLA*/
                
                if ((word_end-word_ini-1)>3) { 
                    
                    char sigla = T.charAt(word_ini);
                    System.out.println(Character.toUpperCase(sigla));
                    
                }
                
                System.out.println("");
                word_ini = 0; // DEVOLVEMOS A VALOR ORIGINAL POR SI EL USUARIO QUIERE OTRA SIGLA
                word_end = 1; // IDEM
            }
            
            else {
                
                System.out.println("TEXTO VACÍO. FIN DEL PROGRAMA");
                on_off = false; // TERMINAMOS EL BUCLE DE ENCENDIDO
                
            }
        }
    }
}
