import * as cookies from "./cookies.js";

// Delete Cookie "currentUser"
if (cookies.getCookie('currentUser') !== null) {
    cookies.deleteCookie('currentUser');
};

// HTML Elements
const welcome_message = document.getElementById('welcome-message');
const form_field = document.getElementById('field');
const userInput = document.getElementById('user');
const errorMessage = document.getElementById('errors');

function divChanger() {
    welcome_message.style.display = 'none';
    form_field.style.display = 'block';
}
// Se ejecutará automáticamente en 5 segs
setTimeout(divChanger,5000); // Change to 5000

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
        let userData = {
            email: userInput.value,
            lastAccess: new Date(),
            questions: []
        };
        
        if (cookies.getCookie(userInput.value) == null) {
            cookies.setCookie(userInput.value,userData,7);
        }
        cookies.setCookie('currentUser',userInput.value,1);
        // Redirigir
        window.location.href = "../login.html";
    }
}

userInput.addEventListener('blur',showError);