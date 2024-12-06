let mainBtn = document.getElementById("mainBtn");

mainBtn.addEventListener("click", calculate);

function calculate() {
    let birthDate = document.getElementById("dateInput").value;
    let formattedbirthDate = new Date(birthDate);

    let currentDate = new Date();

    let msDiff = currentDate - formattedbirthDate;

    // We divide the difference in milliseconds with the ammount of them in a year
    // 1000 ms in a s - 60s in minute ...
    // Finally we use 365.25 days in a year to avoid mistakes with leap years
    let yearsDiff = Math.floor(msDiff/(1000*60*60*24*365.25));
    window.alert(yearsDiff + " years passed since you were born.");
}
