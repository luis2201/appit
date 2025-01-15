document.getElementById("idmatricula").disabled = true;
document.getElementById("estudiante").disabled = true;
document.getElementById("carrera").disabled = true;
document.getElementById("nivel").disabled = true;
document.getElementById("seccion").disabled = true;
document.getElementById("modalidad").disabled = true;

init();

async function cambioEstado(iddetalle_matricula) {
  await axios.get('https://appit.itsup.edu.ec/secretaria/matricula/cambioestado/' + iddetalle_matricula)
    .then(function (resp) {
      let info = resp.data;
      window.location.reload();
    })
    .catch(function (error) {
      console.log(error.message);
    })
}

const btnFinalizar = document.getElementById('btnFinalizar');
btnFinalizar.addEventListener('click', async function () {
  var msj = confirm("Desea finalizar el proceso de matriculación para el/la estudiante?");
  
  if (msj) {
    const idmatricula = document.getElementById("idmatricula").value;
    var pendiente =  await axios.get('https://appit.itsup.edu.ec/secretaria/matricula/validapendiente/' + idmatricula);
    let num = pendiente.data[0];

    if(num.pendientes>0){
      alert('No puede finalizar el proceso de matrícula porque aún mantiene asignaturas pendientes de aprobación.');
      return;
    }

    await axios.get('https://appit.itsup.edu.ec/secretaria/matricula/apruebamatricula/' + idmatricula)
    .then(function (resp) {
      let info = resp.data;
      window.location.reload();
    })
    .catch(function (error) {
      console.log(error.message);
    })
  }
})

async function init()
{
  const idmatricula = document.getElementById("idmatricula").value;

  await axios.get('https://appit.itsup.edu.ec/secretaria/matricula/estadomatricula/' + idmatricula)
  .then(function (resp) {
    let info = resp.data[0];
    if(info.estado==1){
      document.getElementById("btnFinalizar").style.display = 'none';
    }
  })
  .catch(function (error) {
    console.log(error.message);
  })
}

async function eliminaMateria(iddetalle_materia)
{
  var msj = confirm("Desea eliminar la asignatura? No se podrán deshacer los cambios realizados.");
  
  if (msj) {
    await axios.get('https://appit.itsup.edu.ec/secretaria/matricula/eliminamateria/' + iddetalle_materia)
    .then(function (resp) {
      window.location.reload();
    })
    .catch(function (error) {
      console.log(error.message);
    })
  }
}