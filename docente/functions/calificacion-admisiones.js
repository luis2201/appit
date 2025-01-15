let defaultValue = "";
let auxValue = "";
var myModal = new bootstrap.Modal(document.getElementById('calificacionesModal'), {keyboard:false, backdrop:'static' })
const miToast = document.getElementById('myToast');
const toast = new bootstrap.Toast(miToast);

// 'use strict';
// const tbody = document.querySelector('#tbLista tbody');
// tbody.innerHTML = '';

const tabla = document.getElementById('tabla');

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function(){
    if(!validate()){
        $.confirm({
            title: 'Cuadro General',
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
    let idmodulo = document.getElementById("idmodulo").value;
    let iddocente = document.getElementById("idusuario").value;

    await axios.post('https://appit.itsup.edu.ec/docente/calificacionadmisiones/viewlistaestudiante/', {
        idperiodo,
        idmodulo,
        iddocente
    })
    .then(function (res){
        let rows = res.data;
        
        document.getElementById("modulo").innerHTML = "<strong>MODULO: </strong>" + $("#idmodulo option:selected").text();

        // tbody.innerHTML = rows;
        tabla.innerHTML = rows;
        myModal.show();
    })

});

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function(){
    myModal.hide();
});

function focusIn(input)
{
    if(document.getElementById(input).value != ''){
        defaultValue = document.getElementById(input).value;
        auxValue = document.getElementById(input).value;

        document.getElementById(input).value = "";
    }
}

function calificacion(input)
{
    let value = document.getElementById(input).value;
    param = input.split("-",1);

    if(param[0] == 'f' && value > 5){
        $.confirm({
            title: 'Registro de calificación',
            icon: 'fa fa-exclamation-triangle',
            content: 'El valor máximo de calificación para este parámetro es de 5.',
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {
                    document.getElementById(input).value = "";
                }
            }
        });

    } else if(param[0] == 't' && value > 5){
        $.confirm({
            title: 'Registro de calificación',
            icon: 'fa fa-exclamation-triangle',
            content: 'El valor máximo de calificación para este parámetro es de 5.',
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {
                    document.getElementById(input).value = "";
                }
            }
        });

    } else if(param[0] == 'e' && value > 10){
        $.confirm({
            title: 'Registro de calificación',
            icon: 'fa fa-exclamation-triangle',
            content: 'El valor máximo de calificación para este parámetro es de 10.',
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {
                    document.getElementById(input).value = "";
                }
            }
        });

    }
}

async function focusOut(input)
{
    defaultValue = document.getElementById(input).value;
    document.getElementById(input).value = formatNumberWithTwoDecimals(defaultValue);

    let id = input.split("-");
    let parametro = id[0];

    if(defaultValue == ''){
        document.getElementById(input).value = auxValue;

        return;
    }
    if(parametro == 'f' && defaultValue > 5){
        return;
    } else if(parametro == 't' && defaultValue > 5){
        return;
    } else if(parametro == 'e' && defaultValue > 10){
        return;
    }

    let idperiodo = document.getElementById("idperiodo").value;
    let idmodulo = document.getElementById("idmodulo").value;
    let idadmisiones = id[1];
    let calificacion = defaultValue;

    let foros = isNaN(parseFloat(document.getElementById("f-"+idadmisiones).value)) ? 0 : parseFloat(document.getElementById("f-"+idadmisiones).value);
    let tareas = isNaN(parseFloat(document.getElementById("t-"+idadmisiones).value)) ? 0 : parseFloat(document.getElementById("t-"+idadmisiones).value);
    let examen = isNaN(parseFloat(document.getElementById("e-"+idadmisiones).value)) ? 0 : parseFloat(document.getElementById("e-"+idadmisiones).value);
    document.getElementById("s-"+idadmisiones).value = foros + tareas + examen;

    await axios.post("https://appit.itsup.edu.ec/docente/calificacionadmisiones/save", {
        idperiodo,
        idmodulo,
        idadmisiones,
        parametro,
        calificacion
    })
    .then(function (res){
        let info = res.data;

        if(info){
            toast.show();
            setTimeout(function() {
                toast.hide();
            }, 3000);
        }
    })
    .catch(function (error){

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

function formatNumberWithTwoDecimals(number) {
    return parseFloat(number).toFixed(2);
}

function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {
              return true;
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
          }else{
              return false;
          }
    }
  }

function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }

}