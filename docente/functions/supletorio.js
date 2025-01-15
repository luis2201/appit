init();

async function init()
{
  const idperiodo = document.getElementById("idperiodo").value;
  const iddocente = document.getElementById("idusuario").value;

  await axios.post(DIR + 'carrera/findcarreradocente/', {
    idperiodo,
    iddocente
  })
  .then(function (res){
    let info = res.data;

    for(i = 0; i<=info.length-1; i++)
    {
      $('#idcarrera').append($('<option />', {
        text: info[i].carrera,
        value: info[i].idcarrera,
      }));
    }
  })
}

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener('change', async function () {
  let idperiodo = document.getElementById("idperiodo").value;
  
  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.get(DIR + 'seccion/findseccionidperiodo/' + idperiodo )
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

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));
      
      for(i = 0; i<=info.length-1; i++)
      {
        $('#idseccion').append($('<option />', {
          text: info[i].seccion,
          value: info[i].idseccion,
        }));
      }
    });
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

    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));
  }
});

var cmbIdSeccion = document.getElementById("idseccion");
cmbIdSeccion.addEventListener('change', function () {
  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  if(cmbIdSeccion.value != "") {
      $('#modalidad').append($('<option />', {
        text: "-- Seleccione Modalidad --",
        value: "",
      }));
      $('#modalidad').append($('<option />', {
        text: "Presencial",
        value: "Presencial",
      }));
      $('#modalidad').append($('<option />', {
        text: "Virtual",
        value: "Virtual",
      }));

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));
  } else{
    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
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
  }
})

var cmbModalidad = document.getElementById("modalidad");
cmbModalidad.addEventListener('change', async function () {
  let idperiodo = document.getElementById("idperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let iddocente = document.getElementById("idusuario").value;

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  if(cmbModalidad.value != "") {
    await axios.post(DIR + 'docente/finddocentecarreracurso/', {
      idperiodo,
      idcarrera,
      iddocente
    })
    .then(function (res){
      let info = res.data;
  
      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));

      for(i = 0; i<=info.length-1; i++)
      {
        
        $('#idnivel').append($('<option />', {
          text: info[i].nivel,
          value: info[i].idnivel,
        }));
      }
    });
  } else{
    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
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
  }
  
});

var cmbNivel = document.getElementById("idnivel");
cmbNivel.addEventListener('change', async function () {
  let idperiodo = document.getElementById("idperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let idnivel = document.getElementById("idnivel").value; 
  let iddocente = document.getElementById("idusuario").value;
  
  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  if(cmbNivel.value != "") {
    await axios.post(DIR + 'docente/finddocentecarreramateria/', {
      idperiodo,
      idcarrera,
      idnivel,
      iddocente
    })
    .then(function (res){
      let info = res.data;

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));
   
      for(i = 0; i<=info.length-1; i++)
      {
        
        $('#idmateria').append($('<option />', {
          text: info[i].materia,
          value: info[i].idmateria,
        }));
      }
    });
  } else{
    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));
  }
  
});

var cmbMateria = document.getElementById("idmateria");
cmbMateria.addEventListener('change', async function () {

  
});

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function (){
  if(!validate()){
    $.confirm({
      title: 'Registro de Calificaciones',
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
  var idseccion = document.getElementById("idseccion").value;
  var modalidad = document.getElementById("modalidad").value;
  idnivel   = document.getElementById("idnivel").value;
  idmateria = document.getElementById("idmateria").value;

  'use strict';
  const tbody = document.querySelector('#tbLista tbody');
  tbody.innerHTML = '';

  await axios.post(DIR + 'supletorio/viewlistaestudiantemateria/', {
    idperiodo,
    idcarrera,
    idseccion,
    modalidad,
    idnivel,
    idmateria
  })
  .then(function (res){   
    let estudiantes = res.data;    
    
    if(estudiantes.length == 0){
      $.confirm({
        title: 'Registro de Calificaciones',
        icon: 'fa fa-exclamation-triangle',
        content: 'No existe información para mostrar. Vuelva a seleccionar',
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

    tbody.innerHTML = estudiantes;

    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
    myModal.show();

  })
  .catch(function (error){
    console.log(error)
  })
})

var maintable = document.getElementById('tbLista'),
pdfout = document.getElementById('pdfout');

async function total(input)
{
  var param = input.split("-");
  
  var idperiodo = document.getElementById("idperiodo").value;
  var idmatricula =  document.getElementById("idmatricula-"+param[1]).value;
  var idcarrera = document.getElementById("idcarrera").value;
  var idseccion = document.getElementById("idseccion").value;
  var modalidad = document.getElementById("modalidad").value;
  var idnivel = document.getElementById("idnivel").value;
  var idmateria = document.getElementById("idmateria").value;

  var p1 = isNaN(document.getElementById("p1-"+param[1]).value) ? 0 : parseFloat(document.getElementById("p1-"+param[1]).value);
  var p2 = isNaN(document.getElementById("p2-"+param[1]).value) ? 0 : parseFloat(document.getElementById("p2-"+param[1]).value);  
  var supletorio = isNaN(document.getElementById("sp-"+param[1]).value) ? 0 : parseFloat(document.getElementById("sp-"+param[1]).value);  

  var suma = p1+p2;
  var total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
  if(suma>=56 &&suma<=69){
    if(supletorio>=14){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(supletorio) ? 0 : supletorio); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=55){
    if(supletorio>=15){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(supletorio) ? 0 : supletorio); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=54){
    if(supletorio>=16){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(supletorio) ? 0 : supletorio); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=53){
    if(supletorio>=17){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(supletorio) ? 0 : supletorio); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=52){
    if(supletorio>=18){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(supletorio) ? 0 : supletorio); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=51){
    if(supletorio>=19){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(supletorio) ? 0 : supletorio); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=50){
    if(supletorio>=20){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(supletorio) ? 0 : supletorio); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  }

  if(document.getElementById("sp-"+param[1]).value == 0){
    document.getElementById("t-"+param[1]).value = "";
    return;
  } 
  
  if(total>70){
    total = 70;
  }

  document.getElementById("t-"+param[1]).value =  "";    
  document.getElementById("t-"+param[1]).value =  total;    
  
  await axios.post(DIR + 'supletorio/insertsupletorio/', {
    idperiodo,
    idmatricula,
    idcarrera,
    idseccion,
    modalidad,
    idnivel,
    idmateria,
    supletorio,
    total
  })
  .then(function (res){
    
  })
  .catch(function (error){
    $.confirm({
      title: 'Registro de Calificaciones',
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

function filterFloat(evt,input){
  // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
  var key = window.Event ? evt.which : evt.keyCode;    
  var chark = String.fromCharCode(key);
  var tempValue = input.value+chark;
  if(key >= 48 && key <= 57){
      if(filter(tempValue)=== false){
          return false;
      }else{               
          return true;
      }
  }else{
        if(key == 8 || key == 13 || key == 0) {     
            return true;              
        }else if(key == 46){
              if(filter(tempValue)=== false){
                  return false;
              }else{       
                  return true;
              }
        }else{
            return false;
        }
  }
}

function filter(__val__){
  var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
  if(preg.test(__val__) === true){
      return true;
  }else{
     return false;
  }
  
}

