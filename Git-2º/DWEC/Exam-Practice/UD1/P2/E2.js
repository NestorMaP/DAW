let string = window.prompt("Introduce una cadena de texto");
let nchars = 0;

for (i=0;i<string.length;i++) {
    if (string.charAt(i) ==='a') {
        nchars++;
    }
}

window.alert("La cadena tiene un total de " + nchars + " letras 'a'");