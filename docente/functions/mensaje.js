var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false, backdrop: 'static'})

async function mostrar(idmensaje)
{
    document.getElementById("titulo-mensaje").innerText = document.getElementById("titulo-" + idmensaje).value;
    document.getElementById("cuerpo-mensaje").innerText = document.getElementById("mensaje-" + idmensaje).value;
    
    await axios.get(DIR + 'mensaje/actualizamensaje' + idmensaje )
    .then(function (res) {    
        myModal.show();        
    })
    .catch(function (error){
        console.log(error.message);
    })
}

function eliminar(idmensaje)
{
    $.confirm({
        title: 'Asistencia',
        icon: 'fa fa-question-circle',
        content: 'Está seguro que desea eliminar el mensaje? No se podrán restablecer los cambios',
        theme: 'modern',
        type: 'blue',
        typeAnimated: true,
        buttons: {
          aceptar: async function () {
            await axios.get(DIR + 'mensaje/delete' + idmensaje )
            .then(function (res) {  
                $.confirm({
                    title: 'Asistencia',
                    icon: 'fa fa-thumbs-up',
                    content: 'Mensaje eliminado satisfactoriamente',
                    theme: 'modern',
                    type: 'blue',
                    typeAnimated: true,
                    buttons: {
                    aceptar: function () {
                        location.reload();
                    },
                    }
                });          

                location.reload();
            })
            .catch(function (error){
                console.log(error.message);
            })
          },
          cancelar: function() {
            return;
          }
        }
    });    
}

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function(){
    myModal.hide();    
    location.reload();
});