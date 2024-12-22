import * as cookies from "./cookies.js";

// HTML Elements
const welcomeMessage = document.getElementById('welcome-message');
const dateMessage = document.getElementById('date-message');
const questionsBtn = document.getElementById('questions-button');
const questionnaireBtn = document.getElementById('questionnaire-button');

// Cookie info
const currentUser = cookies.getCookie('currentUser');
const userInfo = cookies.getCookie(currentUser);

// Establecer correo en mensaje
welcomeMessage.innerText += ` ${userInfo.email}`;

// Establecer última fecha de entrada
dateMessage.innerText += ` ${new Date(userInfo.lastAccess).toLocaleDateString()}`

// Cambiar pantalla cuando se pulsa el botón "Preguntas"
questionsBtn.addEventListener("click",() => {
    window.location.href = "../questions.html";
});

// Cambiar pantalla cuando se pulsa el botón "Cuestionario"
questionnaireBtn.addEventListener("click", () => {
    window.location.href = "../questionnaire.html";
})