/*
SE DESTACA QUE PARA LA REALIZACIÓN DE ESTE EJERCICIO SE HAN UTILIZADO
CONDICIONALES, NO BUCLES, CON EL FIN DE RESPETAR LA METODOLOGÍA DEL TEMA,
MITAD CONDICIONALES Y MITAD BUCLES
*/

package tareaentregableud31;
import java.util.Scanner;

public class TareaEntregableUD31 {

    public static void main(String[] args) {
        
        String factor, factorPresente;
        int riesgo = 5, numFactores=0;
        double efectoMult=1, riesgoFinal;
        
        Scanner reader = new Scanner(System.in);
        
        //Primero se muestra una lista de los factores de riesgo
        System.out.print("Factores de riesgo:\n" 
                + "\nPresión arterial alta\n"
                + "Colesterol elvado\n"
                + "Diabetes\n"
                + "Obesidad\n"
                + "Tabaquismo\n"
                + "Inactividad física\n"
                + "Sexo masculino\n"
                + "Familiares con enfermedades de corazón\n"
                + "Edad superior a 55 años\n");
        
        //Se pide al usuario confirmación de poseer alguno de dichos factores
        System.out.print("\nEn base a la anterior tabla "
                + "¿Presentas algún factor de riesgo?: "
                + "(Responde con 'SI' o 'NO'): ");
        factor = reader.next();
        
        //Se pide al usuario que indique qué factores de riesgo presenta
        if (factor.equals("SI")){
            System.out.println("\nIndica a continuación (utilizando 'SI' o 'NO') "
                    + "los factores de riesgo que presentas: ");
            
            System.out.print("Presión arterial alta: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 15;
                numFactores++;
            }
            
            System.out.print("Colesterol elevado: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 15;
                numFactores++;
            }
            
            System.out.print("Diabetes: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 10;
                numFactores++;
            }
            
            System.out.print("Obesidad: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 10;
                numFactores++;
            }
            
            System.out.print("Tabaquismo: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 10;
                numFactores++;
            }
            
            System.out.print("Inactividad física: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 10;
                numFactores++;
            }
            
            System.out.print("Sexo masculino: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 5;
                numFactores++;
            }
            
            System.out.print("Familiares con enfermedades de corazón: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 5;
                numFactores++;
            }
            
            System.out.print("Edad superior a 55 años: ");
            factorPresente = reader.next();
            if (factorPresente.equals("SI")) {
                riesgo = riesgo + 5;
                numFactores++;
            }
        }
        
        /*
        Se consigue el efecto multiplicador en base al número de factores 
        que el usuario ha confirmado tener, lo obtenemos con la variable
        numFactores, que añade 1 con cada factor confirmado por el usuario.
        
        */
        if (numFactores >=9) {
            efectoMult = 2.5;
        }    
        else if (numFactores >=7) {
                efectoMult = 2;
        }
        else if (numFactores >=5) {
                efectoMult = 1.75;
        }
        else if (numFactores >=3) {
                efectoMult = 1.5;
        }
        else if (numFactores >=2) {
                efectoMult = 1.25;
        }

        //Finalmente calculamos el riesgo final
        riesgoFinal = riesgo * efectoMult;
        
        //Información de salida al usuario
        System.out.println("\nTu riesgo cardiovascular inicial tiene un valor de "
                + riesgo + ".");
        System.out.println("Debido a que presentas " + numFactores + 
                " factores de riesgo, tu efecto multiplicador es: " +
                efectoMult+ ".");
        System.out.println("Tu riesgo cardiovascular final tiene un valor de: " +
                riesgoFinal + ".");
    }   
}