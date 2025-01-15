var idperiodo = document.getElementById("idperiodo").value;
var idestudiante = document.getElementById("idestudiante").value;

$("document").ready(async function (){
    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'asistencia/findlistamaterias/', {
        idperiodo,
        idestudiante
    })
    .then(function (res) {
        let info = res.data;
        
        tbody.innerHTML = info;
    })
    .catch(function (error) {
        console.log(error);
        $.confirm({
            title: '¡Error!',
            icon: 'fa fa-exclamation-triangle',
            content: 'Ocurrió un error inesperado.',
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