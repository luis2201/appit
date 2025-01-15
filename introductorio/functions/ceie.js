const btnMatricular = document.getElementById("btnMatricular");
btnMatricular.addEventListener("click", async function () {
  if(!validate()){
    $.alert({
      title: 'Alerta del Sistema',
      icon: 'fas fa-exclamation-circle',
      content: 'Seleccione el módulo al que desea matricularse',
      type: 'orange',
      theme: 'modern'
    });

    return;
  }

  let idperiodo = document.getElementById("cmbidperiodo").value;
  let idmodulo = document.getElementById("idmodulo").value;
  let idestudiante = document.getElementById("estudianteid").value;

  await axios.post('https://appit.itsup.edu.ec/estudiante/ceie/insert/', {
      idperiodo,
      idestudiante,
      idmodulo,
  })
  .then(function (res) {
      let info = res.data;

      if(info){
        $.alert({
          title: 'Alerta del Sistema',
          icon: 'fas fa-exclamation-circle',
          content: 'Registro realizado satisfactoriamente',
          type: 'blue',
          theme: 'modern'
        });

        location.reload();
      } else{
        $.alert({
          title: 'Alerta del Sistema',
          icon: 'fas fa-exclamation-circle',
          content: 'Ya se encuentra registrado para el módulo seleccionado',
          type: 'red',
          theme: 'modern'
        });
      }
  })
  .catch(function (error) {
      $.alert({
          title: 'Registro de Calificaciones',
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

function validate() {
    var flag = true;

    if (document.getElementById("idmodulo").value == "") {
      input = document.getElementById("idmodulo");
      input.className += " is-invalid";
      flag = false;
    } else {
      input = document.getElementById("idmodulo");
      input.classList.remove("is-invalid");
    }

    return flag;
}