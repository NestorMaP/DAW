result = document.getElementById('result');

(function () {
  let counter;
  counter++
})();

typeof(counter) !== 'undefined'
? (result.textContent+= counter)
: (result.textContent += 'ReferenceError: counter is no defined');