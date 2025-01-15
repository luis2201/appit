const btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function(){
    if(!validate()){
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: 'Los campos marcados con rojo son obligatorios',
            type: 'orange',
            theme: 'modern'
        });

        return;
    }

    let idperiodo = document.getElementById("idperiodo").value;
    let idmodulo = document.getElementById("idmodulo").value;
    
    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    
    await axios.post(DIR + 'validar/findsolicitud/',
    {
        idperiodo,
        idmodulo
    })
    .then(function (res) {
        let rows = res.data;

        tbody.innerHTML = rows;
    })
    .catch(function (error){
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: error.message,
            type: 'red',
            theme: 'modern'
        });
    });
});

async function aprobar(idceie)
{
    let idperiodo = document.getElementById("idperiodo").value;
    let idmodulo = document.getElementById("idmodulo").value;

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'validar/aprobar/', {
        idceie,
        idperiodo,
        idmodulo
    })
    .then(function (res) {
        let rows = res.data;
        
        tbody.innerHTML = rows;
    })
    .catch(function (error){
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: error.message,
            type: 'red',
            theme: 'modern'
        });
    });
}

async function eliminar(idceie)
{
    let idperiodo = document.getElementById("idperiodo").value;
    let idmodulo = document.getElementById("idmodulo").value;

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';

    await axios.post(DIR + 'validar/eliminar/', {
        idceie,
        idperiodo,
        idmodulo
    })
    .then(function (res) {
        let rows = res.data;
        
        tbody.innerHTML = rows;
    })
    .catch(function (error){
        $.alert({
            title: 'Alerta del Sistema',
            icon: 'fas fa-exclamation-circle',
            content: error.message,
            type: 'red',
            theme: 'modern'
        });
    });
}

function validate() {
    var flag = true;

    if (document.getElementById("idperiodo").value == "") {
      input = document.getElementById("idperiodo");
      input.className += " is-invalid";
      flag = false;
    } else {
      input = document.getElementById("idperiodo");
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