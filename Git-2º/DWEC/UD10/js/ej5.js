let prom1 = document.getElementById('prom1');
let prom2 = document.getElementById('prom2');
let prom3 = document.getElementById('prom3');
let prom4 = document.getElementById('prom4');
let prom5 = document.getElementById('prom5');
let prom6 = document.getElementById('prom6');
let error = document.getElementById('error');


function firstTask() {
    return Promise.resolve(10);
}

function secondTask(value) {
    return Promise.resolve(value * 2);
}

function thirdTask(value) {
    return Promise.resolve(value + 5);
}

// Chaining promises with then
firstTask()
    .then(firstTaskResult => {
        prom1.innerHTML += firstTaskResult;
        return secondTask(firstTaskResult);
    })
    .then(secondTaskResult => {
        prom2.innerHTML += secondTaskResult;
        return thirdTask(secondTaskResult);
    })
    .then(thirdTaskResult => {
        prom3.innerHTML += thirdTaskResult;
    });

    async function executeTasks() {
        try {
            let firstTaskResult = await firstTask();
            prom4.innerHTML += firstTaskResult;

            let secondTaskResult = await secondTask(firstTaskResult);
            prom5.innerHTML += secondTaskResult;

            let thirdTaskResult = await thirdTask(secondTaskResult);
            prom6.innerHTML += thirdTaskResult;
        } catch (e) {
            error.innerHTML += e.message;
        }
    }
    executeTasks();