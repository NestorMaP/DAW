package miniterminal;

/**
 *
 * @author NéstorMaP
 */
import java.io.*;
import java.util.*;

public class MiniFileManager {
    // Variables
    private String ruta = "";
    final String linuxBegin = "user@machine:";
    File f;
    
    // Getters y Setters
    public String getRuta() {
        return this.ruta;
    }
    public void setRuta(String ruta) {
        this.ruta = ruta;
    }
    // Constructor
    public MiniFileManager () {
        f = new File(ruta);
    }
    
    // METHODS//
    ////////////
    
    /**
     * (pwd)Show current folder
     */
    // CAMBIAR ESTO PARA QUE NO SALGA NULL
    public void showFolder() {
        if(f.isDirectory()){
            System.out.println(f.getParent() + "/" + f.getName());
        } else {
            System.out.println(f.getParent());
        }
    }
    /**
     * (cd <DIR>) Change address
     * @param newAddress new Address
     */
    public void changeAddress (String newAddress) {
        if(newAddress.equals("..")) {
            this.setRuta(f.getParent());
            f = new File(this.getRuta());
        } else {
            this.setRuta(newAddress);
            f = new File (this.getRuta());
        }
    }
    
    
}
