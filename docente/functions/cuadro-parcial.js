var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
  let idperiodo = document.getElementById("idperiodo").value;
  let iddocente = document.getElementById("idusuario").value;

  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.post(DIR + 'nivel/findnivelidperiodotutor/', {
        idperiodo,
        iddocente
    })
    .then(function (res){
        let info = res.data;
    
        $('#idnivel').append($('<option />', {
          text: "-- Seleccione Semestre --",
          value: "",
        }));

        $('#idseccion').append($('<option />', {
          text: "-- Seleccione Sección --",
          value: "",
        }));

        $('#modalidad').append($('<option />', {
            text: "-- Seleccione Modalidad --",
            value: "",
        }));

        $('#idparcial').append($('<option />', {
            text: "-- Seleccione Parcial --",
            value: "",
        }));

        for (i = 0; i <= info.length - 1; i++) {
            $('#idnivel').append($('<option />', {
                text: info[i].nivel,
                value: info[i].idnivel,
            }));
        }
    });
  } else{  
      $('#idnivel').append($('<option />', {
          text: "-- Seleccione Semestre --",
          value: "",
      }));
        
    $('#idseccion').append($('<option />', {
        text: "-- Seleccione Sección --",
        value: "",
    }));

    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
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
  let iddocente = document.getElementById("idusuario").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let idnivel = document.getElementById("idnivel").value; 
  
  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbNivel.value != "") {
    await axios.post(DIR + 'seccion/findseccionidperiodotutor/', {
      idperiodo,
      iddocente,
      idcarrera,
      idnivel
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

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
  
});

var cmbIdSeccion = document.getElementById("idseccion");
cmbIdSeccion.addEventListener('change', async function () {
  let idperiodo = document.getElementById("idperiodo").value;
  let iddocente = document.getElementById("idusuario").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let idnivel = document.getElementById("idnivel").value; 
  let idseccion = document.getElementById("idseccion").value; 

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optParcial = document.querySelectorAll('#idparcial option');
  optParcial.forEach(o => o.remove());

  if(cmbIdSeccion.value != "") {
    await axios.post(DIR + 'modalidad/findmodalidadidperiodotutor/', {
        idperiodo,
        iddocente,
        idcarrera,
        idnivel,
        idseccion
    })
    .then(function (res){
        let info = res.data;

      $('#modalidad').append($('<option />', {
        text: "-- Seleccione Modalidad --",
        value: "",
      }));

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
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

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
})

var cmbModalidad = document.getElementById("modalidad");
cmbModalidad.addEventListener('change', async function () {

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbModalidad.value != "") {
    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  
    // $('#idparcial').append($('<option />', {
    //   text: "Primero",
    //   value: "1",
    // }));
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

  idperiodo = document.getElementById("idperiodo").value;
  var idcarrera = document.getElementById("idcarrera").value;
  idnivel = document.getElementById("idnivel").value;
  var idseccion = document.getElementById("idseccion").value;
  var modalidad = document.getElementById("modalidad").value;

  await axios.post(DIR + 'cuadroparcial/findmaterias/', {
    idperiodo,
    idcarrera,
    idnivel,
    idseccion,
    modalidad
  })
  .then(function (res){   
    let materias = res.data;  

    // 'use strict';
    // const thead = document.querySelector('#tbLista thead');
    // thead.innerHTML = '';
    //console.log(materias)
    document.getElementById("reporte").innerHTML = materias;

    myModal.show();

    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();
    document.getElementById("seccion").innerHTML = "<strong>SECCION: </strong>" + $("#idseccion option:selected").text();
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();

  })
  .catch(function (error){
    console.log(error)
  })
})

var maintable = document.getElementById('cuadro'),
pdfout = document.getElementById('pdfout');

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function (){ 
  var element = document.getElementById("cuadro");
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
btnCerrar.addEventListener("click", function(){
  myModal.hide();
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
  
  return flag;
}