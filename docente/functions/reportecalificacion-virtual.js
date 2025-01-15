var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
    let idcarrera = this.value;

    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(idcarrera == ""){
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

    document.getElementById("idmateria").innerHTML = "";

    await axios.post(DIR + 'materia/findmateriaiddocente', {
        idperiodo,
        iddocente,
        idcarrera
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
  var idmateria = document.getElementById("idmateria").value;

  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');
  tbody.innerHTML = '';

  await axios.post(DIR + 'reportecalificacionvirtual/viewlistaestudiantemateria/', {
    idperiodo,
    idmateria
  })
  .then(function (res){   
    let estudiantes = res.data;  

    myModal.show();

    tbody.innerHTML = estudiantes;
    
    document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();
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