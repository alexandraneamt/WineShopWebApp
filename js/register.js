function validateRegistration(event) {
    var form = event.target;
    var username = form['username'].value;
    var password = form['password'].value;
    var password2 = form['password2'].value; //set variables to the values entered in the form

    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }
//Loop error validation


    var errors = new Object(); //creates errors object

    if (username === "") {
        errors["username"] = "Username cannot be empty\n";
    }
    if (password === "") {
        errors["password"] = "Password cannot be empty\n";
    }
    if (password2 === "") {
        errors["password2"] = "Password2 cannot be empty\n";
    }
    else if (password === password2) {
        errors["password2"] = "Passwords must match\n";
    }

    var valid = true;
    for (var index in errors) {
        valid = false;
        var errorMessage = errors[index];
        var spanElement = document.getElementById(index + "Error");
        spanElement.innerHTML = errorMessage;
    }
    return true;
}

console.log("document loaded");
var registerForm = document.getElementById('registerForm');
registerForm.addEventListener('submit', validateRegistration, false);

//decides wether or not to register and save the users input once submit button has been entered. 







