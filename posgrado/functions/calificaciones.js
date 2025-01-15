const modalCalificaciones = new bootstrap.Modal(document.getElementById('modalCalificaciones'), {
    keyboard: false,
    backdrop: 'static'
});

var cmdIdCarrera = document.getElementById("idcarrera");
  cmdIdCarrera.addEventListener("change", function (){
    var selectedIndex = cmdIdCarrera.selectedIndex;
    var selectedText = cmdIdCarrera.options[selectedIndex].text;
});

const btnVerLista = document.getElementById("verLista");
btnVerLista.addEventListener("click", async function (){
    if(!validate()){
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'Todos los campos marcados con rojo son obligatorios',
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

    let idperiodo = document.getElementById("idperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;

    await axios.post(DIR + 'estudiante/findestudianteidcarreracalificacion', {
        idperiodo,
        idcarrera
      })
    .then(function (res) {
        let estudiantes = res.data;

        document.getElementById("tbestudiantes").innerHTML = estudiantes;
    })
    .catch(function (error) {
        $.confirm({
            title: 'Acceso no autorizado',
            icon: 'fa fa-exclamation-triangle',
            content: error.message,
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {

                }
            }
        });
    });
});

async function verCalificaciones(estudiante){
    let idmatricula = estudiante.id;

    await axios.post(DIR + 'calificaciones/findcalificacionesidmatricula', {
        idmatricula
    })
    .then(function (res) {
        let calificaciones = res.data;

        modalCalificaciones.show();
        document.getElementById("tbcalificaciones").innerHTML = calificaciones;
    })
    .catch(function (error) {
        $.confirm({
            title: 'Acceso no autorizado',
            icon: 'fa fa-exclamation-triangle',
            content: error.message,
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {

                }
            }
        });
  });
}

const btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function(){
    modalCalificaciones.hide();
});

function validate() {
    var flag = true;

    if (document.getElementById("idperiodo").value == "") {
      input = document.getElementById("idperiodo");
      input.className += " is-invalid";
      flag = false;
    } else {
      input = document.getElementById("idperiodo");
      input.classList.remove("is-invalid");
    }

    if (document.getElementById("idcarrera").value == "") {
        input = document.getElementById("idcarrera");
        input.className += " is-invalid";
        flag = false;
      } else {
        input = document.getElementById("idcarrera");
        input.classList.remove("is-invalid");
      }

    return flag;
}