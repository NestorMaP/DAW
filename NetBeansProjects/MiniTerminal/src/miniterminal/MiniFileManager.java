package miniterminal;

/**
 *
 * @author NéstorMaP
 */
import java.io.*;
import java.util.*;

public class MiniFileManager {
    // Variables
    private String ruta ="";
    private String currentAddress;
    
    // Getters y Setters
    public String getRuta() {
        return this.ruta;
    }
    public void setRuta(String ruta) {
        this.ruta = ruta;
        currentAddress = "user@machine:" + ruta + "$ ";
    }
    public String getCurrentAddress() {
        return this.currentAddress;
    }
    // Constructor
    public MiniFileManager () {
        this.setRuta("/");
    }
    
    // METHODS//
    ////////////
    
    /**
     * (pwd)Show current folder
     */
    public void showFolder() {
        File f = new File(ruta);
        if(f.isDirectory()){
            System.out.println(f.getParent() + "/" + f.getName());
        } else {
            System.out.println(f.getParent());
        }
    }
    /**
     * (cd) Change address
     * @param newAddress new Address
     */
    public void changeAddress (String newAddress) {
        File f = new File(ruta);
        if(newAddress.equals("..")) {
            this.setRuta(f.getParent());
        } else {
            this.setRuta(newAddress);
        }
    }
    
    /**
     * (ls) Prints the folders and files
     * @throws FileNotFoundException 
     */
    public void showDirFiles() throws FileNotFoundException{
        File f = new File(ruta);
        if(!f.exists()) {
            throw new FileNotFoundException("La ruta actual es incorrecta.");
        }
        //Create vector with files and folders in the address
        File[] list = f.listFiles();
        //Sort the vector
        Arrays.sort(list);
        // Iterates the list and prints the folders
        for (File fi : list) {
            if (fi.isDirectory()) {
                System.out.println("[*] " + fi.getName());
            }
        }    
        // Iterates the list and prints the files
        for (File fi : list) {
            if (fi.isFile()) {
                System.out.println("[A] " + fi.getName());
            }
        }
    }
    
    /**
     * (ll) Prints the folders and files with info
     * @throws FileNotFoundException 
     */
    public void showDirFilesAndInfo() throws FileNotFoundException{
        File f = new File(ruta);
        if(!f.exists()) {
            throw new FileNotFoundException("La ruta actual es incorrecta.");
        }
        //Create vector with files and folders in the address
        File[] list = f.listFiles();
        //Sort the vector
        Arrays.sort(list);
        //Iterates the list and prints the folders
        for (File fi : list) {
            if (fi.isDirectory()) {
                System.out.println("[*] " + fi.getName() + "\t" 
                    + fi.length() + " bytes\t" + new Date(fi.lastModified()));
            }
        }    
        //Iterates the list and prints the files
        for (File fi : list) {
            if (fi.isFile()) {
                System.out.println("[A] " + fi.getName() + "\t" 
                    + fi.length() + " bytes\t" + new Date(fi.lastModified()));
            }
        }
    }
    /**
     * (mkdir) Makes new directory
     * @param dir String with address
     */
    public void makeDirectory(String dir) {
        File f = new File(ruta + "/" + dir);
        f.mkdir();
    }
    /**
     * (rm) Deletes file or folder
     * @param file
     * @throws FileNotFoundException 
     */
    public void removeFile(String file) throws FileNotFoundException {
        File f = new File(ruta + "/" + file);
        if (!f.exists()) {
            throw new FileNotFoundException("El archivo no se ha encontrado.");
        }
        // If it is a file, we'll delete it
        if (f.isFile()) {
            f.delete();
        }
        if (f.isDirectory()) {
            for (File fl:f.listFiles()) {
                if (fl.isFile()){
                    fl.delete();
                }
                if (fl.isDirectory()) {
                    System.err.println("Se está intentando borrar una subcarpeta.");
                    break;
                }
            }
            f.delete();
        }
    }
    /**
     * (mv) Move or Rename
     * @param File1 relative address origin file
     * @param File2 absolute address destination file
     */
    public void moveOrRename(String File1, String File2) {
        File f1 = new File(ruta + "/" + File1);
        File f2 = new File(File2);
        
        f1.renameTo(f2);
    }
    
    public void showHelp() {
        System.out.println(
                "Encuentre la lista de comandos a continuación\n" +
                "----------------------------------------------\n" +
                "pwd:\t\t\t" + "Muestra la carpeta actual.\n" +  
                "cd <DIR>:\t\t" + "Cambia carpeta actual a 'DIR'.\n" +  
                "ls:\t\t\t" + "Lista los directorios y archivos.\n" +  
                "ll:\t\t\t" + "Lista con información los directorios y archivos.\n" +  
                "mkdir <DIR>:\t\t" + "Crea el directorio 'DIR'.\n" +  
                "rm <FILE>:\t\t" + "Borra 'FILE'.\n" +  
                "mv <FILE1><FILE2>:\t" + "Mueve o renombra '(ruta relativa) FILE1' a '(ruta absoluta)FILE2'.\n" +   
                "help:\t\t\t" + "Muestra la lista de comandos.\n" +   
                "exit:\t\t\t" + "Finaliza el programa.\n");
    }
    
}
