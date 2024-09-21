package tareaentregableud32;
import java.util.Scanner;
import java.util.Random;

    class TareaEntregableUD32 {
    
        public static void main(String[] args) {
            
            
            Scanner reader = new Scanner(System.in);
            Random random = new Random();
            
            /*
            Se crean los contadores Totales para conseguir la suma total.
            Se crean los contadores Parciales para saber si hay acumulación de 3 monedas seguidas.
            Se asignan valores booleanos para el resultado de tirar la moneda y si hay o no más de 3 seguidas de un tipo.
            */
            int i, numMonedas, contadorCaraTot=0, contadorCruzTot=0, 
                    contadorCaraParcial=0, contadorCruzParcial=0;
            boolean moneda, contador3=false;
            
            System.out.print("¿Cuántas monedas quieres lanzar?: ");
            numMonedas = reader.nextInt();
            
            System.out.print("Monedas: ");
            
            // Bucle principal de lanzar las monedas
            for (i=1; i<=numMonedas; i++) {
                moneda = random.nextBoolean();
                
                //Si la moneda sale cara = true
                if (moneda == true) {
                    System.out.print("O");
                    contadorCaraTot++;
                    contadorCaraParcial++; 
                    contadorCruzParcial = 0; // Si sale cara se devuelve valor 0 al contador parcial de cruz.
                }
                
                //Si la moneda sale cruz = false
                else if (moneda == false) {
                    System.out.print("+");
                    contadorCruzTot++;
                    contadorCruzParcial++;
                    contadorCaraParcial = 0;// Si sale cruz se devuelve valor 0 al contador parcial de cara.
                }
                
                /*
                Al final de cada iteración se comprueba si el contador Parcial llega a 3
                En cuyo caso se cambia el valor de contador3 a true definitivamente
                */
                if (contadorCaraParcial>=3 ||contadorCruzParcial>=3) {
                    contador3=true;
                }    
            }
            System.out.println("\nCara(O): " + contadorCaraTot);
            System.out.println("Cruz(+): " + contadorCruzTot);
            
            /*
            Utilizamos un condicional para mostrar un mensaje u otro 
            en base a si han salido 3 opciones seguidas similares
            */
            if(contador3==true) {
                System.out.println("Sí han salido 3 monedas seguidas.");
            }
            else {
                System.out.println("No han salido 3 monedas seguidas.");
            }
        }
    }
