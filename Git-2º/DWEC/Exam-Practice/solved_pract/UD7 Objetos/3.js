// Creación del objeto y recorrido de propiedades
const libro = 
{
    titulo: 'Cien Años de Soledad',
    autor: 'Gabriel García Márquez',
    paginas: 417,
    anioPublicacion: 1967,
};

// Usar for...in para recorrer las propiedades del objeto
for (let propiedad in libro) {
    console.log(`${propiedad}: ${libro[propiedad]}`)
}
// Salida:
// titulo: Cien Años de Soledad
// autor: Gabriel García Márquez
// paginas: 417
// añoPublicacion: 1967