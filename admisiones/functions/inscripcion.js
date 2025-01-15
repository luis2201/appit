var iddetalle_admision = "";

compruebaDatosPersonales();
buscaAdmision();

async function compruebaDatosPersonales()
{
  const idadmisiones = document.getElementById("idadmisiones").value;

  await axios.get(DIR + 'datospersonales/find/' + idadmisiones)
  .then(async function (res) {
    let info = res.data;

    if(info.estado == 'R'){
      document.getElementById("formulario").style.display = "none";

      $.confirm({
        title: 'Admisiones',
        icon: 'fa fa-exclamation-triangle',
        content: 'Antes de realizar el registro de la nivelación debe actualizar sus datos.',
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
    

  });

}

async function buscaAdmision()
{
  const idadmisiones = document.getElementById("idadmisiones").value;
  const idperiodo = document.getElementById("idperiodo").value;
  const params = {
    idadmisiones, 
    idperiodo
  };

  await axios.post(DIR + 'inscripcion/find/', params)
  .then(async function (res) {
    let info = res.data[0];

    if(res.data.length >0){
      if(info.estado == 1){
        document.getElementById("alerta").innerHTML = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>¡ATENCIÓN!</strong> El registro de su admisión ya fue procesado.';
        document.getElementById("formulario").style.display = "none";
  
        return;
      } else {
        document.getElementById("alerta").innerHTML = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>¡ATENCIÓN!</strong> El registro de su admisión se encuentra en verificación.';
        document.getElementById("formulario").style.display = "none";
      }
    } 

  });

}

const form = document.getElementById('form');

form.addEventListener('submit', async function (e) 
{
  e.preventDefault();

  if (!validate()) {
    $.confirm({
      title: 'Admisiones',
      icon: 'fa fa-exclamation-triangle',
      content: 'Los campos marcados con rojo son obligatorios. Complete la información para continuar.',
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

  $.confirm({
    title: 'Admisiones',
    icon: 'fa fa-question-circle',
    content: 'Se procederá a registrar su información en el sistema. Desea continuar?',
    theme: 'modern',
    type: 'blue',
    typeAnimated: true,
    buttons: {

      aceptar: async function () {
        const formData = new FormData(form);
        formData.append('idadmisiones', document.getElementById('admisionesid').value);
        formData.append('idperiodo', document.getElementById('idperiodo').value);
        formData.append('idcarrera', document.getElementById('idcarrera').value);
        //formData.append('modalidad', document.getElementById('modalidad').value);

        await axios.post(DIR + 'inscripcion/insert', formData)
        .then(function (res) {
          $.confirm({
            title: 'Admisiones',
            icon: 'fa fa-thumbs-up',
            content: 'Información registrada satisfactoriamente',
            theme: 'modern',
            type: 'blue',
            typeAnimated: true,
            buttons: {
              aceptar: function () {
                window.location.reload();
              },
            }
          });
        })
        .catch (function (error) {
            const info = error.response.data;
            $.confirm({
              title: 'Admisiones',
              icon: 'fa fa-exclamation-triangle',
              content: info.message,
              theme: 'modern',
              type: 'orange',
              typeAnimated: true,
              buttons: {
                aceptar: function () {

                }
              }
            });
          
        })
      }

    }
  });
 
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
  
  return flag;
}