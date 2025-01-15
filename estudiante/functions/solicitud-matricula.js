var idmatricula = "";

compruebaDatosPersonales();

async function compruebaDatosPersonales()
{
  const idestudiante = document.getElementById("idestudiante").value;

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
    buscaMatricula();
  });

}

async function datosMatricula(){
  const idperiodo = document.getElementById("idperiodo").value;
  const idestudiante = document.getElementById("idestudiante").value;
  const params = {
    idperiodo,
    idestudiante 
  };

  await axios.post(DIR + 'solicitudmatricula/findmatriculaidestudiante/', params)
  .then(function (res) {
    let info = res.data[0];

    if(res.data.length>0){
      document.getElementById("cmbidperiodo").innerHTML = '<option value="'+info.idperiodo+'">'+info.periodo+'</option>';
      document.getElementById("idcarrera").innerHTML = '<option value="'+info.idcarrera+'">'+info.carrera+'</option>';
      document.getElementById("idnivel").innerHTML = '<option value="'+info.idnivel+'">'+info.nivel+'</option>';
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
  const idperiodo = document.getElementById("idperiodo").value;
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

// const form = document.getElementById('form');
// form.addEventListener('submit', async function (e) 
// {
//   e.preventDefault();

//   if (!validate()) {
//     $.confirm({
//       title: 'Registro de matrícula',
//       icon: 'fa fa-exclamation-triangle',
//       content: 'Los campos marcados con rojo son obligatorios. Complete la información para continuar.',
//       theme: 'modern',
//       type: 'orange',
//       typeAnimated: true,
//       buttons: {
//         aceptar: function () {

//         }
//       }
//     });

//     return;
//   }

//   $.confirm({
//     title: 'Registro de matrícula',
//     icon: 'fa fa-question-circle',
//     content: 'Se procederá a registrar su matrícula en el sistema. Desea continuar?',
//     theme: 'modern',
//     type: 'blue',
//     typeAnimated: true,
//     buttons: {

//       aceptar: async function () {
//         const formData = new FormData(form);
//         formData.append('idestudiante', document.getElementById('estudianteid').value);
//         formData.append('idperiodo', document.getElementById('idperiodo').value);
//         formData.append('idcarrera', document.getElementById('idcarrera').value);
//         formData.append('idnivel', document.getElementById('idnivel').value);
//         formData.append('idseccion', document.getElementById('idseccion').value);
//         formData.append('modalidad', document.getElementById('modalidad').value);

//         console.log(document.getElementById('modalidad').value)

//         // await axios.post(DIR + 'solicitudmatricula/insert', formData)
//         // .then(function (res) {
//         //   console.log(res)
//         //   $.confirm({
//         //     title: 'Registro de matrícula',
//         //     icon: 'fa fa-list-ol',
//         //     content: 'Seleccione a continuación las materias que desea cursar',
//         //     theme: 'modern',
//         //     type: 'blue',
//         //     typeAnimated: true,
//         //     buttons: {
//         //       aceptar: function () {
//         //         getMateriasAll(idperiodo.value, idcarrera.value);
//         //         window.location.reload();
//         //       },
//         //     }
//         //   });
//         // })
//         // .catch (function (error) {
//         //     const info = error.response.data;
//         //     $.confirm({
//         //       title: 'Registro de cuenta',
//         //       icon: 'fa fa-exclamation-triangle',
//         //       content: info.message,
//         //       theme: 'modern',
//         //       type: 'orange',
//         //       typeAnimated: true,
//         //       buttons: {
//         //         aceptar: function () {

//         //         }
//         //       }
//         //     });
          
//         // })
//       }

//     }
//   });
 
// });

async function getMateriasAll(idperiodo, idcarrera)
{

  let params = {
    idperiodo,
    idcarrera
  }

  await axios.post(DIR + 'materia/find', params)
  .then(async function (response) {
    let materias = response.data;
    console.log(materias)
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