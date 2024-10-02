let birthDate = window.prompt("Which day were you born? (YYYY/MM/DD)")
let formattedBirthDate = new Date(birthDate);
let currentDate = new Date();

let msDiff = currentDate - formattedBirthDate;
let dayDiff = Math.floor(msDiff/(1000*60*60*24));

window.alert(dayDiff + " passed since you were born.");
