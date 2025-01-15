init();

async function init (){
  idestudiante = document.getElementById('idestudiante').value;

  await axios.get(DIR + 'datospersonales/find/'+idestudiante)
  .then(function (res) {
    let info = res.data;

    document.getElementById("tipo_identificacion").value = info.tipo_identificacion;
    document.getElementById("numero_identificacion").value = info.numero_identificacion;
    document.getElementById("apellido1").value = info.apellido1;
    document.getElementById("apellido2").value = info.apellido2;
    document.getElementById("nombre1").value = info.nombre1;
    document.getElementById("nombre2").value = info.nombre2;
    document.getElementById("correo_electronico").value = info.correo_electronico;

    document.getElementById("tipo_identificacion").disabled = true;
    document.getElementById("numero_identificacion").disabled = true;
    document.getElementById("correo_electronico").disabled = true;

    if(info.estado == 'A'){
      var fecha_nacimiento = moment(info.fecha_nacimiento).format("YYYY-MM-DD");
      document.getElementById("fecha_nacimiento").value = fecha_nacimiento;
      if(info.sexo==1){
        document.getElementById("hombre").checked = true;
      } else{
        document.getElementById("mujer").checked = true;
      }
      document.getElementById("genero").value = info.genero;
      document.getElementById("estado_civil").value = info.estado_civil;
      document.getElementById("etnia").value = info.etnia;
      document.getElementById("tipo_sangre").value = info.tipo_sangre;
      if(info.discapacidad==1){
        document.getElementById("discapacidadSI").checked = true;
      } else{
        document.getElementById("discapacidadNO").checked = true;
      }
      document.getElementById("porcentaje_discapacidad").value = info.porcentaje_discapacidad;
      if(info.carnet_conadis==1){
        document.getElementById("carnet_conadisSI").checked = true;
      } else{
        document.getElementById("carnet_conadisNO").checked = true;
      }
      document.getElementById("numero_carnet").value = info.numero_carnet;
      document.getElementById("tipo_discapacidad").value = info.tipo_discapacidad;
      document.getElementById("idpais_nacionalidad").value = info.idpais_nacionalidad;
      document.getElementById("idcanton_nacimiento").value = info.idcanton_nacimiento;
      document.getElementById("idpais_residencia").value = info.idpais_residencia;
      document.getElementById("idcanton_residencia").value = info.idcanton_residencia;
      document.getElementById("numero_celular").value = info.numero_celular;
      document.getElementById("tipo_colegio").value = info.tipo_colegio;
      document.getElementById("ocupacion").value = info.ocupacion;
      document.getElementById("ingresos").value = info.ingresos;
      if(info.bono_desarrollo==1){
        document.getElementById("bono_desarrolloSI").checked = true;
      } else{
        document.getElementById("bono_desarrolloNO").checked = true;
      }
      document.getElementById("nivel_formacionp").value = info.nivel_formacionp;
      document.getElementById("nivel_formacionm").value = info.nivel_formacionm;
      document.getElementById("ingresos_hogar").value = info.ingresos_hogar;
      document.getElementById("miembros_hogar").value = info.miembros_hogar;

      document.getElementById("fecha_nacimiento").disabled = true;
      document.getElementById("apellido1").disabled = true;
      document.getElementById("apellido2").disabled = true;
      document.getElementById("nombre1").disabled = true;
      document.getElementById("nombre2").disabled = true;
      document.getElementById("tipo_identificacion").disabled = true;
      document.getElementById("hombre").disabled = true;
      document.getElementById("mujer").disabled = true;
      document.getElementById("genero").disabled = true;
      document.getElementById("estado_civil").disabled = true;
      document.getElementById("etnia").disabled = true;
      document.getElementById("tipo_sangre").disabled = true;
      document.getElementById("discapacidadSI").disabled = true;
      document.getElementById("discapacidadNO").disabled = true;
      document.getElementById("porcentaje_discapacidad").disabled = true;
      document.getElementById("carnet_conadisSI").disabled = true;
      document.getElementById("carnet_conadisNO").disabled = true;
      document.getElementById("numero_carnet").disabled = true;
      document.getElementById("tipo_discapacidad").disabled = true;
      document.getElementById("idpais_nacionalidad").disabled = true;
      document.getElementById("idcanton_nacimiento").disabled = true;
      document.getElementById("idpais_residencia").disabled = true;
      document.getElementById("idcanton_residencia").disabled = true;
      document.getElementById("numero_celular").disabled = true;
      document.getElementById("tipo_colegio").disabled = true;
      document.getElementById("ocupacion").disabled = true;
      document.getElementById("ingresos").disabled = true;
      document.getElementById("bono_desarrolloSI").disabled = true;
      document.getElementById("bono_desarrolloNO").disabled = true;
      document.getElementById("nivel_formacionp").disabled = true;
      document.getElementById("nivel_formacionm").disabled = true;
      document.getElementById("ingresos_hogar").disabled = true;
      document.getElementById("miembros_hogar").disabled = true;

      document.getElementById("documentos").style.display = "none"
      document.getElementById("btnActualizar").disabled = true;
    }
  })
  .catch(function (error) {
    console.log(error);
  });
}

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

const form = document.getElementById('form');

form.addEventListener('submit', async function (e) {
  e.preventDefault();
  
  if (!validate()) {
    $.confirm({
      title: 'Datos del estudiante',
      icon: 'fa fa-exclamation-triangle',
      content: 'Todos los campos son obligatorios. Complete la información para continuar.',
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

  var doc_cedula = document.getElementById('doc_cedula');
  var doc_titulo = document.getElementById('doc_titulo');
  var foto = document.getElementById('foto');
  var filePath1 = doc_cedula.value;
  var filePath2 = doc_titulo.value;
  var filePath3 = foto.value;

  var fc = doc_cedula.files[0]
  var ft = doc_titulo.files[0]
  var fo = foto.files[0]

  // Allowing file type
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
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
  } else if(!allowedExtensions.exec(filePath2)){
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
  } else if(!allowedExtensions.exec(filePath3)){
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
  }else if (fc.size > 2097152) { // 2 MiB for bytes.
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
  } else if (ft.size > 2097152) { // 2 MiB for bytes.
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
  } else if (fo.size > 2097152) { // 2 MiB for bytes.
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
  } else {    
    //input.classList.remove("is-invalid");
  }

  const formData = new FormData(form);  
  formData.append('idestudiante', document.getElementById('idestudiante').value);
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

  await axios.post(DIR + 'datospersonales/edit/', formData)
  .then(function (response){
    $.confirm({
      title: 'Datos del estudiante',
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
  })
  .catch(function (error) {
    console.log(error);
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

function validate() {
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
  if (document.getElementById("fecha_nacimiento").value == "") {
    input = document.getElementById("fecha_nacimiento");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("fecha_nacimiento");
    input.classList.remove("is-invalid");
  }
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
  if (!document.querySelector('input[name="sexo"]:checked')) {
    var hombre = document.querySelector('input[id="hombre"]');
    var mujer = document.querySelector('input[id="mujer"]');

    hombre.classList.add('is-invalid');
    mujer.classList.add('is-invalid');
    flag = false;
  } else {
    var hombre = document.querySelector('input[id="hombre"]');
    var mujer = document.querySelector('input[id="mujer"]');

    hombre.classList.remove('is-invalid');
    mujer.classList.remove('is-invalid');
  }
  if (document.getElementById("genero").value == "") {
    input = document.getElementById("genero");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("genero");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("estado_civil").value == "") {
    input = document.getElementById("estado_civil");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("estado_civil");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("etnia").value == "") {
    input = document.getElementById("etnia");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("etnia");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("tipo_sangre").value == "") {
    input = document.getElementById("tipo_sangre");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("tipo_sangre");
    input.classList.remove("is-invalid");
  }
  if (!document.querySelector('input[name="discapacidad"]:checked')) {
    var discapacidadSI = document.querySelector('input[id="discapacidadSI"]');
    var discapacidadNO = document.querySelector('input[id="discapacidadNO"]');

    discapacidadSI.classList.add('is-invalid');
    discapacidadNO.classList.add('is-invalid');
    flag = false;
  } else {
    var discapacidadSI = document.querySelector('input[id="discapacidadSI"]');
    var discapacidadNO = document.querySelector('input[id="discapacidadNO"]');

    discapacidadSI.classList.remove('is-invalid');
    discapacidadNO.classList.remove('is-invalid');
  }
  if (document.getElementById("porcentaje_discapacidad").value == "") {
    input = document.getElementById("porcentaje_discapacidad");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("porcentaje_discapacidad");
    input.classList.remove("is-invalid");
  }
  if (!document.querySelector('input[name="carnet_conadis"]:checked')) {
    var carnetconadisSI = document.querySelector('input[id="carnet_conadisSI"]');
    var carnetconadisNO = document.querySelector('input[id="carnet_conadisNO"]');

    carnetconadisSI.classList.add('is-invalid');
    carnetconadisNO.classList.add('is-invalid');
    flag = false;
  } else {
    var carnetconadisSI = document.querySelector('input[id="carnet_conadisSI"]');
    var carnetconadisNO = document.querySelector('input[id="carnet_conadisNO"]');

    carnetconadisSI.classList.remove('is-invalid');
    carnetconadisNO.classList.remove('is-invalid');
  }
  if (document.getElementById("numero_carnet").value == "") {
    input = document.getElementById("numero_carnet");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("numero_carnet");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("tipo_discapacidad").value == "") {
    input = document.getElementById("tipo_discapacidad");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("tipo_discapacidad");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idpais_nacionalidad").value == "") {
    input = document.getElementById("idpais_nacionalidad");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idpais_nacionalidad");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idcanton_nacimiento").value == "") {
    input = document.getElementById("idcanton_nacimiento");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idcanton_nacimiento");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idpais_residencia").value == "") {
    input = document.getElementById("idpais_residencia");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idpais_residencia");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idcanton_residencia").value == "") {
    input = document.getElementById("idcanton_residencia");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idcanton_residencia");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("correo_electronico").value == "") {
    input = document.getElementById("correo_electronico");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("correo_electronico");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("numero_celular").value == "") {
    input = document.getElementById("numero_celular");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("numero_celular");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("tipo_colegio").value == "") {
    input = document.getElementById("tipo_colegio");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("tipo_colegio");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("ocupacion").value == "") {
    input = document.getElementById("ocupacion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("ocupacion");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("ingresos").value == "") {
    input = document.getElementById("ingresos");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("ingresos");
    input.classList.remove("is-invalid");
  }
  if (!document.querySelector('input[name="bono_desarrollo"]:checked')) {
    var bonodesarrolloSI = document.querySelector('input[id="bono_desarrolloSI"]');
    var bonodesarrolloNO = document.querySelector('input[id="bono_desarrolloNO"]');

    bonodesarrolloSI.classList.add('is-invalid');
    bonodesarrolloNO.classList.add('is-invalid');
    flag = false;
  } else {
    var bonodesarrolloSI = document.querySelector('input[id="bono_desarrolloSI"]');
    var bonodesarrolloNO = document.querySelector('input[id="bono_desarrolloNO"]');

    bonodesarrolloSI.classList.remove('is-invalid');
    bonodesarrolloNO.classList.remove('is-invalid');
  }
  if (document.getElementById("nivel_formacionp").value == "") {
    input = document.getElementById("nivel_formacionp");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nivel_formacionp");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("nivel_formacionm").value == "") {
    input = document.getElementById("nivel_formacionm");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("nivel_formacionm");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("ingresos_hogar").value == "") {
    input = document.getElementById("ingresos_hogar");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("ingresos_hogar");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("miembros_hogar").value == "") {
    input = document.getElementById("miembros_hogar");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("miembros_hogar");
    input.classList.remove("is-invalid");
  }

  return flag;
}

function validateEmail() {
  // Get our input reference.
  var emailField = document.getElementById('correo_electronico');

  // Define our regular expression.
  var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

  // Using test we can check if the text match the pattern
  if (validEmail.test(emailField.value)) {
    return true;
  } else {
    return false;
  }
}