let mainBtn = document.getElementById("mainBtn");

mainBtn.addEventListener("click",calculate);

function calculate() {
    let inputs = document.getElementsByTagName("input");
    let nums = [];

    for (let i=0; i<inputs.length; i++) {
        let num = parseInt(inputs[i]);
        if (!isNaN(num)) {
            nums[i] = num;
        }
    }
    let maxNum = Math.max(...nums);

    window.confirm("Max number is: " + maxNum);
}