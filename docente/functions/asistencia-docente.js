var idperiodo = document.getElementById("idperiodo").value;
var modalAsistencia = new bootstrap.Modal(document.getElementById('modalAsistencia'), {
  keyboard: false
})

var docente = "";
var materia = "";

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
  var optdocente = document.querySelectorAll('#iddocente option');
  optdocente.forEach(o => o.remove());

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  var idcarrera = document.getElementById("idcarrera").value;

  if(cmbIdCarrera.value != "") {
    await axios.post(DIR + 'docente/findprofesorcarrera/', {
      idperiodo, 
      idcarrera
    })
    .then(function (res){
      let docentes = res.data;

      document.getElementById("iddocente").innerHTML = docentes;

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));
    });
  } else{
    $('#iddocente').append($('<option />', {
      text: "-- Seleccione Docente --",
      value: "",
    }));

    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));
  }
});


var cmbIdDocente = document.getElementById("iddocente");
cmbIdDocente.addEventListener("change", async function(){
  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  var idcarrera = document.getElementById("idcarrera").value;
  var iddocente = this.value;

  var selectedIndex = this.selectedIndex;
  docente = this.options[selectedIndex].text;
    
  if(cmbIdDocente.value != "") {
    await axios.post(DIR + 'materia/finddocentematerias/', {
      idperiodo, 
      idcarrera,
      iddocente
    })
    .then(function (res){
      let materias = res.data;

      document.getElementById("idmateria").innerHTML = materias;
      
    });
  } else{
    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));
  }
});

var cmbIdMateria = document.getElementById("idmateria");
cmbIdMateria.addEventListener("change", function(){
  var selectedIndex = this.selectedIndex;
  materia = this.options[selectedIndex].text;
});

const form = document.getElementById('form');
form.addEventListener('submit', async function (e)
{
  e.preventDefault();

  if (!validate()) {
    $.confirm({
      title: 'Registro de Asistencia',
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

  let idperiodo = document.getElementById('idperiodo').value;
  let idmateria = document.getElementById('idmateria').value;

  await axios.post(DIR + 'asistenciadocente/viewlistaestudiantes', {
    idperiodo,
    idmateria
  })
  .then(function (res) {
    let estudiantes = res.data;

    document.getElementById("tabla").innerHTML = estudiantes;

    document.getElementById("modalAsistenciaLabel").innerHTML = "Registro de Asistencia Docente > " + docente + ' > ' + materia;
    modalAsistencia.show();

  })
  .catch(function (error) {
    $.confirm({
      title: 'Acceso no autorizado',
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

function cerrarModal()
{
  modalAsistencia.hide();
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
  if (document.getElementById("iddocente").value == "") {
    input = document.getElementById("iddocente");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("iddocente");
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

