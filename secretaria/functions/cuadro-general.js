var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
document.getElementById("firma").style.display = 'none';

var table = '';

var cmbIdPeriodo = document.getElementById("cmbidperiodo")
cmbIdPeriodo.addEventListener("change", async function(){
  var optcarrera = document.querySelectorAll('#idcarrera option');
  optcarrera.forEach(o => o.remove());  

  var optmodalidad = document.querySelectorAll('#idmodalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove()); 
  
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

  let idperiodo = document.getElementById("cmbidperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let idnivel = document.getElementById("idnivel").value;  
  let modalidad = document.getElementById("modalidad").value;

  let ruta = (modalidad == 'Presencial') ? DIR + 'cuadrogeneral/findmateria/' : DIR + 'cuadrogeneral/findmateriavirtual/';

  await axios.post(ruta, {
    idperiodo,
    idcarrera,    
    modalidad,
    idnivel
  })
  .then(function (res){   
    let materias = res.data;  
    
    document.getElementById("reporte").innerHTML = materias;
    myModal.show();
    
    document.getElementById("nombreperiodo").innerHTML = "<strong>PERIODO ACADÉMICO: </strong>" + $("#cmbidperiodo option:selected").text();
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();    
 
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


