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
    var optdocente = document.querySelectorAll('#iddocente option');
    optdocente.forEach(o => o.remove());

    var optmateria = document.querySelectorAll('#idmateria option');
    optmateria.forEach(o => o.remove());

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

            // $('#idmateria').append($('<option />', {
            //     text: "-- Seleccione Materia --",
            //     value: "",
            // }));
        });
    } else {
        $('#idmateria').append($('<option />', {
            text: "-- Seleccione Materia --",
            value: "",
        }));
        $('#iddocente').append($('<option />', {
            text: "-- Seleccione Docente --",
            value: "",
        }));

    }
});