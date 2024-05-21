let screen = document.querySelector(".screen");
let calculation = "13+5";

screen.textContent= calculation;

calculation = eval(calculation);
screen.textContent = calculation;




let buttonArray = document.querySelectorAll(".btn");

buttonArray.forEach (button => {

    if(button.id != ""){

        console.log(button.textContent + " WITH ID: " + button.id);

    }
    else{
        
        console.log(button.textContent);

    }    
})