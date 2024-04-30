package miniterminal;

/**
 *
 * @author NéstorMaP
 */

import java.util.*;
import java.io.*;

public class MiniTerminal {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        //Instance of 1 object MiniFileManager
        MiniFileManager mfm = new MiniFileManager();
        
        //Vector of diferent words
        String[] userInputs;
        
        //Option chosen
        String option = "";
        
        Scanner keyb = new Scanner(System.in);
        
        do {
            
            try {
                
                System.out.print(mfm.getCurrentAddress());
                
                // Split the imput to get the arguments
                userInputs = keyb.nextLine().split(" ");
                
                // First argument
                option = userInputs[0];
                
                switch(option) {
                    case "pwd" : 
                        mfm.showFolder();
                    break;

                    case "cd" : 
                        mfm.changeAddress(userInputs[1]);
                    break;
                    
                    case "ls" : 
                        mfm.showDirFiles();
                    break;
                    
                    case "ll" : 
                        mfm.showDirFilesAndInfo();
                    break;
                    
                    case "mkdir" : 
                        mfm.makeDirectory(userInputs[1]);
                    break;
                    
                    case "rm" : 
                        mfm.removeFile(userInputs[1]);
                    break;
                    
                    case "mv" : 
                        mfm.moveOrRename(userInputs[1], userInputs[2]);
                    break;
                    
                    case "help" : 
                        mfm.showHelp();
                    break;
                    
                    case "exit" : 
                        System.out.println("Se finaliza el programa.");
                        keyb.close();
                    break;
                }
                
            } catch (FileNotFoundException e) {
                System.out.println("ERROR: " + e);
            } catch (IndexOutOfBoundsException e) {
                System.err.println("ERROR: No has introducido suficientes comandos." );           
            } catch (Exception e) {
                System.out.println("ERROR: " + e);
            } 
            
        } while (!option.equalsIgnoreCase("exit"));
        
    }
    

}
