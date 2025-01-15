var idperiodo = document.getElementById("idperiodo").value;

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

  if(cmbIdDocente.value != "") {
    await axios.post(DIR + 'materias/finddocentematerias/', {
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

  await axios.post(DIR + 'reporteasistencia/viewlistaestudiantes', {
    idperiodo,
    idmateria
  })
  .then(function (res) {
    let estudiantes = res.data;
console.log(estudiantes)
    document.getElementById("tabla").innerHTML = estudiantes;

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

  