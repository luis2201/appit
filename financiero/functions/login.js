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

  const formData = new FormData(form);
  formData.append('usuario', document.getElementById('usuario').value);
  formData.append('contrasena', document.getElementById('contrasena').value);

  await axios.post(DIR + 'login/validar', formData)
  .then(function (res) {
    let info = res.data;
    
    window.location.href = "dashboard";
  })
  .catch(function (error) {
    console.log(error);
    $.confirm({
      title: 'Acceso no autorizado',
      icon: 'fa fa-exclamation-triangle',
      content: 'Usuario y/o contraseña incorrectos. Vuelva a intentar.',
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
  if (document.getElementById("usuario").value == "") {
    input = document.getElementById("usuario");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("usuario");
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
