const modalMaterias = new bootstrap.Modal(document.getElementById('modalMaterias'), {
  keyboard: false,
  backdrop: 'static'
});

var cmdIdCarrera = document.getElementById("idcarrera");
cmdIdCarrera.addEventListener("change", function (){
  var selectedIndex = cmdIdCarrera.selectedIndex;
  var selectedText = cmdIdCarrera.options[selectedIndex].text;

  document.getElementById("nombreCarrera").innerText = selectedText;
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

    await axios.post(DIR + 'estudiante/findestudianteidcarrera', {
        idperiodo,
        idcarrera
      })
    .then(function (res) {
        let estudiantes = res.data;

        document.getElementById("divestudiantes").innerHTML = estudiantes;
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

async function agregaMaterias(estudiante)
{
  let idmatricula = estudiante.id;
  let idcarrera = document.getElementById("idcarrera").value;

  await axios.post(DIR + 'materiaintroductorio/findmateriaidcarrera', {
    idcarrera,
    idmatricula
  })
  .then(function (res) {
      let estudiantes = res.data;
      
      modalMaterias.show();
      document.getElementById("txtIdMatricula").value = idmatricula;
      document.getElementById("divmaterias").innerHTML = estudiantes;
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

async function saveMaterias(check)
{
  let idmatricula = document.getElementById("txtIdMatricula").value;
  let idmateria = check.id;
  let isChecked = check.checked;
  
  await axios.post(DIR + 'asignarmateria/savemateria', {
    idmatricula,  
    idmateria,
    isChecked
  })
  .then(function (res) {
      let info = res.data;  
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
btnCerrar.addEventListener("click", function (){
  modalMaterias.hide();
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

