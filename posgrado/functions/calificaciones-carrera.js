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

    await axios.post(DIR + 'calificacionescarrera/viewcalificacionidcarrera', {
        idperiodo,
        idcarrera
      })
    .then(function (res) {
        let calificaciones = res.data;

        document.getElementById("divcalificaciones").innerHTML = calificaciones;
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