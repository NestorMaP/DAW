let emailInput = document.getElementById('email');
let passwordInput = document.getElementById('password');
let submitBtn = document.getElementById('submitBtn');
let emailError = document.getElementById('email_error');
let passwordError = document.getElementById('password_error');
let form = document.getElementById('form');

// Email validation
function validateEmail() {
  let emailRegexp = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailRegexp.test(emailInput.value);
}

// Password validation
function validatePassword() {
  return passwordInput.value.length >= 8 && passwordInput.value.length <= 10;
}

// Show/hide error messages
function showEmailError() {
  if (!validateEmail()) {
    emailError.style.display = 'block';
  } else {
    emailError.style.display = 'none';
  }
}

function showPasswordError() {
  if (!validatePassword()) {
    passwordError.style.display = 'block';
  } else {
    passwordError.style.display = 'none';
  }
}

// Alter submit button
function toggleSubmitButton() {
  submitBtn.disabled = !(validateEmail() && validatePassword());
}

// Blur and input events for email
emailInput.addEventListener('blur', showEmailError);
emailInput.addEventListener('input', () => {
  emailError.style.display = 'none';
  toggleSubmitButton();
});

// Blur and input events for password
passwordInput.addEventListener('blur', showPasswordError);
passwordInput.addEventListener('input', () => {
  passwordError.style.display = 'none';
  toggleSubmitButton();
});

// Allow submit only if validations are OK
form.addEventListener('submit', function (event) {
  if (submitBtn.disabled) {
    event.preventDefault();
  }
});
