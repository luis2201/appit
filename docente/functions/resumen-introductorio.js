$(document).ready(async function (){
    let idperiodo = document.getElementById("idperiodo").value;
    let iddocente = document.getElementById("iddocente").value;

    await axios.post(DIR + 'carrera/findcarreraintroductorio/', {
        idperiodo,
        iddocente
    })
    .then(function (res){
        let options = res.data;

        document.getElementById("idcarrera").innerHTML = options;
    })
});

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function (){
    if(this.value == ""){
        document.getElementById("idmateria").innerHTML = "";
        document.getElementById("idmateria").innerHTML = "<option>-- Seleccione Materia --</option>";

        return;
    }

    let idperiodo = document.getElementById("idperiodo").value;
    let iddocente = document.getElementById("iddocente").value;
    let idcarrera = this.value;

    await axios.post(DIR + 'materiaintroductorio/findmateriaiddocente/', {
        idperiodo,
        iddocente,
        idcarrera
    })
    .then(function (res){
        let options = res.data;
        
        document.getElementById("idmateria").innerHTML = options;
    })

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
  let idmateria = document.getElementById("idmateria").value;  

  window.open('resumenintroductorio/pdf/'+idperiodo+'/'+idmateria,'_blank');
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