let elements = document.querySelectorAll('.elem');
let mainBtn = document.getElementById('main_btn');

// To hide an element
function hideElement(event) {
  event.target.classList.add('hidden');
}

// To delete an element
function deleteElement(event) {
  event.target.remove();
}

// Add event to elements
elements.forEach((elem) => {
  elem.addEventListener('click', hideElement);
  elem.addEventListener('dblclick', deleteElement);
});

// Function to show elements again
function showElements() {
  document.querySelectorAll('.hidden').forEach((elem) => {
    elem.classList.remove('hidden');
  });
}

// Reaparecer button event
mainBtn.addEventListener('click', showElements);
