$("document").ready(async function(){
    const idestudiante = document.getElementById("idestudiante").value;
    const idperiodo = 6;

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';

    await axios.post('https://appit.itsup.edu.ec/estudiante/resumen/viewcalificacion/', {
        idestudiante,
        idperiodo
    })
    .then(function (res) {
        let info = res.data;
        
        tbody.innerHTML = info;
    })
});