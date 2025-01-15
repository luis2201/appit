var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false, backdrop: 'static'})

async function matricular(idestudiante)
{
    let obtenerFila = document.getElementById(idestudiante);
    let elementosFila = obtenerFila.getElementsByTagName("td"); 

    document.getElementById("numero_identificacion").innerHTML = elementosFila[0].innerHTML
    document.getElementById("estudiante").innerHTML = elementosFila[1].innerHTML;

    document.getElementById("idestudiante").value = idestudiante;
    
    document.getElementById("cmbidperiodo").value = '';
    document.getElementById("idcarrera").value = '';
    document.getElementById("idnivel").value = '';
    document.getElementById("modalidad").value = '';
    document.getElementById("tabla").innerHTML = '';

    document.getElementById("cmbidperiodo").disabled = false;
    document.getElementById("idcarrera").disabled = false;
    document.getElementById("idnivel").disabled = false;
    document.getElementById("modalidad").disabled = false;
    document.getElementById("btnMatricular").disabled = false;
    
    myModal.show();
}

const cmbIdPeriodo = document.getElementById("cmbidperiodo");
cmbIdPeriodo.addEventListener("change", async function(){
    let idestudiante = document.getElementById("idestudiante").value;
    let idperiodo = this.value;

    await axios.post('https://appit.itsup.edu.ec/secretaria/registromatricula/findidmatricula', {
        idestudiante,
        idperiodo
    })
    .then(async function (res) {
        let matricula = res.data;

        if(matricula.length>0){
            document.getElementById("cmbidperiodo").value = matricula[0].idperiodo;
            document.getElementById("idcarrera").value = matricula[0].idcarrera;
            document.getElementById("idnivel").value = matricula[0].idnivel;
            document.getElementById("modalidad").value = matricula[0].modalidad;
        
            document.getElementById("cmbidperiodo").disabled = true;
            document.getElementById("idcarrera").disabled = true;
            document.getElementById("idnivel").disabled = true;
            document.getElementById("modalidad").disabled = true;
            document.getElementById("btnMatricular").disabled = true;

            let idestudiante = document.getElementById("idestudiante").value;
            let idcarrera = document.getElementById("idcarrera").value;

            await axios.post('https://appit.itsup.edu.ec/secretaria/registromatricula/findallmateriaperiodocarrera', {
                idestudiante,
                idperiodo,
                idcarrera
            })
            .then(function (res){
                let materias = res.data;

                document.getElementById("tabla").innerHTML = materias;
            })
        }
    })
    .catch(function (error) {
        $.confirm({
            title: 'Registro de matrícula',
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

$(document).ready(function () {
    var table = $('#tbLista').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis'],
        // language: {
        //     "processing": "Procesando...",
        //     "lengthMenu": "Mostrar _MENU_ registros",
        //     "zeroRecords": "No se encontraron resultados",
        //     "emptyTable": "Ningún dato disponible en esta tabla",
        //     "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        //     "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        //     "search": "Buscar:",
        //     "infoThousands": ",",
        //     "loadingRecords": "Cargando...",
        //     "paginate": {
        //         "first": "Primero",
        //         "last": "Último",
        //         "next": "Siguiente",
        //         "previous": "Anterior"
        //     },
        //     "aria": {
        //         "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        //         "sortDescending": ": Activar para ordenar la columna de manera descendente"
        //     },
        //     "buttons": {
        //         "copy": "Copiar",
        //         "colvis": "Visibilidad",
        //         "collection": "Colección",
        //         "colvisRestore": "Restaurar visibilidad",
        //         "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        //         "copySuccess": {
        //             "1": "Copiada 1 fila al portapapeles",
        //             "_": "Copiadas %ds fila al portapapeles"
        //         },
        //         "copyTitle": "Copiar al portapapeles",
        //         "csv": "CSV",
        //         "excel": "Excel",
        //         "pageLength": {
        //             "-1": "Mostrar todas las filas",
        //             "_": "Mostrar %d filas"
        //         },
        //         "pdf": "PDF",
        //         "print": "Imprimir",
        //         "renameState": "Cambiar nombre",
        //         "updateState": "Actualizar",
        //         "createState": "Crear Estado",
        //         "removeAllStates": "Remover Estados",
        //         "removeState": "Remover",
        //         "savedStates": "Estados Guardados",
        //         "stateRestore": "Estado %d"
        //     },
        //     "autoFill": {
        //         "cancel": "Cancelar",
        //         "fill": "Rellene todas las celdas con <i>%d<\/i>",
        //         "fillHorizontal": "Rellenar celdas horizontalmente",
        //         "fillVertical": "Rellenar celdas verticalmentemente"
        //     },
        //     "decimal": ",",
        //     "searchBuilder": {
        //         "add": "Añadir condición",
        //         "button": {
        //             "0": "Constructor de búsqueda",
        //             "_": "Constructor de búsqueda (%d)"
        //         },
        //         "clearAll": "Borrar todo",
        //         "condition": "Condición",
        //         "conditions": {
        //             "date": {
        //                 "after": "Despues",
        //                 "before": "Antes",
        //                 "between": "Entre",
        //                 "empty": "Vacío",
        //                 "equals": "Igual a",
        //                 "notBetween": "No entre",
        //                 "notEmpty": "No Vacio",
        //                 "not": "Diferente de"
        //             },
        //             "number": {
        //                 "between": "Entre",
        //                 "empty": "Vacio",
        //                 "equals": "Igual a",
        //                 "gt": "Mayor a",
        //                 "gte": "Mayor o igual a",
        //                 "lt": "Menor que",
        //                 "lte": "Menor o igual que",
        //                 "notBetween": "No entre",
        //                 "notEmpty": "No vacío",
        //                 "not": "Diferente de"
        //             },
        //             "string": {
        //                 "contains": "Contiene",
        //                 "empty": "Vacío",
        //                 "endsWith": "Termina en",
        //                 "equals": "Igual a",
        //                 "notEmpty": "No Vacio",
        //                 "startsWith": "Empieza con",
        //                 "not": "Diferente de",
        //                 "notContains": "No Contiene",
        //                 "notStartsWith": "No empieza con",
        //                 "notEndsWith": "No termina con"
        //             },
        //             "array": {
        //                 "not": "Diferente de",
        //                 "equals": "Igual",
        //                 "empty": "Vacío",
        //                 "contains": "Contiene",
        //                 "notEmpty": "No Vacío",
        //                 "without": "Sin"
        //             }
        //         },
        //         "data": "Data",
        //         "deleteTitle": "Eliminar regla de filtrado",
        //         "leftTitle": "Criterios anulados",
        //         "logicAnd": "Y",
        //         "logicOr": "O",
        //         "rightTitle": "Criterios de sangría",
        //         "title": {
        //             "0": "Constructor de búsqueda",
        //             "_": "Constructor de búsqueda (%d)"
        //         },
        //         "value": "Valor"
        //     },
        //     "searchPanes": {
        //         "clearMessage": "Borrar todo",
        //         "collapse": {
        //             "0": "Paneles de búsqueda",
        //             "_": "Paneles de búsqueda (%d)"
        //         },
        //         "count": "{total}",
        //         "countFiltered": "{shown} ({total})",
        //         "emptyPanes": "Sin paneles de búsqueda",
        //         "loadMessage": "Cargando paneles de búsqueda",
        //         "title": "Filtros Activos - %d",
        //         "showMessage": "Mostrar Todo",
        //         "collapseMessage": "Colapsar Todo"
        //     },
        //     "select": {
        //         "cells": {
        //             "1": "1 celda seleccionada",
        //             "_": "%d celdas seleccionadas"
        //         },
        //         "columns": {
        //             "1": "1 columna seleccionada",
        //             "_": "%d columnas seleccionadas"
        //         },
        //         "rows": {
        //             "1": "1 fila seleccionada",
        //             "_": "%d filas seleccionadas"
        //         }
        //     },
        //     "thousands": ".",
        //     "datetime": {
        //         "previous": "Anterior",
        //         "next": "Proximo",
        //         "hours": "Horas",
        //         "minutes": "Minutos",
        //         "seconds": "Segundos",
        //         "unknown": "-",
        //         "amPm": [
        //             "AM",
        //             "PM"
        //         ],
        //         "months": {
        //             "0": "Enero",
        //             "1": "Febrero",
        //             "10": "Noviembre",
        //             "11": "Diciembre",
        //             "2": "Marzo",
        //             "3": "Abril",
        //             "4": "Mayo",
        //             "5": "Junio",
        //             "6": "Julio",
        //             "7": "Agosto",
        //             "8": "Septiembre",
        //             "9": "Octubre"
        //         },
        //         "weekdays": [
        //             "Dom",
        //             "Lun",
        //             "Mar",
        //             "Mie",
        //             "Jue",
        //             "Vie",
        //             "Sab"
        //         ]
        //     },
        //     "editor": {
        //         "close": "Cerrar",
        //         "create": {
        //             "button": "Nuevo",
        //             "title": "Crear Nuevo Registro",
        //             "submit": "Crear"
        //         },
        //         "edit": {
        //             "button": "Editar",
        //             "title": "Editar Registro",
        //             "submit": "Actualizar"
        //         },
        //         "remove": {
        //             "button": "Eliminar",
        //             "title": "Eliminar Registro",
        //             "submit": "Eliminar",
        //             "confirm": {
        //                 "_": "¿Está seguro que desea eliminar %d filas?",
        //                 "1": "¿Está seguro que desea eliminar 1 fila?"
        //             }
        //         },
        //         "error": {
        //             "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        //         },
        //         "multi": {
        //             "title": "Múltiples Valores",
        //             "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
        //             "restore": "Deshacer Cambios",
        //             "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        //         }
        //     },
        //     "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        //     "stateRestore": {
        //         "creationModal": {
        //             "button": "Crear",
        //             "name": "Nombre:",
        //             "order": "Clasificación",
        //             "paging": "Paginación",
        //             "search": "Busqueda",
        //             "select": "Seleccionar",
        //             "columns": {
        //                 "search": "Búsqueda de Columna",
        //                 "visible": "Visibilidad de Columna"
        //             },
        //             "title": "Crear Nuevo Estado",
        //             "toggleLabel": "Incluir:"
        //         },
        //         "emptyError": "El nombre no puede estar vacio",
        //         "removeConfirm": "¿Seguro que quiere eliminar este %s?",
        //         "removeError": "Error al eliminar el registro",
        //         "removeJoiner": "y",
        //         "removeSubmit": "Eliminar",
        //         "renameButton": "Cambiar Nombre",
        //         "renameLabel": "Nuevo nombre para %s",
        //         "duplicateError": "Ya existe un Estado con este nombre.",
        //         "emptyStates": "No hay Estados guardados",
        //         "removeTitle": "Remover Estado",
        //         "renameTitle": "Cambiar Nombre Estado"
        //     }
        // }
    });

    table.buttons().container()
        .appendTo('#tbLista_wrapper .col-md-6:eq(0)');
});

const form = document.getElementById("form");
form.addEventListener("submit", async function(event){
    event.preventDefault();

    if (!validate()) {
        $.confirm({
          title: 'Registro de Matrícula',
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

    let idestudiante = document.getElementById("idestudiante").value;
    let idperiodo = document.getElementById("cmbidperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;
    let idnivel = document.getElementById("idnivel").value;
    let modalidad = document.getElementById("modalidad").value;

    document.getElementById("tabla").innerHTML = '';
    
    await axios.post('https://appit.itsup.edu.ec/secretaria/registromatricula/insert', {
      idestudiante,
      idperiodo,
      idcarrera,
      idnivel,
      modalidad
    })
    .then(function (res){   
      let materias = res.data;  
      
      document.getElementById("cmbidperiodo").disabled = true;
      document.getElementById("idcarrera").disabled = true;
      document.getElementById("idnivel").disabled = true;
      document.getElementById("modalidad").disabled = true;
      document.getElementById("btnMatricular").disabled = true;

      document.getElementById("tabla").innerHTML = materias;
    })
    .catch(function (error) {
        $.confirm({
            title: 'Registro de matrícula',
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

async function agregarMateria(idmateria)
{
    let idestudiante = document.getElementById("idestudiante").value;
    let idperiodo = document.getElementById("cmbidperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;

    await axios.post('https://appit.itsup.edu.ec/secretaria/registromatricula/agregamateria', {
      idestudiante,
      idperiodo,
      idcarrera,
      idmateria
    })
    .then(function (res){   
      let info = res.data;  
      
      document.getElementById("tabla").innerHTML = info;
    })
    .catch(function (error) {
        $.confirm({
            title: 'Registro de matrícula',
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
}

async function eliminaMateria(idmateria)
{
    let idestudiante = document.getElementById("idestudiante").value
    let idperiodo = document.getElementById("cmbidperiodo").value
    let idcarrera = document.getElementById("idcarrera").value

    await axios.post('https://appit.itsup.edu.ec/secretaria/registromatricula/eliminamateria', {
      idestudiante,
      idperiodo,
      idcarrera,
      idmateria
    })
    .then(function (res){   
      let info = res.data;  
      
      document.getElementById("tabla").innerHTML = info;
    })
    .catch(function (error) {
        $.confirm({
            title: 'Registro de matrícula',
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
}

function validate() {
    var flag = true;
    if (document.getElementById("cmbidperiodo").value == "") {
        input = document.getElementById("cmbidperiodo");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("cmbidperiodo");
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

