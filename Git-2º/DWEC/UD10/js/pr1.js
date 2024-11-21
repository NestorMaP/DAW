// Same as ej1.js
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() +  (exdays * 24 * 60 * 60 *1000));
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

function countVisits() {
  let counter = parseInt(getCookie('visitCounter') || '0');

  counter++;

  // Reset afther 10 visits
  if (counter > 10) {
    counter = 1;
    document.cookie = 'visitCounter=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/';
  }

  // Save new counter
  setCookie('visitCounter', counter.toString(), 30);

  //Show on screen
  document.getElementById('visits').textContent = counter;
}

//Execute on loading the page
window.onload = countVisits;