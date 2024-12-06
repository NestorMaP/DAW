// Función para cambiar el fondo a una imagen aleatoria de Unsplah
function cambiarFondo() {
  const imagenContainer = document.getElementById('imagen');
  // Obtener una imagen aleatorio de Unsplash
  imagenContainer.style.backgroundImage = "url('https://picsum.photos/1920/1080')";
}

// Evento para detectar Ctrl + b
document.addEventListener('keydown', function(event) {
  if (event.ctrlKey && event.key === 'b') {
    document.getElementById('text').textContent = '';
    cambiarFondo();
  } 
})