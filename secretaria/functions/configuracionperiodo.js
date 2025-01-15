var form = document.getElementById("form")
form.addEventListener("submit", async function(event){
  event.preventDefault();
  if(!validate()){
    $.confirm({
      title: 'Listas por Niveles',
      icon: 'fa fa-exclamation-triangle',
      content: 'Los campos marcados con rojo son obligatorios.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {

        }
      }
    });

    return;
  }

  var fechainicio = document.getElementById("fechainicio").value;
  var fechafin = document.getElementById("fechafin").value;
  if(fechafin<=fechainicio){
    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa fa-info-circle',
      content: 'La fecha final no puede ser menor a la fecha de inicio',
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

  var formData = new FormData(form);
  formData.append("periodo", document.getElementById("nomperiodo").value);
  formData.append("fechainicio", document.getElementById("fechainicio").value);
  formData.append("fechafin", document.getElementById("fechafin").value);

  await axios.post('https://appit.itsup.edu.ec/secretaria/configuracionperiodo/insertperiodo/', formData)
  .then(function (res) {
    let info = res.data;
    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa fa-info-circle',
      content: 'Periodo registrado satisfactoriamente',
      theme: 'modern',
      type: 'blue',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          
        }
      }
    });
  })
  .catch(function (error) {
    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa fa-ban',
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

var btnCancelar = document.getElementById("btnCancelar");
btnCancelar.addEventListener("click", function(){
  document.getElementById("nomperiodo").value = "";
  document.getElementById("fechainicio").value = "";
  document.getElementById("fechafin").value = "";
});

function validate()
{
  var flag = true;
  if (document.getElementById("nomperiodo").value == "") {
    input = document.getElementById("nomperiodo");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nomperiodo");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("fechainicio").value == "") {
    input = document.getElementById("fechainicio");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("fechainicio");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("fechafin").value == "") {
    input = document.getElementById("fechafin");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("fechafin");
    input.classList.remove("is-invalid");
  }
  
  return flag;
}