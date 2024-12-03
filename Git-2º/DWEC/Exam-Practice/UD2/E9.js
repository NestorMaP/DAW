let mainBtn = document.getElementById("mainBtn");

mainBtn.addEventListener("click", check)

function check(){
    let date = document.getElementById("dateInput").value;
    let regExp = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/(\d{2}|\d{4})$/;
    if (regExp.test(date)) {
        window.alert("The date is correct!");
    } else {
        window.alert("The date is NOT correct, please try again :(")
    }
}