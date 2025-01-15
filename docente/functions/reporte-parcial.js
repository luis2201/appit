init();

document.getElementById("loading").style.display = 'none';

async function init()
{
  const idperiodo = document.getElementById("idperiodo").value;
  const iddocente = document.getElementById("idusuario").value;
  
  await axios.post('https://appit.itsup.edu.ec/docente/carrera/findcarreradocente/', {
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

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.get('https://appit.itsup.edu.ec/docente/seccion/findseccionidperiodo/' + idperiodo )
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

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
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

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
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

  var optParcial = document.querySelectorAll('#idparcial option');
  optParcial.forEach(o => o.remove());

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

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
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

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
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

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbModalidad.value != "") {
    await axios.post('https://appit.itsup.edu.ec/docente/docente/finddocentecarreracurso/', {
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

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
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

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
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

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbNivel.value != "") {
    await axios.post('https://appit.itsup.edu.ec/docente/docente/finddocentecarreramateria/', {
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

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
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

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
  
});

var cmbMateria = document.getElementById("idmateria");
cmbMateria.addEventListener('change', async function () {

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbMateria.value != "") {
    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  
    $('#idparcial').append($('<option />', {
      text: "Primero",
      value: "1",
    }));
    $('#idparcial').append($('<option />', {
      text: "Segundo",
      value: "2",
    }));
  } else{
    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
  
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
  idparcial = document.getElementById("idparcial").value;

  await axios.post('https://appit.itsup.edu.ec/docente/registrocalificacion/viewlistaestudiantemateria/', {
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

    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
    myModal.show();

    document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();
    document.getElementById("seccion").innerHTML = "<strong>SECCION: </strong>" + $("#idseccion option:selected").text();
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < estudiantes.length; i++) {
      let fila = tbody.insertRow();
      fila.insertCell().innerHTML = i+1;
      fila.insertCell().innerHTML = "<input id='idmatricula-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; width:100px; text-align: center;' value="+estudiantes[i]['idmatricula']+" disabled>"; //idmatricula
      fila.insertCell().innerHTML = estudiantes[i]['estudiante'];
      fila.insertCell().innerHTML = "<input id='d1-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; background: #fff; width:100px; text-align: center;' disabled>"; //Aporte
      fila.insertCell().innerHTML = "<input id='d2-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; background: #fff; width:100px; text-align: center;'>"; //Lecciones
      fila.insertCell().innerHTML = "<input id='td-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Docencia
      fila.insertCell().innerHTML = "<input id='p-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; background: #fff; width:100%; text-align: center;' disabled>"; //Prácticas
      fila.insertCell().innerHTML = "<input id='tp-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Prácticas
      fila.insertCell().innerHTML = "<input id='au-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; background: #fff; width:100%; text-align: center;');' disabled>"; //Aprendizaje Autónomo
      fila.insertCell().innerHTML = "<input id='tau-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Aprendizaje Autónomo
      fila.insertCell().innerHTML = "<input id='r-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; background: #fff; width:100px; text-align: center;' disabled>"; //Resultados
      fila.insertCell().innerHTML = "<input id='tr-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Resultados
      fila.insertCell().innerHTML = "<input id='t-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total
      
      cargarCalificacion(estudiantes[i]['idmatricula']);
    }
  })
  .catch(function (error){
    console.log(error)
  })
})

var maintable = document.getElementById('tbLista'),
pdfout = document.getElementById('pdfout');

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function (){ 
  var element = document.getElementById("tbLista");
  var opt = {
    margin:       10,
    filename:     'document.pdf',
    image:        { type: 'jpeg', quality: 2 },
    html2canvas:  { scale: 2 },
    jsPDF:        { orientation: 'l',
                    unit: 'mm',
                    format: 'a3',
                    putOnlyUsedFonts:true,
                    floatPrecision: 16 // or "smart", default is 16 
                  }
  };

  html2pdf().set(opt).from(element).save();

  document.getElementById("firma").style.display = 'block';
});



async function cargarCalificacion(idmatricula)
{
  var idperiodo = document.getElementById("idperiodo").value;
  var idmateria = document.getElementById("idmateria").value;
  
  await axios.post('https://appit.itsup.edu.ec/docente/registrocalificacion/findcalificacionidmatricula/',{
    idmatricula, 
    idperiodo,
    idmateria,
    idparcial
  })
  .then(function (res){
    let info = res.data[0];

    if(res.data.length>0){
      document.getElementById("d1-"+idmatricula).value = info.aporte;
      document.getElementById("d2-"+idmatricula).value = info.lecciones;
      document.getElementById("td-"+idmatricula).value = info.tdocencia;
      document.getElementById("p-"+idmatricula).value = info.practicas;
      document.getElementById("tp-"+idmatricula).value = info.tpracticas;
      document.getElementById("au-"+idmatricula).value = info.aprendizaje;
      document.getElementById("tau-"+idmatricula).value = info.taprendizaje;
      document.getElementById("r-"+idmatricula).value = info.resultados;
      document.getElementById("tr-"+idmatricula).value = info.tresultados;
      document.getElementById("t-"+idmatricula).value = info.total;
    }
  })
  .catch(function (error){
    console.log(error.message);
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
  if (document.getElementById("idparcial").value == "") {
    input = document.getElementById("idparcial");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idparcial");
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

