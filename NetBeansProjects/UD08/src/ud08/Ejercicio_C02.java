package ud08;

/**
 *
 * @author NéstorMaP
 */
public class Ejercicio_C02 {

    /**
     * @param args the command line arguments
     */
    
    public static void enviarMensaje(String dir) throws Exception {
    
        int longitud = dir.length();
        int arroba = dir.indexOf('@');
        int punto = dir.indexOf('@');
        
        if(arroba < punto-1 && punto < longitud-1 && arroba != -1 && punto != -1){
            System.out.println("E-MAIL CORRECTO: " + dir);
        } else {
            if(longitud == 0) {
                throw new Exception("El email " + dir + " debe tener 1 o más carácteres");
            }
            if(arroba == -1) {
                throw new Exception("El email " + dir + " debe tener una @");
            }
            if(punto == -1) {
                throw new Exception("El email " + dir + " debe tener un . para indicar el dominio");
            }
            if(arroba >= longitud - 1) {
                throw new Exception("El email " + dir + " La @ debe contener carácteres después");
            }
            if(punto >= longitud - 1) {
                throw new Exception("El email " + dir + " El . debe contener carácteres después");
            }
            if(arroba >= punto - 1) {
                throw new Exception("El email " + dir + "La @ debe estar antes del . con algún carácter intermedio");
            }
        }
    }
        
    public static void main(String[] args) {
        try {
            enviarMensaje("lionel@gmail.com");
            enviarMensaje("lionelgmail.com");
            enviarMensaje("lionel@gmailcom");
            enviarMensaje("lionel.gmail@com");
            enviarMensaje("lionel@gmailcom.");
            enviarMensaje("");
            enviarMensaje("lionel@.hola");
            enviarMensaje("lionel@hola.");
        } catch (Exception e) {
            System.err.println(e.getMessage());
        }
    }
}

