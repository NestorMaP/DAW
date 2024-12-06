let currentDateString = ""
let now = new Date(Date.now());
let weekDay = now.getDay();
let monthDay = now.getDate();
let month = now.getMonth();
let year = now.getFullYear();

// It's not the proper English format but it's similar to the example
currentDateString = 
translateWeekday(weekDay) + ", "
 + monthDay + " of "
 + translateMonth(month) + " of "
 + year + "."

window.alert("Today is " + currentDateString);

/**
 * Handles the Weekday translation
 * @param {*} weekday 
 * @returns String with Weekday
 */
function translateWeekday(weekday) {
    switch(weekday){
        case 0:
            return "Sunday";
            break;
        case 1:
            return "Monday";
            break;
        case 2:
            return "Tuesday";
            break;
        case 3:
            return "Wednesday";
            break;
        case 4:
            return "Thursday";
            break;
        case 5:
            return "Friday";
            break;
        case 6:
            return "Saturday";
            break;
    }
}
/**
 * Handles the month translation
 * @param {*} month 
 * @returns String with Month
 */
function translateMonth(month) {
    switch(month){
        case 0:
            return "January";
            break;
        case 1:
            return "February";
            break;
        case 2:
            return "March";
            break;
        case 3:
            return "April";
            break;
        case 4:
            return "May";
            break;
        case 5:
            return "June";
            break;
        case 6:
            return "July";
            break;
        case 7:
            return "August";
            break;
        case 8:
            return "September";
            break;
        case 9:
            return "October";
            break;
        case 10:
            return "November";
            break;
        case 11:
            return "December";
            break;
    }
}