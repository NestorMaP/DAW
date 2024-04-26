package EjerciciosBEjercicio2Animales;

import java.util.ArrayList;

public class ProgramaAnimales {


    public static void main(String[] args) {
        
        ArrayList<Animal> animales = new ArrayList<>();
        
        animales.add(new Animal());
        animales.add(new Pajaro());
        animales.add(new Carpintero());
        animales.add(new Gallo());
        animales.add(new Pez());
        animales.add(new Payaso());
        animales.add(new Espada());
              
        for (Animal a:animales){
                
            System.out.println(a.cantar());
            
        }
    }
    
}
