let resultIterative = document.getElementById('result_iterative');
let resultRecursive = document.getElementById('result_recursive');

let array = [4, 8, 15, 16, 23, 42];
let counter = 0;
/**
 * sumArrayIterative
 * @param  array
 * @returns int sum of the array
 */
function sumArrayIterative(array) {
  let sumIterative = 0;
  for (let i = 0; i < array.length; i++) {
    sumIterative += array[i];
  }
  return sumIterative;
}

function sumArrayRecursive(array) {
  let sumRecursive = 0;
  if (counter === array.length - 1) {
    return (sumRecursive += array[array.length - 1]);
  } else {
    sumRecursive += array[counter];
    counter++;
    return (sumRecursive += sumArrayRecursive(array));
  }
}

resultIterative.textContent += sumArrayIterative(array);

resultRecursive.textContent += sumArrayRecursive(array);
