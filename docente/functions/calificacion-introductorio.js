const miToast = document.getElementById('myToast');
const toast = new bootstrap.Toast(miToast);

$(document).ready(async function (){
    let idperiodo = document.getElementById("idperiodo").value;
    let iddocente = document.getElementById("iddocente").value;

    await axios.post(DIR + 'carrera/findcarreraintroductorio/', {
        idperiodo,
        iddocente
    })
    .then(function (res){
        let options = res.data;

        document.getElementById("idcarrera").innerHTML = options;
    })
});

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function (){
    if(this.value == ""){
        document.getElementById("idmateria").innerHTML = "";
        document.getElementById("idmateria").innerHTML = "<option>-- Seleccione Materia --</option>";

        return;
    }

    let idperiodo = document.getElementById("idperiodo").value;
    let iddocente = document.getElementById("iddocente").value;
    let idcarrera = this.value;

    await axios.post(DIR + 'materiaintroductorio/findmateriaiddocente/', {
        idperiodo,
        iddocente,
        idcarrera
    })
    .then(function (res){
        let options = res.data;
        
        document.getElementById("idmateria").innerHTML = options;
    })

});

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function (){
  if(!validate()){
    $.confirm({
      title: 'Registro de Calificaciones',
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
  let idcarrera = document.getElementById("idcarrera").value;
  let idmateria = document.getElementById("idmateria").value;  
  let idparcial = document.getElementById("idparcial").value;  
  
  'use strict';
  const tbody = document.querySelector('#tbLista tbody');
  tbody.innerHTML = '';
    
  await axios.post(DIR + 'calificacionintroductorio/viewlistaestudiantemateria/', {
    idperiodo,
    idcarrera,
    idmateria,    
    idparcial
  })
  .then(function (res){   
    let estudiantes = res.data;    

    tbody.innerHTML = estudiantes;
    
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
    myModal.show();

    document.getElementById("nombreperiodo").innerHTML = document.getElementById("periodo").innerText;
    document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();    

    //   cargarCalificacion(estudiantes[i]['idmatricula']);
  })
  .catch(function (error){
    console.log(error)
  })
});

var maintable = document.getElementById('tbLista'),
pdfout = document.getElementById('pdfout');

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function (){ 
  var element = document.getElementById("tbLista");
  var opt = {
    margin:       10,
    filename:     'document.pdf',
    image:        { type: 'jpeg', quality: 2 },
    html2canvas:  { scale: 2 },
    jsPDF:        { orientation: 'l',
                    unit: 'mm',
                    format: 'a3',
                    putOnlyUsedFonts:true,
                    floatPrecision: 16 // or "smart", default is 16 
                  }
  };

  html2pdf().set(opt).from(element).save();

  document.getElementById("firma").style.display = 'block';
});

function focusIn(input)
{
    if(document.getElementById(input).value != ''){
        defaultValue = document.getElementById(input).value;
        auxValue = document.getElementById(input).value;

        document.getElementById(input).value = "";
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
}

async function totalDocencia(input)
{
  var param = input.split("-");
  var idmatricula = document.getElementById("idmatricula-"+param[1]).value;
  var aporte = parseFloat(document.getElementById("d1-"+param[1]).value);
  var lecciones = parseFloat(document.getElementById("d2-"+param[1]).value);

  var tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  var td = parseFloat(document.getElementById("td-"+param[1]).value);
  var tr = parseFloat(document.getElementById("tr-"+param[1]).value);   

  if(aporte < 0 || aporte > 10 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro aporte admite una calificación máxima de 10.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("d1-"+param[1]).value = "0";
        }
      }
    });
    
    document.getElementById("td-"+param[1]).value = 0 + (isNaN(lecciones) ? 0 : lecciones);    
    return;
  }

  if(lecciones < 0 || lecciones > 5 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro aporte admite una calificación máxima de 5.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("d2-"+param[1]).value = "0";
        }
      }
    });
    
    document.getElementById("td-"+param[1]).value = (isNaN(aporte) ? 0 : aporte) + 0;    
    return;
  }  
  
  td = parseFloat(document.getElementById("td-"+param[1]).value);
  tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  td = (isNaN(aporte) ? 0 : aporte) + (isNaN(lecciones) ? 0 : lecciones);   
  
  document.getElementById("td-"+param[1]).value = td;    
}

function totalAprendizaje(input)
{
  var param = input.split("-");
  var aprendizaje = parseFloat(document.getElementById("au-"+param[1]).value);  

  var tau = parseFloat(document.getElementById("tau-"+param[1]).value);
  var tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  var td = parseFloat(document.getElementById("td-"+param[1]).value);
  var tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  if(aprendizaje < 0 || aprendizaje > 10 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro aprendizaje autónomo admite una calificación máxima de 10.',
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

function totalPractica(input)
{
  var param = input.split("-");
  var practica = parseFloat(document.getElementById("p-"+param[1]).value);  

  var tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  var td = parseFloat(document.getElementById("td-"+param[1]).value);
  var tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  if(practica < 0 || practica > 10 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro practica admite una calificación máxima de 10.',
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

function totalResultado(input)
{
  var param = input.split("-");
  var resultado = parseFloat(document.getElementById("r-"+param[1]).value);  

  var tp = parseFloat(document.getElementById("tp-"+param[1]).value);
  var td = parseFloat(document.getElementById("td-"+param[1]).value);
  var tr = parseFloat(document.getElementById("tr-"+param[1]).value);  
  
  if(resultado < 0 || resultado > 15 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro resultado admite una calificación máxima de 15.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("p-"+param[1]).value = "0";
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

  var idperiodo = document.getElementById("idperiodo").value;
  var idmatricula =  document.getElementById("idmatricula-"+param[1]).value;  
  var idmateria = document.getElementById("idmateria").value;
  var idparcial = document.getElementById("idparcial").value;

  var aporte = isNaN(parseFloat(document.getElementById("d1-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("d1-"+param[1]).value);
  var lecciones = isNaN(parseFloat(document.getElementById("d2-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("d2-"+param[1]).value);  
  var tdocencia = isNaN(parseFloat(document.getElementById("td-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("td-"+param[1]).value);

  var practica = isNaN(parseFloat(document.getElementById("p-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("p-"+param[1]).value);
  var tpractica = isNaN(parseFloat(document.getElementById("tp-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("tp-"+param[1]).value);

  var aprendizaje = isNaN(parseFloat(document.getElementById("au-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("au-"+param[1]).value);
  var taprendizaje = isNaN(parseFloat(document.getElementById("tau-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("tau-"+param[1]).value);

  var resultado = isNaN(parseFloat(document.getElementById("r-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("r-"+param[1]).value);
  var tresultado = isNaN(parseFloat(document.getElementById("tr-"+param[1]).value)) ? 0 : parseFloat(document.getElementById("tr-"+param[1]).value); 

  var total = (isNaN(tdocencia) ? 0 : tdocencia) + (isNaN(tpractica) ? 0 : tpractica) + (isNaN(aprendizaje) ? 0 : aprendizaje) + (isNaN(tresultado) ? 0 : tresultado); 

  document.getElementById("t-"+param[1]).value =  total;    
  
  await axios.post(DIR + 'calificacionintroductorio/insertcalificacion/', {
    idperiodo,
    idmatricula,    
    idmateria,
    idparcial,
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

function formatNumberWithTwoDecimals(number) {
  return parseFloat(number).toFixed(2);
}

function filter(__val__){
  var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
  if(preg.test(__val__) === true){
      return true;
  }else{
     return false;
  }
  
}

