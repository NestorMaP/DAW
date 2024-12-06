// Primero se piden palabras al usuaio
const palabras = pedirPalabras();

// A continuación cuenta las palabras y devuelve un array donde se tiene
// la palabra y el número de veces que ha aparecido
const palabrasContadas = cuentaPalabras(palabras);

//Finalmente se muestra por pantalla el listado de palabras y su cuenta
mostrarPantalla(palabrasContadas)

/*
Cuenta el número de repeticiiones de cada palabra
*/
function cuentaPalabras(palabra) {
    const mapPalabras = new Map();
    const listado = [];

    // Se crea un Map de palabras y repeticiones
    for (const palabra of palabras) {
        let numRep = mapPalabras.get(palabra); // busco si hay más iguales en el mapa
        if (numRep === undefined) {
            // Si no está la palabra, la creo
            mapPalabras.set(palabra, 1);
        } else {
            mapPalabras.set(palabra, ++numRep)
        }
    }
    // A partir del mapa de palabras y repeticiones creo un array de strings
    // donde cada elemento del array es un texto con la palabra y el número de ocurrencias
    for (const[palabra, rep] of mapPalabras) {
        listado.push(palabra + ': ' + rep + ' ocurrencias');
    }
    return listado;
}