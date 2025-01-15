var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
  let idperiodo = document.getElementById("idperiodo").value;
  let idcarrera = this.value;
  let iddocente = document.getElementById("idusuario").value;

  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.post(DIR + 'nivel/findnivelidperiodotutorenlinea/', {
        idperiodo,
        idcarrera,
        iddocente
    })
    .then(function (res){
        let info = res.data;
    
        $('#idnivel').append($('<option />', {
          text: "-- Seleccione Semestre --",
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

  let idperiodo = document.getElementById("idperiodo").value;
  let  idcarrera = document.getElementById("idcarrera").value;
  let idnivel = document.getElementById("idnivel").value;  

  await axios.post(DIR + 'cuadrogeneralenlinea/findestudianteidmateria/', {
    idperiodo,
    idcarrera,
    idnivel,    
  })
  .then(function (res){   
    let materias = res.data;  
    
    document.getElementById("reporte").innerHTML = materias;

    myModal.show();

    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();    
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
    
  return flag;
}