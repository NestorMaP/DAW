package cosmere;

import java.sql.*;
/**
 *
 * @author NéstorMaP
 */
public class DBManagerBooks extends DBManager{
    
    /**
     * Asks the DB for the book with the ISBN on parameter
     * @param isbn Book ISBN
     * @return ResultSet with the result null if error
     */
    public static ResultSet getBook(String isbn) {
        try {
            //Search in SQL
            Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            String query = DB_LIB_SELECT + " WHERE " + DB_LIB_ISBN + "='" + isbn + "';";
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
     * Checks if the book with the ISBN on parameter exists in the DB
     *
     * @param isbn Book ISBN
     * @return true if exists, false if not
     */
    public static boolean existsBook(String isbn) {
        try {
            //Get the instance of Book
            ResultSet rs = getBook(isbn);

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
     * Asks the DB to create a new instance of Book
     *
     * @param isbn Book ISBN
     * @param title Book title
     * @param year Year of publication
     * @param pages Number of pages
     * @param series Series or saga
     * @param read Boolean which indicates if it has been read or not
     * @return true if the insert was successful, false if not
     */
    public static boolean insertBook(String isbn, String title, int year, int pages, String series, boolean read) {
        try {
            //Get table Books in ResultSet
            System.out.print("Adding new book " + title + "...");
            ResultSet rs = getTable(ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_UPDATABLE, DB_LIB);

            //Add new Book
            rs.moveToInsertRow();
            rs.updateString(DB_LIB_ISBN, isbn);
            rs.updateString(DB_LIB_TIT, title);
            rs.updateInt(DB_LIB_PUB, year);
            rs.updateInt(DB_LIB_PAG, pages);
            rs.updateString(DB_LIB_SER, series);
            rs.updateBoolean(DB_LIB_READ, read);
            rs.insertRow();

            //Everything all right
            rs.close();
            System.out.println("SUCCESS!");
            return true;

        } catch (SQLException sqlE) {
            System.out.println("FAIL!");
            sqlE.printStackTrace();
            return false;
        }
    }

    /**
     * Asks the DB to modify an existent instance of Book
     *
     * @param isbn Book ISBN
     * @param newTitle Book title
     * @param newYear Year of publication
     * @param newPages Number of pages
     * @param newSeries Series or saga
     * @param newRead Boolean which indicates if it has been read or not
     * @return true if the update process was successful, false if not
     */
    public static boolean updateBook(String isbn, String newTitle, int newYear, int newPages, String newSeries, boolean newRead) {
        try {
            //Get the instance of the book in the ResultSet
            System.out.print("Updating book " + isbn + "... ");
            ResultSet rs = getBook(isbn);

            //If the ResultSet doesn't exist
            if (rs == null) {
                System.err.println("ERROR: ResultSet null.");
                return false;
            }

            //If the instance exists UPDATE its values
            if (rs.first()) {
                rs.updateString(DB_LIB_TIT, newTitle);
                rs.updateInt(DB_LIB_PUB, newYear);
                rs.updateInt(DB_LIB_PAG, newPages);
                rs.updateString(DB_LIB_SER, newSeries);
                rs.updateBoolean(DB_LIB_READ, newRead);
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
     * Asks the DB to delete an existent instance of Book
     *
     * @param isbn Deleted book ISBN
     * @return true if the delete process was successful, false if not
     */
    public static boolean deleteBook(String isbn) {
        try {
            System.out.print("Deleting book " + isbn + "... ");

            //Get the instance of the book in the ResultSet
            ResultSet rs = getBook(isbn);

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
