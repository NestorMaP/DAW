let prom1 = document.getElementById('prom1');
let prom2 = document.getElementById('prom2');
let prom3 = document.getElementById('prom3');
let prom4 = document.getElementById('prom4');

/*
let simulaProceso = new Promise((resolve, reject) => {
  let num1 = 42;
  let num2 = 42;
  if (num1 === num2) resolve("They are equal!");
  else reject(Error("Something went wrong"));
});

let promise2 = new Promise((resolve, reject) =>  {
  let num1 = 42;
  let num2 = 73;
  if (num1 === num2) resolve("They are equal!");
  else reject(Error("Something went wrong"));
});

promise1.then((answer) => {
  prom1.innerHTML += answer;
}).catch((error) => {
  prom1.innerHTML += error.message;
})

promise2.then((answer) => {
  prom2.innerHTML += answer;
}).catch((error) => {
  prom2.innerHTML += error.message;
});
*/

function simulaProceso(exito) {
  return new Promise((resolve, reject) => {
    if (exito) {
      resolve("Success!");
    } else {
      reject("Failed!");
    }
  });
};

// Test then-catch
simulaProceso(true)
  .then(resultado => prom1.innerHTML += resultado)
  .catch(error => prom1.innerHTML += error);

simulaProceso(false)
  .then(result => prom2.innerHTML += result)
  .catch(error => prom2.innerHTML += error);

// Test async-await
async function testProcess() {
  try {
    let successResult = await simulaProceso(true);
    prom3.innerHTML += successResult;
  } catch (error) {
    prom3.innerHTML += error;
  }
};

async function testProcess2() {
  try {
    let failedResult = await simulaProceso(false);
    prom4.innerHTML += successResult;
  } catch (error) {
    prom4.innerHTML += error;
  }
};

testProcess();
testProcess2();