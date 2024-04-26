package flixnet;

/**
 * Class Empty Exception inherits from Exception
 * @author Néstor M
 */
public class EmptyException extends Exception{
    /**
     * Constructor
     * @param str Text showed for the Exception
     */
    public EmptyException (String str) {
        super(str);
    }
}
