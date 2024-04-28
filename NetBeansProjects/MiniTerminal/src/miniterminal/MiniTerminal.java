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
        
        MiniFileManager mfm = new MiniFileManager();
        String[] userInputs;
        String option = "";
        
        Scanner keyb = new Scanner(System.in);
        
        do {
            
            try {
                
                System.out.print(mfm.getCurrentAddress());
                userInputs = keyb.nextLine().split(" ");
                option = userInputs[0];
                
                switch(option) {
                    case "pwd" : 
                        
                    break;
                    
                    
                    case "cd" : 
                        
                    break;
                    
                    
                    case "ls" : 
                        mfm.showDirFiles();
                    break;
                    
                    
                    case "ll" : 
                        mfm.showDirFilesAndInfo();
                    break;
                    
                    
                    case "mkdir" : 
                        
                    break;
                    
                    
                    case "rm" : 
                        
                    break;
                    
                    
                    case "mv" : 
                        
                    break;
                    
                    
                    case "help" : 
                        mfm.showHelp();
                    break;
                    
                    
                    case "exit" : 
                        System.out.println("Se finaliza el programa.");
                    break;
                    
                    
                }
                
                
                
            } catch (FileNotFoundException e) {
                System.out.println("ERROR: " + e);
            } catch (Exception e) {
                System.out.println("ERROR: " + e);
            } 
            
        } while (!option.equalsIgnoreCase("exit"));
        
    }
    

}
