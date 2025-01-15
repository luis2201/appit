var modalActualizar = new bootstrap.Modal(document.getElementById('modalActualizar'), {
    keyboard: false,
    backdrop: 'static'
});

const form = document.getElementById('form');
form.addEventListener('submit', async function (e) {
    e.preventDefault();

    var foto = document.getElementById('foto');
    var filePath3 = foto.value;
    var fo = foto.files[0];

    if (foto.value == '') { 
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: 'Seleccione una foto',
            type: 'orange',
            theme: 'modern'
        });
        
        return;
    } 

    if (fo.size > 2097152) { // 2 MiB for bytes.
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: 'La foto excede el tamaño máximo permitido. Seleccione una imagen con un máximo de 2MB',
            type: 'orange',
            theme: 'modern'
        });
        
        return;
    } 

    const formData = new FormData(form);  
    formData.append('idestudiante', document.getElementById('idestudiante').value);
    formData.append('fotoactual', document.getElementById('fotoactual').value);

    await axios.post('https://appit.itsup.edu.ec/estudiante/actualizarfoto/updatefoto/', formData)
    .then(function (res){
        let info = res.data;
        
        if(info){
            $.confirm({
                title: 'Datos del estudiante',
                icon: 'fa fa-thumbs-up',
                content: 'Foto actualizada satisfactoriamente',
                theme: 'modern',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                    aceptar: function () {
                    window.location.reload();
                    }
                }
            });
        } else{
            $.confirm({
                title: 'Inicio de sesión',
                icon: 'fa fa-exclamation-triangle',
                content: 'No es posible actualizar la foto en este momento',
                theme: 'red',
                type: 'orange',
                typeAnimated: true,
                buttons: {
                  aceptar: function () {
          
                  }
                }
              });
          
        }
    })
    .catch(function (error) {
        console.log(error);
    });
});

function mostrarModal(){
    modalActualizar.show();
}