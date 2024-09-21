
let screen = document.querySelector(".screen");

function buttonDown() {

    if(screen.innerHTML == "0") {

        screen.innerHTML = this.innerHTML;

    }
    else {

        screen.innerHTML = screen.innerHTML + this.innerHTML;

    }
    
}

function buttonCDown() {

    screen.innerHTML = "0";

}

function removeDown() {

    let screen = document.querySelector(".screen");
    if (screen.innerHTML.length == 1) {

        screen.innerHTML = "0";

    }
    else {

        screen.innerHTML = screen.innerHTML.slice(0,-1);

    }

}

function equalsDown() {

    screen.innerHTML = eval(screen.innerHTML);

}

let buttonArray = document.querySelectorAll(".btn");


buttonArray.forEach(button=>{

   if(button.id == "c"){

        button.addEventListener('click',buttonCDown);

   }

   else if(button.id == "remove") {

        button.addEventListener('click',removeDown);

   }

   else if(button.id == "equals") {

        button.addEventListener('click',equalsDown);

   }
   
   else{
        
        button.addEventListener('click',buttonDown);
   
        }

})

