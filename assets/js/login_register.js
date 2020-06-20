let buttonRegister = document.getElementById('buttonRegister');
let buttonLogin = document.getElementById('buttonLogin');
let formRegister = document.getElementById('formRegister');
let formLogin = document.getElementById('formLogin');
let firstForm = document.getElementById('firstForm');
let secondForm = document.getElementById('secondForm');

function formLoginSelected() {

    buttonRegister.style.backgroundColor = "transparent";
    buttonLogin.style.backgroundColor = "#195991";
    formRegister.style.position = "absolute";
    formRegister.style.visibility = "hidden";
    formLogin.style.visibility = "";
    formLogin.style.position = "";
    secondForm.appendChild(formLogin);
    firstForm.appendChild(formRegister);

}
function formRegisterSelected() {

    buttonLogin.style.backgroundColor = "transparent";
    buttonRegister.style.backgroundColor = "#195991";
    formLogin.style.position = "absolute";
    formLogin.style.visibility = "hidden";
    formRegister.style.visibility = "";
    formRegister.style.position = "";
    secondForm.appendChild(formRegister);
    firstForm.appendChild(formLogin);
}
formLoginSelected();