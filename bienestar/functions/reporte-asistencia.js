var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false, backdrop:'static'});

async function mostrar(idmatricula){
    myModal.show();

    let idmateria = document.getElementById("idmateria").value;

    'use strict';
    const tbody = document.querySelector('#tbDetalle tbody');

    await axios.post(DIR + 'reporteasistencia/findfaltasfecha/', {
      idmateria,
      idmatricula
    })
    .then(function (res){
      let fechas = res.data;

      tbody.innerHTML = fechas;
    });
};

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
  
  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');

  await axios.post(DIR + 'reporteasistencia/viewlistaestudiantemateria/', {
    idperiodo,
    idcarrera,    
    idmateria
  })
  .then(function (res){   
    let estudiantes = res.data;       

    tbody.innerHTML = estudiantes;
  })
  .catch(function (error){
    console.log(error)
  })

})

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
