var idperiodo = document.getElementById("cmbidperiodo").value;
var iddocente = document.getElementById("idusuario").value;

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
    await axios.post('https://appit.itsup.edu.ec/docente/carrera/findcarrerasdocente/', {
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
        await axios.post('https://appit.itsup.edu.ec/docente/nivel/findniveliddocente/', {
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
        await axios.post('https://appit.itsup.edu.ec/docente/materia/findmateriasiddocente/', {
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

    // let idperiodo = document.getElementById("cmbidperiodo").value;
    let idmateria = document.getElementById("idmateria").value;  

    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {backdrop: 'static', keyboard: false})
    myModal.show();
    
    document.getElementById("periodoAcademico").value = periodo.text; 
    document.getElementById("nivel").value = nivel.text;
    document.getElementById("nombreAsignatura").value = materia.text;
    // document.getElementById("materia").innerHTML = "<strong>MATERIA: </strong>" + $("#idmateria option:selected").text();    
})

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
