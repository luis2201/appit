var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function(){
  if(!validate()){
    $.confirm({
      title: 'Listas por Niveles',
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
  
  var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
  myModal.show();
  idperiodo = document.getElementById("idperiodo").value;
  idcarrera = document.getElementById("idcarrera").value;
  idnivel   = document.getElementById("idnivel").value;

  await axios.post('https://appit.itsup.edu.ec/secretaria/listasvalidacion/viewlista', {
    idperiodo,
    idcarrera,
    idnivel
  })
  .then(function (res){   
    let estudiantes = res.data;  
    console.log(estudiantes)
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < estudiantes.length; i++) {
      let fila = tbody.insertRow();
      fila.insertCell().innerHTML = i+1;
      fila.insertCell().innerHTML = estudiantes[i]['idmatricula'];
      fila.insertCell().innerHTML = estudiantes[i]['alumnos'];
      fila.insertCell().innerHTML = estudiantes[i]['numero_identificacion'];
      fila.insertCell().innerHTML = estudiantes[i]['fecha_nacimiento'];
      fila.insertCell().innerHTML = estudiantes[i]['tipo_sangre'];
      fila.insertCell().innerHTML = estudiantes[i]['numero_celular'];
    }
  })
})

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

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function() {
  if(!validate()){
    $.confirm({
      title: 'Listas por Niveles',
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

  var doc = new jsPDF({
    orientation: 'p',
    unit: 'px',
    format: 'a4',
    putOnlyUsedFonts:false
  });   
  var margin = 25;
  var scale = (doc.internal.pageSize.width - margin * 2)/ document.body.getClientRects;
  var scale_mobile = (doc.internal.pageSize.width - margin * 2) / document.body.getBoundingClientRect();
  var maintable = document.getElementById("tbLista");

  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

    doc.html(maintable, {
      x: margin,
      y: margin,
      html2canvas: {
        scale: scale_mobile,
      },
      callback: function (doc) {
        doc.output('dataurlnewwindow', { filename: 'pdf.pdf' });
      }
    });
  } else {

    doc.html(maintable, {
      x: margin,
      y: margin,
      html2canvas: {
        scale: scale,
      },
      callback: function (doc) {
        doc.output('dataurlnewwindow', { filename: 'lista-matriculados.pdf' });
      }
    });
  }
  });
