function removeErrorMessage() {
    const errorLabel = document.querySelector(".error-message");
    if (errorLabel !== null) {
        errorLabel.remove();
    }
}
function validateForm() {
    let fName = document.forms[0]["firstname"].value;
    let lName = document.forms[0]["lastname"].value;
    let email = document.forms[0]["email"].value;
    let password = document.forms[0]["password"].value;

    if (fName == "") {
        let select = document.querySelector('input[name="firstname"]');
        let errorLabel = document.createElement("label");
        errorLabel.classList.add("error-message");
        errorLabel.innerText = "Please fill in your First Name";
        errorLabel.style.color = "red";
        // select.appendChild(errorLabel);
        select.parentElement.insertAdjacentElement('beforeend', errorLabel);

        return false;
    }
    else if (lName == "") {
        let select = document.querySelector('input[name="lastname"]');
        let errorLabel = document.createElement("label");
        errorLabel.classList.add("error-message");
        errorLabel.innerText = "Please fill in your Last Name";
        errorLabel.style.color = "red";
        // select.appendChild(errorLabel);
        select.parentElement.insertAdjacentElement('beforeend', errorLabel);

        return false;
    }
    else if (email == "") {
        let select = document.querySelector('input[name="email"]');
        let errorLabel = document.createElement("label");
        errorLabel.classList.add("error-message");
        errorLabel.innerText = "Please fill in email address";
        errorLabel.style.color = "red";
        // select.appendChild(errorLabel);
        select.parentElement.insertAdjacentElement('beforeend', errorLabel);

        return false;
    }
    else if (password == "") {
        let select = document.querySelector('input[name="password"]');
        let errorLabel = document.createElement("label");
        errorLabel.classList.add("error-message");
        errorLabel.innerText = "Please enter the password";
        errorLabel.style.color = "red";
        // select.appendChild(errorLabel);
        select.parentElement.insertAdjacentElement('beforeend', errorLabel);

        return false;
    }

    return true;
}
