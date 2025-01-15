document.getElementById("idmatricula").disabled = true;
document.getElementById("estudiante").disabled = true;
document.getElementById("carrera").disabled = true;
document.getElementById("nivel").disabled = true;
document.getElementById("seccion").disabled = true;
document.getElementById("modalidad").disabled = true;

init();

async function cambioEstado(iddetalle_matricula) {
  await axios.get(DIR + 'matricula/cambioestado/' + iddetalle_matricula)
    .then(function (resp) {
      let info = resp.data;
      window.location.reload();
    })
    .catch(function (error) {
      $.confirm({
        title: 'Información del Sistema',
        icon: 'fa fa-ban',
        content: console.log(error.message),
        theme: 'modern',
        type: 'red',
        typeAnimated: true,
        buttons: {
          aceptar: function () {
            
          }
        }
      });
    })
}

const btnFinalizar = document.getElementById('btnFinalizar');
btnFinalizar.addEventListener('click', function () {
  $.confirm({
    title: 'Información del Sistema',
    icon: 'fa fa-question-circle',
    content: 'Desea finalizar el proceso de matriculación para el/la estudiante?',
    theme: 'modern',
    type: 'blue',
    typeAnimated: true,
    buttons: {
      aceptar: async function () {
        const idmatricula = document.getElementById("idmatricula").value;
        var pendiente =  await axios.get(DIR + 'matricula/validapendiente/' + idmatricula);
        let num = pendiente.data[0];

        if(num.pendientes>0){
          $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-info-circle',
            content: 'No puede finalizar el proceso de matrícula porque aún mantiene asignaturas pendientes de aprobación.',
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

        await axios.get(DIR + 'matricula/apruebamatricula/' + idmatricula)
        .then(function (resp) {
          let info = resp.data;
          window.location.reload();
        })
        .catch(function (error) {
          $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-ban',
            content: console.log(error.message),
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
              aceptar: function () {
                
              }
            }
          });
        })
      },
      cancelar: function () {

      }
    }
  });
})

async function init()
{
  const idmatricula = document.getElementById("idmatricula").value;

  await axios.get(DIR + 'matricula/estadomatricula/' + idmatricula)
  .then(function (resp) {
    let info = resp.data[0];
    if(info.estado==1){
      document.getElementById("btnFinalizar").style.display = 'none';
    }
  })
  .catch(function (error) {
    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa fa-ban',
      content: console.log(error.message),
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          
        }
      }
    });
  })
}

function eliminaMateria(iddetalle_materia)
{
  $.confirm({
    title: 'Información del Sistema',
    icon: 'fa fa-question-circle',
    content: 'Desea eliminar la asignatura? No se podrán deshacer los cambios realizados.',
    theme: 'modern',
    type: 'blue',
    typeAnimated: true,
    buttons: {
      aceptar: async function () {
        await axios.get(DIR + 'matricula/eliminamateria/' + iddetalle_materia)
        .then(function (resp) {
          window.location.reload();
        })
        .catch(function (error) {
          $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-ban',
            content: console.log(error.message),
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
              aceptar: function () {
                
              }
            }
          });
        })
      },
      cancelar: function () {

      }
    }
  });
}