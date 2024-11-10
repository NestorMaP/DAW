function randomNum() {
  return Math.random() * 100 + 1;
}

mainBtn = document.getElementById('main_btn');

mainBtn.addEventListener('click', function () {
  let newChild = document.createElement('li');
  let randomNumber = Math.round(randomNum());
  newChild.innerHTML = `<li>${randomNumber}</li>`;
  document.getElementById('main_ul').appendChild(newChild);
});
