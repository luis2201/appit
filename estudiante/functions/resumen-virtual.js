$("document").ready(async function(){
    const idestudiante = document.getElementById("idestudiante").value;
    const idperiodo = document.getElementById("idperiodo").value;


    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'resumenvirtual/viewcalificaciones/', {
        idestudiante,
        idperiodo
    })
    .then(function (res) {
        let info = res.data;
        console.log(info)
        tbody.innerHTML = info;
    })
});