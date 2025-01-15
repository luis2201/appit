var cmbIdPeriodo = document.getElementById("cmbidperiodo");
cmbIdPeriodo.addEventListener("change", async function(){
    let idperiodo = this.value;

    var optcarrera = document.querySelectorAll('#idcarrera option');
    optcarrera.forEach(o => o.remove());

    var optnivel = document.querySelectorAll('#idnivel option');
    optnivel.forEach(o => o.remove());

    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(idperiodo == ""){
        $('#idcarrera').append($('<option />', {
            text: "-- Seleccione Carrera --",
            value: "",
        }));

        $('#idnivel').append($('<option />', {
          text: "-- Seleccione Curso --",
          value: "",
        }));

        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));

        return;
    } else{
        $('#idcarrera').append($('<option />', {
            text: "-- Seleccione Carerra --",
            value: "",
        }));
    }
    
    document.getElementById("idcarrera").innerHTML = "";

    await axios.post(DIR + 'carrera/findallvalidacion', {
        idperiodo
    })
    .then(function (res){
        let info = res.data;

        document.getElementById("idcarrera").innerHTML = info;
    })
});

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function(){
    let idcarrera = this.value;

    var optnivel = document.querySelectorAll('#idnivel option');
    optnivel.forEach(o => o.remove());

    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(idcarrera == ""){
        $('#idnivel').append($('<option />', {
            text: "-- Seleccione Curso --",
            value: "",
        }));

        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));

        return;
    } else{
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));
    }
    
    let idperiodo = document.getElementById("cmbidperiodo").value;
    document.getElementById("idnivel").innerHTML = "";

    await axios.post(DIR + 'nivel/findnivelvalidacion', {
        idperiodo,
        idcarrera
    })
    .then(function (res){
        let info = res.data;

        document.getElementById("idnivel").innerHTML = info;
    })
});

var cmbNivel = document.getElementById("idnivel");
cmbNivel.addEventListener("change", async function(){
    let idnivel = this.value;

    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(idnivel == ""){
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));

        return;
    } 

    let idperiodo = document.getElementById("cmbidperiodo").value;
    let idcarrera = document.getElementById("idcarrera").value;

    document.getElementById("idmateria").innerHTML = "";

    await axios.post(DIR + 'materia/findmateriasvalidacion', {
        idperiodo,
        idcarrera,
        idnivel
    })
    .then(function (res){
        let info = res.data;
   
        document.getElementById("idmateria").innerHTML = info;
    })
});

var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
document.getElementById("firma").style.display = 'none';

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

  var idperiodo = document.getElementById("cmbidperiodo").value;
  var idcarrera = document.getElementById("idcarrera").value;
  var idnivel = document.getElementById("idnivel").value;
  var idmateria = document.getElementById("idmateria").value;

  'use strict';
  const tbody = document.querySelector('#tbCuadro tbody');
  tbody.innerHTML = '';

  await axios.post(DIR + 'estudiante/findestudianteidmateriavalidacion/', {
    idperiodo,
    idmateria
  })
  .then(function (res){   
    let estudiantes = res.data;  

    myModal.show();

    tbody.innerHTML = estudiantes;
    
    document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();

  })
  .catch(function (error){
    console.log(error)
  })
})

async function totalDocencia(input) {
    var param = input.split("-");
    var aporte = parseFloat(document.getElementById("d1-" + param[1]).value);
    var lecciones = parseFloat(document.getElementById("d2-" + param[1]).value);

    var td = parseFloat(document.getElementById("td-" + param[1]).value);
    var tp = parseFloat(document.getElementById("tp-" + param[1]).value);
    var tr = parseFloat(document.getElementById("tr-" + param[1]).value);

    if (aporte < 0 || aporte > 10) {
        $.confirm({
            title: 'Registro de Calificaciones',
            icon: 'fa fa-exclamation-triangle',
            content: 'El parámetro aporte admite una calificación máxima de 10.',
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {
                    document.getElementById("d1-" + param[1]).value = "0";
                }
            }
        });

        document.getElementById("td-" + param[1]).value = 0 + (isNaN(lecciones) ? 0 : lecciones);
        return;
    }

    if (lecciones < 0 || lecciones > 10) {
        $.confirm({
            title: 'Registro de Calificaciones',
            icon: 'fa fa-exclamation-triangle',
            content: 'El parámetro aporte admite una calificación máxima de 10.',
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {
                    document.getElementById("d2-" + param[1]).value = "0";
                }
            }
        });

        document.getElementById("td-" + param[1]).value = (isNaN(aporte) ? 0 : aporte) + 0;
        return;
    }

    td = parseFloat(document.getElementById("td-" + param[1]).value);
    tp = parseFloat(document.getElementById("tp-" + param[1]).value);
    tr = parseFloat(document.getElementById("tr-" + param[1]).value);
    td = (isNaN(aporte) ? 0 : aporte) + (isNaN(lecciones) ? 0 : lecciones);

    document.getElementById("td-" + param[1]).value = td;
}

function totalPractica(input)
{
  var param = input.split("-");
  var practica = parseFloat(document.getElementById("p-"+param[1]).value);  

  var tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  var td = parseFloat(document.getElementById("td-"+param[1]).value);
  var tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  if(practica < 0 || practica > 20 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro practica admite una calificación máxima de 20.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("p-"+param[1]).value = "0";
        }
      }
    });
    
    document.getElementById("tp-"+param[1]).value = 0;    
    return;
  }  

  td = parseFloat(document.getElementById("td-"+param[1]).value);
  tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  document.getElementById("tp-"+param[1]).value = (isNaN(practica) ? 0 : practica);    
}

function totalAprendizaje(input)
{
  var param = input.split("-");
  var aprendizaje = parseFloat(document.getElementById("au-"+param[1]).value);  

  var tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  var td = parseFloat(document.getElementById("td-"+param[1]).value);
  var tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  if(aprendizaje < 0 || aprendizaje > 30 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro aprendizaje autónomo admite una calificación máxima de 30.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("au-"+param[1]).value = "0";
        }
      }
    });
    
    document.getElementById("tau-"+param[1]).value = 0;    
    return;
  }  

  td = parseFloat(document.getElementById("td-"+param[1]).value);
  tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  document.getElementById("tau-"+param[1]).value = (isNaN(aprendizaje) ? 0 : aprendizaje);    
}

function totalResultado(input)
{
  var param = input.split("-");
  var resultado = parseFloat(document.getElementById("r-"+param[1]).value);  

  var tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  var td = parseFloat(document.getElementById("td-"+param[1]).value);
  var tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  if(resultado < 0 || resultado > 30 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro resultado admite una calificación máxima de 30.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("r-"+param[1]).value = "0";
        }
      }
    });
    
    document.getElementById("tr-"+param[1]).value = 0;    
    return;
  }  

  td = parseFloat(document.getElementById("td-"+param[1]).value);
  tp = parseFloat(document.getElementById("tr-"+param[1]).value);
  tr = parseFloat(document.getElementById("tr-"+param[1]).value);  

  document.getElementById("tr-"+param[1]).value = (isNaN(resultado) ? 0 : resultado);  
}

async function total(input) 
{
    var param = input.split("-");

    var idperiodo = document.getElementById("cmbidperiodo").value;
    var idmatricula = document.getElementById("mat-" + param[1]).value;
    var idcarrera = document.getElementById("idcarrera").value;
    var idnivel = document.getElementById("idnivel").value;
    var idmateria = document.getElementById("idmateria").value;

    var aporte = isNaN(parseFloat(document.getElementById("d1-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("d1-" + param[1]).value);
    var lecciones = isNaN(parseFloat(document.getElementById("d2-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("d2-" + param[1]).value);
    var tdocencia = isNaN(parseFloat(document.getElementById("td-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("td-" + param[1]).value);

    var practica = isNaN(parseFloat(document.getElementById("p-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("p-" + param[1]).value);
    var tpractica = isNaN(parseFloat(document.getElementById("tp-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("tp-" + param[1]).value);

    var aprendizaje = isNaN(parseFloat(document.getElementById("au-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("au-" + param[1]).value);
    var taprendizaje = isNaN(parseFloat(document.getElementById("tau-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("tau-" + param[1]).value);

    var resultado = isNaN(parseFloat(document.getElementById("r-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("r-" + param[1]).value);
    var tresultado = isNaN(parseFloat(document.getElementById("tr-" + param[1]).value)) ? 0 : parseFloat(document.getElementById("tr-" + param[1]).value);

    var total = (isNaN(tdocencia) ? 0 : tdocencia) + (isNaN(tpractica) ? 0 : tpractica) + (isNaN(aprendizaje) ? 0 : aprendizaje) + (isNaN(tresultado) ? 0 : tresultado);

    document.getElementById("t-" + param[1]).value = total;

    await axios.post(DIR + 'registrocalificacionvalidacion/save/', {
        idperiodo,
        idmatricula,
        idcarrera,
        idnivel,
        idmateria,
        aporte,
        lecciones,
        tdocencia,
        practica,
        tpractica,
        aprendizaje,
        taprendizaje,
        resultado,
        tresultado,
        total
    })
    .then(function (res) {
        let info = res.data;        
    })
    .catch(function (error) {
        $.confirm({
            title: 'Registro de Calificaciones',
            icon: 'fa fa-exclamation-triangle',
            content: error.message,
            theme: 'modern',
            type: 'red',
            typeAnimated: true,
            buttons: {
                aceptar: function () {

                }
            }
        });
    });
}

function validate()
{
  var flag = true;
  if (document.getElementById("idcarrera").value == "") {
    input = document.getElementById("idcarrera");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idcarrera");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idnivel").value == "") {
    input = document.getElementById("idnivel");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idnivel");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("idmateria").value == "") {
    input = document.getElementById("idmateria");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idmateria");
    input.classList.remove("is-invalid");
  }
  
  return flag;
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
  