document.addEventListener("DOMContentLoaded", function() {
    
    //DEFINIR VARIABLES 
    let elementDinamic = document.querySelector('.dynamicElement');

    let heightSlider = document.getElementById('heightSlider');
    let heightLabel = document.getElementById("alturaLabel");
    let widthSlider = document.getElementById('widthSlider');
    let widthLabel = document.getElementById("anchuraLabel");
    let borderSlider = document.getElementById('borderSlider');
    let borderLabel = document.getElementById("borderLabel");
    let colorSelector = document.getElementById('colorSelector');
    let borderSelector = document.getElementById('borderSelector');
    let enviarButton = document.querySelector('.enviar');


    elementDinamic.textContent = "";

    //EVENT LISTENER PER ALS SLIDERS
    heightSlider.addEventListener('input', function() {
        elementDinamic.style.height = this.value + 'px';
        heightLabel.textContent = "Altura: " + this.value + "px";
    });

    widthSlider.addEventListener('input', function() {
        elementDinamic.style.width = this.value + '%';
        widthLabel.textContent = "Ancho: " + this.value + "%";
    });

    borderSlider.addEventListener('input', function() {
        elementDinamic.style.borderRadius = this.value + 'px';
        borderLabel.textContent = "Border Radius: " + this.value + "px"
    });


    //EVENT LISTENERS PER ALS SELECTORS
    enviarButton.addEventListener('click', function(event) {
        event.preventDefault();

        if (borderSelector.value === 'opcion1') {
            elementDinamic.style.border = '5px solid black';
        } 
        else {
            elementDinamic.style.border = 'none';
        }
        if (colorSelector.value === 'opcion1') {
            elementDinamic.style.backgroundColor = "red";
        }
        else if (colorSelector.value === 'opcion2') {
            elementDinamic.style.backgroundColor = "green";
        }
        else {
            elementDinamic.style.backgroundColor = "blue";
        }

        // MISSATGE DE REFORÇ POSITIU
        elementDinamic.style.textAlign = "center";
        elementDinamic.style.color = "white";
        elementDinamic.style.paddingTop = "15px";
        elementDinamic.style.fontWeight = "bold";
        elementDinamic.textContent = "Canvis aplicats correctament!";
        setTimeout(()=> {
            elementDinamic.textContent = "";
            elementDinamic.style.paddingTop = "0px";
        },1500);
        
    });
});