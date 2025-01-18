var idperiodo = document.getElementById("idperiodo").value;
var iddocente = document.getElementById("idusuario").value;

$('document').ready(async function(){
    await axios.post(DIR + 'carrera/findallidperiodoiddocente/', {
      idperiodo,
      iddocente
    })
    .then(function (res){
      let carreras = res.data;

      document.getElementById("idcarrera").innerHTML = carreras;
    });
});

var cmbIdCarrera = document.getElementById("idcarrera");
cmbIdCarrera.addEventListener("change", async function () {
    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

    var opttipoactividad = document.querySelectorAll('#idtipoactividad option');
    opttipoactividad.forEach(o => o.remove());

    var optsalasimulacion = document.querySelectorAll('#idsalasimulacion option');
    optsalasimulacion.forEach(o => o.remove());

    var idcarrera = document.getElementById("idcarrera").value;

    if (cmbIdCarrera.value != "") {
        await axios.post(DIR + 'materia/finddocentematerias/', {
            idperiodo,
            idcarrera,
            iddocente
        })
        .then(function (res) {
            let materias = res.data;

            document.getElementById("idmateria").innerHTML = materias;
            
            document.getElementById("fecha").value= "";
            
            document.getElementById("horainicio").value= "";

            document.getElementById("horafin").value= "";

            $('#idtipoactividad').append($('<option />', {
                text: "-- Seleccione Tipo de Actividad --",
                value: "",
            }));

            $('#idsala').append($('<option />', {
                text: "-- Seleccione Sala de Simulación --",
                value: "",
            }));

            $('#idestudiante').append($('<option />', {
                text: "-- Seleccione Ayudante de Simulación --",
                value: "",
            }));
        });
    } else {
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));
        document.getElementById("fecha").value = "";
        document.getElementById("horainicio").value = "";
        document.getElementById("horafin").value = "";
        $('#idtipoactividad').append($('<option />', {
            text: "-- Seleccione Tipo de Actividad --",
            value: "",
        }));
        $('#idsala').append($('<option />', {
            text: "-- Seleccione Sala de Simulación --",
            value: "",
        }));
        $('#idestudiante').append($('<option />', {
            text: "-- Seleccione Ayudante de Simulación --",
            value: "",
        }));
    }
});

var cmbIdMateria = document.getElementById("idmateria");
cmbIdMateria.addEventListener("change", async function () {
    var opttipoactividad = document.querySelectorAll('#idtipoactividad option');
    opttipoactividad.forEach(o => o.remove());

    var optsalasimulacion = document.querySelectorAll('#idsalasimulacion option');
    optsalasimulacion.forEach(o => o.remove());

    if (cmbIdMateria.value != "") {
        await axios.get(DIR + 'materia/finddocentematerias/')
        .then(function (res) {
            let materias = res.data;

            document.getElementById("idmateria").innerHTML = materias;
            
            document.getElementById("fecha").value= "";
            
            document.getElementById("horainicio").value= "";

            document.getElementById("horafin").value= "";

            $('#idtipoactividad').append($('<option />', {
                text: "-- Seleccione Tipo de Actividad --",
                value: "",
            }));

            $('#idsala').append($('<option />', {
                text: "-- Seleccione Sala de Simulación --",
                value: "",
            }));

            $('#idestudiante').append($('<option />', {
                text: "-- Seleccione Ayudante de Simulación --",
                value: "",
            }));
        });
    } else {
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));
        document.getElementById("fecha").value = "";
        document.getElementById("horainicio").value = "";
        document.getElementById("horafin").value = "";
        $('#idtipoactividad').append($('<option />', {
            text: "-- Seleccione Tipo de Actividad --",
            value: "",
        }));
        $('#idsala').append($('<option />', {
            text: "-- Seleccione Sala de Simulación --",
            value: "",
        }));
        $('#idestudiante').append($('<option />', {
            text: "-- Seleccione Ayudante de Simulación --",
            value: "",
        }));
    }
});
