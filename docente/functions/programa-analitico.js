var idperiodo = document.getElementById("cmbidperiodo").value;
var iddocente = document.getElementById("idusuario").value;

var fecha = new Date();
var dia = ("0" + fecha.getDate()).slice(-2);
var mes = ("0" + (fecha.getMonth() + 1)).slice(-2);
var año = fecha.getFullYear();

var fechaActual = año + "-" + mes + "-" + dia;

$(document).ready(function() {
    $("i.fa-info-circle").click(function(e) {
        e.preventDefault();
        var tooltip = $(this).closest(".tooltip-trigger").next(".custom-tooltip");
        $(".custom-tooltip").not(tooltip).hide(); // Oculta otros tooltips si hay alguno visible
        tooltip.toggle();
    });

    $(document).on("click", function(e) {
        if (!$(e.target).hasClass("fa-info-circle") && !$(e.target).hasClass("custom-tooltip")) {
            $(".custom-tooltip").hide();
        }
    });
});

window.onload = async function(){      
    await axios.post(DIR + 'carrera/findcarrerasdocente/', {
        idperiodo,
        iddocente
    })
    .then(function (res){
        let options = res.data;

        document.getElementById("idcarrera").innerHTML = options;
    });     
}

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener('change', async function () {
    let idcarrera = this.value;

    let optnivel = document.querySelectorAll('#idnivel option');
    optnivel.forEach(o => o.remove());

    let optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(cmbIdCarrera.value != "") {
        await axios.post(DIR + 'nivel/findniveliddocente/', {
            idperiodo,
            iddocente,
            idcarrera
        })
        .then(function (res){
            let options = res.data;

            $('#idnivel').append($('<option />', {
                text: "-- Seleccione Curso --",
                value: "",
            }));

            $('#idmateria').append($('<option />', {
                text: "-- Seleccione Materia --",
                value: "",
            }));

            document.getElementById("idnivel").innerHTML = options;
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
    let idcarrera = document.getElementById("idcarrera").value;
    let idnivel = document.getElementById("idnivel").value;
    
    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    if(cmbNivel.value != "") {
        await axios.post(DIR + 'materia/findmateriasiddocente/', {
            idperiodo,
            iddocente,
            idcarrera,
            idnivel
        })
        .then(function (res){
            let options  = res.data;

            document.getElementById("idmateria").innerHTML = options;
        });
    } else{
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));
    }
});

var selectPeriodo = document.getElementById("cmbidperiodo");
var periodo = selectPeriodo.querySelector("option");

var carrera = "";
var selectCarrera = document.getElementById('idcarrera');
selectCarrera.addEventListener('change',
  function(){
    carrera = this.options[selectCarrera.selectedIndex];
});

var nivel = "";
var selectNivel = document.getElementById('idnivel');
selectNivel.addEventListener('change',
  function(){
    nivel = this.options[selectNivel.selectedIndex];
});

var materia = "";
var selectMateria = document.getElementById('idmateria');
selectMateria.addEventListener('change',
  function(){
    materia = this.options[selectMateria.selectedIndex];
});

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function (){
    if(!validate()){
      $.confirm({
        title: 'Registro de Syllabus',
        icon: 'fa fa-exclamation-triangle',
        content: 'Seleccione la materia.',
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
        
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {backdrop: 'static', keyboard: false})
    myModal.show();
    
    let idmateria = document.getElementById("idmateria").value;  
    document.getElementById("periodoAcademico").value = periodo.text;     
    document.getElementById("nombreAsignatura").value = materia.text;    
    
    let nombreAsignatura = materia.text;
    let codigo = nombreAsignatura.split(' ');    
    document.getElementById("codigoAsignatura").value = codigo[0];
    
    document.getElementById("carrera").value = carrera.text;
    
    let cadena = materia.text;
    let posicionPrimerEspacio = cadena.indexOf(" ");
    let nombreAsignatura2 = "";

    if (posicionPrimerEspacio !== -1) {
        nombreAsignatura2 = cadena.substring(posicionPrimerEspacio);                    
    }
    document.getElementById("nombreAsignatura2").value = nombreAsignatura2;
    document.getElementById("periodoAcademico2").value = periodo.text;

    cadena = periodo.text;    
    let ps = cadena.split(" ");
    let p = ps[0] + ps[1];
    
    document.getElementById("periodoAcademico3").value = p;    
    document.getElementById("profesorAsignatura").value = document.getElementById("nombresusuario").innerHTML;

    document.getElementById("btnAgregarLogros").style.display = 'block';

    await axios.post(DIR + 'programaanalitico/finddatos/', {
        idperiodo,
        iddocente,
        idmateria
    })
    .then(function (res){
        let info = res.data[0];        
        
        if(res.data.length>0){            
            document.getElementById("caracterizacion").value = info.caracterizacion;
            document.getElementById("formacionValores").value = info.formacionValores;
            document.getElementById("educacionAmbiental").value = info.educacionAmbiental;
            document.getElementById("objetivos").value = info.objetivos;
            document.getElementById("competencia").value = info.competencia;
            document.getElementById("funciones").value = info.funciones;
            document.getElementById("utUnidadTematica1").value = info.utUnidadTematica1;
            document.getElementById("utDescripcionTematica1").value = info.utDescripcionTematica1;
            document.getElementById("utUnidadTematica2").value = info.utUnidadTematica2;
            document.getElementById("utDescripcionTematica2").value = info.utDescripcionTematica2;
            document.getElementById("utUnidadTematica3").value = info.utUnidadTematica3;
            document.getElementById("utDescripcionTematica3").value = info.utDescripcionTematica3;
            document.getElementById("utUnidadTematica4").value = info.utUnidadTematica4;
            document.getElementById("utDescripcionTematica4").value = info.utDescripcionTematica4;
            document.getElementById("metodologia").value = info.metodologia;
            document.getElementById("procedimientoEvaluacion").value = info.procedimientoEvaluacion;
            document.getElementById("bibliografiaBasica").value = info.bibliografiaBasica;
            document.getElementById("bibliografiaComplementaria").value = info.bibliografiaComplementaria;        
            document.getElementById("prerrequisito").value = info.prerrequisito;
            document.getElementById("correquisito").value = info.correquisito;        
            document.getElementById("unidadArticular").value = info.unidadArticular;
            document.getElementById("campoFormacion").value = info.campoFormacion;
            document.getElementById("periodoAcademico2").value = info.periodoAcademico2;
            document.getElementById("modalidad").value = info.modalidad;
            document.getElementById("periodoAcademico3").value = info.periodoAcademico3;
            document.getElementById("paralelo").value = info.paralelo;
            document.getElementById("horarioClase").value = info.horarioClase;
            document.getElementById("horarioTutorias").value = info.horarioTutorias;        
            document.getElementById("perfilProfesor").value = info.perfilProfesor;
            document.getElementById("totalHoras").value = info.totalHoras;
            document.getElementById("horasDocencia").value = info.horasDocencia;
            document.getElementById("horasPractica").value = info.horasPractica;
            document.getElementById("horasTrabajoAutonomo").value = info.horasTrabajoAutonomo;
            //Información para la estructura del syllabus            
            estructuraSyllabus(info.idsyllabus);
            //Información para los logros del Syllabus
            logrosSyllabus(info.idsyllabus);
            //Información para las articulaciones entre las funciones sustantivas
            articulacionSyllabus(info.idsyllabus);
        } else{
            limpiar();
        }
    });
})

var btnAgregarEstructura = document.getElementById("btnAgregarEstructura");
btnAgregarEstructura.addEventListener("click", async function(){  
    if (!validateDatos()) {
        $.confirm({
            title: 'Registro de Syllabus',
            icon: 'fa fa-exclamation-triangle',
            content: 'Debe agregar todas las unidades temáticas para poder llenar esta sección',
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

    let idcarrera = document.getElementById("idcarrera").value;
    let idnivel = document.getElementById("idnivel").value;
    let idmateria = document.getElementById("idmateria").value;
    let nombreAsignatura = document.getElementById("nombreAsignatura").value;    
    let periodoAcademico = document.getElementById("periodoAcademico").value;
    let caracterizacion = document.getElementById("caracterizacion").value;
    let formacionValores = document.getElementById("formacionValores").value;
    let educacionAmbiental = document.getElementById("educacionAmbiental").value;
    let objetivos = document.getElementById("objetivos").value;
    let competencia = document.getElementById("competencia").value;
    let funciones = document.getElementById("funciones").value;
    let utUnidadTematica1 = document.getElementById("utUnidadTematica1").value;
    let utDescripcionTematica1 = document.getElementById("utDescripcionTematica1").value;
    let utUnidadTematica2 = document.getElementById("utUnidadTematica2").value;
    let utDescripcionTematica2 = document.getElementById("utDescripcionTematica2").value;
    let utUnidadTematica3 = document.getElementById("utUnidadTematica3").value;
    let utDescripcionTematica3 = document.getElementById("utDescripcionTematica3").value;
    let utUnidadTematica4 = document.getElementById("utUnidadTematica4").value;
    let utDescripcionTematica4 = document.getElementById("utDescripcionTematica4").value;
    let metodologia = document.getElementById("metodologia").value;
    let procedimientoEvaluacion = document.getElementById("procedimientoEvaluacion").value;
    let bibliografiaBasica = document.getElementById("bibliografiaBasica").value;
    let bibliografiaComplementaria = document.getElementById("bibliografiaComplementaria").value;
    let codigoAsignatura = document.getElementById("codigoAsignatura").value;
    let nombreAsignatura2 = document.getElementById("nombreAsignatura2").value;
    let prerrequisito = document.getElementById("prerrequisito").value;
    let correquisito = document.getElementById("correquisito").value;
    let carrera = document.getElementById("carrera").value;
    let unidadArticular = document.getElementById("unidadArticular").value;
    let campoFormacion = document.getElementById("campoFormacion").value;
    let periodoAcademico2 = document.getElementById("periodoAcademico2").value;
    let modalidad = document.getElementById("modalidad").value;
    let periodoAcademico3 = document.getElementById("periodoAcademico3").value;
    let paralelo = document.getElementById("paralelo").value;
    let horarioClase = document.getElementById("horarioClase").value;
    let horarioTutorias = document.getElementById("horarioTutorias").value;
    let profesorAsignatura = document.getElementById("profesorAsignatura").value;
    let perfilProfesor = document.getElementById("perfilProfesor").value;
    let totalHoras = document.getElementById("totalHoras").value;
    let horasDocencia = document.getElementById("horasDocencia").value;
    let horasPractica = document.getElementById("horasPractica").value;
    let horasTrabajoAutonomo = document.getElementById("horasTrabajoAutonomo").value;
    
    await axios.post(DIR + 'programaanalitico/save/', {
        idperiodo,
        iddocente,
        idcarrera,
        idnivel,
        idmateria,
        nombreAsignatura,
        periodoAcademico,
        caracterizacion,
        formacionValores,
        educacionAmbiental,
        objetivos,
        competencia,
        funciones,
        utUnidadTematica1,
        utDescripcionTematica1,
        utUnidadTematica2,
        utDescripcionTematica2,
        utUnidadTematica3,
        utDescripcionTematica3,
        utUnidadTematica4,
        utDescripcionTematica4,
        metodologia,
        procedimientoEvaluacion,
        bibliografiaBasica,
        bibliografiaComplementaria,
        codigoAsignatura,
        nombreAsignatura2,
        prerrequisito,
        correquisito,
        carrera,
        unidadArticular,
        campoFormacion,
        periodoAcademico2,
        modalidad,
        periodoAcademico3,
        paralelo,
        horarioClase,
        horarioTutorias,
        profesorAsignatura,
        perfilProfesor,
        totalHoras,
        horasDocencia,
        horasPractica,
        horasTrabajoAutonomo
    })
    .then(async function (res){        
        let info = res.data;
        console.log(info)
        if(info){            
            // let idmateria = document.getElementById("idmateria").value
            let res = await axios.post(DIR + 'programaanalitico/finddatos/', { idperiodo, iddocente, idmateria })            
            let info = res.data[0];
            document.getElementById("idsyllabus").value = info.idsyllabus;
            
            var tbody = document.getElementById("miTbody1");
            let numeroDeFilas = tbody.querySelectorAll('tr').length + 1;            

            var fila = tbody.insertRow();

            var celda1 = fila.insertCell(0);
            var celda2 = fila.insertCell(1);
            var celda3 = fila.insertCell(2);
            var celda4 = fila.insertCell(3);
            var celda5 = fila.insertCell(4);
            var celda6 = fila.insertCell(5);
            var celda7 = fila.insertCell(6);
            var celda8 = fila.insertCell(7);
            var celda9 = fila.insertCell(8);
            var celda10= fila.insertCell(9);
            var celda11= fila.insertCell(10);


            celda1.innerHTML ="<select id='utd-"+numeroDeFilas+"' class='estructura form-select' style='font-size:1em'><option value='UT.1-"+document.getElementById("utUnidadTematica1").value+"'>UT.1-"+document.getElementById("utUnidadTematica1").value+"</option><option value='UT.2-"+document.getElementById("utUnidadTematica2").value+"'>UT.2-"+document.getElementById("utUnidadTematica2").value+"</option><option value='UT.3-"+document.getElementById("utUnidadTematica3").value+"'>UT.3-"+document.getElementById("utUnidadTematica3").value+"</option><option value='UT.4-"+document.getElementById("utUnidadTematica4").value+"'>UT.4-"+document.getElementById("utUnidadTematica4").value+"</option></select>";
            celda2.innerHTML = "<input id='co-"+numeroDeFilas+"' type='text' class='estructura form-control' style='font-size:1em;' required>";
            celda3.innerHTML = "<input id='hd-"+numeroDeFilas+"' type='text' class='estructura form-control text-center' style='font-size:1em;' required>";
            celda4.innerHTML = "<input id='pa-"+numeroDeFilas+"' type='text' class='estructura form-control text-center' style='font-size:1em;' required>";            
            celda5.innerHTML = "<input id='ta-"+numeroDeFilas+"' type='text' class='estructura form-control text-center' style='font-size:1em;' required>";            
            celda6.innerHTML = "<textarea id='me-"+numeroDeFilas+"' class='estructura form-control' style='font-size:1em;' required></textarea>";
            celda7.innerHTML = "<textarea id='rd-"+numeroDeFilas+"' class='estructura form-control' style='font-size:1em;' required></textarea>";
            celda8.innerHTML = "<textarea id='ea-"+numeroDeFilas+"' class='estructura form-control' style='font-size:1em;' required></textarea>";
            celda9.innerHTML = "<textarea id='fc-"+numeroDeFilas+"' class='estructura form-control' style='font-size:1em;' required></textarea>";
            celda10.innerHTML= "<input id='fe-"+numeroDeFilas+"' type='date' class='estructura form-control' style='font-size:1em;' value='"+fechaActual+"'>";
            celda11.innerHTML = "<a id='"+numeroDeFilas+"' href='javascript:;' class='estructura text-primary' style='font-size:1.5em;' onClick='guardaEstructura(this.id)'><i class='fa fa-check-square' aria-hidden='true'></i></a>";                    

            celda1.style.width = "20%";    
            celda2.style.width = "20%";    
            celda3.style.width = "5%";    
            celda4.style.width = "5%";    
            celda5.style.width = "5%";  
            
            celda1.style.margin = "auto";
            celda2.style.margin = "auto";
            celda3.style.margin = "auto";
            celda4.style.margin = "auto";
            celda5.style.margin = "auto";
            celda6.style.margin = "auto";
            celda7.style.margin = "auto";
            celda8.style.margin = "auto";
            celda9.style.margin = "auto";
            celda10.style.margin = "auto";
            celda11.style.margin = "auto";

            btnAgregarEstructura.style.display = 'none';
        }
    });
});

async function estructuraSyllabus(idsyllabus)
{
    document.getElementById("idsyllabus").value = idsyllabus;    

    await axios.post(DIR + 'programaanalitico/findestructura/', { 
        idsyllabus        
    })
    .then(function (res){
        let info = res.data;

        var tbody = document.getElementById("miTbody1");
        
        var fila;

        var celda1;
        var celda2;
        var celda3;
        var celda4;
        var celda5;
        var celda6;
        var celda7;
        var celda8;
        var celda9;
        var celda10;
        var celda11;

        for(i=0; i<res.data.length; i++)
        {            
            fila = tbody.insertRow();

            celda1 = fila.insertCell(0);
            celda2 = fila.insertCell(1);
            celda3 = fila.insertCell(2);
            celda4 = fila.insertCell(3);
            celda5 = fila.insertCell(4);
            celda6 = fila.insertCell(5);
            celda7 = fila.insertCell(6);
            celda8 = fila.insertCell(7);
            celda9 = fila.insertCell(8);
            celda10= fila.insertCell(9);
            celda11= fila.insertCell(10);

            var tbody = document.getElementById("miTbody1");
            let numeroDeFilas = tbody.querySelectorAll('tr').length;  

            // celda1.innerHTML = "<input type='text' class='form-control' style='font-size:1em' value='"+info[i].unidad_tematica+"' disabled>";
            celda1.innerHTML = "<select id='utd-"+info[i].idestructura+"' class='estructura form-select' style='font-size:1em' disabled><option value='UT.1-"+document.getElementById("utUnidadTematica1").value+"'>UT.1-"+document.getElementById("utUnidadTematica1").value+"</option><option value='UT.2-"+document.getElementById("utUnidadTematica2").value+"'>UT.2-"+document.getElementById("utUnidadTematica2").value+"</option><option value='UT.3-"+document.getElementById("utUnidadTematica3").value+"'>UT.3-"+document.getElementById("utUnidadTematica3").value+"</option><option value='UT.4-"+document.getElementById("utUnidadTematica4").value+"'>UT.4-"+document.getElementById("utUnidadTematica4").value+"</option></select>";
            document.getElementById("utd-"+info[i].idestructura).value = info[i].unidad_tematica;
            celda2.innerHTML = "<input id='cont-"+info[i].idestructura+"' type='text' class='form-control' style='font-size:1em;' value='"+info[i].contenidos+"' disabled>";
            celda3.innerHTML = "<input id='horash-"+info[i].idestructura+"' type='text' class='form-control text-center' style='font-size:1em;' value='"+info[i].horas_docencia+"' disabled>";
            celda4.innerHTML = "<input id='horaspa-"+info[i].idestructura+"' type='text' class='form-control text-center' style='font-size:1em;' value='"+info[i].horas_practica+"' disabled>";            
            celda5.innerHTML = "<input id='horasta-"+info[i].idestructura+"' type='text' class='form-control text-center' style='font-size:1em;' value='"+info[i].horas_trabajo+"' disabled>";            
            celda6.innerHTML = "<textarea id='metodo-"+info[i].idestructura+"' type='text' class='form-control' style='font-size:1em;' disabled>"+info[i].metodos+"</textarea>";
            celda7.innerHTML = "<textarea id='recur-"+info[i].idestructura+"' type='text' class='form-control' style='font-size:1em;' disabled>"+info[i].recursos+"</textarea>";
            celda8.innerHTML = "<textarea id='escena-"+info[i].idestructura+"' type='text' class='form-control' style='font-size:1em;' disabled>"+info[i].escenarios+"</textarea>";
            celda9.innerHTML = "<textarea id='fuentes-"+info[i].idestructura+"' type='text' class='form-control' style='font-size:1em;' disabled>"+info[i].fuentes+"</textarea>";
            celda10.innerHTML= "<input id='fech-"+info[i].idestructura+"' type='date' class='form-control' style='font-size:1em;' value='"+info[i].fecha+"' disabled>";
            celda11.innerHTML= "<a id='"+info[i].idestructura+"' href='javascript:;' class='text-danger' style='font-size:1.5em; margin:auto;' onClick='eliminaEstructura(this.id)'><i class='fa fa-trash' aria-hidden='true'></i></a><a id='btnEdit-"+info[i].idestructura+"' href='javascript:;' class='text-success' style='font-size:1.5em; margin:auto;' onClick='editaEstructura("+info[i].idestructura+")'><i class='fas fa-edit' aria-hidden='true'></i></a><a id='btnUpdate-"+info[i].idestructura+"' href='javascript:;' class='text-primary' style='font-size:1.5em; margin:auto; display:none;' onClick='updateEstructura("+info[i].idestructura+")'><i class='fas fa-check-square' aria-hidden='true'></i></a>";

            celda1.style.width = "20%";    
            celda2.style.width = "20%";    
            celda3.style.width = "5%";    
            celda4.style.width = "5%";    
            celda5.style.width = "5%";  
            celda11.style.width = "5%";  
            
            celda1.style.margin = "auto";
            celda2.style.margin = "auto";
            celda3.style.margin = "auto";
            celda4.style.margin = "auto";
            celda5.style.margin = "auto";
            celda6.style.margin = "auto";
            celda7.style.margin = "auto";
            celda8.style.margin = "auto";
            celda9.style.margin = "auto";
            celda10.style.margin = "auto";
            celda11.style.margin = "auto";
        }
    });
}

async function guardaEstructura(id)
{    
    let idsyllabus = document.getElementById("idsyllabus").value;
    let unidad_tematica = document.getElementById("utd-"+id).value;
    let contenidos = document.getElementById("co-"+id).value;
    let horas_docencia = document.getElementById("hd-"+id).value;
    let horas_practica = document.getElementById("pa-"+id).value;
    let horas_trabajo = document.getElementById("ta-"+id).value;
    let metodos = document.getElementById("me-"+id).value;
    let recursos = document.getElementById("rd-"+id).value;
    let escenarios = document.getElementById("ea-"+id).value;
    let fuentes = document.getElementById("fc-"+id).value;
    let fecha = document.getElementById("fe-"+id).value;

    if(idsyllabus == '' || unidad_tematica == '' || contenidos == '' || horas_docencia == '' || horas_practica == '' || horas_trabajo  == '' || metodos == '' || recursos == '' || escenarios == '' || fuentes == '' || fecha == ''){
        $.confirm({
            title: 'Registro de Syllabus',
            icon: 'fa fa-exclamation-triangle',
            content: 'Debe completar toda la información para agregar la estructura de la unidad temática seleccionada',
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

    await axios.post(DIR + 'programaanalitico/saveestructura/', { 
        idsyllabus,
        unidad_tematica,
        contenidos,
        horas_docencia,
        horas_practica,
        horas_trabajo,
        metodos,
        recursos,
        escenarios,
        fuentes,
        fecha
    })
    .then(function (res){
        let info = res.data;                

        if(info){
            $.confirm({
                title: 'Registro de Syllabus',
                icon: 'fa fa-thumbs-up',
                content: 'Contenido guardado satisfactoriamente',
                theme: 'modern',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                  aceptar: function () {
                    
                  }
                }
            });

            // Seleccionamos todos los elementos con la clase 'estructura'
            var elementos = document.querySelectorAll('.estructura');

            // Recorremos cada elemento y lo deshabilitamos
            elementos.forEach(function(elemento) {
                elemento.setAttribute('disabled', true);
            });     
            
            btnAgregarEstructura.style.display = 'block';
        }
    });
}

async function editaEstructura(id)
{
    document.getElementById('utd-'+id).disabled = false;
    document.getElementById('cont-'+id).disabled = false;
    document.getElementById('horash-'+id).disabled = false;
    document.getElementById('horaspa-'+id).disabled = false;
    document.getElementById('horasta-'+id).disabled = false;
    document.getElementById('metodo-'+id).disabled = false;
    document.getElementById('recur-'+id).disabled = false;
    document.getElementById('escena-'+id).disabled = false;
    document.getElementById('fuentes-'+id).disabled = false;    
    document.getElementById('fech-'+id).disabled = false;
    
    
    document.getElementById('btnEdit-'+id).style.display = 'none';
    document.getElementById('btnUpdate-'+id).style.display = 'inline';
}

async function updateEstructura(id)
{    
    let idestructura = id;
    let utd = document.getElementById('utd-'+id).value;
    let contenidos = document.getElementById('cont-'+id).value;
    let horas_docencia = document.getElementById('horash-'+id).value;
    let horas_practica = document.getElementById('horaspa-'+id).value;
    let horas_trabajo = document.getElementById('horasta-'+id).value;
    let metodos = document.getElementById('metodo-'+id).value;
    let recursos = document.getElementById('recur-'+id).value;
    let escenarios = document.getElementById('escena-'+id).value;
    let fuentes = document.getElementById('fuentes-'+id).value;
    let fecha = document.getElementById('fech-'+id).value;

    await axios.post(DIR + 'programaanalitico/updateestructura/', { 
        idestructura,
        utd,
        contenidos,
        horas_docencia,
        horas_practica,
        horas_trabajo,
        metodos,
        recursos,
        escenarios,
        fuentes,
        fecha
    })
    .then(function (res){
        let info = res.data;

        if(info){
            $.confirm({
                title: 'Registro de Syllabus',
                icon: 'fa fa-exclamation-triangle',
                content: 'Se actualizó la estructura satisfactoriamente.',
                theme: 'modern',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                  aceptar: function () {
          
                  }
                }
            });    
        } else{
            $.confirm({
                title: 'Registro de Syllabus',
                icon: 'fa fa-exclamation-triangle',
                content: 'No se guardó la información.',
                theme: 'modern',
                type: 'red',
                typeAnimated: true,
                buttons: {
                  aceptar: function () {
          
                  }
                }
            });
        }
            document.getElementById('cont-'+id).disabled = true;
            document.getElementById('horash-'+id).disabled = true;
            document.getElementById('horaspa-'+id).disabled = true;
            document.getElementById('horasta-'+id).disabled = true;
            document.getElementById('metodo-'+id).disabled = true;
            document.getElementById('recur-'+id).disabled = true;
            document.getElementById('escena-'+id).disabled = true;
            document.getElementById('fuentes-'+id).disabled = true;    
            document.getElementById('fech-'+id).disabled = true;
            
            
            document.getElementById('btnEdit-'+id).style.display = 'inline';
            document.getElementById('btnUpdate-'+id).style.display = 'none';
    });    
}

async function eliminaEstructura(id)
{
    let idestructura = id;

    await axios.post(DIR + 'programaanalitico/deleteestructura/', { 
        idestructura
    })
    .then(function (res){
        let info = res.data;

        if(info){
            var fila = document.getElementById(id).closest("tr");
            fila.remove();
        }        
    });        
}

var btnAgregarLogros = document.getElementById("btnAgregarLogros");
btnAgregarLogros.addEventListener("click", async function(){
    if (document.getElementById("idsyllabus").value == "") {
        $.confirm({
            title: 'Registro de Syllabus',
            icon: 'fa fa-exclamation-triangle',
            content: 'Debe agregar todas las unidades temáticas para poder llenar esta sección',
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

    var tbody = document.getElementById("miTbody2");    
    
    var fila = tbody.insertRow();
    var celda1 = fila.insertCell(0);
    var celda2 = fila.insertCell(1);
    var celda3 = fila.insertCell(2);
    var celda4 = fila.insertCell(3);    
    var celda5 = fila.insertCell(4);    

    celda1.innerHTML = "<input id='ut1' type='text' class='form-control' style='font-size:1em;' required disabled value='"+document.getElementById("utUnidadTematica1").value+"'>";
    celda2.innerHTML = "<textarea id='co1' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda3.innerHTML = "<textarea id='lo1' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda4.innerHTML = "<textarea id='in1' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda5.innerHTML = "<textarea id='ce1' type='text' class='form-control' style='font-size:1em;' required></textarea>";
            
    fila = tbody.insertRow();
    celda1 = fila.insertCell(0);
    celda2 = fila.insertCell(1);
    celda3 = fila.insertCell(2);
    celda4 = fila.insertCell(3);    
    celda5 = fila.insertCell(4);    

    celda1.style.width = "30%";
    celda2.style.width = "20%";

    celda1.innerHTML = "<input id='ut2' type='text' class='form-control' style='font-size:1em;' required disabled value='"+document.getElementById("utUnidadTematica2").value+"'>";
    celda2.innerHTML = "<textarea id='co2' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda3.innerHTML = "<textarea id='lo2' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda4.innerHTML = "<textarea id='in2' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda5.innerHTML = "<textarea id='ce2' type='text' class='form-control' style='font-size:1em;' required></textarea>";

    fila = tbody.insertRow();
    celda1 = fila.insertCell(0);
    celda2 = fila.insertCell(1);
    celda3 = fila.insertCell(2);
    celda4 = fila.insertCell(3);    
    celda5 = fila.insertCell(4);    

    celda1.innerHTML = "<input id='ut3' type='text' class='form-control' style='font-size:1em;' required disabled value='"+document.getElementById("utUnidadTematica3").value+"'>";
    celda2.innerHTML = "<textarea id='co3' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda3.innerHTML = "<textarea id='lo3' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda4.innerHTML = "<textarea id='in3' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda5.innerHTML = "<textarea id='ce3' type='text' class='form-control' style='font-size:1em;' required></textarea>";

    fila = tbody.insertRow();
    celda1 = fila.insertCell(0);
    celda2 = fila.insertCell(1);
    celda3 = fila.insertCell(2);
    celda4 = fila.insertCell(3);    
    celda5 = fila.insertCell(4);    

    celda1.innerHTML = "<input id='ut4' type='text' class='form-control' style='font-size:1em;' required disabled value='"+document.getElementById("utUnidadTematica4").value+"'>";
    celda2.innerHTML = "<textarea id='co4' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda3.innerHTML = "<textarea id='lo4' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda4.innerHTML = "<textarea id='in4' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda5.innerHTML = "<textarea id='ce4' type='text' class='form-control' style='font-size:1em;' required></textarea>";

    this.style.display = 'none';
    document.getElementById("btnGuardarLogros").style.display = 'block';
});

var btnGuardarLogros = document.getElementById("btnGuardarLogros");
btnGuardarLogros.addEventListener("click", async function(){
    if(!validateLogros()){
        $.confirm({
            title: 'Registro de Syllabus',
            icon: 'fa fa-exclamation-triangle',
            content: 'Error al tratar de guardar los logros.',
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

    let idsyllabus = document.getElementById("idsyllabus").value;
    let ut1 = document.getElementById("ut1").value;
    let co1 = document.getElementById("co1").value;
    let lo1 = document.getElementById("lo1").value;
    let in1 = document.getElementById("in1").value;
    let ce1 = document.getElementById("ce1").value;
    let ut2 = document.getElementById("ut2").value;
    let co2 = document.getElementById("co2").value;
    let lo2 = document.getElementById("lo2").value;
    let in2 = document.getElementById("in2").value;
    let ce2 = document.getElementById("ce2").value;
    let ut3 = document.getElementById("ut3").value;
    let co3 = document.getElementById("co3").value;
    let lo3 = document.getElementById("lo3").value;
    let in3 = document.getElementById("in3").value;
    let ce3 = document.getElementById("ce3").value;
    let ut4 = document.getElementById("ut4").value;
    let co4 = document.getElementById("co4").value;
    let lo4 = document.getElementById("lo4").value;
    let in4 = document.getElementById("in4").value;
    let ce4 = document.getElementById("ce4").value;

    await axios.post(DIR + 'programaanalitico/savelogros/', { 
        idsyllabus,
        ut1,
        co1,
        lo1,
        in1,
        ce1,
        ut2,
        co2,
        lo2,
        in2,
        ce2,
        ut3,
        co3,
        lo3,
        in3,
        ce3,
        ut4,
        co4,
        lo4,
        in4,
        ce4
    })
    .then(function (res){
        let info = res.data;

        if(info){
            $.confirm({
                title: 'Registro de Syllabus',
                icon: 'fa fa-thumbs-up',
                content: 'Logros guardados satisfactoriamente',
                theme: 'modern',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                  aceptar: function () {
                    
                  }
                }
            });

            btnGuardarLogros.style.display = 'none';

            document.getElementById("idsyllabus").disabled = true;
            document.getElementById("ut1").disabled = true;
            document.getElementById("co1").disabled = true;
            document.getElementById("lo1").disabled = true;
            document.getElementById("in1").disabled = true;
            document.getElementById("ce1").disabled = true;
            document.getElementById("ut2").disabled = true;
            document.getElementById("co2").disabled = true;
            document.getElementById("lo2").disabled = true;
            document.getElementById("in2").disabled = true;
            document.getElementById("ce2").disabled = true;
            document.getElementById("ut3").disabled = true;
            document.getElementById("co3").disabled = true;
            document.getElementById("lo3").disabled = true;
            document.getElementById("in3").disabled = true;
            document.getElementById("ce3").disabled = true;
            document.getElementById("ut4").disabled = true;
            document.getElementById("co4").disabled = true;
            document.getElementById("lo4").disabled = true;
            document.getElementById("in4").disabled = true;
            document.getElementById("ce4").disabled = true;
        }
    })

});

async function logrosSyllabus(idsyllabus)
{       
    await axios.post(DIR + 'programaanalitico/findlogros/', { 
        idsyllabus        
    })
    .then(function (res){
        let info = res.data;

        if(res.data.length>0){
            document.getElementById("btnAgregarLogros").style.display = 'none';
            document.getElementById("btnGuardarLogros").style.display = 'none';
        
            var tbody = document.getElementById("miTbody2");
            
            var fila;

            var celda1;
            var celda2;
            var celda3;
            var celda4;
            var celda5;        

            for(i=0; i<4; i++)
            {            
                fila = tbody.insertRow();

                celda1 = fila.insertCell(0);
                celda2 = fila.insertCell(1);
                celda3 = fila.insertCell(2);
                celda4 = fila.insertCell(3);
                celda5 = fila.insertCell(4);            


                // celda1.innerHTML = "<input type='text' class='form-control' style='font-size:1em' value='"+info[i].unidad_tematica+"' disabled>";
                // celda2.innerHTML = "<textarea class='form-control' style='font-size:1em;' disabled>"+info[i].contenidos+"</textarea>";
                // celda3.innerHTML = "<textarea class='form-control' style='font-size:1em;' disabled>"+info[i].logros_aprendizaje+"</textarea>";
                // celda4.innerHTML = "<textarea class='form-control' style='font-size:1em;' disabled>"+info[i].instrumentos_evaluacion+"</textarea>";
                // celda5.innerHTML = "<textarea class='form-control' style='font-size:1em;' disabled>"+info[i].criterios_evaluacion+"</textarea>";

                celda1.innerHTML = info[i].unidad_tematica;
                celda2.innerHTML = info[i].contenidos;
                celda3.innerHTML = info[i].logros_aprendizaje;
                celda4.innerHTML = info[i].instrumentos_evaluacion;
                celda5.innerHTML = info[i].criterios_evaluacion;

                celda1.style.width = "20%";    
                celda2.style.width = "20%";    
                celda3.style.width = "20%";                    
                
                celda1.style.margin = "auto";
                celda2.style.margin = "auto";
                celda3.style.margin = "auto";
                celda4.style.margin = "auto";
                celda5.style.margin = "auto";            
            }
        } 
    });
}

var btnAgregarArticulacion = document.getElementById("btnAgregarArticulacion");
btnAgregarArticulacion.addEventListener("click", function(){
    if (document.getElementById("idsyllabus").value == "") {
        $.confirm({
            title: 'Registro de Syllabus',
            icon: 'fa fa-exclamation-triangle',
            content: 'Debe agregar todas las unidades temáticas para poder llenar esta sección',
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

    var tbody = document.getElementById("miTbody3");    
    
    var fila = tbody.insertRow();
    var celda1 = fila.insertCell(0);
    var celda2 = fila.insertCell(1);
    var celda3 = fila.insertCell(2);
    var celda4 = fila.insertCell(3);   

    celda1.innerHTML = document.getElementById("utUnidadTematica1").value+"<br>"+document.getElementById("utUnidadTematica2").value+"<br>"+document.getElementById("utUnidadTematica3").value+"<br>"+document.getElementById("utUnidadTematica4").value+"<br>";    
    celda2.innerHTML = "<textarea id='articulacion_investigacion' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda3.innerHTML = "<textarea id='articulacion_vinculacion' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    celda4.innerHTML = "<textarea id='practicas' type='text' class='form-control' style='font-size:1em;' required></textarea>";
    

    this.style.display = 'none';
    document.getElementById("btnGuardarArticulacion").style.display = 'block';
});

var btnGuardarArticulacion = document.getElementById("btnGuardarArticulacion");
btnGuardarArticulacion.addEventListener("click", async function(){
    if(!validateArticulacion()){
        $.confirm({
            title: 'Registro de Syllabus',
            icon: 'fa fa-exclamation-triangle',
            content: 'Los campos marcados con rojo son obligatorios',
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

    let idsyllabus = document.getElementById("idsyllabus").value;
    let articulacion_investigacion = document.getElementById("articulacion_investigacion").value;
    let articulacion_vinculacion = document.getElementById("articulacion_vinculacion").value;
    let practicas = document.getElementById("practicas").value;

    await axios.post(DIR + 'programaanalitico/savearticulacion/', { 
        idsyllabus,
        articulacion_investigacion,
        articulacion_vinculacion,
        practicas
    })
    .then(function (res){
        let info = res.data;

        if(info){
            $.confirm({
                title: 'Registro de Syllabus',
                icon: 'fa fa-thumbs-up',
                content: 'Articulaciones guardadas satisfactoriamente',
                theme: 'modern',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                  aceptar: function () {
                    
                  }
                }
            });

            btnGuardarArticulacion.style.display = 'none';
            
            document.getElementById("articulacion_investigacion").disabled = true;
            document.getElementById("articulacion_vinculacion").disabled = true;
            document.getElementById("practicas").disabled = true;            
        }
    });

});

async function articulacionSyllabus(idsyllabus)
{       
    await axios.post(DIR + 'programaanalitico/findarticulaciones/', { 
        idsyllabus        
    })
    .then(function (res){
        let info = res.data;

        if(res.data.length>0){
            document.getElementById("btnAgregarArticulacion").style.display = 'none';
            document.getElementById("btnGuardarArticulacion").style.display = 'none';
        
            var tbody = document.getElementById("miTbody3");
            
            var fila;

            var celda1;
            var celda2;
            var celda3;       
            var celda4;       
            
            fila = tbody.insertRow();

            celda1 = fila.insertCell(0);
            celda2 = fila.insertCell(1);
            celda3 = fila.insertCell(2);
            celda4 = fila.insertCell(3);

            celda1.innerHTML = document.getElementById("utUnidadTematica1").value+"<br>"+document.getElementById("utUnidadTematica2").value+"<br>"+document.getElementById("utUnidadTematica3").value+"<br>"+document.getElementById("utUnidadTematica4").value+"<br>";    
            celda2.innerHTML = info[0].articulacion_investigacion;
            celda3.innerHTML = info[0].articulacion_vinculacion;
            celda4.innerHTML = info[0].practicas;            
        } 
    });
}

function validate()
{
    var flag = true;
    
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

function validateDatos()
{
    var flag = true;
    
    if (document.getElementById("nombreAsignatura").value == "") {
        input = document.getElementById("nombreAsignatura");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("nombreAsignatura");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("periodoAcademico").value == "") {
        input = document.getElementById("periodoAcademico");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("periodoAcademico");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("caracterizacion").value == "") {
        input = document.getElementById("caracterizacion");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("caracterizacion");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("formacionValores").value == "") {
        input = document.getElementById("formacionValores");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("formacionValores");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("educacionAmbiental").value == "") {
        input = document.getElementById("educacionAmbiental");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("educacionAmbiental");
        input.classList.remove("is-invalid");
    }        
    if (document.getElementById("objetivos").value == "") {
        input = document.getElementById("objetivos");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("objetivos");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("competencia").value == "") {
        input = document.getElementById("competencia");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("competencia");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("funciones").value == "") {
        input = document.getElementById("funciones");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("funciones");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utUnidadTematica1").value == "") {
        input = document.getElementById("utUnidadTematica1");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utUnidadTematica1");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utDescripcionTematica1").value == "") {
        input = document.getElementById("utDescripcionTematica1");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utDescripcionTematica1");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utUnidadTematica2").value == "") {
        input = document.getElementById("utUnidadTematica2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utUnidadTematica2");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utDescripcionTematica2").value == "") {
        input = document.getElementById("utDescripcionTematica2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utDescripcionTematica2");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utUnidadTematica3").value == "") {
        input = document.getElementById("utUnidadTematica3");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utUnidadTematica3");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utDescripcionTematica3").value == "") {
        input = document.getElementById("utDescripcionTematica3");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utDescripcionTematica3");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utUnidadTematica4").value == "") {
        input = document.getElementById("utUnidadTematica4");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utUnidadTematica4");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("utDescripcionTematica4").value == "") {
        input = document.getElementById("utDescripcionTematica4");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("utDescripcionTematica4");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("metodologia").value == "") {
        input = document.getElementById("metodologia");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("metodologia");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("procedimientoEvaluacion").value == "") {
        input = document.getElementById("procedimientoEvaluacion");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("procedimientoEvaluacion");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("bibliografiaBasica").value == "") {
        input = document.getElementById("bibliografiaBasica");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("bibliografiaBasica");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("codigoAsignatura").value == "") {
        input = document.getElementById("codigoAsignatura");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("codigoAsignatura");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("nombreAsignatura2").value == "") {
        input = document.getElementById("nombreAsignatura2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("nombreAsignatura2");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("prerrequisito").value == "") {
        input = document.getElementById("prerrequisito");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("prerrequisito");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("correquisito").value == "") {
        input = document.getElementById("correquisito");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("correquisito");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("carrera").value == "") {
        input = document.getElementById("carrera");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("carrera");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("unidadArticular").value == "") {
        input = document.getElementById("unidadArticular");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("unidadArticular");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("campoFormacion").value == "") {
        input = document.getElementById("campoFormacion");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("campoFormacion");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("periodoAcademico2").value == "") {
        input = document.getElementById("periodoAcademico2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("periodoAcademico2");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("modalidad").value == "") {
        input = document.getElementById("modalidad");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("modalidad");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("periodoAcademico3").value == "") {
        input = document.getElementById("periodoAcademico3");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("periodoAcademico3");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("paralelo").value == "") {
        input = document.getElementById("paralelo");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("paralelo");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("horarioClase").value == "") {
        input = document.getElementById("horarioClase");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("horarioClase");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("horarioTutorias").value == "") {
        input = document.getElementById("horarioTutorias");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("horarioTutorias");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("profesorAsignatura").value == "") {
        input = document.getElementById("profesorAsignatura");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("profesorAsignatura");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("perfilProfesor").value == "") {
        input = document.getElementById("perfilProfesor");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("perfilProfesor");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("totalHoras").value == "") {
        input = document.getElementById("totalHoras");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("totalHoras");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("horasDocencia").value == "") {
        input = document.getElementById("horasDocencia");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("horasDocencia");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("horasPractica").value == "") {
        input = document.getElementById("horasPractica");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("horasPractica");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("horasTrabajoAutonomo").value == "") {
        input = document.getElementById("horasTrabajoAutonomo");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("horasTrabajoAutonomo");
        input.classList.remove("is-invalid");
    }

    return flag;
}

function validateLogros()
{
    var flag = true;
    //1
    if (document.getElementById("co1").value == "") {
        input = document.getElementById("co1");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("co1");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("lo1").value == "") {
        input = document.getElementById("lo1");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("lo1");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("in1").value == "") {
        input = document.getElementById("in1");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("in1");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("ce1").value == "") {
        input = document.getElementById("ce1");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("ce1");
        input.classList.remove("is-invalid");
    }
    //2
    if (document.getElementById("co2").value == "") {
        input = document.getElementById("co2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("co2");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("lo2").value == "") {
        input = document.getElementById("lo2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("lo2");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("in2").value == "") {
        input = document.getElementById("in2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("in2");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("ce2").value == "") {
        input = document.getElementById("ce2");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("ce2");
        input.classList.remove("is-invalid");
    }
    //3
    if (document.getElementById("co3").value == "") {
        input = document.getElementById("co3");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("co3");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("lo3").value == "") {
        input = document.getElementById("lo3");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("lo3");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("in3").value == "") {
        input = document.getElementById("in3");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("in3");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("ce3").value == "") {
        input = document.getElementById("ce3");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("ce3");
        input.classList.remove("is-invalid");
    }
    //4
    if (document.getElementById("co4").value == "") {
        input = document.getElementById("co4");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("co4");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("lo4").value == "") {
        input = document.getElementById("lo4");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("lo4");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("in4").value == "") {
        input = document.getElementById("in4");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("in4");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("ce4").value == "") {
        input = document.getElementById("ce4");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("ce4");
        input.classList.remove("is-invalid");
    }
    

    return flag;
}

function validateArticulacion()
{
    var flag = true;
    
    if (document.getElementById("articulacion_investigacion").value == "") {
        input = document.getElementById("articulacion_investigacion");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("articulacion_investigacion");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("articulacion_vinculacion").value == "") {
        input = document.getElementById("articulacion_vinculacion");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("articulacion_vinculacion");
        input.classList.remove("is-invalid");
    }
    if (document.getElementById("practicas").value == "") {
        input = document.getElementById("practicas");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("practicas");
        input.classList.remove("is-invalid");
    }
    
    return flag;
}

function limpiar()
{
    document.getElementById("caracterizacion").value = "";
    document.getElementById("formacionValores").value = "";
    document.getElementById("educacionAmbiental").value = "";
    document.getElementById("objetivos").value = "";
    document.getElementById("competencia").value = "";
    document.getElementById("funciones").value = "";
    document.getElementById("utUnidadTematica1").value = "";
    document.getElementById("utDescripcionTematica1").value = "";
    document.getElementById("utUnidadTematica2").value = "";
    document.getElementById("utDescripcionTematica2").value = "";
    document.getElementById("utUnidadTematica3").value = "";
    document.getElementById("utDescripcionTematica3").value = "";
    document.getElementById("utUnidadTematica4").value = "";
    document.getElementById("utDescripcionTematica4").value = "";
    document.getElementById("metodologia").value = "";
    document.getElementById("procedimientoEvaluacion").value = "";
    document.getElementById("bibliografiaBasica").value = "";
    document.getElementById("bibliografiaComplementaria").value = "";
    document.getElementById("prerrequisito").value = "";
    document.getElementById("correquisito").value = "";
    document.getElementById("unidadArticular").value = "";
    document.getElementById("campoFormacion").value = "";    
    document.getElementById("modalidad").value = "";    
    document.getElementById("paralelo").value = "";
    document.getElementById("horarioClase").value = "";
    document.getElementById("horarioTutorias").value = "";
    document.getElementById("perfilProfesor").value = "";
    document.getElementById("totalHoras").value = "";
    document.getElementById("horasDocencia").value = "";
    document.getElementById("horasPractica").value = "";
    document.getElementById("horasTrabajoAutonomo").value = "";

    document.getElementById("miTbody1").innerHTML = "";    
    document.getElementById("miTbody2").innerHTML = "";
    document.getElementById("miTbody3").innerHTML = "";
    
}