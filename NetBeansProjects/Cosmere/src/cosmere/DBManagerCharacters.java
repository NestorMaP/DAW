package cosmere;

import java.sql.*;
/**
 *
 * @author NéstorMaP
 */
public class DBManagerCharacters extends DBManager{
    
    /**
     * Asks the DB for the character with the ID on parameter
     * @param id Character id
     * @return ResultSet with the result, null if error
     */
    public static ResultSet getCharacter(int id) {
        try {
            //Search in SQL
            Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            String query = DB_PER_SELECT + " WHERE " + DB_PER_ID + "='" + id + "';";
            ResultSet rs = stmt.executeQuery(query);
            
            //Check if it exists
            if (!rs.first()) {
                return null;
            }
            
            //If it exists, we return the ResultSet with the desired row
            return rs;

        } catch (SQLException sqlE) {
            sqlE.printStackTrace();
            return null;
        }
    }

    /**
     * Checks if the character with the id on parameter exists in the DB
     *
     * @param id Character id
     * @return true if exists, false if not
     */
    public static boolean existsCharacter(int id) {
        try {
            //Get the instance of Character
            ResultSet rs = getCharacter(id);

            //If the ResultSet is null it has been an error
            if (rs == null) {
                return false;
            }

            //If it exists the method returns true
            rs.close();
            return true;

        } catch (SQLException sqlE) {
            sqlE.printStackTrace();
            return false;
        }
    }
    
    /**
     * Asks the DB to create a new instance of Character
     *
     * @param name Character name
     * @param isbn Book ISBN
     * @param role Character role
     * @return true if the insert was successful, false if not
     */
    public static boolean insertCharacter(String name, String isbn, String role) {
        try {
            //Get table Characters in ResultSet
            System.out.print("Adding new character " + name + "...");
            ResultSet rs = getTable(ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_UPDATABLE, DB_PER);

            //Add new Character
            rs.moveToInsertRow();
            rs.updateString(DB_PER_NAME, name);
            rs.updateString(DB_PER_LIB_ISBN, isbn);
            rs.updateString(DB_PER_ROLE, role);
            rs.insertRow();

            //Everything all right
            rs.close();
            System.out.println("SUCCESS!");
            return true;

        } catch (SQLException sqlE) {
            System.out.println("FAIL!");
            System.err.println("ERROR: " + sqlE + "\n¿Existe el ISBN?");
            return false;
        }
    }

    /**
     * Asks the DB to modify an existent instance of Character
     *
     * @param id Character ID
     * @param newName Character name
     * @param newIsbn Book ISBN
     * @param newRole Character role
     * @return true if the insert was successful, false if not
     */
    public static boolean updateCharacter(int id, String newName, String newIsbn, String newRole) {
        try {
            //Get the instance of the Character in the ResultSet
            System.out.print("Updating character " + id + "... ");
            ResultSet rs = getCharacter(id);

            //If the ResultSet doesn't exist
            if (rs == null) {
                System.err.println("ERROR: ResultSet null.");
                return false;
            }

            //If the instance exists UPDATE its values
            if (rs.first()) {
                rs.updateString(DB_PER_NAME, newName);
                rs.updateString(DB_PER_LIB_ISBN, newIsbn);
                rs.updateString(DB_PER_ROLE, newRole);
                rs.updateRow();
                rs.close();
                System.out.println("SUCCESS!");
                return true;
            } else {
                System.err.println("ERROR: Empty ResultSet.");
                return false;
            }
        } catch (SQLException sqlE) {
            sqlE.printStackTrace();
            return false;
        }
    }

    /**
     * Asks the DB to delete an existent instance of Character
     *
     * @param id Deleted Character ID
     * @return true if the delete process was successful, false if not
     */
    public static boolean deleteCharacter(int id) {
        try {
            System.out.print("Deleting character " + id + "... ");

            //Get the instance of the character in the ResultSet
            ResultSet rs = getCharacter(id);

            //If the ResultSet doesn't exist
            if (rs == null) {
                System.err.println("ERROR: ResultSet null.");
                return false;
            }

            //If the instance exists DELETE its values
            if (rs.first()) {
                rs.deleteRow();
                rs.close();
                System.out.println("SUCCESS!");
                return true;
            } else {
                System.err.println("ERROR: Empty ResultSet.");
                return false;
            }

        } catch (SQLException sqlE) {
            sqlE.printStackTrace();
            return false;
        }
    }
    
}
