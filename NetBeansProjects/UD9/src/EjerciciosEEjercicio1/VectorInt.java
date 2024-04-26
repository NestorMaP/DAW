/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package EjerciciosEEjercicio1;

/**
 *
 * @author nesxr
 */
public class VectorInt implements IMinMax, IEstadisticas, IComparable{
    //ATTRIBUTES
    protected int[] vector;
    
    //CONSTRUCTOR
    public VectorInt(int tamaño) {
        vector = new int[tamaño];
    }
    
    //GETTERS && SETTERS
    public int[] getVector(){
        return vector;
    }
        
    //METHODS
    @Override
    public String toString(){
        String returned = "Vector: [";
        for (int i=0;i<vector.length;i++){
            if (i!=vector.length -1) {
                returned += vector[i] + ",";
            } else {
                returned += vector[i];
            }
        }
        returned += "]";
        return returned;
    }
    
    public void random (int min, int max){
        for (int i=0;i<vector.length;i++){
            vector[i] = (int)(Math.random()*(max-min+1)+min);
        }
    }
    
    @Override
    public int getMinimo(){
        return 2;
    }
    @Override
    public int getMaximo(){
        return 3;
    }
    @Override
    public double getMedia(){
        return 3;
    }
    @Override
    public double getMediana(){
        return 3;
    }
    @Override
    public int getModa(){
        return 3;
    }
    @Override
    public boolean esIgual(int[] v){
        return true;
    }
    @Override
    public boolean esMayor(int[] v){
        return true;
    }
    @Override
    public boolean esMenor(int[] v){
        return true;
    }
}
