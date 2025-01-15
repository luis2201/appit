let defaultValue = "";
let auxValue = "";
var myModal = new bootstrap.Modal(document.getElementById('calificacionesModal'), {keyboard:false, backdrop:'static' })
const miToast = document.getElementById('myToast');
const toast = new bootstrap.Toast(miToast);

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

    await axios.post(DIR + 'calificacionsuficiencia/viewlistaestudiante/', {
        idperiodo
    })
    .then(function (res){
        let rows = res.data;

        document.getElementById("periodo").innerHTML = "<strong>Periodo: </strong>" + $("#idperiodo option:selected").text();

        tabla.innerHTML = rows;
        myModal.show();
    })

});

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function(){
    myModal.hide();
});

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

    return flag;
}

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

    if(value > 100){
        $.confirm({
            title: 'Registro de calificación',
            icon: 'fa fa-exclamation-triangle',
            content: 'El valor máximo de calificación es de 100.',
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
    
    if(defaultValue == ''){
        document.getElementById(input).value = auxValue;

        return;
    }
    if(defaultValue > 100){
        return;
    }

    let id = input.split("-")
    let idexamen_suficiencia = id[1];
    let calificacion = defaultValue;

    var observacion =  document.getElementById("o-"+idexamen_suficiencia);
    let text = observacion.className;
    let clase = text.split(" ");
    
    if(clase[0] == "text-danger" || clase[1] == "text-danger"){
        observacion.classList.remove("text-danger");
    } else{
        observacion.classList.remove("text-success");        
    }
    
    if(calificacion>=70){        
        observacion.classList.add("text-success");
        observacion.value = 'APROBADO';
    } else{        
        observacion.classList.add("text-danger");
        observacion.value = 'REPROBADO';
    }

    await axios.post(DIR + 'calificacionsuficiencia/save', {
     idexamen_suficiencia,
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

    // tabla.innerHTML = '';
    
    // let idperiodo = document.getElementById("idperiodo").value;
    // let idmodulo = document.getElementById("idmodulo").value;

    // await axios.post(DIR + 'registrocalificacion/viewlistaestudiante/', {
    //     idperiodo,
    //     idmodulo
    // })
    // .then(function (res){
    //     let rows = res.data;

    //     document.getElementById("periodo").innerHTML = "<strong>Periodo: </strong>" + $("#idperiodo option:selected").text();
    //     document.getElementById("modulo").innerHTML = "<strong>MODULO: </strong>" + $("#idmodulo option:selected").text();

    //     tabla.innerHTML = rows;        
    // })
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