function createTimer(ms) {
  return new Promise((resolve, reject) => {
    let primaryTimer = setTimeout(() => {
      resolve('Time concluded!');
    }, ms);

    let rejectTimer = setTimeout(() => {
      clearTimeout(primaryTimer);
      reject('The time is not correct...');
    }, ms*2);
  })
}

// Function with 5 seconds
createTimer(5*1000)
  .then(result => {
    document.getElementById('result').textContent = result;
  })
  .catch(e => {
    document.getElementById('result').textContent = e;
  });