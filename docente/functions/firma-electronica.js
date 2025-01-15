
var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", function(){

    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false, backdrop:'static'})
    myModal.show();

});

var form = document.getElementById("form");
form.addEventListener("submit", async function(event){
    event.preventDefault();
    
    var doc_firma = document.getElementById("doc_firma");
    var contrasena = document.getElementById("contrasena").value;
    var confirmarcontrasena = document.getElementById("confirmarcontrasena").value;
    
    //Validación del archivo de firma
    var filePath = doc_firma.value;
    var fdf = doc_firma.files[0]
    var allowedExtensions = /(\.p12)$/i;
    if (!allowedExtensions.exec(filePath)) {
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: 'El archivo seleccionado para la firma no es válido. Debe seleccionar un archivo con extensión .p12',
            type: 'orange',
            theme: 'modern'
        });

        doc_firma.value = '';
        doc_firma.className += " is-invalid";
        return;
    } 
    if(!validate()){
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: 'Todos los campos son obligatorios',
            type: 'orange',
            theme: 'modern'
        });

        return;
    }
    if(contrasena != confirmarcontrasena){
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: 'las contraseñas no son iguales. Vuelva a ingresarlas',
            type: 'orange',
            theme: 'modern'
        });

        document.getElementById("contrasena").value = "";
        document.getElementById("confirmarcontrasena").value = "";

        return;
    }

    const formData = new FormData(form);  
    formData.append('contrasena', document.getElementById('contrasena').value);
    formData.append('confirmarcontrasena', document.getElementById('confirmarcontrasena').value);

    await axios.post('https://appit.itsup.edu.ec/docente/firmaelectronica/register/', formData)
    .then(function (response){
        $.confirm({
            title: 'Datos del estudiante',
            icon: 'fa fa-thumbs-up',
            content: 'Firma Electrónica registrada satisfactoriamente',
            theme: 'modern',
            type: 'blue',
            typeAnimated: true,
            buttons: {
            aceptar: function () {
                window.location.reload();
            }
            }
        });
    })
    .catch(function (error) {
        console.log(error);
    });
});

function validate() {
    var flag = true;

    if (document.getElementById("contrasena").value == "") {
        input = document.getElementById("contrasena");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("contrasena");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("confirmarcontrasena").value == "") {
        input = document.getElementById("confirmarcontrasena");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("confirmarcontrasena");
        input.classList.remove("is-invalid");
    }

    return flag;
}


var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function(){
    document.getElementById("doc_firma").value = "";
    document.getElementById("contrasena").value = "";
    document.getElementById("confirmarcontrasena").value = "";
});