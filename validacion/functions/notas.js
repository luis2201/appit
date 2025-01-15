$(document).ready(async function (){
    parcial1();

    parcial2();
});

async function parcial1()
{
    const idperiodo = document.getElementById("idperiodo").value;
    const idparcial = 1;
    const idestudiante = document.getElementById("idestudiante").value;

    await axios.post('https://appit.itsup.edu.ec/estudiante/notas/findallid/', {
        idperiodo,
        idparcial,
        idestudiante
    })
    .then(function (res) {
        let info = res.data;

        'use strict';
        const tbody = document.querySelector('#tbLista1 tbody');
        tbody.innerHTML = '';
        for (let i = 0; i < info.length; i++) {
            let fila = tbody.insertRow();
            fila.insertCell().innerHTML = i+1;
            fila.insertCell().innerHTML = info[i]['materia'];
            fila.insertCell().innerHTML = info[i]['aporte'];
            fila.insertCell().innerHTML = info[i]['lecciones'];
            fila.insertCell().innerHTML = "<b>"+info[i]['tdocencia']+"</b>";
            fila.insertCell().innerHTML = info[i]['practicas'];
            fila.insertCell().innerHTML = "<b>"+info[i]['tpracticas']+"</b>";
            fila.insertCell().innerHTML = info[i]['aprendizaje'];
            fila.insertCell().innerHTML = "<b>"+info[i]['taprendizaje']+"</b>";
            fila.insertCell().innerHTML = info[i]['resultados'];
            fila.insertCell().innerHTML = "<b>"+info[i]['tresultados']+"</b>";
            fila.insertCell().innerHTML = "<b class='text-success'>"+info[i]['total']+"</b>";
        }

    })
}

async function parcial2()
{
    const idperiodo = document.getElementById("idperiodo").value;
    const idparcial = 2;
    const idestudiante = document.getElementById("idestudiante").value;

    await axios.post('https://appit.itsup.edu.ec/estudiante/notas/findallid/', {
        idperiodo,
        idparcial,
        idestudiante
    })
    .then(function (res) {
        let info = res.data;

        'use strict';
        const tbody = document.querySelector('#tbLista2 tbody');
        tbody.innerHTML = '';
        for (let i = 0; i < info.length; i++) {
            let fila = tbody.insertRow();
            fila.insertCell().innerHTML = i+1;
            fila.insertCell().innerHTML = info[i]['materia'];
            fila.insertCell().innerHTML = info[i]['aporte'];
            fila.insertCell().innerHTML = info[i]['lecciones'];
            fila.insertCell().innerHTML = "<b>"+info[i]['tdocencia']+"</b>";
            fila.insertCell().innerHTML = info[i]['practicas'];
            fila.insertCell().innerHTML = "<b>"+info[i]['tpracticas']+"</b>";
            fila.insertCell().innerHTML = info[i]['aprendizaje'];
            fila.insertCell().innerHTML = "<b>"+info[i]['taprendizaje']+"</b>";
            fila.insertCell().innerHTML = info[i]['resultados'];
            fila.insertCell().innerHTML = "<b>"+info[i]['tresultados']+"</b>";
            fila.insertCell().innerHTML = "<b class='text-success'>"+info[i]['total']+"</b>";
        }

    })
}