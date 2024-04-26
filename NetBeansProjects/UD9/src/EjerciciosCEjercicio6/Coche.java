/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package EjerciciosCEjercicio6;

/**
 *
 * @author nesxr
 */
public class Coche extends Vehiculo{
    public Coche(String marca, double precio) {
        super(marca,precio);
    }
    @Override
    public void incrementar_precio(double p) {
        precio = precio + 2 * p;
    }
}
