init();

$(document).ready(function () {
  var table = $('#tbLista').DataTable({
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'colvis'],
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

document.getElementById("btnVolver").addEventListener("click", function(){
  document.getElementById("tabla").style.display = "block";
  document.getElementById("datos").style.display = "none";
});

async function datosEstudiante(numero_identificacion)
{
  await axios.get('https://appit.itsup.edu.ec/secretaria/solicitudvalidacion/findcedula' + numero_identificacion)
  .then(function (res) {
    let info = res.data[0];

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

    document.getElementById("tabla").style.display = 'none';
    document.getElementById("datos").style.display = 'block';
  })
}

async function inconsistencia(numero_identificacion){
  $.confirm({
    title: 'Inconsistencia de datos',
    icon: 'fa fa-question-circle',
    content: 'Se solicitará al estudiante que vuelva a actualizar su información en el sistema. Desea continuar?',
    theme: 'modern',
    type: 'orange',
    typeAnimated: true,
    buttons: {
      aceptar: async function () {
        await axios.get('https://appit.itsup.edu.ec/secretaria/solicitudvalidacion/inconsistenciadatos' + numero_identificacion)
        .then(function (res) {
          window.location.reload();
        })
      },
      cancelar: function() {

      }
    }
  });
}

async function rechazar(idmatricula)
{
  $.confirm({
    title: 'Rechazar postulación',
    icon: 'fa fa-exclamation-triangle',
    content: 'Se procederá a rechazar la postulación de la matrícula y se notificará al estudiante. No se podrán deshacer los cambios realizados. Desea continuar?',
    theme: 'modern',
    type: 'red',
    typeAnimated: true,
    buttons: {
      aceptar: async function () {
        await axios.get('https://appit.itsup.edu.ec/secretaria/solicitudvalidacion/rechazarmatricula/' + idmatricula)
        .then(function (res) {
          console.log(res);
          window.location.reload();
        })
      },
      cancelar: function() {

      }
    }
  });
}

function init()
{
  document.getElementById("tipo_identificacion").disabled = true;
  document.getElementById("numero_identificacion").disabled = true;
  document.getElementById("fecha_nacimiento").disabled = true;
  document.getElementById("apellido1").disabled = true;
  document.getElementById("apellido2").disabled = true;
  document.getElementById("nombre1").disabled = true;
  document.getElementById("nombre2").disabled = true;
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
  document.getElementById("correo_electronico").disabled = true;
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

  document.getElementById("datos").style.display = 'none';
}