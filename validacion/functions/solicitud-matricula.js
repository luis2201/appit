var idmatricula = "";

compruebaDatosPersonales();

async function compruebaDatosPersonales()
{
  const idestudiante = document.getElementById("idestudianteid").value;

  await axios.get(DIR + 'datospersonales/find/' + idestudiante)
  .then(async function (res) {
    let info = res.data;

    if(info.estado == 'R'){
      document.getElementById("formulario").style.display = "none";

      $.confirm({
        title: 'Registro de cuenta',
        icon: 'fa fa-exclamation-triangle',
        content: 'Antes de realizar el registro de la matrícula debe actualizar sus datos.',
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
    
    datosMatricula();
  });

}

async function datosMatricula(){
  const idestudiante = document.getElementById("idestudiante").value;

  await axios.get(DIR + 'solicitudmatricula/findmatriculaidestudiante/' + idestudiante)
  .then(function (res) {
    let info = res.data[0];

    if(res.data.length>0){
      document.getElementById("cmbidperiodo").innerHTML = '<option value="'+info.idperiodo+'">'+info.periodo+'</option>';
      document.getElementById("idcarrera").innerHTML = '<option value="'+info.idcarrera+'">'+info.carrera+'</option>';
      document.getElementById("idnivel").innerHTML = '<option value="'+info.idnivel+'">'+info.nivel+'</option>';

      buscaMatricula();
    } else{
      document.getElementById("formulario").style.display = "none";
      document.getElementById("materias").style.display = "none";
      document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>¡ATENCIÓN!</strong> Debe registrar su pago en Financiero para que el proceso de matrícula sea habilitado.</div>';
    }
  });
}

async function buscaMatricula()
{
  const idestudiante = document.getElementById("idestudiante").value;
  const idperiodo = document.getElementById("cmbidperiodo").value;
  
  const params = {
    idestudiante, 
    idperiodo
  };

  await axios.post(DIR + 'solicitudmatricula/find', params)
  .then(async function (res) {
    let info = res.data[0];

    if(info.estado == 1){
      document.getElementById("alerta").innerHTML = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>¡ATENCIÓN!</strong> Su matrícula ya fue procesada. Revise el historial de Matrícula para comprobar las asignaturas que fueron aceptadas.';
      document.getElementById("formulario").style.display = "none";
      document.getElementById("materias").style.display = "none";
      return;
    }
    if(info.idmatricula >=1){
      document.getElementById("formulario").style.display = "block";
      document.getElementById("materias").style.display = "block";

      const res = await axios.post(DIR + 'carrera/findcarrera', params);
      info = res.data;
      
      idmatricula = info.idmatricula;
      let idcarrera = info.idcarrera;

      getMateriasAll(idperiodo, idcarrera);
    } else{
      document.getElementById("materias").style.display = "none";
    }

  });

}

async function getMateriasAll(idperiodo, idcarrera)
{
  let params = {
    idperiodo,
    idcarrera
  }

  await axios.post(DIR + 'materia/find', params)
  .then(async function (response) {
    let materias = response.data;
    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < materias.length; i++) {
      let fila = tbody.insertRow();
      fila.insertCell().innerHTML = materias[i]['codigo'];
      fila.insertCell().innerHTML = materias[i]['materia'];
      fila.insertCell().innerHTML = materias[i]['nivel'];

      idmateria = materias[i]['idmateria'];

      params = {
        idmatricula,
        idmateria
      }

      const res = await axios.post(DIR + 'materia/finddetallematricula', params)
      info = res.data[0];
      console.log(res.data.length)
      if(res.data.length == 0) {
        fila.insertCell().innerHTML = '<button type="button" class="btn btn-sm btn-primary" onclick="agregaDetalleMatricula('+materias[i]['idmateria']+');">Solicitar</button>';
      } else{
        fila.insertCell().innerHTML = '<span class="badge bg-warning text-light">Pendiente</span>';
      }

    }

    document.getElementById("formulario").style.display = "block";
    document.getElementById("materias").style.display = "block";
  })
  .catch(function (error) {
    console.log(error);
  });
}

$(document).ready( function () {
  $('#dataTable').DataTable();
} );

async function agregaDetalleMatricula(idmateria)
{
  idmatricula = idmatricula;
  const params = {
    idmatricula,
    idmateria
  }

  await axios.post(DIR + 'detallematricula/insert', params)
  .then(function (response) {
    let materias = response.data;

    window.location.reload();
  })
  .catch(function (error) {
    console.log(error);
  });
}

async function buscaMateriaDetallematricula()
{
  
}

function validate() 
{
  var flag = true;

  if (document.getElementById("idcarrera").value == "") {
    input = document.getElementById("idcarrera");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idcarrera");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idnivel").value == "") {
    input = document.getElementById("idnivel");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idnivel");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idseccion").value == "") {
    input = document.getElementById("idseccion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idseccion");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("modalidad").value == "") {
    input = document.getElementById("modalidad");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("modalidad");
    input.classList.remove("is-invalid");
  }
  
  return flag;
}