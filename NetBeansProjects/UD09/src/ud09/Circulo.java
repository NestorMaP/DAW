/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

package ud09;

/**
 *
 * @author NéstorMaP
 */
public class Circulo extends Figura{
    
    private double radio;
    
    public Circulo(double radio) {
        this.radio = radio;
    }
    
    @Override
    public double area() {
        return (Math.PI * Math.pow(radio,2));
    }
    
}
