const frmNuevo = document.getElementById('frmNuevo');
const frmPago = document.getElementById('frmPago');

document.getElementById("documentoidentificacion").disabled = true;
document.getElementById("numeroidentificacion").disabled = true;
document.getElementById("estudiante").disabled = true;
document.getElementById("idcarrera").disabled = true;
document.getElementById("idnivel").disabled = true;
document.getElementById("idseccion").disabled = true;
document.getElementById("modalidad").disabled = true;
document.getElementById("tipo_matricula").disabled = true;
document.getElementById("valormatricula").disabled = true;
document.getElementById("saldo").disabled = true;
document.getElementById("fechapago").value = moment().format("YYYY-MM-DD");
document.getElementById("fechapago").disabled = true;
document.getElementById("numerofactura").disabled = true;
document.getElementById("valorpago").disabled = true;

/***************************************************************/
/*Hay que cambiarla cuando ya esté la carga horaria registrada */
var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function (e) {
  let idperiodo = document.getElementById('idperiodo').value;
  let idcarrera = this.value;
  if(this.value == ""){
    document.getElementById("idnivel").innerHTML = '<option value="">-- Seleccione --</option>';
    return;
  }

  await axios.post(DIR + 'pagomatricula/findnivelcarrera', {
    idperiodo,
    idcarrera
  })
  .then(function (res){
    let info = res.data;    
    document.getElementById("idnivel").innerHTML = info;
  });
})

var cmbIdNivel = document.getElementById("idnivel");
cmbIdNivel.addEventListener("change", async function (e) {
  
  let idperiodo = document.getElementById('idperiodo').value;
  let idcarrera = document.getElementById('idcarrera').value;
  let idnivel = this.value;
  
  if(this.value == ""){
    document.getElementById("idseccion").innerHTML = '<option value="">-- Seleccione --</option>';
    return;
  }

  await axios.post(DIR + 'pagomatricula/findnivelcarreraseccion', {
    idperiodo,
    idcarrera,
    idnivel
  })
  .then(function (res){
    let info = res.data;    
    document.getElementById("idseccion").innerHTML = info;    
  });
})

var cmbIdseccion = document.getElementById("idseccion");
cmbIdseccion.addEventListener("change", async function (e) {  
  
  if(this.value == ""){
    document.getElementById("modalidad").innerHTML = '<option value="">-- Seleccione --</option>';
    return;
  }
  
    document.getElementById("modalidad").innerHTML = '<option value="">-- Seleccione --</option><option value="Presencial">Presencial</option><option value="Virtual">Virtual</option><option value="Híbrida">Híbrida</option>';
})
/***************************************************************/

frmNuevo.addEventListener('submit', async function (e) {
  e.preventDefault();

  if (!validate()) {
    $.confirm({
      title: 'Registro de cuenta',
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

  documento = document.getElementById('tipo_identificacion').value;
  cedula = document.getElementById('numero_identificacion').value;

  if (documento == 'Cédula') {
    if (!validateCedula()) {
      $.confirm({
        title: 'Registro de cuenta',
        icon: 'fa fa-exclamation-triangle',
        content: 'Número de cédula incorrecto.',
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
  }

  // if (!validateEmail()) {
  //   $.confirm({
  //     title: 'Registro de estudiante',
  //     icon: 'fa fa-exclamation-triangle',
  //     content: 'El formato del correo electrónico no es el correcto.',
  //     theme: 'modern',
  //     type: 'orange',
  //     typeAnimated: true,
  //     buttons: {
  //       aceptar: function () {

  //       }
  //     }
  //   });

  //   input = document.getElementById("correo_electronico");
  //   input.classList.remove("is-invalid");

  //   return;
  // }

  let numero_identificacion = document.getElementById('numero_identificacion').value;
  let res = await axios.get(DIR + 'pagomatricula/findidentificacion/' + numero_identificacion);

  if (Object.keys(res.data).length > 0) {
    $.confirm({
      title: 'Registro de estudiante',
      icon: 'fa fa-exclamation-triangle',
      content: 'El número de cédula ya se encuentra registrado. Ingrese otro.',
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

  let correo_electronico = document.getElementById('correo_electronico').value;
  res = await axios.post(DIR + 'pagomatricula/findcorreo/', {correo_electronico});

  if (Object.keys(res.data).length > 0) {
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-exclamation-triangle',
      content: 'El correo ya se encuentra registrado. Ingrese otro.',
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

  const formData = new FormData(frmNuevo);
  formData.append('tipo_identificacion', document.getElementById('tipo_identificacion').value);
  formData.append('numero_identificacion', document.getElementById('numero_identificacion').value);
  formData.append('apellido1', mayusculas(document.getElementById('apellido1').value));
  formData.append('apellido2', mayusculas(document.getElementById('apellido2').value));
  formData.append('nombre1', mayusculas(document.getElementById('nombre1').value));
  formData.append('nombre2', mayusculas(document.getElementById('nombre2').value));
  formData.append('correo_electronico', minusculas(document.getElementById('correo_electronico').value));

  await axios.post(DIR + 'pagomatricula/insert/', formData)
  .then(function (response) {    
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-thumbs-up',
      content: 'Estudiante registrado satisfactoriamente',
      theme: 'modern',
      type: 'blue',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          
        }
      }
     });

    document.getElementById('tipo_identificacion').value = "";
    document.getElementById('numero_identificacion').value = "";
    document.getElementById('apellido1').value = "";
    document.getElementById('apellido2').value = "";
    document.getElementById('nombre1').value = "";
    document.getElementById('nombre2').value = "";
    document.getElementById('correo_electronico').value = "";
  })
  .catch(function (error) {
    const info = error.response.data;
    $.confirm({
      title: 'Registro de cuenta',
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
  });

});

$("#nuevoModal").on('hidden.bs.modal', function () {
  document.getElementById("frmNuevo").reset();
  window.location.reload();
});

$("#buscarModal").on('hidden.bs.modal', function () {
  var search = document.querySelector("input[type=search]").value = "";
});

async function seleccionar(idestudiante)
{  
  document.getElementById("btnRegistrarPago").disabled = false;
  
  mostrarCalificaciones(idestudiante);

  await axios.get(DIR + 'pagomatricula/findestudianteid/' + idestudiante)
  .then(async function (res) {
    let info = res.data;

    document.getElementById("idestudiante").value = info.idestudiante;
    document.getElementById("documentoidentificacion").value = info.tipo_identificacion;
    document.getElementById("numeroidentificacion").value = info.numero_identificacion;
    document.getElementById("estudiante").value = info.apellido1+' '+info.apellido2+' '+info.nombre1+' '+info.nombre2;

    let idestudiante = document.getElementById("idestudiante").value;
    let idperiodo =  document.getElementById("idperiodo").value;
    
    res = await axios.post(DIR + 'pagomatricula/findpagomatricula/',{
      idestudiante,
      idperiodo
    });
    
    'use strict';
    let tbody = document.querySelector('#tbPagos tbody');
    tbody.innerHTML = "";

    if(res.data == false){
      document.getElementById("idcarrera").disabled = false;
      document.getElementById("idnivel").disabled = false;
      document.getElementById("idseccion").disabled = false;
      document.getElementById("modalidad").disabled = false;
      document.getElementById("tipo_matricula").disabled = false;
      document.getElementById("fechapago").disabled = false;
      document.getElementById("numerofactura").disabled = false;
      document.getElementById("valorpago").disabled = false;
      
      document.getElementById("tipo_matricula").value = "";
      document.getElementById("valormatricula").value = "";
      document.getElementById("fechapago").value = moment().format("YYYY-MM-DD");
      document.getElementById("numerofactura").value = "";
      document.getElementById("saldo").value = "0.00";
      document.getElementById("valorpago").value = "";

      return;
    } 
    
    let infopagos = res.data;
    let idpagomatricula = infopagos.idpagomatricula;
    document.getElementById("tipo_matricula").value = infopagos.tipo_matricula;
    document.getElementById("valormatricula").value = infopagos.valor_pagar;
    
    document.getElementById("fechapago").disabled = false;
    document.getElementById("numerofactura").disabled = false;
    document.getElementById("valorpago").disabled = false;

    document.getElementById("valorpago").value = "";

    res = await axios.get(DIR + 'pagomatricula/finddetalleidpago/' + idpagomatricula);

    if(res.data){
      let pagos = res.data;
      
      vpagado = 0;
      for (let i = 0; i < pagos.length; i++) {
        let fila = tbody.insertRow();
        fila.insertCell().innerHTML = pagos[i]['fecha_pago'];
        fila.insertCell().innerHTML = pagos[i]['numero_factura'];
        fila.insertCell().innerHTML = pagos[i]['valorpago'];
        vpagado = vpagado + parseFloat(pagos[i]['valorpago']);
      }

      document.getElementById("saldo").value =  document.getElementById("valormatricula").value - vpagado;
      if(document.getElementById("saldo").value == 0){
        document.getElementById("btnRegistrarPago").disabled = true;
      }
    } 
  })
  .catch(function (error) {
    const info = error;
    $.confirm({
      title: 'Registro de cuenta',
      icon: 'fa fa-exclamation-triangle',
      content: info,
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

async function mostrarCalificaciones(idestudiante){  
  // Obtenemos la fila 
  let obtenerFila = document.getElementById(idestudiante);
  // Obtenemos los elementos td de la fila
  let elementosFila = obtenerFila.getElementsByTagName("td");    
  document.getElementById("nombreestudiante").innerHTML = elementosFila[1].innerHTML;
  document.getElementById("nombreestudianteenlinea").innerHTML = elementosFila[1].innerHTML;

  const idperiodo = 21;

  res = await axios.post(DIR + 'matricula/modalidadmatricula/',{
    idestudiante,
    idperiodo
  });
  
  if(res.data.length<=0){
    return;
  }

  let modalidad = res.data[0].modalidad;

  if(modalidad != 'Virtual'){
    'use strict';
    const tbody = document.querySelector('#tbCalificaciones tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'promocion/viewcalificacion', {
      idperiodo,
      idestudiante,
    })
    .then(function (res){   
      let calificaciones = res.data;  

      if(calificaciones.nivel!=null){
        document.getElementById("nivelcarrera").innerHTML = ' - ' + calificaciones.nivel+' - '+calificaciones.carrera
        tbody.innerHTML = calificaciones.rows;

        var myModal = new bootstrap.Modal(document.getElementById('calificacionesModal'))
        myModal.show();
      }
    })
  } else {
    'use strict';
    const tbody = document.querySelector('#tbCalificacionesEnLinea tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'promocion/viewcalificacionenlinea', {
      idperiodo,
      idestudiante,
    })
    .then(function (res){   
      let calificaciones = res.data;  

      if(calificaciones.nivel!=null){
        document.getElementById("nivelcarreraenlinea").innerHTML = ' - ' + calificaciones.nivel+' - '+calificaciones.carrera
        tbody.innerHTML = calificaciones.rows;

        var myModal = new bootstrap.Modal(document.getElementById('calificacionesEnLineaModal'))
        myModal.show();
      }
    })
  }
}

frmPago.addEventListener('submit', async function (e) {
  e.preventDefault();
  idestudiante = document.getElementById("idestudiante").value;
  
  if(idestudiante == 0){
    $.confirm({
      title: 'Registro de pago',
      icon: 'fa fa-exclamation-triangle',
      content: 'Seleccione un estudiante',
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

  if(!validatePago()) {
    $.confirm({
      title: 'Registro de pago',
      icon: 'fa fa-exclamation-triangle',
      content: 'Los campos marcados con rojo con obligatorios',
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
  
  var valormatricula = parseFloat(document.getElementById("valormatricula").value);
  var saldo = parseFloat(document.getElementById("saldo").value);
  var valorpago = parseFloat(document.getElementById("valorpago").value);

  if(saldo == 0 && valorpago > valormatricula){
    $.confirm({
      title: 'Registro de pago',
      icon: 'fa fa-exclamation-triangle',
      content: 'El valor del pago es mayor al valor de la matrícula',
      theme: 'modern',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        aceptar: function () {

        }
      }
    });    
  } else if(saldo > 0 && valorpago >saldo){
    $.confirm({
      title: 'Registro de pago',
      icon: 'fa fa-exclamation-triangle',
      content: 'El valor del pago es mayor al saldo que mantiene pendiente',
      theme: 'modern',
      type: 'orange',
      typeAnimated: true,
      buttons: {
        aceptar: function () {

        }
      }
    });    
  } else{
    const formData = new FormData(frmPago);    
    formData.append('idestudiante', document.getElementById('idestudiante').value);
    formData.append('idperiodo', document.getElementById('idperiodo').value);    
    formData.append('idnivel', document.getElementById("idnivel").value);
    formData.append('idcarrera', document.getElementById("idcarrera").value);
    formData.append('idseccion', document.getElementById("idseccion").value);
    formData.append('modalidad', document.getElementById("modalidad").value);
    formData.append('tipo_matricula', document.getElementById('tipo_matricula').value);
    formData.append('valormatricula', document.getElementById('valormatricula').value);
    formData.append('fecha_pago', document.getElementById('fechapago').value);
    formData.append('numero_factura', document.getElementById('numerofactura').value);
    formData.append('valor_pago', document.getElementById('valorpago').value);

    await axios.post(DIR + 'pagomatricula/insertpago/', formData)
    .then(function (res){
      let info = res.data;
      
      if(info=="No pago"){
        $.confirm({
          title: 'Registro de pago',
          icon: 'fa fa-exclamation-triangle',
          content: 'No fue posible procesar el pago',
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

      if(info=="No matricula"){
        $.confirm({
          title: 'Registro de pago',
          icon: 'fa fa-exclamation-triangle',
          content: 'Existió un error al momento de procesar la matrícula. Contacte a sistemas',
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
      
      $.confirm({
        title: 'Registro de cuenta',
        icon: 'fa fa-thumbs-up',
        content: 'Pago y matrícula procesados satisfactoriamente',
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
  }
})

async function valorMatricula(tipo_matricula)
{
  let idperiodo = document.getElementById("idperiodo").value;

  await axios.get(DIR + 'pagomatricula/findvalormatricula/' + idperiodo )
  .then(function (res) {
    let info = res.data;
    if(tipo_matricula == 'Ordinaria'){
      document.getElementById("valormatricula").value = info.valor_matriculaord;
    } else if(tipo_matricula == 'Extraordinaria'){
      document.getElementById("valormatricula").value = info.valor_matriculaex;
    } else{
      document.getElementById("valormatricula").value = "";
    }
  })
  .catch(function (error) {
    console.log(error);
  });
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
  if (document.getElementById("correo_electronico").value == "") {
    input = document.getElementById("correo_electronico");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("correo_electronico");
    input.classList.remove("is-invalid");
  }

  return flag;
}

function validateCedula() {
  var cedula = document.getElementById('numero_identificacion').value;
  var flag = false;
  if (cedula.length == 10) {
    var digciudad = cedula[0] + cedula[1];
    if (digciudad < 01 || digciudad > 24) {
      flag = false;
    } else {

      var digito = 0;
      var acu = 0;

      for (i = 1; i <= 9; i++) {
        if (i % 2 == 1) {
          digito = cedula[i - 1] * 2;
        } else {
          digito = cedula[i - 1] * 1;
        }
        if (digito > 9) {
          digito = digito - 9;
        }
        acu = acu + digito;
      }

      var veri = acu.toString();
      if (veri[1] == 0) {
        veri = veri[1];
      } else {
        veri = 10 - veri[1];
      }

      if (cedula[9] == veri) {
        flag = true;
      } else {
        flag = false;
      }
    }
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

function validatePago() {
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
  if (document.getElementById("tipo_matricula").value == "") {
    input = document.getElementById("tipo_matricula");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("tipo_matricula");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("numerofactura").value == "") {
    input = document.getElementById("numerofactura");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("numerofactura");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("valorpago").value == "") {
    input = document.getElementById("valorpago");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("valorpago");
    input.classList.remove("is-invalid");
  }

  return flag;
}

function mayusculas(text) {
  return text.charAt(0).toUpperCase() + text.substring(1);
}

function minusculas(text) {
  return text.toLowerCase();
}

$(document).ready(function () {
  var table = $('#tbLista').DataTable({
    lengthChange: false,    
    responsive: true,    
    language: {
      "processing": "Procesando...",
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Ningún dato disponible en esta tabla",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "search": "Buscar:",
      "infoThousands": ",",
      "loadingRecords": "Cargando...",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      },
      "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
          "1": "Copiada 1 fila al portapapeles",
          "_": "Copiadas %ds fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
          "-1": "Mostrar todas las filas",
          "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "renameState": "Cambiar nombre",
        "updateState": "Actualizar",
        "createState": "Crear Estado",
        "removeAllStates": "Remover Estados",
        "removeState": "Remover",
        "savedStates": "Estados Guardados",
        "stateRestore": "Estado %d"
      },
      "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
      },
      "decimal": ",",
      "searchBuilder": {
        "add": "Añadir condición",
        "button": {
          "0": "Constructor de búsqueda",
          "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
          "date": {
            "after": "Despues",
            "before": "Antes",
            "between": "Entre",
            "empty": "Vacío",
            "equals": "Igual a",
            "notBetween": "No entre",
            "notEmpty": "No Vacio",
            "not": "Diferente de"
          },
          "number": {
            "between": "Entre",
            "empty": "Vacio",
            "equals": "Igual a",
            "gt": "Mayor a",
            "gte": "Mayor o igual a",
            "lt": "Menor que",
            "lte": "Menor o igual que",
            "notBetween": "No entre",
            "notEmpty": "No vacío",
            "not": "Diferente de"
          },
          "string": {
            "contains": "Contiene",
            "empty": "Vacío",
            "endsWith": "Termina en",
            "equals": "Igual a",
            "notEmpty": "No Vacio",
            "startsWith": "Empieza con",
            "not": "Diferente de",
            "notContains": "No Contiene",
            "notStartsWith": "No empieza con",
            "notEndsWith": "No termina con"
          },
          "array": {
            "not": "Diferente de",
            "equals": "Igual",
            "empty": "Vacío",
            "contains": "Contiene",
            "notEmpty": "No Vacío",
            "without": "Sin"
          }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
          "0": "Constructor de búsqueda",
          "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
      },
      "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
          "0": "Paneles de búsqueda",
          "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "showMessage": "Mostrar Todo",
        "collapseMessage": "Colapsar Todo"
      },
      "select": {
        "cells": {
          "1": "1 celda seleccionada",
          "_": "%d celdas seleccionadas"
        },
        "columns": {
          "1": "1 columna seleccionada",
          "_": "%d columnas seleccionadas"
        },
        "rows": {
          "1": "1 fila seleccionada",
          "_": "%d filas seleccionadas"
        }
      },
      "thousands": ".",
      "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
          "AM",
          "PM"
        ],
        "months": {
          "0": "Enero",
          "1": "Febrero",
          "10": "Noviembre",
          "11": "Diciembre",
          "2": "Marzo",
          "3": "Abril",
          "4": "Mayo",
          "5": "Junio",
          "6": "Julio",
          "7": "Agosto",
          "8": "Septiembre",
          "9": "Octubre"
        },
        "weekdays": [
          "Dom",
          "Lun",
          "Mar",
          "Mie",
          "Jue",
          "Vie",
          "Sab"
        ]
      },
      "editor": {
        "close": "Cerrar",
        "create": {
          "button": "Nuevo",
          "title": "Crear Nuevo Registro",
          "submit": "Crear"
        },
        "edit": {
          "button": "Editar",
          "title": "Editar Registro",
          "submit": "Actualizar"
        },
        "remove": {
          "button": "Eliminar",
          "title": "Eliminar Registro",
          "submit": "Eliminar",
          "confirm": {
            "_": "¿Está seguro que desea eliminar %d filas?",
            "1": "¿Está seguro que desea eliminar 1 fila?"
          }
        },
        "error": {
          "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
          "title": "Múltiples Valores",
          "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
          "restore": "Deshacer Cambios",
          "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
      },
      "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "stateRestore": {
        "creationModal": {
          "button": "Crear",
          "name": "Nombre:",
          "order": "Clasificación",
          "paging": "Paginación",
          "search": "Busqueda",
          "select": "Seleccionar",
          "columns": {
            "search": "Búsqueda de Columna",
            "visible": "Visibilidad de Columna"
          },
          "title": "Crear Nuevo Estado",
          "toggleLabel": "Incluir:"
        },
        "emptyError": "El nombre no puede estar vacio",
        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
        "removeError": "Error al eliminar el registro",
        "removeJoiner": "y",
        "removeSubmit": "Eliminar",
        "renameButton": "Cambiar Nombre",
        "renameLabel": "Nuevo nombre para %s",
        "duplicateError": "Ya existe un Estado con este nombre.",
        "emptyStates": "No hay Estados guardados",
        "removeTitle": "Remover Estado",
        "renameTitle": "Cambiar Nombre Estado"
      }
    }
  });

  table.buttons().container()
    .appendTo('#tbLista_wrapper .col-md-6:eq(0)');
});