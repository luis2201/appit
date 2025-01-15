const paisnacionalidad = document.getElementById("idpais_nacionalidad");
const paisresidencia = document.getElementById("idpais_residencia");
const cantonnacimiento = document.getElementById("idcanton_nacimiento");
const cantonresidencia = document.getElementById("idcanton_residencia");

var optsexo = "";
var optdiscapacidad = "";
var optcarnet_conadis = "";
var optbono_desarrollo = "";

document.addEventListener('input', (e) => {
  let opcion = e.target.getAttribute('name');

  switch (opcion) {
    case "sexo":
      optsexo = e.target.value; 
      break;
    case "discapacidad":
      optdiscapacidad = e.target.value; 
      if (optdiscapacidad == 0) {
        document.getElementById('porcentaje_discapacidad').value = "0";
        document.getElementById('porcentaje_discapacidad').disabled = true;

        optcarnet_conadis = 0;
        document.getElementById('carnet_conadisNO').checked = true;
        document.getElementById('carnet_conadisNO').disabled = true;
        document.getElementById('carnet_conadisSI').disabled = true;
  
        document.getElementById('numero_carnet').value = '--';
        document.getElementById('numero_carnet').disabled = true;
  
        document.getElementById('tipo_discapacidad').value = 'NINGUNA';
        document.getElementById('tipo_discapacidad').disabled = true;
      } else {
        document.getElementById('porcentaje_discapacidad').value = "";
        document.getElementById('porcentaje_discapacidad').disabled = false;
        
        carnet_conadis = "";
        document.getElementById('carnet_conadisNO').checked = false;
        document.getElementById('carnet_conadisNO').disabled = false;
        document.getElementById('carnet_conadisSI').disabled = false;
  
        document.getElementById('numero_carnet').value = '';
        document.getElementById('numero_carnet').disabled = false;
  
        document.getElementById('tipo_discapacidad').value = '';
        document.getElementById('tipo_discapacidad').disabled = false;
      }
      break;
    case "carnet_conadis":
      optcarnet_conadis = e.target.value;
      break;
    case "bono_desarrollo":
      optbono_desarrollo = e.target.value;
      break;
  }

})

var form = document.getElementById("form");
form.addEventListener("submit", async function (event) {
    event.preventDefault();

    if(!validate()){
        $.confirm({
          title: 'Registro de Estudiante',
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

    var doc_cedula = document.getElementById('doc_cedula');
    var doc_titulo = document.getElementById('doc_titulo');
    var foto = document.getElementById('foto');
    var filePath1 = doc_cedula.value;
    var filePath2 = doc_titulo.value;
    var filePath3 = foto.value;

    var fc = doc_cedula.files[0]
    var ft = doc_titulo.files[0]
    var fo = foto.files[0]
    
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;

    if(doc_cedula.value != ''){
      if (!allowedExtensions.exec(filePath1)) {
        $.alert({
        title: 'Alerta del Sistema',
        icon: 'fas fa-exclamation-circle',
        content: 'El archivo seleccionado para la cédula no es válido. Debe seleccionar una imagen jpg, jpeg, png o en pdf.',
        type: 'orange',
        theme: 'modern'
        });

        doc_cedula.value = '';
        doc_cedula.className += " is-invalid";
        return;
      } 

      if (fc.size > 2097152) { // 2 MiB for bytes.
        $.alert({
        title: 'Alerta del Sistema',
        icon: 'fas fa-exclamation-circle',
        content: 'La cédula excede el tamaño máximo permitido. Seleccione una imagen con un máximo de 2MB',
        type: 'orange',
        theme: 'modern'
        });
        doc_cedula.value = '';
        doc_cedula.className += " is-invalid";
        return;
      }
    }

    if(doc_titulo.value != ''){    
      if(!allowedExtensions.exec(filePath2)){
        $.alert({
        title: 'Alerta del Sistema',
        icon: 'fas fa-exclamation-circle',
        content: 'El archivo seleccionado para el título no es válido. Debe seleccionar una imagen jpg, jpeg, png o en pdf.',
        type: 'orange',
        theme: 'modern'
        });

        doc_titulo.value = '';
        doc_titulo.className += " is-invalid";
        return;
      }       

      if (ft.size > 2097152) { // 2 MiB for bytes.
        $.alert({
        title: 'Alerta del Sistema',
        icon: 'fas fa-exclamation-circle',
        content: 'El título excede el tamaño máximo permitido. Seleccione una imagen con un máximo de 2MB',
        type: 'orange',
        theme: 'modern'
        });
        doc_titulo.value = '';
        doc_titulo.className += " is-invalid";
        return;
      } 
    }

    if(foto.value != ''){
      if(!allowedExtensions.exec(filePath3)){
        $.alert({
        title: 'Alerta del Sistema',
        icon: 'fas fa-exclamation-circle',
        content: 'El archivo seleccionado para el título no es válido. Debe seleccionar una imagen jpg, jpeg, png o en pdf.',
        type: 'orange',
        theme: 'modern'
        });

        doc_titulo.value = '';
        doc_titulo.className += " is-invalid";
        return;
      }

      if (fo.size > 2097152) { // 2 MiB for bytes.
        $.alert({
        title: 'Alerta del Sistema',
        icon: 'fas fa-exclamation-circle',
        content: 'La foto excede el tamaño máximo permitido. Seleccione una imagen con un máximo de 2MB',
        type: 'orange',
        theme: 'modern'
        });
        doc_titulo.value = '';
        doc_titulo.className += " is-invalid";
        return;
      }
    } 

    const formData = new FormData(form);      
    formData.append('tipo_identificacion', document.getElementById('tipo_identificacion').value);
    formData.append('numero_identificacion', document.getElementById('numero_identificacion').value);
    formData.append('fecha_nacimiento', document.getElementById('fecha_nacimiento').value);
    formData.append('apellido1', document.getElementById('apellido1').value);
    formData.append('apellido2', document.getElementById('apellido2').value);
    formData.append('nombre1', document.getElementById('nombre1').value);
    formData.append('nombre2', document.getElementById('nombre2').value);
    formData.append('sexo', optsexo);
    formData.append('genero', document.getElementById('genero').value);
    formData.append('estado_civil', document.getElementById('estado_civil').value);
    formData.append('etnia', document.getElementById('etnia').value);
    formData.append('tipo_sangre', mayusculas(document.getElementById('tipo_sangre').value));
    formData.append('discapacidad', optdiscapacidad);
    formData.append('porcentaje_discapacidad', document.getElementById('porcentaje_discapacidad').value);
    formData.append('carnet_conadis', optcarnet_conadis);
    formData.append('numero_carnet', document.getElementById('numero_carnet').value);
    formData.append('tipo_discapacidad', document.getElementById('tipo_discapacidad').value);
    formData.append('idpais_nacionalidad', document.getElementById('idpais_nacionalidad').value);
    formData.append('idcanton_nacimiento', document.getElementById('idcanton_nacimiento').value);
    formData.append('idpais_residencia', document.getElementById('idpais_residencia').value);
    formData.append('idcanton_residencia', document.getElementById('idcanton_residencia').value);
    formData.append('correo_electronico', document.getElementById('correo_electronico').value);
    formData.append('numero_celular', document.getElementById('numero_celular').value);
    formData.append('tipo_colegio', document.getElementById('tipo_colegio').value);
    formData.append('ocupacion', document.getElementById('ocupacion').value);
    formData.append('ingresos', document.getElementById('ingresos').value);
    formData.append('bono_desarrollo', optbono_desarrollo);
    formData.append('nivel_formacionp', document.getElementById('nivel_formacionp').value);
    formData.append('nivel_formacionm', document.getElementById('nivel_formacionm').value);
    formData.append('ingresos_hogar', document.getElementById('ingresos_hogar').value);
    formData.append('miembros_hogar', document.getElementById('miembros_hogar').value); 

    await axios.post('https://appit.itsup.edu.ec/secretaria/estudiantes/insert/', formData)
    .then(function (data){        
      if(data){
        $.confirm({
            title: 'Registro de Estudiante',
            icon: 'fa fa-thumbs-up',
            content: 'Datos del estudiante actualizados satisfactoriamente',
            theme: 'modern',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                aceptar: function () {
                window.location.reload();
                }
            }
        });
      } else{
        $.confirm({
          title: 'Registro de Estudiante',
          icon: 'fa fa-exclamation-triangle',
          content: 'No se pudo guardar la información del Estudiante. Vuelva a intentar',
          theme: 'modern',
          type: 'orange',
          typeAnimated: true,
          buttons: {
            aceptar: function () {
    
            }
          }
        });
      }    
    })
    .catch(function (error) {
      $.confirm({
        title: 'Registro de Estudiante',
        icon: 'fa fa-exclamation-triangle',
        content: error,
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

function mayusculas(texto)
{
  return texto.toUpperCase();
}

function minusculas(texto)
{
  return texto.toLowerCase();
}

function validate()
{
  var flag = true;
  if (document.getElementById("tipo_identificacion").value == "") {
    input = document.getElementById("tipo_identificacion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("tipo_identificacion");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("numero_identificacion").value == "") {
    input = document.getElementById("numero_identificacion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("numero_identificacion");
    input.classList.remove("is-invalid");
  }
  // if (document.getElementById("fecha_nacimiento").value == "") {
  //   input = document.getElementById("fecha_nacimiento");
  //   input.className += " is-invalid";
  //   flag = false;
  // } else {
  //   input = document.getElementById("fecha_nacimiento");
  //   input.classList.remove("is-invalid");
  // }
  if (document.getElementById("apellido1").value == "") {
    input = document.getElementById("apellido1");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("apellido1");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("apellido2").value == "") {
    input = document.getElementById("apellido2");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("apellido2");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("nombre1").value == "") {
    input = document.getElementById("nombre1");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nombre1");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("nombre2").value == "") {
    input = document.getElementById("nombre2");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nombre2");
    input.classList.remove("is-invalid");
  }
  
  return flag;
}