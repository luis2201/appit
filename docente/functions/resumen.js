init();

async function init()
{
  const idperiodo = document.getElementById("idperiodo").value;
  const iddocente = document.getElementById("idusuario").value;
  
  await axios.post(DIR + 'carrera/findcarreradocentepresencial/', {
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
  let iddocente = document.getElementById("idusuario").value;
  let idcarrera = document.getElementById("idcarrera").value;

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.post(DIR + 'docente/finddocentecarreramaterias/', {
      idperiodo,      
      iddocente,
      idcarrera
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

  let idperiodo = document.getElementById("idperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let idmateria = document.getElementById("idmateria").value;

  'use strict';
  const tbody = document.querySelector('#reporte tbody');
  tbody.innerHTML = '';  

  await axios.post(DIR + 'resumen/viewlistaestudiantemateria/', {
    idperiodo,
    idcarrera,    
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

    document.getElementById("nombremateria").innerHTML =  '<strong>Materia: </strong>: ' + $("#idmateria option:selected").text();    
    document.getElementById("nombredocente").innerHTML =  '<strong>Docente: </strong>: ' + document.getElementById('nombresusuario').innerText;
    
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
    myModal.show();

  })
  .catch(function (error){
    console.log(error)
  })
})

var maintable = document.getElementById('tbLista'),
pdfout = document.getElementById('pdfout');

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function (){ 
  var element = document.getElementById("reporte");
  var opt = {
    margin:       0,
    filename:     'resumen-periodo.pdf',
    image:        { type: 'jpeg', quality: 1 },
    html2canvas:  { scale: 2 },
    jsPDF:        { orientation: 'p',
                    unit: 'cm',
                    format: 'a4',
                    putOnlyUsedFonts:true,
                    floatPrecision: 16 // or "smart", default is 16 
                  }
  };

  html2pdf().set(opt).from(element).save();

  document.getElementById("firma").style.display = 'block';
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

