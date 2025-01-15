var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    let idperiodo = document.getElementById("cmbidperiodo").value;
    let idcarrera = this.value;

    await axios.post(DIR + 'seccion/findseccionidcarrera/', {
      idperiodo,
      idcarrera
    })
    .then(function (res){
      let info = res.data;

      $('#idseccion').append($('<option />', {
        text: "-- Seleccione Sección --",
        value: "",
      }));

      $('#modalidad').append($('<option />', {
        text: "-- Seleccione Modalidad --",
        value: "",
      }));

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      for(i = 0; i<=info.length-1; i++)
      {
        $('#idseccion').append($('<option />', {
          text: info[i].seccion,
          value: info[i].idseccion,
        }));
      }
    })
  } else{
    $('#idseccion').append($('<option />', {
      text: "-- Seleccione Sección --",
      value: "",
    }));

    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
      value: "",
    }));

    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));
  }
});

var cmbIdSeccion = document.getElementById("idseccion");
cmbIdSeccion.addEventListener("change", async function(){
  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  if(cmbIdSeccion.value != "") {
    let idperiodo = document.getElementById("cmbidperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;
    let idseccion = this.value;

    await axios.post(DIR + 'modalidad/findmodalidadseccioncarrera/', {
      idperiodo,
      idcarrera,
      idseccion
    })
    .then(function (res){
      let info = res.data;

      $('#modalidad').append($('<option />', {
        text: "-- Seleccione Modalidad --",
        value: "",
      }));

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      for(i = 0; i<=info.length-1; i++)
      {
        $('#modalidad').append($('<option />', {
          text: info[i].modalidad,
          value: info[i].modalidad,
        }));
      }
    })
  } else{
    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
      value: "",
    }));
    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));
  }
});

var cmbModalidad = document.getElementById("modalidad");
cmbModalidad.addEventListener("change", async function(){
  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  if(cmbModalidad.value != "") {
    let idperiodo = document.getElementById("cmbidperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;
    let idseccion = document.getElementById("idseccion").value;
    let modalidad = this.value;

    await axios.post(DIR + 'nivel/findnivelseccioncarreramodalidad/', {
      idperiodo,
      idcarrera,
      idseccion,
      modalidad
    })
    .then(function (res){
      let info = res.data;

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      for(i = 0; i<=info.length-1; i++)
      {
        $('#idnivel').append($('<option />', {
          text: info[i].nivel,
          value: info[i].idnivel,
        }));
      }
    })
  } else{
    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));
  }
})

var frm = document.getElementById("frm");
frm.addEventListener("submit", function(event) {
  if(!validate()){
    $.confirm({
      title: 'Listas por Niveles',
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

    event.preventDefault();
  }
})

function validate()
{
  var flag = true;
  if (document.getElementById("cmbidperiodo").value == "") {
    input = document.getElementById("cmbidperiodo");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("cmbidperiodo");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idcarrera").value == "") {
    input = document.getElementById("idcarrera");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idcarrera");
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
  if (document.getElementById("idnivel").value == "") {
    input = document.getElementById("idnivel");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idnivel");
    input.classList.remove("is-invalid");
  }

  return flag;
}
