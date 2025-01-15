form.addEventListener('submit', async function (e){
    e.preventDefault();

    const iddocente = document.getElementById("idusuario").value;
    let contrasenaactual = document.getElementById("contrasenaactual").value;
    let nuevacontrasena = document.getElementById("nuevacontrasena").value;
    let confirmecontarsena = document.getElementById("confirmecontrasena").value;

    if (!validate()) {
        $.confirm({
            title: 'Aviso del sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'Los campos marcados con rojo son obligatorios. Complete la información para continuar.',
            theme: 'modern',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                aceptar: function () {

                }
            }
        });

        return;
    }

    if (nuevacontrasena != confirmecontarsena) {
        $.confirm({
            title: 'Aviso del sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'Las contraseñas no coinciden. Vuela a intentar.',
            theme: 'modern',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                aceptar: function () {

                }
            }
        });

        document.getElementById("nuevacontrasena").value = "";
        document.getElementById("confirmecontrasena").value = "";

        return;
    }

    if (nuevacontrasena.length < 8) {
        $.confirm({
            title: 'Aviso del sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'Ingrese una contraseña de mínimo 8 caracteres.',
            theme: 'modern',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                aceptar: function () {

                }
            }
        });

        document.getElementById("nuevacontrasena").value = "";
        document.getElementById("confirmecontrasena").value = "";

        return;
    }

    var vpass = await axios.post('https://appit.itsup.edu.ec/docente/contrasena/passwordvalidate/', { iddocente, contrasenaactual });
    let val = vpass.data;
    if(val.length == 0){
        $.confirm({
            title: 'Aviso del sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'La contraseña ingresada no coincide con la registrada en el sistema. Vuelva a intentar',
            theme: 'modern',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                aceptar: function () {

                }
            }
        });

        document.getElementById("contrasenaactual").value = "";
        return;
    }

    const formData = new FormData(form);
    formData.append('iddocente', iddocente);
    formData.append('contrasenaactual', contrasenaactual);
    formData.append('nuevacontrasena', nuevacontrasena);
    formData.append('confirmecontrasena', confirmecontarsena);

    await axios.post('https://appit.itsup.edu.ec/docente/contrasena/passwordchange/', formData)
    .then(function (res) {
        $.confirm({
            title: 'Cambio de contraseña',
            icon: 'fa fa-exclamation-triangle',
            content: 'Cambio de contraseña realizado de forma satisfactoria.',
            theme: 'modern',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                aceptar: function () {
                
                }
            }
        });

        document.getElementById("contrasenaactual").value = "";
        document.getElementById("nuevacontrasena").value = "";
        document.getElementById("confirmecontrasena").value = "";
    })
    .catch(function (error) {
        console.log(error);
        $.confirm({
        title: 'Aviso del sistema',
        icon: 'fa fa-exclamation-triangle',
        content: error.message,
        theme: 'modern',
        type: 'red',
        typeAnimated: true,
        buttons: {
            aceptar: function () {

            }
        }
        });
    });

});

function validate()
{
  var flag = true;
  if (document.getElementById("contrasenaactual").value == "") {
    input = document.getElementById("contrasenaactual");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("contrasenaactual");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("nuevacontrasena").value == "") {
    input = document.getElementById("nuevacontrasena");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nuevacontrasena");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("confirmecontrasena").value == "") {
    input = document.getElementById("confirmecontrasena");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("confirmecontrasena");
    input.classList.remove("is-invalid");
  }
  
  return flag;
}

$("#contrasenaactual").bind('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


$("#nuevacontrasena").bind('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


$("#confirmecontrasena").bind('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});