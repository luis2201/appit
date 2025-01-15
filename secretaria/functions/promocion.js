var cmbIdPeriodo = document.getElementById("cmbidperiodo")
cmbIdPeriodo.addEventListener("change", async function(){
  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());
  
  let idperiodo = cmbIdPeriodo.value;
  
  if(cmbIdPeriodo.value != "") {
    await axios.get(DIR + 'seccion/findseccionidperiodo/' + idperiodo )
    .then(function (res){
      let info = res.data;

      $('#idseccion').append($('<option />', {
        text: "-- Seleccione Sección --",
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
  }
});

var btnLista = document.getElementById("btnLista");
btnLista.addEventListener("click", async function(){
  if(!validate()){
    $.confirm({
      title: 'Promoción de Estudiantes',
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

  idperiodo = document.getElementById("cmbidperiodo").value;
  idcarrera = document.getElementById("idcarrera").value;
  idseccion = document.getElementById("idseccion").value;
  modalidad = document.getElementById("modalidad").value;
  idnivel   = document.getElementById("idnivel").value;

  'use strict';
  const tbody = document.querySelector('#tbLista tbody');
  tbody.innerHTML = '';

  await axios.post(DIR + 'promocion/viewlista', {
    idperiodo,
    idcarrera,
    idseccion,
    modalidad,
    idnivel
  })
  .then(function (res){   
    let estudiantes = res.data;  
  
    tbody.innerHTML = estudiantes;
  })
})

const hoy = new Intl.DateTimeFormat("es-ES", { dateStyle: "long" }).format(new Date());
document.getElementById("fechaactual").innerHTML = "Portoviejo, " + hoy;

async function mostrarCalificaciones(idmatricula){  
  // Obtenemos la fila 
  let obtenerFila = document.getElementById(idmatricula);
  // Obtenemos los elementos td de la fila
  let elementosFila = obtenerFila.getElementsByTagName("td");    
  document.getElementById("estudiante").innerHTML = elementosFila[3].innerHTML;
  document.getElementById("numeroidentificacion").innerHTML = elementosFila[2].innerHTML;
  document.getElementById("nombrenivel").innerHTML = $("#idnivel option:selected").text();
  document.getElementById("numeromatricula").innerHTML = elementosFila[1].innerHTML;
  document.getElementById("nombrecarrera").innerHTML = $("#idcarrera option:selected").text();
  document.getElementById("nombreperiodo").innerHTML = document.getElementById("periodo").innerHTML;
  document.getElementById("fechaactual").innerHTML = "Portoviejo, " + hoy;

  idperiodo = document.getElementById("cmbidperiodo").value;
  
  var myModal = new bootstrap.Modal(document.getElementById('calificacionesModal'))
  myModal.show();

  if(modalidad!='Virtual'){
    document.getElementById("tbCalificaciones").style.display = 'block';
    document.getElementById("tbCalificacionesEnLinea").style.display = 'none';

    'use strict';
    const tbody = document.querySelector('#tbCalificaciones tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'promocion/viewcalificacion', {
      idperiodo,
      idmatricula
    })
    .then(function (res){   
      let calificaciones = res.data;  
      
      tbody.innerHTML = calificaciones;
    })
  } else{
    document.getElementById("tbCalificaciones").style.display = 'none';
    document.getElementById("tbCalificacionesEnLinea").style.display = 'block';

    'use strict';
    const tbody = document.querySelector('#tbCalificacionesEnLinea tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'promocion/viewcalificacionenlinea', {
      idperiodo,
      idmatricula
    })
    .then(function (res){   
      let calificaciones = res.data;  
      
      tbody.innerHTML = calificaciones;
    })
  }
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
  
  return flag;
}