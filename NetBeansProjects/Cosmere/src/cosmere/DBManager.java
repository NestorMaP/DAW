package cosmere;

import java.sql.*;
/**
 *
 * @author NéstorMaP
 */
public class DBManager {
    
    //Connection to BBDD
    protected static Connection conn = null;

    //Connection management to BBDD
    private static final String DB_HOST = "localhost";
    private static final String DB_PORT = "3306";
    private static final String DB_NAME = "cosmere";
    private static final String DB_URL = "jdbc:mysql://" + DB_HOST + ":" + DB_PORT + "/" + DB_NAME + "?serverTimezone=UTC";
    private static final String DB_USER = "root";
    private static final String DB_PASS = "eosiokiz5";
    private static final String DB_MSQ_CONN_SUCCESS = "CORRECT CONNECTION";
    private static final String DB_MSQ_CONN_ERROR = "ERROR WITH THE CONNECTION";

    //Management table "libros"
    protected static final String DB_LIB = "libros";
    protected static final String DB_LIB_SELECT = "SELECT * FROM " + DB_LIB;
    protected static final String DB_LIB_ISBN = "isbn";
    protected static final String DB_LIB_TIT = "titulo";
    protected static final String DB_LIB_PUB = "anio_pub";
    protected static final String DB_LIB_PAG = "paginas";
    protected static final String DB_LIB_SER = "saga";
    protected static final String DB_LIB_READ = "leido";
    
    //Management table "personajes"
    protected static final String DB_PER = "personajes";
    protected static final String DB_PER_SELECT = "SELECT * FROM " + DB_LIB;
    protected static final String DB_PER_ID = "id";
    protected static final String DB_PER_NAME = "nombre";
    protected static final String DB_PER_LIB_ISBN = "libro_isbn";
    protected static final String DB_PER_ROLE = "rol";
    
    ////////////////////////////////////////////
    // MÉTODOS DE CONEXIÓN A LA BASE DE DATOS //
    ////////////////////////////////////////////
    
    /**
     * Tries to load JDBC driver.
     * @return true if the loading was successful, false if not
     */
    public static boolean loadDriver() {
        try {
            System.out.print("Loading Driver...");
            Class.forName("com.mysql.cj.jdbc.Driver").newInstance();
            System.out.println("SUCCESS!");
            return true;
        } catch (ClassNotFoundException cnfEx) {
            cnfEx.printStackTrace();
            return false;
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
    }
    
    /**
     * Tries to connect with the DDBB
     *
     * @return true if the connection was successful, false if not
     */
    public static boolean connect() {
        try {
            System.out.print("Connecting with DDBB...");
            conn = DriverManager.getConnection(DB_URL, DB_USER, DB_PASS);
            System.out.println("SUCCESS!");
            return true;
        } catch (SQLException sqlE) {
            sqlE.printStackTrace();
            return false;
        }
    }
    
    /**
     * Checks the connection and prints the result
     *
     * @return true if the connection Exists and is Valid, false if not
     */
    public static boolean isConnected() {
        try {
            if (conn != null && conn.isValid(0)) {
                System.out.println(DB_MSQ_CONN_SUCCESS);
                return true;
            } else {
                return false;
            }
        } catch (SQLException sqlE) {
            System.out.println(DB_MSQ_CONN_ERROR);
            sqlE.printStackTrace();
            return false;
        }
    }
    
    /**
     * Ends connection with the DDBB
     */
    public static void close() {
        try {
            System.out.print("Closing connection...");
            conn.close();
            System.out.println("SUCCESS!");
        } catch (SQLException sqlE) {
            sqlE.printStackTrace();
        }
    }

    ///////////////////
    // TABLE METHODS //
    ///////////////////
    
    
    /**
     * Gets the ResultSet of the type and table selected
     * @param resultSetType ResultSet type
     * @param resultSetConcurrency ResultSet concurrency
     * @param table Table to store in the ResultSet
     * @return ResultSet of the Selected type and table, null if Error
     */
    public static ResultSet getTable(int resultSetType, int resultSetConcurrency, String table) {
        try {
            Statement stmt = conn.createStatement(resultSetType, resultSetConcurrency);
            ResultSet rs = stmt.executeQuery("SELECT * FROM " + table);
            return rs;
        } catch (SQLException sqlE) {
            sqlE.printStackTrace();
            return null;
        }

    }
    
    /**
     * Gets the complete table from the DDBB as "Default"
     *
     * @param table Table to store in the ResultSet
     * @return ResultSet (default) of the table selected, null if error
     */
    public static ResultSet getTable(String table) {
        return getTable(ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY, table);
    }

    /**
     * @param table Table print
     * Prints the selected table content
     */
    public static void printTableLibros() {
        try {
            ResultSet rs = getTable(DB_LIB);
            while (rs.next()) {
                int id = rs.getInt(DB_LIB_ISBN);
                String t = rs.getString(DB_LIB_TIT);
                int y = rs.getInt(DB_LIB_PUB);
                System.out.println(id + "\t" + t + "\t" + y);
            }
            rs.close();
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }
        
}
