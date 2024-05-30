document.addEventListener("DOMContentLoaded", function() {
    //VARIABLES
        //QUESTIONARI
    let questionari = document.getElementById("form");

        //CAMPS DE QUESTIONARI
    let campUsuari = document.getElementById("usuari");
    let campEmail = document.getElementById("email");
    let campContrasenya = document.getElementById("pass");
    let campValidarContrasenya = document.getElementById("validatePass");

        //BOTO CONTRASENYA
    let botoMostrarContrasenya = document.getElementById("showPass");
    
        //ALERTES
    let alertes = document.querySelectorAll(".alert");
    let alertaUsuari = document.getElementById("alertUserEmpty");
    let alertaUsuariMinus = document.getElementById("alertUserLower");
    let alertaEmail = document.getElementById("alertEmail");
    let alertaContraseñaLength = document.getElementById("alertPassShort");
    let alertaContraseñaCap = document.getElementById("alertPassCaps");
    let alertaContraseñaSimbol = document.getElementById("alertPassSymbol");
    let alertaContraseñaCoinciden = document.getElementById("alertPassMatch");
    let missatgeCorrecte = document.querySelector(".success");


    //FUNCIÓ PER A COMPROBAR SI EL EMAIL ES CORRECTE
    function checkEmail (string) {
        let emailString = String(string);
        let contArroba = false;
        let contPunto = false;
        for (let i=0;i<emailString.length;i++) {
            let char = emailString.charAt(i);
            if (char == '@') {
                contArroba = true;
            }
            else if (char =='.') {
                contPunto = true;
            }
        }
        return(contArroba && contPunto);
    }

    //FUNCIÓ PER A COMPROVAR LONGITUD
    function checkLength (string,number) {
        let stringInput = String(string);
        if (stringInput.length < (number)) {
            return false;
        }
        else {
            return true;
        }
    }

    //FUNCIÓ PER A COMPROVAR SI UNA CADENA TÉ MAJÚSCULES I MINÚSCULES
    function hasCapsLows (string) {
        let stringInput = String(string);
        let tieneMayus = false;
        let tieneMinus = false;
        for (let i=0; i<stringInput.length;i++) {
            let char = stringInput.charAt(i);
            if(char >= 'a' && char <= 'z') {
                tieneMayus = true;
            }
            if(char >= 'A' && char <= 'Z') {
                tieneMinus = true;
            }
        }
        return (tieneMayus && tieneMinus);
        
    }

    //FUNCIÓ PER A COMPROVAR SI LA CADENA TÉ AL MENYS UN SIMBOL (&-%-$-#-@-€-.)
    function hasSymbol (string) {
        let stringInput = String(string);
        let hasSimbol = false;
        
        for (let i=0;i<stringInput.length;i++) {
            let char = stringInput.charAt(i);
            if (char === '&' || char === '%' || char === '$' ||
             char === '#' || char === '@' || char === '€' || char === '.') {
                hasSimbol = true;
                break;
             }
        }
        return hasSimbol;
    }

    //FUNCIÓ PER A COMPROVAR SI TOTS ELS CAMPS SON CORRECTES
    function checkValidity (usuari, email, pass, valPass) {
        if (
            usuari != "" &&
            usuari === String(usuari).toLowerCase() &&
            checkEmail(email) &&
            checkLength(pass,8) &&
            hasCapsLows(pass) &&
            hasSymbol(pass) &&
            pass === valPass
        ) {
            return true;
        }
    }
    
    // AMAGAR ALERTES I MISSATGE DE VALIDACIÓ AL INICI
    missatgeCorrecte.style.display = "none";
    alertes.forEach(function(alerta) {
        alerta.style.display = "none";
    });

    // EVENT LISTENER BOTO MOSTRAR CONSTRASENYA
    botoMostrarContrasenya.addEventListener("click", function(event) {
        event.preventDefault();
        // Toggle password field type between 'password' and 'text'
        if (campContrasenya.type === "password") {
            campContrasenya.type = "text";
            campValidarContrasenya.type = "text";
            botoMostrarContrasenya.textContent = "Ocultar Contraseña";
        } else {
            campContrasenya.type = "password";
            campValidarContrasenya.type = "password";
            botoMostrarContrasenya.textContent = "Mostrar Contraseña";
        }
    });

    //EVENT LISTENER CONTRASENYES
    campContrasenya.addEventListener("input",function(event) {
        event.preventDefault();

        let pass = campContrasenya.value.trim();
        let valPass = campValidarContrasenya.value.trim();

        if (!checkLength(pass,8)) {
            alertaContraseñaLength.style.display = "block";
        }
        else {
            alertaContraseñaLength.style.display = "none";
        }
        if (!hasCapsLows(pass)) {
            alertaContraseñaCap.style.display = "block"; 
        }
        else {
            alertaContraseñaCap.style.display = "none";
        }
        if (!hasSymbol(pass)) {
            alertaContraseñaSimbol.style.display = "block";
        }
        else {
            alertaContraseñaSimbol.style.display = "none";
        }


    });

    // EVENT LISTENER CUESTIONARI
    questionari.addEventListener("submit", function(event) {
        event.preventDefault();


        let usuari = campUsuari.value.trim();
        let email = campEmail.value.trim();
        let pass = campContrasenya.value.trim();
        let valPass = campValidarContrasenya.value.trim();


        if (usuari =="") {
            alertaUsuari.style.display = "block";
            setTimeout(() => {
                alertaUsuari.style.display ="none";
            }, 3000);
        }
        if (usuari != String(usuari).toLowerCase()) {
            alertaUsuariMinus.style.display = "block";
            setTimeout(() => {
                alertaUsuariMinus.style.display ="none";
            }, 3000);
        }
        if (!checkEmail(email)) {
            alertaEmail.style.display = "block";
            setTimeout(() => {
                alertaEmail.style.display ="none";
            }, 3000);
        }
        if (!checkLength(pass,8)) {
            alertaContraseñaLength.style.display = "block";
            setTimeout(()=> {
                alertaContraseñaLength.style.display = "none";
            }, 3000);
        }
        if (pass != valPass) {
            alertaContraseñaCoinciden.style.display = "block";
            setTimeout(() => {
                alertaContraseñaCoinciden.style.display = "none";
            }, 3000);
        }
        
        // VALIDADOR GLOBAL
        if (checkValidity(usuari,email,pass,valPass)) {
            missatgeCorrecte.style.display = "block";
            questionari.reset();
            setTimeout(()=> {
                missatgeCorrecte.style.display ="none";
            },3000);
        }

    });

});