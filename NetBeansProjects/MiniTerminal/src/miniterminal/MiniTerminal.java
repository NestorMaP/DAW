package miniterminal;

/**
 *
 * @author NéstorMaP
 */
public class MiniTerminal {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        MiniFileManager mfm = new MiniFileManager();
        mfm.showFolder();
        mfm.changeAddress("Documentos/nestor");
        mfm.showFolder();
        
    }

}
