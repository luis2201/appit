window.onload = function(){
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if(dia<10)
      dia='0'+dia; //agrega cero si el menor de 10
    if(mes<10)
      mes='0'+mes //agrega cero si el menor de 10
    document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
}

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener('change', async function () {
  let idperiodo = document.getElementById("idperiodo").value;
  let idcarrera = this.value;

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.post(DIR + 'materia/findmateriaperiodocarrera/', {
      idperiodo,
      idcarrera
    })
    .then(function (res){
      let info = res.data;            

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));
      
      document.getElementById('idmateria').innerHTML = info;
    });
  } else{    
    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));
  }
});

btnMostrar = document.getElementById('btnMostrar');
btnMostrar.addEventListener('click', async function ()
{
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

  var idperiodo = document.getElementById("idperiodo").value;
  var idcarrera = document.getElementById("idcarrera").value;  
  var idmateria = document.getElementById("idmateria").value;
  var fecha = document.getElementById("fecha").value;  
  
  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');

  await axios.post(DIR + 'registroasistencia/viewlistaestudiantemateria/', {
    idperiodo,
    idcarrera,    
    idmateria,
    fecha
  })
  .then(function (res){   
    let estudiantes = res.data;       
    
    tbody.innerHTML = estudiantes;
  })
  .catch(function (error){
    console.log(error)
  })

})

async function justificar(idasistencia, valor)
{
  let idperiodo = document.getElementById("idperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;  
  let idmateria = document.getElementById("idmateria").value;
  let fecha = document.getElementById("fecha").value;  
  let observacion = (valor==1)?'JUSTIFICADA':'NO JUSTIFICADA';
  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');
  
  await axios.post(DIR + 'registroasistencia/justificartarea/', {
    idperiodo,
    idcarrera,
    idmateria,
    fecha,
    observacion,
    idasistencia,
  })
  .then(function (res){   
    let info = res.data;       

    tbody.innerHTML = info;
  })
  .catch(function (error){
    console.log(error)
  })
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
  if (document.getElementById("idmateria").value == "") {
    input = document.getElementById("idmateria");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idmateria");
    input.classList.remove("is-invalid");
  }
  
  return flag;
}
