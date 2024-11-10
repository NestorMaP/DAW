pictureDiv = document.getElementById('picture');

document.addEventListener('keydown', function (event) {
  // Alt + F12 keys
  if (event.altKey && event.key === 'F12') {
    pictureDiv.style.backgroundImage = "url('https://picsum.photos/1920/1080')";

    // Hide h1
    document.getElementById('main_text').style.display = 'none';
  }
});
