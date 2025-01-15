document.getElementById("firma").style.display = 'none';

var cmbIdPeriodo = document.getElementById("cmbidperiodo");
cmbIdPeriodo.addEventListener("change", async function(){
  const idperiodo = this.value;

  var optcarrera = document.querySelectorAll('#idcarrera option');
  optcarrera.forEach(o => o.remove());

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbIdPeriodo.value != "") {
    await axios.post(DIR + 'carrera/findall/', {
      idperiodo
    })
    .then(function (res){
      let info = res.data;

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

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
        value: "",
      }));

      for(i = 0; i<=info.length-1; i++)
      {
        $('#idcarrera').append($('<option />', {
          text: info[i].carrera,
          value: info[i].idcarrera,
        }));
      }
    })
  } else{
    $('#idcarrera').append($('<option />', {
      text: "-- Seleccione Sección --",
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

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
})

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener('change', async function () {
  let idperiodo = document.getElementById("cmbidperiodo").value;
  let idcarrera = this.value;

  var optnivel = document.querySelectorAll('#idnivel option');
  optnivel.forEach(o => o.remove());

  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbIdCarrera.value != "") {
    await axios.post(DIR + 'nivel/findcursoidcarrerapresencial/',{
      idperiodo,
      idcarrera
    })
    .then(function (res){
      let info = res.data;

      $('#idnivel').append($('<option />', {
        text: "-- Seleccione Curso --",
        value: "",
      }));

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
        value: "",
      }));
      
      for(i = 0; i<=info.length-1; i++)
      {
        $('#idnivel').append($('<option />', {
          text: info[i].nivel,
          value: info[i].idnivel,
        }));
      }
    });
  } else{
    $('#idnivel').append($('<option />', {
      text: "-- Seleccione Curso --",
      value: "",
    }));

    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
});

var cmbNivel = document.getElementById("idnivel");
cmbNivel.addEventListener('change', async function () {
  let idperiodo = document.getElementById("cmbidperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let idnivel = this.value; 
 
  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbNivel.value != "") {
    await axios.post(DIR + 'malla/findmaterianivelcarreraperiodo/', {
      idperiodo,
      idcarrera,
      idnivel
    })
    .then(function (res){
      let info = res.data;

      $('#idmateria').append($('<option />', {
        text: "-- Seleccione Materia --",
        value: "",
      }));

      $('#idparcial').append($('<option />', {
        text: "-- Seleccione Parcial --",
        value: "",
      }));
   
      for(i = 0; i<=info.length-1; i++)
      {
        
        $('#idmateria').append($('<option />', {
          text: info[i].materia,
          value: info[i].idmateria,
        }));
      }
    });
  } else{
    $('#idmateria').append($('<option />', {
      text: "-- Seleccione Materia --",
      value: "",
    }));

    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
  
});

var cmbMateria = document.getElementById("idmateria");
cmbMateria.addEventListener('change', async function () {

  var optparcial = document.querySelectorAll('#idparcial option');
  optparcial.forEach(o => o.remove());

  if(cmbMateria.value != "") {
    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  
    $('#idparcial').append($('<option />', {
      text: "Primero",
      value: "1",
    }));
    $('#idparcial').append($('<option />', {
      text: "Segundo",
      value: "2",
    }));
  } else{
    $('#idparcial').append($('<option />', {
      text: "-- Seleccione Parcial --",
      value: "",
    }));
  }
  
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

  var idperiodo = document.getElementById("cmbidperiodo").value;
  var idcarrera = document.getElementById("idcarrera").value;
  var idnivel   = document.getElementById("idnivel").value;
  var idmateria = document.getElementById("idmateria").value;
  var idparcial = document.getElementById("idparcial").value;

  await axios.post(DIR + 'ingresocalificacion/viewlistaestudiantemateria/', {
    idperiodo,
    idmateria
  })
  .then(function (res){   
    let estudiantes = res.data;    
    
    if(estudiantes.length == 0){
      $.confirm({
        title: 'Registro de Calificaciones',
        icon: 'fa fa-exclamation-triangle',
        content: 'No existe información para mostrar. Vuelva a seleccionar',
        theme: 'modern',
        type: 'orange',
        typeAnimated: true,
        buttons: {
          aceptar: function () {
  
          }
        }
      });
  
      return;
    }

    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {keyboard: false})
    myModal.show();

    document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();    
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < estudiantes.length; i++) {
      let fila = tbody.insertRow();
      fila.insertCell().innerHTML = i+1;
      fila.insertCell().innerHTML = "<input id='idmatricula-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; width:100px; text-align: center;' value="+estudiantes[i]['idmatricula']+" disabled>"; //idmatricula
      fila.insertCell().innerHTML = estudiantes[i]['estudiante'];
      fila.insertCell().innerHTML = "<input id='d1-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; background: #fff; width:100px; text-align: center;' onkeyup='totalDocencia(this.id); total(this.id);' onkeypress='return filterFloat(event,this);'>"; //Aporte
      fila.insertCell().innerHTML = "<input id='d2-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; width:100px; text-align: center;' onkeyup='totalDocencia(this.id); total(this.id);'  onkeypress='return filterFloat(event,this);'>"; //Lecciones
      fila.insertCell().innerHTML = "<input id='td-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Docencia
      fila.insertCell().innerHTML = "<input id='p-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; width:100%; text-align: center;' onkeyup='totalPractica(this.id); total(this.id);'  onkeypress='return filterFloat(event,this);'>"; //Prácticas
      fila.insertCell().innerHTML = "<input id='tp-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Prácticas
      fila.insertCell().innerHTML = "<input id='au-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; width:100%; text-align: center;' onkeyup='totalAprendizaje(this.id); total(this.id);'  onkeypress='return filterFloat(event,this);'>"; //Aprendizaje Autónomo
      fila.insertCell().innerHTML = "<input id='tau-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Aprendizaje Autónomo
      fila.insertCell().innerHTML = "<input id='r-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; width:100px; text-align: center;' onkeyup='totalResultado(this.id); total(this.id);'  onkeypress='return filterFloat(event,this);'>"; //Resultados
      fila.insertCell().innerHTML = "<input id='tr-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total Resultados
      fila.insertCell().innerHTML = "<input id='t-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; font-weight: bold; text-align: center; width:100px' disabled>"; //Total
      
      cargarCalificacion(estudiantes[i]['idmatricula']);
    }
  })
  .catch(function (error){
    console.log(error)
  })
})

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

  var idperiodo = document.getElementById("cmbidperiodo").value;
  var idmatricula =  document.getElementById("idmatricula-"+param[1]).value;
  var idcarrera = document.getElementById("idcarrera").value;  
  var idnivel = document.getElementById("idnivel").value;
  var idmateria = document.getElementById("idmateria").value;
  var idparcial = document.getElementById("idparcial").value;

  var aporte = isNaN(document.getElementById("d1-"+param[1]).value) ? 0 : parseFloat(document.getElementById("d1-"+param[1]).value);
  var lecciones = isNaN(document.getElementById("d2-"+param[1]).value) ? 0 : parseFloat(document.getElementById("d2-"+param[1]).value);  
  var tdocencia = isNaN(document.getElementById("td-"+param[1]).value) ? 0 : parseFloat(document.getElementById("td-"+param[1]).value);

  var practica = isNaN(document.getElementById("p-"+param[1]).value) ? 0 : parseFloat(document.getElementById("p-"+param[1]).value);
  var tpractica = isNaN(document.getElementById("tp-"+param[1]).value) ? 0 : parseFloat(document.getElementById("tp-"+param[1]).value);

  var aprendizaje = isNaN(document.getElementById("au-"+param[1]).value) ? 0 : parseFloat(document.getElementById("au-"+param[1]).value);
  var taprendizaje = isNaN(document.getElementById("tau-"+param[1]).value) ? 0 : parseFloat(document.getElementById("tau-"+param[1]).value);

  var resultado = isNaN(document.getElementById("r-"+param[1]).value) ? 0 : parseFloat(document.getElementById("r-"+param[1]).value);
  var tresultado = isNaN(document.getElementById("tr-"+param[1]).value) ? 0 : parseFloat(document.getElementById("tr-"+param[1]).value); 

  var total = (isNaN(tdocencia) ? 0 : tdocencia) + (isNaN(tpractica) ? 0 : tpractica) + (isNaN(aprendizaje) ? 0 : aprendizaje) + (isNaN(tresultado) ? 0 : tresultado); 

  document.getElementById("t-"+param[1]).value =  total;    
  
  await axios.post(DIR + 'ingresocalificacion/insertcalificacion/', {
    idperiodo,
    idmatricula,
    idcarrera,    
    idnivel,
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
    console.log(res)
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

async function cargarCalificacion(idmatricula)
{
  var idperiodo = document.getElementById("cmbidperiodo").value;
  var idmateria = document.getElementById("idmateria").value;
  var idparcial = document.getElementById("idparcial").value;
  
  await axios.post(DIR + 'ingresocalificacion/findcalificacionidmatricula/',{
    idmatricula, 
    idperiodo,
    idmateria,
    idparcial
  })
  .then(function (res){
    let info = res.data[0];

    if(res.data.length>0){
      document.getElementById("d1-"+idmatricula).value = info.aporte;
      document.getElementById("d2-"+idmatricula).value = info.lecciones;
      document.getElementById("td-"+idmatricula).value = info.tdocencia;
      document.getElementById("p-"+idmatricula).value = info.practicas;
      document.getElementById("tp-"+idmatricula).value = info.tpracticas;
      document.getElementById("au-"+idmatricula).value = info.aprendizaje;
      document.getElementById("tau-"+idmatricula).value = info.taprendizaje;
      document.getElementById("r-"+idmatricula).value = info.resultados;
      document.getElementById("tr-"+idmatricula).value = info.tresultados;
      document.getElementById("t-"+idmatricula).value = info.total;
    }
  })
  .catch(function (error){
    console.log(error.message);
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
  if (document.getElementById("idparcial").value == "") {
    input = document.getElementById("idparcial");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("idparcial");
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

