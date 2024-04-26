package bibli.otk;

public class Book {
    
    //ENUM DE GÉNEROS
    enum genres {
        FANTASIA, DRAMA, HISTÓRICO, COMEDIA, CIENCIA_FICCION, EDUCATIVO, OTROS
    }
    
    //ATRIBUTOS
    private String titulo;
    private String autor;
    private genres genero;
    private int ejemplares_totales;
    private int ejemplares_disponibles;
    
    
    //CONSTRUCTOR
    public Book(String titulo, String autor, genres genero, int ejemplares_totales) {
        
        this.titulo = titulo;
        this.autor = autor;
        this.genero = genero;
        this.ejemplares_totales = ejemplares_totales;
        this.ejemplares_disponibles = ejemplares_totales;
        
    }
    
    
    //GETTERS
    public String getTitulo() {
        return titulo;    
    }
    public String getAutor() {
        return autor;
    }
    public genres getGenero() {
        return genero;
    }
    public int getEjemplaresTotales() {
        return ejemplares_totales;
    }
    public int getEjemplaresDisponibles() {
        return ejemplares_disponibles;
    }
    
    
    //SETTERS
    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }
    public void setAutor(String autor) {
        this.autor = autor;
    }
    public void setGenero(genres genero) {
        this.genero = genero;
    }
    public void setEjemplaresTotales(int ejemplares_totales) {
        this.ejemplares_totales = ejemplares_totales;
    }
    public void setEjemplaresDisponibles(int ejemplares_disponibles) {
        this.ejemplares_disponibles = ejemplares_disponibles;
    }
    
    
    
    //MÉTODO PARA MOSTRAR LIBROS
    public void showBook() {
        
        System.out.println(
        "TÍTULO: " + this.getTitulo() + "\n" +
        "AUTOR: " + this.getAutor() + "\n" +
        "GÉNERO: " + this.getGenero() + "\n" +
        "EJEMPLARES TOTALES: " + this.getEjemplaresTotales() + "\n" +
        "EJEMPLARES DISPONIBLES: " + this.getEjemplaresDisponibles() + "\n"
        );
    }
    
    
}
