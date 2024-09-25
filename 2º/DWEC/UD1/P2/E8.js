let fSubmit = document.getElementById("fSubmit");

fSubmit.addEventListener("click",getHigher)

function getHigher(){    

    let fNum1 = document.getElementById("fNum1").value;
    let fNum2 = document.getElementById("fNum2").value;
    let fNum3 = document.getElementById("fNum3").value;

    if(checkValuesEmpty()){
        return;
    }

    fNum1 = parseFloat(fNum1);
    fNum2 = parseFloat(fNum2);
    fNum3 = parseFloat(fNum3);

    if(checkValueIsNumber()){
        return;
    }

    let mayor = Math.max(fNum1,fNum2,fNum3);

    window.alert("El número mayor es el " + mayor + ".");


    function checkValuesEmpty(){
        if (fNum1 === "" || fNum2 === "" || fNum3 === "") {
            window.alert("Los campos no pueden estar vacíos.");
            return true;
        } else {
            return false;
        }
    }

    function checkValueIsNumber(){
        if(isNaN(fNum1) || isNaN(fNum2) || isNaN(fNum3)){
            window.alert("Los campos deben ser números");
            return true;
        } else {
            return false;
        }
    }
}
