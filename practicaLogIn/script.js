function validarForm() {
    var email = document.forms["formLogin"]["email"].value;
    var pass = document.forms["formLogin"]["pass"].value;

    document.forms["formLogin"]["email"].value = btoa(email);
    document.forms["formLogin"]["pass"].value = btoa(pass);
}

function loginFailed() {
    alert("Usuario Incorrecto!");
}