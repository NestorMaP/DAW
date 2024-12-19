import * as cookies from './cookies.js';

// HTML Elements
const questionInput = document.getElementById('question');
const radioTrue = document.getElementById('true');
const radioFalse = document.getElementById('false');
const scoreInput = document.getElementById('score');
const errorDiv = document.getElementById('errors');
const backBtn = document.getElementById('back-button');
const recordBtn = document.getElementById('record-button');

// Regex Puntuación
const scoreRegex = /^\d$/;

// Función para validar campos del formulario
function validateForm() {
  let isValid = false;
  if (validateQuestionInput() && validateRadioInput() && validateScoreInput()) {
    isValid = true;
  }
  return isValid;
}

//Función para validar el campo de "pregunta"
function validateQuestionInput() {
  return questionInput.value !== '';
}

// Función para comprobar si se ha seleccionado verdadero o falso
function validateRadioInput() {
  return radioTrue.checked || radioFalse.checked;
}

// Función para validar el campo de puntuación
function validateScoreInput() {
  if (scoreRegex.test(scoreInput.value)) {
    errorDiv.style.display = 'none';
    return true;
  } else {
    errorDiv.textContent = 'Debe indicar un número del 0 al 9';
    errorDiv.style.display = 'block';
    return false;
  }
}

function toggleRecordBtn() {
  if (validateForm()) {
    recordBtn.disabled = false;
  } else {
    recordBtn.disabled = true;
  }
}

// Manejar la activación del botón de grabar
scoreInput.addEventListener('blur', toggleRecordBtn);
questionInput.addEventListener('blur', toggleRecordBtn);
radioTrue.addEventListener('click', toggleRecordBtn);
radioFalse.addEventListener('click', toggleRecordBtn);

