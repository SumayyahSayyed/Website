const urlParams = new URLSearchParams(window.location.search);
const errorMessage = urlParams.get('error');
const email = urlParams.get('email');

document.querySelector('input[name="email"]').value = email;


if (errorMessage === 'invalid_email') {
    const errorLabelEmail = document.createElement('label');
    errorLabelEmail.innerHTML = 'Incorrect email';
    errorLabelEmail.style.color = 'red';
    let userEmail = document.querySelector('input[name="email"]');
    userEmail.parentElement.insertAdjacentElement('beforeend', errorLabelEmail);
}
else if (errorMessage === 'invalid_password') {
    const errorLabelPassword = document.createElement('label');
    errorLabelPassword.innerHTML = 'Incorrect password';
    errorLabelPassword.style.color = 'red';
    let userPassword = document.querySelector('input[name="password"]');
    userPassword.parentElement.insertAdjacentElement('beforeend', errorLabelPassword);
}
