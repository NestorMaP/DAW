let numberOne;
let numberTwo;
let operation;
let result;
let onOff = true;
let ans = 0;

function askNumber(message, ans){

    let number;

    do {

        number = prompt(message);
        if (number == "ans") {

            number = ans;

        }
        else {

            number = Number(number);

        }

    } while (isNaN(number))

    return number;
}


while (onOff) {

    numberOne = askNumber("Número 1",ans);
    numberTwo = askNumber("Número 2",ans);

    do {    

        operation = prompt("Introduce la operación a realizar");

    } while (operation!="sumar" && 
            operation!="restar" &&
            operation!="multiplicar" &&
            operation!="dividir")



    switch (operation) {

        case "sumar":
            result = numberOne+numberTwo;
            console.log(result);
        break;
        case "restar":
            result = numberOne-numberTwo;
            console.log(result);
        break;
        case "multiplicar":
            result = numberOne*numberTwo;
            console.log(result);
        break;
        case "dividir":
            result = numberOne/numberTwo;
            console.log(result);
        break;
        default:

            console.log("No es una operación válida.");
        

    }
    ans = result;
    onOff = confirm("Quiere realizar otra operación")

}
