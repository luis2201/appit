var aliasperiodo = "";
var fechainicioperiodo ="";
var fechafinperiodo = "";

var cmbIdPeriodo = document.getElementById("cmbidperiodo")
cmbIdPeriodo.addEventListener("change", async function(){
  var optcarrera = document.querySelectorAll('#idcarrera option');
  optcarrera.forEach(o => o.remove());

  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#idmodalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());
  
  'use strict';
  const tbody = document.querySelector('#tbLista tbody');
  tbody.innerHTML = '';
  
  let idperiodo = cmbIdPeriodo.value;
  
  if(cmbIdPeriodo.value != "") {
    await axios.get(DIR + 'carrera/findcarreraperiodo/' + idperiodo )
    .then(function (res){
      let info = res.data;
            
      $('#idcarrera').append($('<option />', {
        text: "-- Seleccione Carrera --",
        value: "",
      }));

      $('#idseccion').append($('<option />', {
        text: "-- Seleccione Sección --",
        value: "",
      }));

      $('#idmodalidad').append($('<option />', {
        text: "-- Seleccione Modalidad --",
        value: "",
      }));      

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Nivel --",
        value: "",
      }));
      
      for(i = 0; i<=info.length-1; i++)
      {
        $('#idcarrera').append($('<option />', {
          text: info[i].carrera,
          value: info[i].idcarrera,
        }));
      }
    });
  } else{
    $('#idcarrera').append($('<option />', {
      text: "-- Seleccione Carrera --",
      value: "",
    }));

    $('#idseccion').append($('<option />', {
      text: "-- Seleccione Sección --",
      value: "",
    }));

    $('#idmodalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
      value: "",
    }));      

    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Nivel --",
      value: "",
    }));
  }
});

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){    
  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());
  
  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());  
  
  if(cmbIdCarrera.value != "") {
    let idperiodo = document.getElementById("cmbidperiodo").value;     
    let idcarrera = this.value;
    
    await axios.post(DIR + 'modalidad/findmodalidadcarrera/', {
      idperiodo,
      idcarrera
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
          value: info[i].idmodalidad,
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
    let modalidad = this.value;
    
    await axios.post(DIR + 'nivel/findnivelcarreramodalidad/', {
      idperiodo,
      idcarrera,      
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
});

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function(){
  if(!validate()){
    $.confirm({
      title: 'Certificado Matrícula',
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

  let idperiodo = document.getElementById("cmbidperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;  
  let modalidad = document.getElementById("modalidad").value;
  let idnivel   = document.getElementById("idnivel").value;

  'use strict';
  const tbody = document.querySelector('#tbLista tbody');
  tbody.innerHTML = '';

  await axios.post(DIR + 'certificadomatricula/viewlistas', {
    idperiodo,
    idcarrera,    
    modalidad,
    idnivel
  })
  .then(function (res){   
    let estudiantes = res.data;  
    
    tbody.innerHTML = estudiantes;
  })
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