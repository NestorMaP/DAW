let elements = document.querySelectorAll('.elem');
let mainBtn = document.getElementById('main_btn');

// Hide an element
function hideElement(event) {
  event.target.classList.add('hidden');
}

// Delete an element
function deleteElement(event) {
  event.target.remove();
}

// Add event to elements
elements.forEach((elem) => {
  elem.addEventListener('dblclick', deleteElement);
  elem.addEventListener('click', hideElement);
})

// Show elements again
function showElements() {
  document.querySelectorAll('.hidden').forEach((elem) => {
    elem.classList.remove('hidden');
  });
}

// Restore button event
mainBtn.addEventListener("click", showElements);