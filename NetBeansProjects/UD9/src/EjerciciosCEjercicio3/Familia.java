package EjerciciosCEjercicio3;

public class Familia {

    public static void main(String[] args) {
        Hija h = new Hija(4);
        h = f(h);
        System.out.println(h.aa());
    }
    private static Nieta f(Padre h) {
        Nieta n = new Nieta (h.aa());
        return n;
    }
}
