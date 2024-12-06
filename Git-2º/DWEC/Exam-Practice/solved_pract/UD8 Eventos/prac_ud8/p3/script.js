const capa1 = document.getElementById('capa1');
const capa2 = document.getElementById('capa2');

// Establecer opacidad al iniciar el arrastre
capa1.addEventListener('dragstart', (event) => {
  event.dataTransfer.setData('text','capa1');
  capa1.style.opacity = '0.5';
});

// Restaurar opacidad después de arrastrar
capa1.addEventListener('dragend', () => {
  capa1.style.opacity = '1';
});

// Cambiar el color de fondo al entrar en el área de destino
capa2.addEventListener('dragenter', (event) => {
  event.preventDefault();
  capa2.style.backgroundColor = '#f00';
});

// Permitir el arrastre en el área de destino
capa2.addEventListener('dragover', (event) => {
  event.preventDefault();
});

// Volver el fondo a blanco al salir del área de destino
capa2.addEventListener('dragleave', () => {
  capa2.style.background = '#fff';
});

// Al soltar, se realiza el cambio de texto y fondo
capa2.addEventListener('drop', (event) => {
  event.preventDefault();
  const data = event.dataTransfer.getData('text');
  if (data === 'capa1') {
    capa1.style.display = 'none' // Ocultar capa1
    capa2.style.backgroundColor = '#0f0';
    capa2.innerText = 'Lo has logrado'; // Cambiar texto en capa 2
  }
});