import * as cookies from './js/cookies.js';

// HTML Elements
let welcome_message = document.getElementById('welcome-message');
let form_field = document.getElementById('field');
let userInput = document.getElementById('user');
let errorMessage = document.getElementById('error');

function divChanger() {
    welcome_message.style.display = 'none';
    form_field.style.display = 'block';
}
// Se ejecutará automáticamente en 5 segs
setTimeout(divChanger,1); // Change to 5000

// Se ejecuta si el usuario aprieta Ctrl+F10
document.addEventListener('keydown', function(event) {
    if (event.ctrlKey && event.key === 'F10') {
        divChanger();
    }
});


// User management
function validateEmail() {
    let emailRegexp = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegexp.test(userInput.value);
}

function showError() {
    if (!validateEmail()) {
        errorMessage.style.display = "block";
        userInput.select();
    } else {
        errorMessage.style.display = "none";

        // Guardar cookies del usuario
        let data = {
            email : userInput.value,
            lastAccess : new Date()
        };
        
        cookies.setCookie(userInput.value,data,1);
        // Redirigir
        window.location.href = "./login.html"
    }
}

userInput.addEventListener('blur',showError);