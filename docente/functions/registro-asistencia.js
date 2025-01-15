var idperiodo = document.getElementById("idperiodo").value;
var iddocente = document.getElementById("idusuario").value;

window.onload = async function(){
  fechaActual();

  await axios.post(DIR + 'docente/finddocentemateria/', {
    idperiodo,
    iddocente
  })
  .then(function (res){
    let options = res.data;

    document.getElementById("idmateria").innerHTML = options;
  }); 
}

const date = new Date();
const year = String(date.getFullYear()).slice();
const month = String(date.getMonth() + 1).padStart(2, '0');
const day = String(date.getDate()).padStart(2, '0');
const formattedDate = `${year}/${month}/${day}`;

var dFecha = document.getElementById("fecha");
dFecha.value = formattedDate;

// dFecha.disabled = true;
dFecha.addEventListener("change", function(){
  document.getElementById("idmateria").value = "";

  document.getElementById("unidad").value = "";
  document.getElementById("actividades").value = "";
  document.getElementById("tareas").value = "";

  document.getElementById("unidad").disabled = false;
  document.getElementById("actividades").disabled = false;
  document.getElementById("tareas").disabled = false;

  btnGuardar.disabled = false;

  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');
  tbody.innerHTML = '';
})

var cmbMateria = document.getElementById("idmateria");
cmbMateria.addEventListener('change', async function () {
  let idmateria = this.value;
  let fecha = document.getElementById("fecha").value;

  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');
  tbody.innerHTML = '';

  if(cmbMateria.value != "") {
    await axios.post(DIR + 'registroasistencia/viewlistaestudiantemateria/', {
      idperiodo,
      iddocente,
      idmateria,
      fecha
    })
    .then(function (res){   
      let estudiantes = res.data;

      tbody.innerHTML = estudiantes;
      cargaContenido();
    })
    .catch(function (error){
      console.log(error)
    })
  } else{
    fechaActual();
    
    document.getElementById("unidad").value = "";
    document.getElementById("actividades").value = "";
    document.getElementById("tareas").value = "";

    document.getElementById("unidad").disabled = false;
    document.getElementById("actividades").disabled = false;
    document.getElementById("tareas").disabled = false;

    tbody.innerHTML = '';
  }
  
});

btnGuardar = document.getElementById('btnGuardar');
btnGuardar.addEventListener('click', async function (){
  
  if(!validate()){
    $.confirm({
      title: 'Registro de Asistencia',
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

  let idmateria = document.getElementById("idmateria").value;
  let fecha = document.getElementById("fecha").value;
  let unidad = document.getElementById("unidad").value;
  let actividades = document.getElementById("actividades").value;
  let tareas = document.getElementById("tareas").value;

  await axios.post(DIR + 'leccionario/insert/', {
    idperiodo,
    idmateria,
    fecha,
    unidad,
    actividades,
    tareas
  })
  .then(function (res){
    console.log(res)
    if(res.data){
      $.confirm({
        title: 'Asistencia',
        icon: 'fa fa-thumbs-up',
        content: 'Actividades del leccionario y asistencia registradas satisfactoriamente',
        theme: 'modern',
        type: 'blue',
        typeAnimated: true,
        buttons: {
          aceptar: function () {
            location.reload();
          },
        }
      });

    } else {
      $.confirm({
        title: 'Registro de Calificaciones',
        icon: 'fa fa-exclamation-triangle',
        content: 'Ocurrió un error al tratar de registrar las actividades del leccionario. Vuelva a intentar.',
        theme: 'modern',
        type: 'red',
        typeAnimated: true,
        buttons: {
          aceptar: function () {
            location.reload();
          }
        }
      });
    }
  });
});

btnEliminar = document.getElementById("btnEliminar");
btnEliminar.addEventListener('click', function(){
  $.confirm({
    title: 'Asistencia',
    icon: 'fa fa-question-circle',
    content: 'Desa eliminar el registro de asistencia y desarrollo Curricular en la fecha seleccionada? No se podrán deshacer los cambios.',
    theme: 'modern',
    type: 'blue',
    typeAnimated: true,
    buttons: {
      continuar: function () {
        eliminaAsistencia();
      },
      cancelar: function () {
        
      },
    }
  });
});

async function cargaContenido()
{
  let idmateria = document.getElementById("idmateria").value;
  let fecha = document.getElementById("fecha").value;

  await axios.post(DIR + 'leccionario/validaasistenciafecha/', {
    idperiodo,
    idmateria,
    fecha
  })
  .then(function (res){
    if(res.data.length > 0){
      let info = res.data[0];
  
      document.getElementById("unidad").value = info.unidad;
      document.getElementById("actividades").value = info.actividades;
      document.getElementById("tareas").value = info.tareas;

      document.getElementById("unidad").disabled = true;
      document.getElementById("actividades").disabled = true;
      document.getElementById("tareas").disabled = true;

      btnGuardar.disabled = true;
    }  else{
      document.getElementById("unidad").value = "";
      document.getElementById("actividades").value = "";
      document.getElementById("tareas").value = "";

      document.getElementById("unidad").disabled = false;
      document.getElementById("actividades").disabled = false;
      document.getElementById("tareas").disabled = false;

      btnGuardar.disabled = false;
    }
  })
  .catch(function (error){
    console.log(error)
  });
}

async function asistencia(val)
{
  let value = val.split("-");
  let opt = value[0];
  let idmatricula = value[1];
  let asistencia = "";
  
  switch(opt)
  {
    case 'a1':
      asistencia = 100;
      break;
    
    case 'a2':
      asistencia = 50;
      break
    
    case 'a3':
      asistencia = 0;
      break;
  }

  let idmateria = document.getElementById("idmateria").value;
  let fecha = document.getElementById("fecha").value;

  await axios.post(DIR + 'registroasistencia/actualizaasistencia/', {
    idperiodo,
    idmateria,
    idmatricula,
    fecha,
    asistencia
  })
  .then(function (res){
    console.log(res)
  })
  .catch(function (error){
    console.log(error)
  })
}

async function eliminaAsistencia()
{
  let idmateria = document.getElementById("idmateria").value;
  let fecha = document.getElementById("fecha").value;

  await axios.post(DIR + 'registroasistencia/eliminaasistencia/', {
    idperiodo,
    idmateria,
    fecha
  })
  .then(function (res){

    if(res.data){
      $.confirm({
        title: 'Asistencia',
        icon: 'fa fa-thumbs-up',
        content: 'Actividades del leccionario y asistencia eliminados satisfactoriamente',
        theme: 'modern',
        type: 'blue',
        typeAnimated: true,
        buttons: {
          aceptar: function () {
            location.reload();
          },
        }
      });

    }else {
      $.confirm({
        title: 'Registro de Calificaciones',
        icon: 'fa fa-exclamation-triangle',
        content: 'Ocurrió un error al tratar de registrar las actividades del leccionario. Vuelva a intentar.',
        theme: 'modern',
        type: 'red',
        typeAnimated: true,
        buttons: {
          aceptar: function () {
            location.reload();
          }
        }
      });
    }
  });
}

function fechaActual()
{
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;

  //document.getElementById("fecha").disabled = true;
}

function validate()
{
  var flag = true;

  if (document.getElementById("idmateria").value == "") {
    input = document.getElementById("idmateria");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idmateria");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("unidad").value == "") {
    input = document.getElementById("unidad");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("unidad");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("actividades").value == "") {
    input = document.getElementById("actividades");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("actividades");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("tareas").value == "") {
    input = document.getElementById("tareas");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("tareas");
    input.classList.remove("is-invalid");
  }

  return flag;
}
