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

  }
});

var cmbNivel = document.getElementById("idnivel");
cmbNivel.addEventListener('change', async function () {
  let idperiodo = document.getElementById("cmbidperiodo").value;
  let idcarrera = document.getElementById("idcarrera").value;
  let idnivel = this.value; 
 
  var optmateria = document.querySelectorAll('#idmateria option');
  optmateria.forEach(o => o.remove());

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
  var idmateria = document.getElementById("idmateria").value;

  await axios.post(DIR + 'ingresocalificaciontotal/viewlistaestudiantemateria/', {
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
    
    document.getElementById("periodoacademico").innerHTML = "<strong>" + $("#cmbidperiodo option:selected").text() + "</strong>";
    document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();
    document.getElementById("semestre").innerHTML = "<strong>SEMESTRE: </strong>" + $("#idnivel option:selected").text();    
    document.getElementById("carrera").innerHTML = "<strong>CARRERA: </strong>" + $("#idcarrera option:selected").text();

    'use strict';
    const tbody = document.querySelector('#tbLista tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < estudiantes.length; i++) {
      let fila = tbody.insertRow();
      fila.insertCell().innerHTML = "<center>"+(i+1)+"</center>";
      fila.insertCell().innerHTML = "<input id='idmatricula-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; width:100px; text-align: center;' value="+estudiantes[i]['idmatricula']+" disabled>"; //idmatricula
      fila.insertCell().innerHTML = estudiantes[i]['estudiante']
      fila.insertCell().innerHTML = "<input id='p1-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; background: #fff; width:100px; height:21px; text-align: center;' onkeyup='parcial1(this.id); total(this.id);' onkeypress='return filterFloat(event,this);'>"; //Parcial 1
      fila.insertCell().innerHTML = "<input id='p2-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; width:100px; height:21px; text-align: center;' onkeyup='parcial2(this.id); total(this.id);'  onkeypress='return filterFloat(event,this);'>"; //Parcial 2
      fila.insertCell().innerHTML = "<input id='sup-"+estudiantes[i]['idmatricula']+"' type='text' style='background: #fff; border: 0; text-align: center; width:100px; height:21px;' onkeyup='supletorio(this.id); total(this.id);'  onkeypress='return filterFloat(event,this);'>"; //Supletorio
      fila.insertCell().innerHTML = "<input id='t-"+estudiantes[i]['idmatricula']+"' type='text' style='border: 0; font-weight: bold; width:100px; height:21px; text-align: center;' disabled>"; //Total

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

function parcial1(input)
{
  var param = input.split("-");
  var p1 = parseFloat(document.getElementById("p1-"+param[1]).value);  
  
  if(p1 < 0 || p1 > 50 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro PI admite una calificación máxima de 50.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("p1-"+param[1]).value = "";
          total(document.getElementById("t-"+param[1]).id)
        }
      }
    });
    return;
  }  

}

function parcial2(input)
{
  var param = input.split("-");
  var p2 = parseFloat(document.getElementById("p2-"+param[1]).value);  
  
  if(p2 < 0 || p2 > 50 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro PII admite una calificación máxima de 50.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("p2-"+param[1]).value = "";
          total(document.getElementById("t-"+param[1]).id)
        }
      }
    });
    return;
  }  

}

function supletorio(input)
{
  var param = input.split("-");

  var p1 = parseFloat(document.getElementById("p1-"+param[1]).value); 
  var p2 = parseFloat(document.getElementById("p2-"+param[1]).value); 
  var sup = parseFloat(document.getElementById("sup-"+param[1]).value);  
  var suma = p1+p2;

  if(suma < 50){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'No se puede ingresar la nota del supletorio debido a que la suma de los parciales es menor a 50.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("sup-"+param[1]).value = "";
          total(document.getElementById("t-"+param[1]).id);
        }
      }
    });
    return;
  } 

  if(sup < 0 || sup > 20 ){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'El parámetro PII admite una calificación máxima de 20.',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("sup-"+param[1]).value = "";
          total(document.getElementById("t-"+param[1]).id)
        }
      }
    });
    return;
  }   

  if(suma >= 70){
    $.confirm({
      title: 'Registro de Calificaciones',
      icon: 'fa fa-exclamation-triangle',
      content: 'No se puede ingresar la nota del supletorio debido a que el estudiante se encuentra aprobado',
      theme: 'modern',
      type: 'red',
      typeAnimated: true,
      buttons: {
        aceptar: function () {
          document.getElementById("sup-"+param[1]).value = "";
        }
      }
    });
    return;
  }  
}

async function total(input)
{
  var param = input.split("-");

  var idperiodo = document.getElementById("cmbidperiodo").value;
  var idmatricula =  document.getElementById("idmatricula-"+param[1]).value;
  var idcarrera = document.getElementById("idcarrera").value;  
  var idnivel = document.getElementById("idnivel").value;
  var idmateria = document.getElementById("idmateria").value;

  var p1 = isNaN(document.getElementById("p1-"+param[1]).value) ? 0 : parseFloat(document.getElementById("p1-"+param[1]).value);
  var p2 = isNaN(document.getElementById("p2-"+param[1]).value) ? 0 : parseFloat(document.getElementById("p2-"+param[1]).value);  
  var sup = isNaN(document.getElementById("sup-"+param[1]).value) ? 0 : parseFloat(document.getElementById("sup-"+param[1]).value);  

  var suma = p1+p2;
  var total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 


  if(suma>=56 &&suma<=69){
    if(sup>=14){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=55){
    if(sup>=15){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=54){
    if(sup>=16){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=53){
    if(sup>=17){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=52){
    if(sup>=18){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=51){
    if(sup>=19){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  } else if(suma>=50){
    if(sup>=20){
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2) + (isNaN(sup) ? 0 : sup); 
    } else{
      total = (isNaN(p1) ? 0 : p1) + (isNaN(p2) ? 0 : p2);
    }
  }

  if(total>70 ){
    // if(document.getElementById("sup-"+param[1]).value == ""){
    //   total = suma;
    // } else {
      total = 70;
    // }
  }

  document.getElementById("t-"+param[1]).value =  "";    
  document.getElementById("t-"+param[1]).value =  total;   

  await axios.post(DIR + 'ingresocalificaciontotal/insertcalificacion/', {
    idperiodo,
    idmatricula,
    idcarrera,    
    idnivel,
    idmateria,
    p1,
    p2,
    sup,
    total
  })
  .then(function (res){
   
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

  await axios.post(DIR + 'ingresocalificaciontotal/findcalificacionidmatricula/',{
    idmatricula, 
    idperiodo,
    idmateria
  })
  .then(function (res){
    let info = res.data;
    
    //if(res.data.length>0){
      document.getElementById("p1-"+idmatricula).value = info.p1;
      document.getElementById("p2-"+idmatricula).value = info.p2;
      document.getElementById("sup-"+idmatricula).value = info.sup;
      document.getElementById("t-"+idmatricula).value = info.total;
    //}
  })
  .catch(function (error){
    console.log(error.message);
  });
}

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function () {
  $('#exampleModal').modal('hide');
});

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

