var modalMateria = new bootstrap.Modal(document.getElementById('modalMateria'), {
    backdrop: 'static'
});

var modalConcatenada = new bootstrap.Modal(document.getElementById('modalConcatenada'), {
  backdrop: 'static'
});

function agregaMateria()
{
    modalMateria.show();
}

async function guardarMateria() {
  if (!validate()) {
    $.confirm({
      title: 'Información del Sistema',
      icon: 'fa fa-exclamation-triangle',
      content: 'Todos los campos son obligatorios',
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

  let codigo = document.getElementById("codigo").value;
  let materia = document.getElementById("materia").value;
  let idconcatenada = 0;
  let creditos = document.getElementById("creditos").value;

  await axios.post(DIR + 'catalogomateria/insertmateria/', {
    codigo,
    materia,
    idconcatenada,
    creditos
  })
  .then(function (res) {
    let info = res.data;
   
    if (info) {
      $.confirm({
        title: 'Información del Sistema',
        icon: 'fa fa-thumbs-up',
        content: 'Acción completada satisfactoriamente',
        theme: 'modern',
        type: 'blue',
        typeAnimated: true,
        buttons: {
          aceptar: async function () {
            location.reload();
          }
        }
      });
    } else {
      $.confirm({
        title: 'Información del Sistema',
        icon: 'fa fa-exclamation-triangle',
        content: 'No es posible completar la acción solicitada',
        theme: 'modern',
        type: 'red',
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
      title: 'Información del Sistema',
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

function cerrarMateria()
{
    modalMateria.hide();
}

function agregarConcatenada(idmateria){
  document.getElementById("idmateria").value = idmateria;
  modalConcatenada.show();
}

async function guardarConcatenada(idconcatenada) {
  let idmateria = document.getElementById("idmateria").value;

  await axios.post(DIR + 'catalogomateria/insertconcatenada/', {
    idmateria,
    idconcatenada
 })
  .then(function (res) {
    let info = res.data;

    if (info) {
      $.confirm({
        title: 'Información del Sistema',
        icon: 'fa fa-thumbs-up',
        content: 'Acción completada satisfactoriamente',
        theme: 'modern',
        type: 'blue',
        typeAnimated: true,
        buttons: {
          aceptar: async function () {
            location.reload();
          }
        }
      });
    } else {
      $.confirm({
        title: 'Información del Sistema',
        icon: 'fa fa-exclamation-triangle',
        content: 'No es posible completar la acción solicitada',
        theme: 'modern',
        type: 'red',
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
      title: 'Información del Sistema',
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

function cerrarConcatenada()
{
    modalConcatenada.hide();
}

function validate()
{
  var flag = true;
  if (document.getElementById("codigo").value == "") {
    input = document.getElementById("codigo");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("codigo");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("materia").value == "") {
    input = document.getElementById("materia");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("materia");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("creditos").value == "") {
    input = document.getElementById("creditos");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("creditos");
    input.classList.remove("is-invalid");
  }

  return flag;
}

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

$(document).ready(function () {
  var table = $('#tbConcatenadas').DataTable({
    lengthChange: false,
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
    .appendTo('#tbConcatenadas_wrapper .col-md-6:eq(0)');
});
