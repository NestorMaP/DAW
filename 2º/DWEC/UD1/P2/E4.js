const RED = "#FF0000";
const GREEN = "#008000";
const BLUE = "#0000FF"

let bgColor
let chosenColor = window.prompt("Elige color de fondo: Azul (A) // Rojo (R) // Verde (V)");
switch(chosenColor.toLowerCase()){
    case 'a':
        bgColor = BLUE;
        break;
    
    case 'r':
        bgColor = RED;
        break;
    
    case 'v':
        bgColor = GREEN;
        break;
    
    default:
        window.alert("No existe la opción disponible. Opción elegida: " + chosenColor + ".");
}
document.bgColor = bgColor;