
const form = document.getElementById('form');

form.addEventListener('submit', async function (e) {
  e.preventDefault();

  if (!validate()) {
    $.confirm({
      title: 'Registro de cuenta',
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

  documento = document.getElementById('tipo_identificacion').value;
  cedula = document.getElementById('numero_identificacion').value;

  if (documento == 'CEDULA') {
    if (!validateCedula()) {
      $.confirm({
        title: 'Registro de cuenta',
        icon: 'fa fa-exclamation-triangle',
        content: 'Número de cédula incorrecto.',
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
  }

  if (!validateEmail()) {
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-exclamation-triangle',
      content: 'El formato del correo electrónico no es el correcto.',
      theme: 'modern',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        aceptar: function () {

        }
      }
    });

    input = document.getElementById("correo_electronico");
    input.classList.remove("is-invalid");

    return;
  }

  const formData = new FormData(form);
  formData.append('tipo_identificacion', document.getElementById('tipo_identificacion').value);
  formData.append('numero_identificacion', document.getElementById('numero_identificacion').value);
  formData.append('apellido1', mayusculas(document.getElementById('apellido1').value));
  formData.append('apellido2', mayusculas(document.getElementById('apellido2').value));
  formData.append('nombre1', mayusculas(document.getElementById('nombre1').value));
  formData.append('nombre2', mayusculas(document.getElementById('nombre2').value));
  formData.append('correo_electronico', minusculas(document.getElementById('correo_electronico').value));

  let numero_identificacion = document.getElementById('numero_identificacion').value;
  let res = await axios.get('https://appit.itsup.edu.ec/estudiante/register/findidentificacion/' + numero_identificacion);
  if (Object.keys(res.data).length > 0) {
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-exclamation-triangle',
      content: 'El número de cédula ya se encuentra registrado. Ingrese otro.',
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

  let correo_electronico = document.getElementById('correo_electronico').value;
  res = await axios.post('https://appit.itsup.edu.ec/estudiante/register/findcorreo/', {correo_electronico});
  console.log(Object.keys(res.data).length)
  if (Object.keys(res.data).length > 0) {
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-exclamation-triangle',
      content: 'El correo ya se encuentra registrado. Ingrese otro.',
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

  await axios.post('https://appit.itsup.edu.ec/estudiante/register/insert/', formData)
  .then(function (response) {
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-thumbs-up',
      content: 'Sus datos han sido registrados satisfactoriamente. Para acceder al sistema su usuario será el correo electrónico registrado y la contraseña su número de identificación',
      theme: 'modern',
      type: 'blue',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          window.location.href = "login";
        }
      }
     });

    document.getElementById('tipo_identificacion').value = "";
    document.getElementById('numero_identificacion').value = "";
    document.getElementById('apellido1').value = "";
    document.getElementById('apellido2').value = "";
    document.getElementById('nombre1').value = "";
    document.getElementById('nombre2').value = "";
    document.getElementById('correo_electronico').value = "";
  })
  .catch(function (error) {
    const info = error.response.data;
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-exclamation-triangle',
      content: info.message,
      theme: 'modern',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        aceptar: function () {

        }
      }
    });
  });

});

function mayusculas(text) {
  return text.toUpperCase();
}

function minusculas(text) {
  return text.toLowerCase();
}

function validate() {
  var flag = true;
  if (document.getElementById("tipo_identificacion").value == "") {
    input = document.getElementById("tipo_identificacion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("tipo_identificacion");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("numero_identificacion").value == "") {
    input = document.getElementById("numero_identificacion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("numero_identificacion");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("apellido1").value == "") {
    input = document.getElementById("apellido1");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("apellido1");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("apellido2").value == "") {
    input = document.getElementById("apellido2");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("apellido2");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("nombre1").value == "") {
    input = document.getElementById("nombre1");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nombre1");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("nombre2").value == "") {
    input = document.getElementById("nombre2");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nombre2");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("correo_electronico").value == "") {
    input = document.getElementById("correo_electronico");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("correo_electronico");
    input.classList.remove("is-invalid");
  }

  return flag;
}

function validateCedula() {
  var cedula = document.getElementById('numero_identificacion').value;
  var flag = false;
  if (cedula.length == 10) {
    var digciudad = cedula[0] + cedula[1];
    if (digciudad < 01 || digciudad > 24) {
      flag = false;
    } else {

      var digito = 0;
      var acu = 0;

      for (i = 1; i <= 9; i++) {
        if (i % 2 == 1) {
          digito = cedula[i - 1] * 2;
        } else {
          digito = cedula[i - 1] * 1;
        }
        if (digito > 9) {
          digito = digito - 9;
        }
        acu = acu + digito;
      }

      var veri = acu.toString();
      if (veri[1] == 0) {
        veri = veri[1];
      } else {
        veri = 10 - veri[1];
      }

      if (cedula[9] == veri) {
        flag = true;
      } else {
        flag = false;
      }
    }
  }

  return flag;
}

function validateEmail() {
  // Get our input reference.
  var emailField = document.getElementById('correo_electronico');

  // Define our regular expression.
  var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

  // Using test we can check if the text match the pattern
  if (validEmail.test(emailField.value)) {
    return true;
  } else {
    return false;
  }
}

var option = {
  animation: true,
  delay: 2000
};

function Toasty() {
  var toastHTMLElement = document.getElementById('liveToast');
  var toastElement = new bootstrap.Toast(toastHTMLElement, option);
  toastElement.show();
}