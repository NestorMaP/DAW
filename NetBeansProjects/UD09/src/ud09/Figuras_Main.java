package ud09;

import java.util.ArrayList;
/**
 *
 * @author NéstorMaP
 */
public class Figuras_Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ArrayList<Figura> figuras = new ArrayList<>();
        figuras.add(new Circulo(10));
        figuras.add(new Cuadrado(10));
        figuras.add(new Triangulo(10,5));
        figuras.add(new Rectangulo(10,5));
        
        for (Figura f:figuras) {
            double value = f.area();
            System.out.println("Área: " + String.format("%.2f",value));
        }
    }

}
