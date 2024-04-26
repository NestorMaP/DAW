package retrobank;


import java.util.Scanner;
public class RetroBank {
   
    //Muestra las opciones y devuelve la escogida.
    public static int showMenu() {
        int chosenOption;
        Scanner reader = new Scanner(System.in);
        System.out.print(
            "\n\nEscoge una de las siguientes opciones:\n" +
                    "1. Ver cuentas\n" +
                    "2. Ingresar dinero\n" +
                    "3. Retirar dinero\n" +
                    "4. Agregar cuenta\n" +
                    "5. Eliminar cuenta\n" +
                    "6. Buscar cuenta\n" +
                    "7. Mostrar morosos\n" +
                    "8. Salir\n\n" +
                    "Opción escogida (valor numérico): "
        );
        chosenOption = reader.nextInt();
        return chosenOption;
    }
    
    //Inicia acciones dependiendo de la opción escogida.
    public static boolean beginAction(int accountSelected, int chosenAction, 
            String arrayNames[], double arrayBalance[], Scanner reader, 
            double qty, String name, String lookForText, boolean onOff) {
        
        switch (chosenAction) {
            
            case 1:
                
                showList(arrayNames,arrayBalance);
                
                break;
            
            case 2:
                
                
                
                if (arrayNames[0] != null) {
                    
                
                    showList(arrayNames,arrayBalance);
                    boolean doneSum = false;

                    while (doneSum == false){

                        System.out.print("Escoja el número de cuenta en que quiere ingresar: ");
                        accountSelected = reader.nextInt();
                        System.out.print("Elija la cantidad a ingresar: ");
                        qty = reader.nextDouble();                    
                        if (checkAccountExistence(accountSelected,arrayNames) &&
                            isPositive(qty)) {

                            arrayBalance[accountSelected-1] += qty;
                            System.out.println("Saldo actualizado.");
                            doneSum = true;
                        }
                        reader.nextLine();

                    }
                }
                else {
                    
                    System.out.println("No hay cuentas");
                    
                }
                
                
                
                break;
                
            case 3:
                
                if (arrayNames[0] != null) {
                    
                
                    showList(arrayNames,arrayBalance);
                    boolean doneSub = false;

                    while (doneSub == false){

                        System.out.print("Escoja el número de cuenta de la que quiere retirar: ");
                        accountSelected = reader.nextInt();
                        System.out.print("Elija la cantidad a retirar: ");
                        qty = reader.nextDouble();                    
                        if (checkAccountExistence(accountSelected,arrayNames) &&
                            isPositive(qty)) {

                            arrayBalance[accountSelected-1] -= qty;
                            System.out.println("Saldo actualizado.");
                            doneSub = true;
                        }
                        reader.nextLine();

                    }
                }
                else {
                    
                    System.out.println("No hay cuentas");
                    
                }
                
                
                
                break;
                
            case 4:
                
                if (isFullList(arrayNames)) { //PRIMERO VEMOS SI LA LISTA ESTÁ LLENA
                    
                    System.out.println("La lista está llena.");
                    
                }
                else { //PEDIMOS DATOS Y HACEMOS RESTO DE COMPROBACIONES
                    
                    System.out.print("Introduzca el nombre de la cuenta: ");
                    name = reader.nextLine();
                    System.out.print("Introduzca el saldo inicial: ");
                    qty = reader.nextDouble();
                    
                    if (isRepeated(name,arrayNames)) {
                        
                        System.out.println("La cuenta ya existe.");
                        
                    }
                    else {
                        
                        addAccount(name,qty,arrayNames,arrayBalance);
                        System.out.println("La cuenta ha sido añadida correctamente.");
                        
                    }
                    reader.nextLine();
                }
                
                break;
                
            case 5:
                
                if (arrayNames[0] != null) {
                    
                    showList(arrayNames,arrayBalance);
                    boolean doneDel = false;

                    while (doneDel == false){

                        System.out.print("Escoja el número de cuenta que quiere eliminar: ");
                        accountSelected = reader.nextInt();

                        if (checkAccountExistence(accountSelected,arrayNames)) {

                            deleteAccount(accountSelected,arrayNames,arrayBalance); //Eliminamos la cuenta
                            sortList(arrayNames,arrayBalance); //Ordenamos la lista de cuentas
                            reader.nextLine();
                            System.out.println("Cuenta eliminada.");
                            doneDel = true;
                        }
                        else {

                            System.out.println("La cuenta indicada no existe.");

                        }
                    }
                }
                else {
                    
                    System.out.println("No hay cuentas");
                    
                }
                                
                break;
            
            case 6:
                
                System.out.print("Introduzca el texto a buscar: ");
                lookForText = reader.nextLine();
                lookForAccount(lookForText,arrayNames,arrayBalance);
                
                break;
            
            case 7:
                
                showDefaulters(arrayNames,arrayBalance);
                
                break;
            
            case 8:
                deleteAllAccounts(arrayNames,arrayBalance);
                onOff = closeProgram(onOff);
                
                break;
            
            
        }
        return onOff;
    }
    
    //Muestra por pantalla la lista de cuentas.
    public static void showList(String arrayNames[], double arrayBalance[]) {
        
        int accountCounter = 0;
        for(int i=0;i<100;i++) {
            
            if (arrayNames[i] != null) {
                
                System.out.print((i+1) + ". " + arrayNames[i] + 
                        " // Saldo: ");
                System.out.printf("%1.2f", arrayBalance[i]);
                System.out.println(" €.");
                accountCounter++;
            }
            
        }
        if (accountCounter == 0) {
                
                System.out.println("No hay cuentas.");
                
        }
    }
    
    //Comprueba que el valor introducido es positivo
    public static boolean isPositive(double qty) {
    
        return (qty >= 0);
        
    }
    
    //Comprueba que la cuenta no está repetida
    public static boolean isRepeated(String name, String arrayNames[]) {
        
        
        for(int i=0;i<100;i++) {
            
            if (arrayNames[i] != null && arrayNames[i].equals(name)) {
                
                return true;
                
            }
            
        }
        return false;
    }
    
    //Ordena la lista en caso de eliminar algun elemento.
    public static void sortList(String arrayNames[], double arrayBalance[]) {
        
        //Bucle para contar el número de veces a ejecutar el bucle para ordenar
        
        /*
        En este programa no es necesario ya que se ejecuta el bucle de ordenar
        cada vez después de eliminar cualquier "línea", sin embargo, en caso de 
        que pudiesemos eliminar varias líneas a la vez sería necesario utilizar
        este método para poder reordenar la lista en caso de haber varios 
        eliminados seguidos.
        */
        int counter1 = 0; //Contador de líneas null entre líneas ocupadas
        int counter2 = 0; //Contador de líneas null con línea ocupada después
        
        
        for (int i=1;i<100;i++) {
            
            if(arrayNames[i-1] == null && arrayNames[i] == null) {
                
                counter1++;
                
            }
            if(arrayNames[i-1] == null && arrayNames[i] != null) {
                
                counter2 = counter2 + 1 + counter1;
                counter1 = 0;
                
            }
                        
        }
        
        
        for (int j=0;j<counter2;j++) { //Bucle en base a contador    
            
            for (int i=1;i<100;i++) { //Bucle para ordenar

                if (arrayNames[i] != null && arrayNames[i-1] == null) {

                    arrayNames[i-1] = arrayNames[i];
                    arrayNames[i] = null;
                    arrayBalance[i-1] = arrayBalance[i];
                    arrayBalance[i] = 0;

                }
                
            }
            
        }
    }
    
    //Comprueba si una cuenta existe
    public static boolean checkAccountExistence(int accountSelected, String arrayNames[]) {
        
        boolean checkExistence = false;
        for(int i=0;i<100;i++) {
            
            if (arrayNames[accountSelected-1] != null) {
                
                checkExistence = true;
                
            }
            
        }
        return checkExistence;
        
    }
    
    //Elimina una cuenta
    public static void deleteAccount(int accountSelected, String arrayNames[], double arrayBalance[]) {
        
        arrayNames[accountSelected-1] = null;
        arrayBalance[accountSelected-1] = 0;
        
    }
    
    //Elimina todas las cuentas
    public static void deleteAllAccounts(String arrayNames[], double arrayBalance[]) {
        
        for (int i=0;i<100;i++) {
            
            arrayNames[i] = null;
            arrayBalance[i] = 0;
            
        }
        
    }
    
    //Comprueba si la lista está llena
    public static boolean isFullList(String arrayNames[]) {
        
        int accountCounter = 0;
        for (int i=0;i<100;i++) {
            
            if (arrayNames[i] != null) {
                
                accountCounter++;
                
            }
            
        }
        return (accountCounter == 100);
    }

    //Agregar cuenta en lista
    public static void addAccount(String name, double qty, String arrayNames[], double arrayBalance[]) {
        
        int accountCounter = 0;
        
        //Bucle para saber en qué posición se registra la nueva cuenta.
        for (int i=0;i<100;i++) {
            
            if (arrayNames[i] != null) {
                
                accountCounter++;
                
            }
            
        }
        /*Lo ponemos en la misma posición del contador ya que siempre
        será una por encima del número de cuentas que hay al empezar
        un array en la posición [0].
        */
        arrayNames[accountCounter] = name;
        arrayBalance[accountCounter] = qty;
        
    }
    
    //Buscar cuentas
    public static void lookForAccount(String lookForText, String arrayNames[], double arrayBalance[]) {
        
        int accountCounter = 0;
        String lookForTextLow;
        
        lookForTextLow = lookForText.toLowerCase();
        
        /*
        Hacemos un bucle secundario para convertir todos los nombres 
        a minúscula i buscar nuestro texto en cada nombre.
        */
        String[]arrayNamesLow = new String[100];
        
        for (int i=0;i<100;i++) {
            
            if (arrayNames[i] != null) {
                
                arrayNamesLow[i] = arrayNames[i].toLowerCase();
                
                if (arrayNamesLow[i].contains(lookForTextLow)){
                    
                    System.out.print((i+1) + ". " + arrayNames[i] + 
                        " // Saldo: ");
                    System.out.printf("%1.2f", arrayBalance[i]);
                    System.out.println(" €.");
                    accountCounter++;
                }
                
            }
            
        }
        if (accountCounter == 0) {
            
            System.out.println("No se han encontrado cuentas.");
            
        }
        
    }
    
    //Muestra morosos
    public static void showDefaulters(String arrayNames[], double arrayBalance[]) {
        
        int accountCounter = 0;
        
        for (int i=0;i<100;i++) {
            
            if (arrayBalance[i] < 0) {
                
                System.out.print((i+1) + ". " + arrayNames[i] + 
                        " // Saldo: ");
                System.out.printf("%1.2f", arrayBalance[i]);
                System.out.println(" €.");
                accountCounter++;
            }
            
        }
        if (accountCounter == 0) {
            
            System.out.println("No hay ningún moroso en la lista.");
            
        }
        
    }
    
    //Cerrar programa
    public static boolean closeProgram(boolean onOff) {
        
        onOff = false;
        System.out.println("El programa se ha cerrado.");
        return onOff;
        
    }
    
    
    //MAIN && VARIABLES
    public static void main(String[] args) {
    
        Scanner reader = new Scanner(System.in);
               
        boolean onOff = true; //Encender y apagar el programa
        int chosenAction; //Número de acción escogida
        int accountSelected = 0; //Número de cuenta escogida.
        String lookForText = ""; //Texto pedido al usuario para buscar
        String[]arrayNames = new String[100]; //Listado de nombres
        double[]arrayBalance = new double[100]; //Listado de saldo
        String name = "";
        double qty = 0;
        
        
       
    //Bucle de actividad del programa
        while (onOff == true) {
            
            chosenAction=showMenu();
            onOff = beginAction(accountSelected,chosenAction,arrayNames,
                    arrayBalance,reader,qty,name,lookForText,onOff);
            
        }

    }
}
