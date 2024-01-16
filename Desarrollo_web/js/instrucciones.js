function validarFormulario(){
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var genero = document.getSelector('input[name="genero"]:checked');
    var usuario = document.getElementById("usuario");
    var contrasena = document.getElementById("pwd");
    var aceptarTerminos = document.getElementById("checkbox");


    var regexNombre = /^[A-Z][a-zA-Záéíó]*([ ]?[A-Z][A-Za-záéíó]*)?$/;
    var regexApellidos = /^[A-Z][a-zA-Záéíó]+ [A-Z][a-zA-Z]+$/;
    var regexUsuario = /^[a-zA-Z0-9\_\-]{4,16}$/;
    var regexContrasena = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    resetValidationStyles();

    var isValid = true;

    if (!nombre.value.match(regexNombre)){
        setValidationError(nombre, "nombreError");
        isValid = false;
    }
    if (!apellidos.value.match(regexApellidos)){
        setValidationError(apellidos, "apellidosError");
        isValid = false;
    }
    if (!genero){
        setValidationError(document.querySelector('.radio'), "generoError");
        isValid = false;
    }
    if (!usuario.value.match(regexUsuario)){
        setValidationError(usuario, "usuarioError");
        isValid = false;
    }
    if (!contrasena.value.match(regexContrasena)){
        setValidationError(contrasena, "contrasenaError");
        isValid = false;
    }
    if (!aceptarTerminos.checked){
        setValidationError(document.querySelector('.checbox'), "terminosError");
        isValid = false;
    }
    return isValid;



}

function setValidationError(inputElement, errorElementId){
    inputElement.classList.add("invalid");

    var errorElement = document.getElementById(errorElementId);
    errorElement.style.display = "block"; 

}

function resetValidationStyles(){
    var formElements = document.querySelectorAll(".form-control");
    formElements.forEach(function(element){
        element.classList.remove("invalid");
    });
    var errorElments = document.querySelectorAll(".error-message");
    errorElments.forEach(function(element){
        element.style.display = "none";
    });
}

