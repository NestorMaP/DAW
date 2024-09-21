/*
FENT L'EXERCICI M'HE ADONAT QUE QUAN ES CREAVEN MÉS DE 10 TASQUES
DONAVA ERROR JA QUE EN LA COMPARACIÓ DE LA LINIA 131, ESTAVEN COMPARANT-SE
DUES STRINGS I NO DOS NOMBRE, PER TANT A PARTIR DEL ID=10, EL IF ERA FALSE
JA QUE 10<9 SI COMPAREM STRINGS. HO HE CORRIGIT POSSANT-HO DINS DE NUMBER().
*/



function getInputValue() {
    // EJ3: Función que retorna el valor de la caja de texto.
    let textBox = document.querySelector('input[type="text"]');
    if (textBox.value === "") {

        return "Tarea Vacía"

    }else {

        return textBox.value;
        cleanInput();

    }
    
    
}

function createTask(id, title) {
    // EJ5.1 Poner el ID correcto al DIV de la tarea principal
    // EJ5.2 Poner el ID correcto al botón de completar
    // EJ5.3 Poner el ID correcto al objeto del botón de borrar.
    let newTaskDiv = document.createElement("div")
    newTaskDiv.id = "t" + id;
    newTaskDiv.classList.add("flex-h")
    newTaskDiv.classList.add("tb-completed")
    newTaskDiv.classList.add("task")


    
    let newTaskH1 = document.createElement("h1")
    newTaskH1.classList.add("ml20")
    newTaskH1.textContent = title

    newTaskDiv.append(newTaskH1)

    let newTaskSubDiv = document.createElement("div")
    newTaskSubDiv.classList.add("mr20")

    let newTaskCompleteButton = document.createElement("button")
    newTaskCompleteButton.id = "c" + id;
    newTaskCompleteButton.classList.add("button")
    newTaskCompleteButton.classList.add("complete")
    newTaskCompleteButton.textContent = "Completar"



    let newTaskEraseButton = document.createElement("button")
    newTaskEraseButton.id = "e" + id;
    newTaskEraseButton.classList.add("button")
    newTaskEraseButton.classList.add("erase")
    newTaskEraseButton.textContent = "Eliminar"


    newTaskSubDiv.append(newTaskCompleteButton)
    newTaskSubDiv.append(newTaskEraseButton)

    newTaskDiv.append(newTaskSubDiv)

    return newTaskDiv
}

function eraseTask() {
    let idToErase = "#t" + this.id.slice(1,100)
    // EJ2: Añadir código para ocultar la tarea que tiene el ID "idToErase"
    let taskToErase = document.querySelector(idToErase);
    taskToErase.style.display = "none";
    

}

function completeTask() {
    let idToComplete = "#t" + this.id.slice(1,100)
    let idToChange = "#c" + this.id.slice(1,100)
    
    let taskToComplete = document.querySelector(idToComplete)
    taskToComplete.classList.toggle("tb-completed")
    taskToComplete.classList.toggle("completed")

    let buttonToComplete = document.querySelector(idToChange)

    if (buttonToComplete.textContent == "Incompletar") {
        buttonToComplete.textContent ="Completar"
    } else {
        buttonToComplete.textContent ="Incompletar"
    }
}

function cleanInput() {
    // EJ4: Función que elimina el contenido introducido por el usuario en la caja de texto
    let textBox = document.querySelector('input[type="text"]');
    textBox.value = "";

}

function addAllListeners() {
    // EJ1.1 Escribir el código necesario para añadir un evento cada vez que se pulse un botón con la clase ".erase".
    let eraseElements = document.querySelectorAll(".erase");
    eraseElements.forEach((element) => {

        element.addEventListener("click", eraseTask);

    });
    


    // EJ1.2 Escribir el código necesario para añadir un evento cada vez que se pulse un botón con la clase ".complete".
    let completeElements = document.querySelectorAll(".complete");
    completeElements.forEach((element) => {

        element.addEventListener("click", completeTask);

    });

        
}

function getNewId() {
    let tasks = document.querySelectorAll(".flex-h")
    let maxId = -1
    tasks.forEach(element => {
// ACÍ HE AFEGIT EL COMPARADOR A NUMBER() JA QUE PRESENTAVA ERROR.
        if (Number(element.id.slice(1,100)) > maxId) {
            maxId = element.id.slice(1,100)
        }
    })
    return (Number(maxId) + 1)
}

function addTaskFunction() {
    let inputValue = getInputValue()
    let newId = getNewId()
    newTaskCode = createTask(newId, inputValue)

    let taskContainer = document.querySelector(".task-container")
    taskContainer.append(newTaskCode)

    cleanInput()
    addAllListeners()
}

let addTaskButton = document.querySelector("#addTask")
addTaskButton.addEventListener('click', addTaskFunction)

addAllListeners()
