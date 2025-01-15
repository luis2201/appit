var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function(){
  if(!validate()){
    $.confirm({
      title: 'Listas por Carreras',
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
  idcarrera = document.getElementById("idcarrera").value;
  idseccion = document.getElementById("idseccion").value;
  modalidad = document.getElementById("modalidad").value;
  idnivel   = document.getElementById("idnivel").value;

  await axios.post(DIR + 'documentosestudiante/viewlista', {
    idperiodo,
    idcarrera,
    idseccion,
    modalidad,
    idnivel
  })
  .then(function (res){   
    let estudiantes = res.data;    
console.log(estudiantes)
    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    tbody.innerHTML = estudiantes;
  })
})

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
  
  return flag;
}