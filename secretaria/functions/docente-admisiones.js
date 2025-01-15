const form = document.getElementById("form");
form.addEventListener("submit", async function(event){
    event.preventDefault();

    if(!validate()){
        $.confirm({
            title: 'Docentes Admisiones',
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

    let idperiodo = document.getElementById("idperiodo").value;
    let iddocente = document.getElementById("iddocente").value;
    let idmodulo  = document.getElementById("idmodulo" ).value;

    let res = await axios.post(DIR + 'docenteadmisiones/valida/', {idperiodo, iddocente, idmodulo});
    let info = res.data;
    
    if(info.length == 0){
        await axios.post(DIR + 'docenteadmisiones/insert/', {
            idperiodo,
            iddocente,
            idmodulo
        })
        .then(function (res){
            let info = res.data;
            if(info){
                $.confirm({
                    title: 'Información del Sistema',
                    icon: 'fa fa-info-circle',
                    content: 'Docente registrado satisfactoriamente',
                    theme: 'modern',
                    type: 'blue',
                    typeAnimated: true,
                    buttons: {
                      aceptar: async function () {
                        location.reload();    
                      }
                    }
                });                   
            } else{
                $.confirm({
                    title: 'Docentes Admisiones',
                    icon: 'fa fa-exclamation-triangle',
                    content: 'No es posible registrar al Docente en el módulo seleccionado.',
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
    } else{
        $.confirm({
            title: 'Docentes Admisiones',
            icon: 'fa fa-exclamation-triangle',
            content: 'Ya se registró el docente en el módulo seleccionado.',
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
              aceptar: function () {
      
              }
            }
        });
    }
});

function eliminar(idmodulo_docente)
{    
    $.confirm({
        title: 'Información del Sistema',
        icon: 'fa fa-info-circle',
        content: 'Desea eliminar el registro seleccionado? No se podrán deshacer los cambios realizados',
        theme: 'modern',
        type: 'blue',
        typeAnimated: true,
        buttons: {
            aceptar: async function (){
                await axios.post(DIR + 'docenteadmisiones/delete/' + idmodulo_docente)
                .then(function (res){
                    let info = res.data;

                    if(info){
                        $.confirm({
                            title: 'Información del Sistema',
                            icon: 'fa fa-info-circle',
                            content: 'Registro elimiando satisfactoriamente',
                            theme: 'modern',
                            type: 'blue',
                            typeAnimated: true,
                            buttons: {
                              aceptar: async function () {
                                location.reload();    
                              }
                            }
                        });                   
                    } else{
                        $.confirm({
                            title: 'Docentes Admisiones',
                            icon: 'fa fa-exclamation-triangle',
                            content: 'No es posible eliminar el registro seleccionado.',
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
            },
            cancelar: function (){

            }
        }
    });                       
}

function validate()
{
    var flag = true;
    if (document.getElementById("iddocente").value == "") {
        input = document.getElementById("iddocente");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("iddocente");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("idmodulo").value == "") {
        input = document.getElementById("idmodulo");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("idmodulo");
        input.classList.remove("is-invalid");
    }
    
    return flag;
}