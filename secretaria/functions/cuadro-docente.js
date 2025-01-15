var cmbIdDocente = document.getElementById("iddocente")
cmbIdDocente.addEventListener("change", async function ()
{
  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  const idperiodo = document.getElementById("idperiodo").value;
  const iddocente = document.getElementById("iddocente").value;
  
  if(cmbIdDocente.value != "") {
    await axios.post(DIR + 'docente/finddocentemateriapresencial/', {
        idperiodo,
        iddocente
    })
    .then(function (res){
      let options = res.data;
      document.getElementById("idmateria").innerHTML = options;

      $('#idparcial').append($('<option />', {
          text: "-- Seleccione Parcial --",
          value: "",
      }));

    })
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
      title: 'Reporte de Calificaciones',
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
  let idmateria = document.getElementById("idmateria").value;
  let idparcial = document.getElementById("idparcial").value;
  
  'use strict';
  const tbody = document.querySelector('#tbLista tbody');
  tbody.innerHTML = '';

  await axios.post(DIR + 'cuadrodocente/viewlistaestudiantemateria/', {
    idperiodo,
    idmateria,
    idparcial
  })
  .then(function (res){   
    let estudiantes = res.data;    

    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
    myModal.show();

    document.getElementById("nombreperiodo").innerHTML = "<strong>" + document.getElementById("periodo").innerText + "</strong>";
    document.getElementById("materia").innerHTML = "<strong>Materia: </strong>" + $("#idmateria option:selected").text();    
    document.getElementById("nombreparcial").innerHTML = "<strong>Parcial: </strong>" +  $("#idparcial option:selected").text();

    tbody.innerHTML = estudiantes;
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

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function () {
  $('#exampleModal').modal('hide');
});

function validate()
{
  var flag = true;
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

