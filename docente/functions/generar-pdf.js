var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false, backdrop:'static'});

function mostrar(idsyllabus){
    // var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false, backdrop:'static'})
    document.getElementById("idsyllabus").value = idsyllabus;
    myModal.show();
};

var btnFirmar = document.getElementById("btnFirmar");
btnFirmar.addEventListener("click", async function () {
  if (!validate()) {
      $.confirm({
        title: 'Información del Sistema',
        icon: 'fa fa-exclamation-triangle',
        content: 'La contraseña de la Firma Electrónica es obligatoria.',
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

  let firma = await axios.post('https://appit.itsup.edu.ec/docente/firmaelectronica/findfirmaiddocente/');
  if(firma.data[0].doc_firma == ''){
    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa fa-exclamation-triangle',
      content: 'No ha registrado su Firma Electrónica. Para realizar este proceso debe ir a la parte superior derecha de su pantalla en el icono con su nombre, a continuación escoja la opción Firma Electrónica.',
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

  let pas_firma = document.getElementById("pas_firma").value;
  let validatefirma = await axios.post('https://appit.itsup.edu.ec/docente/firmaelectronica/validatepasfirma/', {pas_firma});

  if(validatefirma.data == 0){
    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa fa-exclamation-triangle',
      content: 'Error al ingresar la contraseña de su Firma Electrónica',
      theme: 'modern',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("pas_firma").value = '';
        }
      }
    });

    return;
  }

  let idsyllabus = document.getElementById("idsyllabus").value;
  var win = window.open("syllabuspdf/"+idsyllabus, '_blank');
  win.focus();

  myModal.hide();
})

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function(){
  document.getElementById("pas_firma").value = "";
  myModal.hide();
})

function validate()
{
    var flag = true;
    if (document.getElementById("pas_firma").value == "") {
      input = document.getElementById("pas_firma");
      input.className += " is-invalid";
      flag = false;
    } else {
      input = document.getElementById("pas_firma");
      input.classList.remove("is-invalid");
    }
  
    return flag;
}