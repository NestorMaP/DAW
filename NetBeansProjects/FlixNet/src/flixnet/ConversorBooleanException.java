package flixnet;

/**
 * Class Conversor to Boolean Exception inherits from Exception
 * @author Néstor M
 */
public class ConversorBooleanException extends Exception{
    /**
     * Constructor
     * @param str Text showed for the Exception
     */
    public ConversorBooleanException (String str) {
        super(str);
    }
}
