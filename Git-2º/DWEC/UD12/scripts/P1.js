// Cuenta atrás
function timeout(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

// Notificación
async function showNotification() {
  let countdown = 5;
  const countdownElement = document.getElementById('countdown');

  // Actualizar la cuenta atrás
  const interval = setInterval(() => {
    countdown--;
    countdownElement.textContent = `Cuenta atrás: ${countdown}`;
    if (countdown === 0) {
      clearInterval(interval);
    }
  }, 1000);

  // Esperar el tiempo necesario
  await timeout(5000);
  document.getElementById('notification').style.display = 'block';
}

showNotification();