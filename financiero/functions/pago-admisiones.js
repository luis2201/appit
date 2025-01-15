const frmNuevo = document.getElementById('frmNuevo');
const frmPago = document.getElementById('frmPago');

document.getElementById("documentoidentificacion").disabled = true;
document.getElementById("numeroidentificacion").disabled = true;
document.getElementById("estudiante").disabled = true;
document.getElementById("valorpagar").disabled = true;
document.getElementById("fechapago").value = moment().format("YYYY-MM-DD");
document.getElementById("fechapago").disabled = true;
document.getElementById("numerofactura").disabled = true;
document.getElementById("valorpago").disabled = true;

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
  
    let numero_identificacion = document.getElementById('numero_identificacion').value;
    let res = await axios.get(DIR + 'pagoadmisiones/findidentificacion/' + numero_identificacion);
  
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

    res = await axios.post(DIR + 'pagoadmisiones/findcorreo/', {correo_electronico});
  
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
  
    await axios.post(DIR + 'pagoadmisiones/insert/', formData)
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
  
async function seleccionar(idadmisiones)
{
  document.getElementById("btnRegistrarPago").disabled = false;

  await axios.get(DIR + 'pagoadmisiones/findadmisionesid/' + idadmisiones)
  .then(async function (res) {
    let info = res.data;

    document.getElementById("idadmisiones").value = info.idadmisiones;
    document.getElementById("documentoidentificacion").value = info.tipo_identificacion;
    document.getElementById("numeroidentificacion").value = info.numero_identificacion;
    document.getElementById("estudiante").value = info.apellido1+' '+info.apellido2+' '+info.nombre1+' '+info.nombre2;

    let idadmisiones = document.getElementById("idadmisiones").value;
    let idperiodo =  document.getElementById("txtidperiodo").value;
    
    res = await axios.post(DIR + 'pagoadmisiones/findpagoadmisiones/',{
      idadmisiones,
      idperiodo
    });

    if(res.data == false){
      document.getElementById("fechapago").disabled = false;
      document.getElementById("numerofactura").disabled = false;
      document.getElementById("valorpago").disabled = false;
      
      document.getElementById("valorpagar").value = "40.00";
      document.getElementById("fechapago").value = moment().format("YYYY-MM-DD");
      document.getElementById("numerofactura").value = "";
      document.getElementById("valorpago").value = "";

      return;
    } 
    
    let infopagos = res.data;
    document.getElementById("valorpagar").value = infopagos.valorpagar;
    document.getElementById("fechapago").value = infopagos.fechapago;
    document.getElementById("numerofactura").value = infopagos.numerofactura;
    document.getElementById("valorpago").value = infopagos.valorpago;

    document.getElementById("btnRegistrarPago").disabled = true;
  })
  .catch(function (error) {
    console.log(error)
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

frmPago.addEventListener('submit', async function (e) {
    e.preventDefault();
    idadmisiones = document.getElementById("idadmisiones").value;
    
    if(idadmisiones == 0){
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
  
    var valorpagar = parseFloat(document.getElementById("valorpagar").value);
    var valorpago = parseFloat(document.getElementById("valorpago").value);
  
    if(valorpago > valorpagar){
      $.confirm({
        title: 'Registro de pago',
        icon: 'fa fa-exclamation-triangle',
        content: 'El valor del pago es mayor al valor de la inscripción',
        theme: 'modern',
        type: 'orange',
        typeAnimated: true,
        buttons: {
          aceptar: function () {
  
          }
        }
      });    
    } else if(valorpago < valorpagar){
      $.confirm({
        title: 'Registro de pago',
        icon: 'fa fa-exclamation-triangle',
        content: 'El valor del pago es menor al valor de la inscripción',
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
      formData.append('idadmisiones', document.getElementById('idadmisiones').value);
      formData.append('idperiodo', document.getElementById('txtidperiodo').value);
      formData.append('valorpagar', document.getElementById('valorpagar').value);
      formData.append('fechapago', document.getElementById('fechapago').value);
      formData.append('numerofactura', document.getElementById('numerofactura').value);
      formData.append('valorpago', document.getElementById('valorpago').value);
      await axios.post(DIR + 'pagoadmisiones/insertpago/', formData)
      .then(function (res){
        let info = res.data;
        /****************************************************** */
        $.confirm({
          title: 'Registro de cuenta',
          icon: 'fa fa-thumbs-up',
          content: 'Pago procesado satisfactoriamente',
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

  function validatePago() {
    var flag = true;
    
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