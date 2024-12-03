let libro = new Object();

libro = {
    titulo: 'Cien Años de Soledad',
    autor: 'Gabriel García Márquez',
    paginas: 417,
    anioPublicacion: 1967
}

for (let prop in libro) {
    if (typeof libro[prop] != 'function') {
        console.log(`${prop}: ${libro[prop]}`);
    }
}