$(document).ready(function () {
    var table = $('#tbDocentes').DataTable({
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
            null,
            null,
            null,
            null
        ]
    });
});

function cargaMaterias(data) {
    $('#tbMaterias').DataTable({
        destroy:true,
        data : data,
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
            {"data" : "idmateria"},
            {"data" : "codigo"},
            {"data" : "materia"},
            {'defaultContent':'<button type="button" class="form btn btn-sm btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i></button>'}      
        ],
        
    });
}

document.getElementById("docente").disabled = true;
document.getElementById("materia").disabled = true;

var modalDocente = new bootstrap.Modal(document.getElementById("docenteModal"));
var btnBuscarD = document.getElementById("btnBuscarD");
btnBuscarD.addEventListener("click", function () {
    modalDocente.show();
});

async function agregarDocente(iddocente) {
    let fila = document.getElementById(iddocente);
    let celda = fila.getElementsByTagName("td");

    document.getElementById("iddocente").value = iddocente;
    document.getElementById("docente").value = celda[1].innerHTML + ' ' + celda[2].innerHTML;

    const idperiodo = document.getElementById("idperiodo").value; 
    
    await axios.post(DIR + 'cargahoraria/findcargadocente/', {
        iddocente,
        idperiodo
    })
    .then(function (res) {
        let info = res.data;
        cargaMateriaDocente(info);

        modalDocente.hide();
    }).catch(function (error) {
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

var modalMateria = new bootstrap.Modal(document.getElementById("materiaModal"));
var btnBuscarM = document.getElementById("btnBuscarM");
btnBuscarM.addEventListener("click", async function () {
    let idperiodo = document.getElementById("idperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;
    let idnivel = document.getElementById("idnivel").value;

    if (idcarrera == "") {
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'Seleccione Carrera.',
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

    if (idnivel == "") {
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'Seleccione Nivel.',
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

    await axios.post(DIR + 'cargahoraria/findmateriamalla/', {
        idperiodo,
        idcarrera,
        idnivel
    })
    .then(function (res) {
        let info = res.data;
        
        cargaMaterias(info);
        modalMateria.show();
    }).catch(function (error) {
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
});

$('#tbMaterias tbody').on('click', 'button.form', function () //Al hacer click sobre el boton button.form de la linea de arriba
{
    var tabla = $('#tbMaterias').DataTable();
    var data_form = tabla.row($(this).parents("tr")).data();
    
    document.getElementById("idmateria").value = data_form.idmateria;
    document.getElementById("materia").value = data_form.codigo +" "+ data_form.materia;

    modalMateria.hide();
});

const form = document.getElementById("form");
form.addEventListener("submit", async function(e)
{
    e.preventDefault();
    
    if(!validate()){
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'Los campos marcados con rojo son obligatorios.',
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

    const formData = new FormData(form);
    formData.append("iddocente", document.getElementById("iddocente").value);
    formData.append("idperiodo", document.getElementById("idperiodo").value);
    formData.append("idcarerra", document.getElementById("idcarrera").value);
    formData.append("idnivel", document.getElementById("idnivel").value);
    formData.append("idmateria", document.getElementById("idmateria").value);
    formData.append("idseccion", document.getElementById("idseccion").value);
    formData.append("modalidad", document.getElementById("modalidad").value);
    formData.append("horas", document.getElementById("horas").value);

    let valida = await axios.post(DIR + 'cargahoraria/validacarga/', formData);
    if(valida.data.length>0){
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-exclamation-triangle',
            content: 'La materia ya fue ingresada. Revise la información y vuelva a intentar.',
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

    await axios.post(DIR + 'cargahoraria/insert', formData)
    .then(function(res) {
        let info = res.data;
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa-info-circle',
            content: 'Carga horaria registrada satisfactoriamente',
            theme: 'modern',
            type: 'blue',
            typeAnimated: true,
            buttons: {
              aceptar: async function () {
                const idperiodo = document.getElementById("idperiodo").value; 
                let iddocente = document.getElementById("iddocente").value;
                await axios.post(DIR + 'cargahoraria/findcargadocente/', {
                    iddocente,
                    idperiodo
                })
                .then(function (res) {
                    let info = res.data;
            
                    cargaMateriaDocente(info);

                    modalDocente.hide();
                }).catch(function (error) {
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
            }
        });        
    })
    .catch(function(error){
        $.confirm({
            title: 'Información del Sistema',
            icon: 'fa fa fa-times',
            content: error.data,
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

function validate()
{
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
  if (document.getElementById("idnivel").value == "") {
    input = document.getElementById("idnivel");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idnivel");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idmateria").value == "") {
    input = document.getElementById("materia");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("materia");
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

async function cargaMateriaDocente(data)
{
    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    tbody.innerHTML = data;
    // var tabla = $('#tbLista').DataTable({
    //     destroy:true,
    //     data : data,
    //     lengthChange: false,
    //     buttons: ['copy', 'excel', 'pdf', 'colvis'],
    //     language: {
    //         "processing": "Procesando...",
    //         "lengthMenu": "Mostrar _MENU_ registros",
    //         "zeroRecords": "No se encontraron resultados",
    //         "emptyTable": "Ningún dato disponible en esta tabla",
    //         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    //         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    //         "search": "Buscar:",
    //         "infoThousands": ",",
    //         "loadingRecords": "Cargando...",
    //         "paginate": {
    //             "first": "Primero",
    //             "last": "Último",
    //             "next": "Siguiente",
    //             "previous": "Anterior"
    //         },
    //         "aria": {
    //             "sortAscending": ": Activar para ordenar la columna de manera ascendente",
    //             "sortDescending": ": Activar para ordenar la columna de manera descendente"
    //         },
    //         "buttons": {
    //             "copy": "Copiar",
    //             "colvis": "Visibilidad",
    //             "collection": "Colección",
    //             "colvisRestore": "Restaurar visibilidad",
    //             "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
    //             "copySuccess": {
    //                 "1": "Copiada 1 fila al portapapeles",
    //                 "_": "Copiadas %ds fila al portapapeles"
    //             },
    //             "copyTitle": "Copiar al portapapeles",
    //             "csv": "CSV",
    //             "excel": "Excel",
    //             "pageLength": {
    //                 "-1": "Mostrar todas las filas",
    //                 "_": "Mostrar %d filas"
    //             },
    //             "pdf": "PDF",
    //             "print": "Imprimir",
    //             "renameState": "Cambiar nombre",
    //             "updateState": "Actualizar",
    //             "createState": "Crear Estado",
    //             "removeAllStates": "Remover Estados",
    //             "removeState": "Remover",
    //             "savedStates": "Estados Guardados",
    //             "stateRestore": "Estado %d"
    //         },
    //         "autoFill": {
    //             "cancel": "Cancelar",
    //             "fill": "Rellene todas las celdas con <i>%d<\/i>",
    //             "fillHorizontal": "Rellenar celdas horizontalmente",
    //             "fillVertical": "Rellenar celdas verticalmentemente"
    //         },
    //         "decimal": ",",
    //         "searchBuilder": {
    //             "add": "Añadir condición",
    //             "button": {
    //                 "0": "Constructor de búsqueda",
    //                 "_": "Constructor de búsqueda (%d)"
    //             },
    //             "clearAll": "Borrar todo",
    //             "condition": "Condición",
    //             "conditions": {
    //                 "date": {
    //                     "after": "Despues",
    //                     "before": "Antes",
    //                     "between": "Entre",
    //                     "empty": "Vacío",
    //                     "equals": "Igual a",
    //                     "notBetween": "No entre",
    //                     "notEmpty": "No Vacio",
    //                     "not": "Diferente de"
    //                 },
    //                 "number": {
    //                     "between": "Entre",
    //                     "empty": "Vacio",
    //                     "equals": "Igual a",
    //                     "gt": "Mayor a",
    //                     "gte": "Mayor o igual a",
    //                     "lt": "Menor que",
    //                     "lte": "Menor o igual que",
    //                     "notBetween": "No entre",
    //                     "notEmpty": "No vacío",
    //                     "not": "Diferente de"
    //                 },
    //                 "string": {
    //                     "contains": "Contiene",
    //                     "empty": "Vacío",
    //                     "endsWith": "Termina en",
    //                     "equals": "Igual a",
    //                     "notEmpty": "No Vacio",
    //                     "startsWith": "Empieza con",
    //                     "not": "Diferente de",
    //                     "notContains": "No Contiene",
    //                     "notStartsWith": "No empieza con",
    //                     "notEndsWith": "No termina con"
    //                 },
    //                 "array": {
    //                     "not": "Diferente de",
    //                     "equals": "Igual",
    //                     "empty": "Vacío",
    //                     "contains": "Contiene",
    //                     "notEmpty": "No Vacío",
    //                     "without": "Sin"
    //                 }
    //             },
    //             "data": "Data",
    //             "deleteTitle": "Eliminar regla de filtrado",
    //             "leftTitle": "Criterios anulados",
    //             "logicAnd": "Y",
    //             "logicOr": "O",
    //             "rightTitle": "Criterios de sangría",
    //             "title": {
    //                 "0": "Constructor de búsqueda",
    //                 "_": "Constructor de búsqueda (%d)"
    //             },
    //             "value": "Valor"
    //         },
    //         "searchPanes": {
    //             "clearMessage": "Borrar todo",
    //             "collapse": {
    //                 "0": "Paneles de búsqueda",
    //                 "_": "Paneles de búsqueda (%d)"
    //             },
    //             "count": "{total}",
    //             "countFiltered": "{shown} ({total})",
    //             "emptyPanes": "Sin paneles de búsqueda",
    //             "loadMessage": "Cargando paneles de búsqueda",
    //             "title": "Filtros Activos - %d",
    //             "showMessage": "Mostrar Todo",
    //             "collapseMessage": "Colapsar Todo"
    //         },
    //         "select": {
    //             "cells": {
    //                 "1": "1 celda seleccionada",
    //                 "_": "%d celdas seleccionadas"
    //             },
    //             "columns": {
    //                 "1": "1 columna seleccionada",
    //                 "_": "%d columnas seleccionadas"
    //             },
    //             "rows": {
    //                 "1": "1 fila seleccionada",
    //                 "_": "%d filas seleccionadas"
    //             }
    //         },
    //         "thousands": ".",
    //         "datetime": {
    //             "previous": "Anterior",
    //             "next": "Proximo",
    //             "hours": "Horas",
    //             "minutes": "Minutos",
    //             "seconds": "Segundos",
    //             "unknown": "-",
    //             "amPm": [
    //                 "AM",
    //                 "PM"
    //             ],
    //             "months": {
    //                 "0": "Enero",
    //                 "1": "Febrero",
    //                 "10": "Noviembre",
    //                 "11": "Diciembre",
    //                 "2": "Marzo",
    //                 "3": "Abril",
    //                 "4": "Mayo",
    //                 "5": "Junio",
    //                 "6": "Julio",
    //                 "7": "Agosto",
    //                 "8": "Septiembre",
    //                 "9": "Octubre"
    //             },
    //             "weekdays": [
    //                 "Dom",
    //                 "Lun",
    //                 "Mar",
    //                 "Mie",
    //                 "Jue",
    //                 "Vie",
    //                 "Sab"
    //             ]
    //         },
    //         "editor": {
    //             "close": "Cerrar",
    //             "create": {
    //                 "button": "Nuevo",
    //                 "title": "Crear Nuevo Registro",
    //                 "submit": "Crear"
    //             },
    //             "edit": {
    //                 "button": "Editar",
    //                 "title": "Editar Registro",
    //                 "submit": "Actualizar"
    //             },
    //             "remove": {
    //                 "button": "Eliminar",
    //                 "title": "Eliminar Registro",
    //                 "submit": "Eliminar",
    //                 "confirm": {
    //                     "_": "¿Está seguro que desea eliminar %d filas?",
    //                     "1": "¿Está seguro que desea eliminar 1 fila?"
    //                 }
    //             },
    //             "error": {
    //                 "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
    //             },
    //             "multi": {
    //                 "title": "Múltiples Valores",
    //                 "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
    //                 "restore": "Deshacer Cambios",
    //                 "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
    //             }
    //         },
    //         "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    //         "stateRestore": {
    //             "creationModal": {
    //                 "button": "Crear",
    //                 "name": "Nombre:",
    //                 "order": "Clasificación",
    //                 "paging": "Paginación",
    //                 "search": "Busqueda",
    //                 "select": "Seleccionar",
    //                 "columns": {
    //                     "search": "Búsqueda de Columna",
    //                     "visible": "Visibilidad de Columna"
    //                 },
    //                 "title": "Crear Nuevo Estado",
    //                 "toggleLabel": "Incluir:"
    //             },
    //             "emptyError": "El nombre no puede estar vacio",
    //             "removeConfirm": "¿Seguro que quiere eliminar este %s?",
    //             "removeError": "Error al eliminar el registro",
    //             "removeJoiner": "y",
    //             "removeSubmit": "Eliminar",
    //             "renameButton": "Cambiar Nombre",
    //             "renameLabel": "Nuevo nombre para %s",
    //             "duplicateError": "Ya existe un Estado con este nombre.",
    //             "emptyStates": "No hay Estados guardados",
    //             "removeTitle": "Remover Estado",
    //             "renameTitle": "Cambiar Nombre Estado"
    //         }
    //     },
    //     columns: [
    //         {"data" : "carrera"},
    //         {"data" : "nivel"},
    //         {"data" : "seccion"},
    //         {"data" : "codigo"},
    //         {"data" : "materia"},
    //         {"data" : "modalidad"},
    //         {"data" : "horas"},
    //         {'defaultContent':'<button type="button" class="form btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>'}
    //     ],
        
    // });

    const idperiodo = document.getElementById("idperiodo").value; 
    let iddocente = document.getElementById("iddocente").value;
    await axios.post(DIR + 'cargahoraria/totalhorasdocente/', {
        iddocente,
        idperiodo
    })
    .then(function (res) {
        let info = res.data[0];
        if(info.horas>0){
            document.getElementById("total").innerHTML = 'TOTAL HORAS: ' + info.horas;
        } else{
            document.getElementById("total").innerHTML = 'TOTAL HORAS: 0';
        }
    }).catch(function (error) {
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

var btnCancelar = document.getElementById("btnCancelar");
btnCancelar.addEventListener("click", function(event){
    // document.getElementById("iddocente").value = "";
    // document.getElementById("docente").value = "";
    // document.getElementById("idcarrera").value = "";
    // document.getElementById("idnivel").value = "";
    // document.getElementById("idmateria").value = "";
    // document.getElementById("materia").value = "";
    // document.getElementById("idseccion").value = "";
    // document.getElementById("modalidad").value = "";
    // document.getElementById("horas").value = "";
    // document.getElementById("total").innerHTML = "";

    window.location.reload();
});

async function eliminaMateria(iddetalle_cargahoraria)
{
    await axios.get('https://appit.itsup.edu.ec/academico/cargahoraria/deletecargahoraria/' + iddetalle_cargahoraria )
    .then(async function (res) {
        const idperiodo = document.getElementById("idperiodo").value; 
        let iddocente = document.getElementById("iddocente").value;
        await axios.post('https://appit.itsup.edu.ec/academico/cargahoraria/findcargadocente/', {
            iddocente,
            idperiodo
        })
        .then(function (res) {
            let info = res.data;
    
            cargaMateriaDocente(info);
        }).catch(function (error) {
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
        
    }).catch(function (error) {
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