// init();

// function init()
// {
//   $.confirm({
//     title: 'Inicio de sesión',
//     icon: 'fa fa-exclamation-triangle',
//     content: '¡AVISO IMPORTANTE! Una vez realizado el pago de la matrícula Ud. podrá ingresar a este aplicativo. Su usuario es el correo que registró al momento de realizar su pago y la contraseña su número de cédula',
//     theme: 'modern',
//     type: 'red',
//     typeAnimated: true,
//     buttons: {
//       aceptar: function () {

//       }
//     }
//   });
// }

const form = document.getElementById('form');

form.addEventListener('submit', async function (e)
{
  e.preventDefault();

  if (!validate()) {
    $.confirm({
      title: 'Inicio de sesión',
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

  // if (!validateEmail())
  // {
  //   $.confirm({
  //     title: 'Inicio de sesión',
  //     icon: 'fa fa-exclamation-triangle',
  //     content: 'El formato del correo es incorrecto.',
  //     theme: 'modern',
  //     type: 'orange',
  //     typeAnimated: true,
  //     buttons: {
  //       aceptar: function () {

  //       }
  //     }
  //   });

  //   document.getElementById('correo_electronico').focus();
  //   return;
  // }

  const formData = new FormData(form);
  formData.append('correo_electronico', document.getElementById('correo_electronico').value);
  formData.append('contrasena', document.getElementById('contrasena').value);

  await axios.post(DIR + 'login/validar/', formData)
  .then(function (res) {
    let info = res.data;
    window.location.href = "dashboard";
  })
  .catch(function (error) {
    console.log(error);
    $.confirm({
      title: 'Acceso no autorizado',
      icon: 'fa fa-exclamation-triangle',
      content: 'Correo y/o contraseña incorrectos. Vuelva a intentar.',
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
  if (document.getElementById("correo_electronico").value == "") {
    input = document.getElementById("correo_electronico");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("correo_electronico");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("contrasena").value == "") {
    input = document.getElementById("contrasena");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("contrasena");
    input.classList.remove("is-invalid");
  }

  return flag;
}

function validateEmail()
{
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
