var form = document.getElementById("form");
form.addEventListener("submit", async function (event) {
    event.preventDefault();

    if (!validate()) {
        $.confirm({
            title: 'Registro de Docentes',
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

    var tipodocumento = document.getElementById("tipodocumento").value;
    var numerodocumento = document.getElementById("numerodocumento").value;
    var apellido1 = document.getElementById("apellido1").value;
    var apellido2 = document.getElementById("apellido2").value;
    var nombre1 = document.getElementById("nombre1").value;
    var nombre2 = document.getElementById("nombre2").value;

    if(tipodocumento=='Cédula'){
        if(!validateCedula()){
            $.confirm({
                title: 'Registro de Docentes',
                icon: 'fa fa-exclamation-triangle',
                content: 'Número de cédula incorrecto.',
                theme: 'modern',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    aceptar: function () {
    
                    }
                }

            });
            
            document.getElementById('numerodocumento').value = "";
            return;
        }
    }

    var exists = await axios.get(DIR + 'registrodocente/findnumerodocumento' + numerodocumento);
    let info = exists.data;

    if(info.length > 0){
        $.confirm({
            title: 'Registro de Docentes',
            icon: 'fa fa-exclamation-triangle',
            content: 'El número de cédula ya fue ingresado para otro Docente.',
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

    var formData = new FormData(form);
    formData.append("tipodocumento", tipodocumento);
    formData.append("numerodocumento", numerodocumento);
    formData.append("apellido1", apellido1);
    formData.append("apellido2", apellido2);
    formData.append("nombre1", nombre1);
    formData.append("nombre", nombre2);

    await axios.post(DIR + 'registrodocente/insertdocente', formData)
    .then(function (res){
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-info-circle',
            content: 'Docente registrado satisfactoriamente',
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
    .catch(function (error){
        $.confirm({
            title: 'Registro de Docentes',
            icon: 'fa fa-ban',
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

var btnCancelar = document.getElementById("btnCancelar");
btnCancelar.addEventListener("click", function(){
    limpiar();
});

const btnEliminar = document.querySelectorAll(".btnEliminar");
for (var i = 0; i < btnEliminar.length; i++) {
    btnEliminar[i].addEventListener('click', function (event) {
        var iddocente = this.value;

        $.confirm({
            title: 'Eliminar Docente?',
            icon: 'fa fa-question-circle',
            content: 'Desea eliminar el registro seleccionado?',
            theme: 'modern',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                aceptar: async function () {
                    await axios.get(DIR + 'registrodocente/deletedocente/' + iddocente)
                    .then(function (res) {
                        console.log(res)
                        $.confirm({
                            title: 'Información del Sistema',
                            icon: 'fa fa-info-circle',
                            content: 'Docente eliminado satisfactoriamente',
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
                        $.confirm({
                            title: 'Registro de Docentes',
                            icon: 'fa fa-ban',
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
                },
                cancelar: function () {

                }
            }

        });
    });
}

function validate() {
    var flag = true;
    if (document.getElementById("tipodocumento").value == "") {
        input = document.getElementById("tipodocumento");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("tipodocumento");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("numerodocumento").value == "") {
        input = document.getElementById("numerodocumento");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("numerodocumento");
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

    return flag;
}

function validateCedula() {
    var cedula = document.getElementById('numerodocumento').value;
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

  function limpiar()
  {
    document.getElementById("tipodocumento").value = "";
    document.getElementById("numerodocumento").value = "";
    document.getElementById("apellido1").value = "";
    document.getElementById("apellido2").value = "";
    document.getElementById("nombre1").value = "";
    document.getElementById("nombre2").value = "";
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
    }, 
    columns: [
      null,
      //{ "width": "40%" },
      null,
      null,
      null,
      null,
      null,
      null,
      null
    ]
  });

  table.buttons().container()
    .appendTo('#tbLista_wrapper .col-md-6:eq(0)');
});
