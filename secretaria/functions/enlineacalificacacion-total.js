var cmbIdPeriodo = document.getElementById("cmbidperiodo");
cmbIdPeriodo.addEventListener("change", async function(){
  const idperiodo = this.value;

  var optcarrera = document.querySelectorAll('#idcarrera option');
  optcarrera.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  if(cmbIdPeriodo.value != "") {
    await axios.post(DIR + 'carrera/findall/', {
      idperiodo
    })
    .then(function (res){
      let info = res.data;

      $('#idcarrera').append($('<option />', {
        text: "-- Seleccione Carrera --",
        value: "",
      }));

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
        value: "",
      }));

      for(i = 0; i<=info.length-1; i++)
      {
        $('#idcarrera').append($('<option />', {
          text: info[i].carrera,
          value: info[i].idcarrera,
        }));
      }
    })
  } else{
    $('#idcarrera').append($('<option />', {
      text: "-- Seleccione Carrera --",
      value: "",
    }));

    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));

    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
})

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
    let idcarrera = this.value;

    var optnivel = document.querySelectorAll('#idnivel option');
    optnivel.forEach(o => o.remove());

    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(idcarrera == ""){
        $('#idnivel').append($('<option />', {
            text: "-- Seleccione Curso --",
            value: "",
        }));

        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));

        return;
    } else{
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));
    }
    
    let iddocente = document.getElementById("idusuario").value;
    let idperiodo = document.getElementById("idperiodo").value;

    document.getElementById("idnivel").innerHTML = "";

    await axios.post('https://appit.itsup.edu.ec/docente/nivel/findniveliddocente', {
        idperiodo,
        iddocente,
        idcarrera
    })
    .then(function (res){
        let info = res.data;

        document.getElementById("idnivel").innerHTML = info;
    })
});

var cmbNivel = document.getElementById("idnivel");
cmbNivel.addEventListener("change", async function(){
    let idnivel = this.value;

    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(idnivel == ""){
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));

        return;
    } 

    let idperiodo = document.getElementById("idperiodo").value;
    let iddocente = document.getElementById("idusuario").value;
    let idcarrera = document.getElementById("idcarrera").value;

    document.getElementById("idmateria").innerHTML = "";

    await axios.post('https://appit.itsup.edu.ec/docente/materia/findmateriaiddocente', {
        idperiodo,
        iddocente,
        idcarrera,
        idnivel
    })
    .then(function (res){
        let info = res.data;
        
        document.getElementById("idmateria").innerHTML = info;
    })
});

var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
document.getElementById("firma").style.display = 'none';

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function(){
  if(!validate()){
    $.confirm({
      title: 'Cuadro General',
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
  var idnivel = document.getElementById("idnivel").value;
  var idmateria = document.getElementById("idmateria").value;

  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');
  tbody.innerHTML = '';

  await axios.post('https://appit.itsup.edu.ec/docente/reportecalificacionvirtual/findestudianteidmateria/', {
    idperiodo,
    idmateria
  })
  .then(function (res){   
    let estudiantes = res.data;  

    myModal.show();

    tbody.innerHTML = estudiantes;
    
    document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();

  })
  .catch(function (error){
    console.log(error)
  })
})

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function() {
  var element = document.getElementById("reporte");
  var opt = {
    margin:       [0, 0, 0, 0],
    filename:     'reporte-calificacion-virtual.pdf',
    image:        { 
                    type: 'jpeg', 
                    quality: 0.98 
                  },
    html2canvas:  { 
                    scale: 5,
                    letterRendering: true
                  },
    jsPDF:        { 
                    orientation: 'l',
                    unit: 'cm',
                    format: 'a4',
                    putOnlyUsedFonts:true,
                    floatPrecision: 16 // or "smart", default is 16 
                  }
  };

  html2pdf().set(opt).from(element).save();
});

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
  if (document.getElementById("idnivel").value == "") {
    input = document.getElementById("idnivel");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idnivel");
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