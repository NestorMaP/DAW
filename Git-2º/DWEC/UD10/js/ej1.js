// COOKIE name = 'name'
/*
document.addEventListener('DOMContentLoaded',() => {

  let submit_btn = document.getElementById('main_submit');

  let input = getCookie('name')  
  if (input){
    document.body.innerHTML = `<h1>Welcome back to this page ${input}!</h1>`;
  }

  submit_btn.addEventListener('click', createCookie);

  function createCookie() {
    let input = document.getElementById('name').value;
    if (getCookie('name') === ""){
      setCookie('name',input,7);
    }
    
    
  }

  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime()+ (exdays*1000*60*60*24));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + '=' + cvalue + ';' + expires + ";path=/";
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i=0; i<ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length)
        }
      }
    }
    return "";
  }
});
*/

document.addEventListener('DOMContentLoaded', () => {
  const submitBtn = document.getElementById('main_submit');
  const nameInput = document.getElementById('name');

  // Check for existing cookie on page load
  const existingName = getCookie('name');
  if (existingName) {
    document.body.innerHTML = `<h1>Welcome back to this page ${existingName}!</h1><br>`;
    document.body.innerHTML += `<p><a href="index.html"><-- Go Back</a></p>`
  }

  submitBtn.addEventListener('click', createCookie);

  function createCookie() {
    const input = nameInput.value.trim();
    if (input && getCookie('name') === "") {
      setCookie('name', input, 7);
      document.body.innerHTML = `<h1>Welcome, ${input}!</h1>`;
    }
  }

  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = `${cname}=${cvalue}; ${expires}; path=/`;
  }

  function getCookie(cname) {
    const name = cname + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');
    
    for (let cookie of cookieArray) {
      cookie = cookie.trim();
      if (cookie.startsWith(name)) {
        return cookie.substring(name.length);
      }
    }
    return "";
  }
});