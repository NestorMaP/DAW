let mainBtn = document.getElementById("mainBtn");

mainBtn.addEventListener("click", calculate)

function calculate() {
    let inputs = document.getElementsByTagName("input");
    let nums = []

    for (let i=0;i<inputs.length;i++) {
        let num = parseInt(inputs[i].value);
        if (!isNaN(num)) {
            nums.push(num);
        }
    }
    let maxNum = Math.max(...nums);

    window.confirm("The max number is: " + maxNum);
}