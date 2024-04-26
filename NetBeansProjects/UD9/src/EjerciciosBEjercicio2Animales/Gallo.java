/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package EjerciciosBEjercicio2Animales;

public class Gallo extends Pajaro{
    
    //ATTRIBUTES
    private String clase;
    private String canto;
    
    //CONSTRUCTOR
    public Gallo(){
        clase = super.getClase() + "Gallo";
        canto = super.getCanto() + " " + "quiquiriqui";
    };
    //METHODS
    @Override
    public String cantar(){
        return clase + " " + canto;
    }
    
}
