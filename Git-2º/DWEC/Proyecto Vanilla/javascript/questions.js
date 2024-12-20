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
scoreInput.addEventListener('keyup', toggleRecordBtn);
questionInput.addEventListener('keyup', toggleRecordBtn);
radioTrue.addEventListener('click', toggleRecordBtn);
radioFalse.addEventListener('click', toggleRecordBtn);



// Función para simular un retraso
function delay(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

// Función asincrónica para agregar una pregunta a la tabla
async function addQuestionToTable() {
  const question = questionInput.value.trim();
  const score = scoreInput.value.trim();
  const answer = radioTrue.checked ? "Verdadero" : "Falso";

  // Crear una nueva fila en la tabla
  const row = document.createElement("tr");
  row.innerHTML = `
    <td>${question}</td>
    <td>${answer}</td>
    <td>${score}</td>
    <td>Guardando...</td>
  `;
  tableBody.appendChild(row);

  // Esperar 5 segundos antes de cambiar el estado
  await delay(5000);
  row.cells[3].textContent = "OK";
}

// Función asincrónica para manejar el botón de grabar
recordBtn.addEventListener("click", async () => {
  await addQuestionToTable();

  // Esperar 5 segundos antes de limpiar el formulario
  await delay(5000);
  questionInput.value = "";
  scoreInput.value = "";
  radioTrue.checked = false;
  radioFalse.checked = false;
  recordBtn.disabled = true;
});

// Botón de retroceso
backBtn.addEventListener("click", () => {
  // Aquí puedes implementar la lógica para volver a la pantalla anterior.
  alert("Regresando a la pantalla anterior...");
});