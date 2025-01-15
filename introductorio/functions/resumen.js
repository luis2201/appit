$("document").ready(async function(){
    const idestudiante = document.getElementById("idestudiante").value;
    const idperiodo = 21;

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'resumen/viewcalificacion/', {
        idestudiante,
        idperiodo
    })
    .then(function (res) {
        let info = res.data;
        
        tbody.innerHTML = info;
    })
});