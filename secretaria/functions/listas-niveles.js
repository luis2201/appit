var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    let idperiodo = document.getElementById("idperiodo").value;
    let idcarrera = this.value;

    await axios.post('https://appit.itsup.edu.ec/secretaria/seccion/findseccionidcarrera/', {
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
    let idperiodo = document.getElementById("idperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;
    let idseccion = this.value;

    await axios.post('https://appit.itsup.edu.ec/secretaria/modalidad/findmodalidadseccioncarrera/', {
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
    let idperiodo = document.getElementById("idperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;
    let idseccion = document.getElementById("idseccion").value;
    let modalidad = this.value;

    await axios.post('https://appit.itsup.edu.ec/secretaria/nivel/findnivelseccioncarreramodalidad/', {
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

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function(){
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

    return;
  }


  var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
  myModal.show();
  idperiodo = document.getElementById("idperiodo").value;
  idcarrera = document.getElementById("idcarrera").value;
  idseccion = document.getElementById("idseccion").value;
  modalidad = document.getElementById("modalidad").value;
  idnivel   = document.getElementById("idnivel").value;

  await axios.post('https://appit.itsup.edu.ec/secretaria/listasniveles/viewlista', {
    idperiodo,
    idcarrera,
    idseccion,
    modalidad,
    idnivel
  })
  .then(function (res){
    let estudiantes = res.data;
    console.log(estudiantes)
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();
    document.getElementById("seccion").innerHTML = "<strong>SECCION: </strong>" + $("#idseccion option:selected").text();

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < estudiantes.length; i++) {
      let fila = tbody.insertRow();
      fila.insertCell().innerHTML = i+1;
      fila.insertCell().innerHTML = estudiantes[i]['idmatricula'];
      fila.insertCell().innerHTML = estudiantes[i]['alumnos'];
      fila.insertCell().innerHTML = estudiantes[i]['numero_identificacion'];
      fila.insertCell().innerHTML = estudiantes[i]['fecha_nacimiento'];
      fila.insertCell().innerHTML = estudiantes[i]['tipo_sangre'];
      fila.insertCell().innerHTML = estudiantes[i]['numero_celular'];
    }

    // let piepagina = document.getElementById("piepagina");
    // piepagina.style.display="block";
  })
})

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function () {
  $('#exampleModal').modal('hide');
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

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function() {
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

    return;
  }

  var element = document.getElementById("Lista");
  var opt = {
    margin:       10,
    filename:     'lista_nivel.pdf',
    image:        { type: 'jpeg', quality: 2 },
    html2canvas:  { scale: 2 },
    jsPDF:        { orientation: 'p',
                    unit: 'mm',
                    format: 'a4',
                    putOnlyUsedFonts:true,
                    floatPrecision: 11 // or "smart", default is 16
                  }
  };

  html2pdf().set(opt).from(element).save();

});
