/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package EjerciciosCEjercicio6;

/**
 *
 * @author nesxr
 */
public class Vehiculo {
    protected String marca;
    protected double precio;
    public Vehiculo(String marca, double precio) {
        this.marca = marca;
        this.precio = precio;
    }
    public void incrementar_precio(double p) {
        precio = precio + p;
    }
    public double devolver_precio() {
        return precio;
    }
    public String devolver_marca() {
        return marca;
    }
}
