tablaDocente();
//tablaTutores();

$("document").ready(async function(){
    let idperiodo = document.getElementById("idperiodo").value;

    await axios.get(DIR + 'tutor/findall/' + idperiodo)
    .then(function (res){
      let info = res.data;

      document.getElementById("tbLista").innerHTML = info;
    })
    .catch(function (res){
        console.log(res.message);
    });
});

function seleccionar(tr_id) {
  //$('#tbListaDocente tr').click(function () {
  //var tr_id = $(this).attr('id');

  let fila = document.getElementById(tr_id);
  let element = fila.getElementsByTagName("td");
  
  document.getElementById("iddocente").value = tr_id;
  document.getElementById("docente").value = element[1].innerHTML;

  cargaCarrera(value = tr_id);
};

async function cargaCarrera(iddocente)
{
  var optcarrera = document.querySelectorAll('#idcarrera option');
  optcarrera.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  const idperiodo = document.getElementById("idperiodo").value;
  var IdDocente = document.getElementById("iddocente");

  if(IdDocente.value != "") {
    await axios.post(DIR + 'carrera/findcarreradocente/', {
        idperiodo,
        iddocente
    })
    .then(function (res){
        let info = res.data;

        $('#idcarrera').append($('<option />', {
            text: "-- Seleccione Carrera --",
            value: "",
        }));

        $('#idnivel').append($('<option />', {
            text: "-- Seleccione Curso --",
            value: "",
        }));

        $('#idseccion').append($('<option />', {
            text: "-- Seleccione Sección --",
            value: "",
        }));

        $('#modalidad').append($('<option />', {
            text: "-- Seleccione Modalidad --",
            value: "",
        }));

        for (i = 0; i <= info.length - 1; i++) {
            $('#idcarrera').append($('<option />', {
                text: info[i].carrera,
                value: info[i].idcarrera,
            }));
        }
    })
  } else{
    $('#idcarrera').append($('<option />', {
        text: "-- Seleccione Carrera --",
        value: "",
    }));

    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));

    $('#idseccion').append($('<option />', {
      text: "-- Seleccione Sección --",
      value: "",
    }));

    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
      value: "",
    }));
  }
}

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener('change', async function () 
{
  let idperiodo = document.getElementById("idperiodo").value;
  
  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optseccion = document.querySelectorAll('#idseccion option');
  optseccion.forEach(o => o.remove());

  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.get(DIR + 'seccion/findseccionidperiodo/' + idperiodo )
    .then(function (res){
      let info = res.data;
      
      $('#idseccion').append($('<option />', {
        text: "-- Seleccione Sección --",
        value: "",
      }));
      
      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      $('#modalidad').append($('<option />', {
        text: "-- Seleccione Modalidad --",
        value: "",
      }));
      
      for(i = 0; i<=info.length-1; i++)
      {
        $('#idseccion').append($('<option />', {
          text: info[i].seccion,
          value: info[i].idseccion,
        }));
      }
    });
  } else{
    $('#idseccion').append($('<option />', {
      text: "-- Seleccione Sección --",
      value: "",
    }));

    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
      value: "",
    }));

    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));
  }
});

var cmbIdSeccion = document.getElementById("idseccion");
cmbIdSeccion.addEventListener('change', function () {
  var optmodalidad = document.querySelectorAll('#modalidad option');
  optmodalidad.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  if(cmbIdSeccion.value != "") {
      $('#modalidad').append($('<option />', {
        text: "-- Seleccione Modalidad --",
        value: "",
      }));
      $('#modalidad').append($('<option />', {
        text: "Presencial",
        value: "Presencial",
      }));
      $('#modalidad').append($('<option />', {
        text: "Virtual",
        value: "Virtual",
      }));

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));
  } else{
    $('#modalidad').append($('<option />', {
      text: "-- Seleccione Modalidad --",
      value: "",
    }));

    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));
  }
})

var cmbModalidad = document.getElementById("modalidad");
cmbModalidad.addEventListener('change', async function () {
  let idperiodo = document.getElementById("idperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let iddocente = document.getElementById("iddocente").value;

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  if(cmbModalidad.value != "") {
    await axios.post(DIR + 'docente/finddocentecarreracurso/', {
      idperiodo,
      idcarrera,
      iddocente
    })
    .then(function (res){
      let info = res.data;

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));
   
      for(i = 0; i<=info.length-1; i++)
      {
        
        $('#idnivel').append($('<option />', {
          text: info[i].nivel,
          value: info[i].idnivel,
        }));
      }
    });
  } else{
    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));
  }
  
});

var form = document.getElementById("form");
form.addEventListener("submit", async function(event){
  event.preventDefault();

  if(!validate()){
    $.confirm({
      title: 'Registro de Tutor',
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

  var idperiodo = document.getElementById("idperiodo").value;
  var iddocente = document.getElementById("iddocente").value;
  var idcarrera = document.getElementById("idcarrera").value;
  var idseccion = document.getElementById("idseccion").value;
  var modalidad = document.getElementById("modalidad").value;
  var idnivel   = document.getElementById("idnivel").value;

  await axios.post(DIR + 'tutor/inserttutor/', {
    idperiodo,
    iddocente,
    idcarrera,
    idnivel,
    idseccion,
    modalidad
  })
  .then(function (res){   
    let info = res.data;    
    
    $.confirm({
      title: 'Registro de Tutor',
      icon: 'fa fa-info-circle',
      content: 'Se registró el Tutor de forma satisfactoria',
      theme: 'modern',
      type: 'blue',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          location.reload();
        }
      }
    });
  });
});

function editTutor(idtutor)
{
  console.log(idtutor)
}

function deleteTutor(idtutor)
{
  console.log(idtutor)
}

function validate() {
  var flag = true;
  if (document.getElementById("iddocente").value == "") {
      input = document.getElementById("docente");
      input.className += " is-invalid";
      flag = false;
  } else {
      input = document.getElementById("docente");
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

  return flag;
}

function tablaTutores()
{
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
    },
  });

  table.buttons().container()
    .appendTo('#tbLista_wrapper .col-md-6:eq(0)');
}

function tablaDocente() {
    var table = $('#tbListaDocente').DataTable({
      lengthChange: false,
      //buttons: ['copy', 'excel', 'pdf', 'colvis'],
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
      .appendTo('#tbListaDocente_wrapper .col-md-6:eq(0)');
}
