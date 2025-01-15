const idperiodo = document.getElementById("idperiodo").value; 
var modalEstudiantes = new bootstrap.Modal(document.getElementById('modalEstudiantes'), {keyboard: false, backdrop:'static'})

var IdCarrera = document.getElementById("idcarrera");
IdCarrera.addEventListener("change", async function () {
    let idcarrera = this.value;

    await axios.post(DIR + 'materia/findmateriasidcarrera/',{
        idperiodo,
        idcarrera
    })
    .then(function (res) {
        let options = res.data;

        document.getElementById("idmateria").innerHTML = options;
    })
    .catch(function (error){
        $.confirm({
        title: 'Información del Sistema',
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
});

var btnMostrar = document.getElementById("btnMostrar");
btnMostrar.addEventListener("click", async function() {
    if (!validate()) {
        $.confirm({
            title: 'Inicio de sesión',
            icon: 'fa fa-exclamation-triangle',
            content: 'Los campos marcados con rojo son obligatorios. Complete la información para continuar.',
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

    let idmateria = document.getElementById("idmateria").value;

    await axios.post(DIR + 'estudiante/findestudiantesidmateria/',{
        idperiodo,
        idmateria
    })
    .then(function (res) {
        let table = res.data;

        document.getElementById("tabla").innerHTML = table;
    })
    .catch(function (error){
        $.confirm({
        title: 'Información del Sistema',
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
});

async function listarEstudiante()
{
    let idcarrera = document.getElementById("idcarrera").value;

    await axios.post(DIR + 'carrera/findcarreraidperiodo/',{
        idperiodo,
        idcarrera
    })
    .then(function (res) {
        let options = res.data;

        document.getElementById("carrera").innerHTML = options;

        modalEstudiantes.show();
    })
    .catch(function (error){
        $.confirm({
        title: 'Información del Sistema',
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

var Carrera = document.getElementById("carrera");
Carrera.addEventListener("change", async function() {
    let idcarrera = this.value;

    await axios.post(DIR + 'nivel/findnivelidcarrera/',{
        idperiodo,
        idcarrera
    })
    .then(function (res) {
        let options = res.data;

        document.getElementById("nivel").innerHTML = options;
    })
    .catch(function (error){
        $.confirm({
        title: 'Información del Sistema',
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
});

var Nivel = document.getElementById("nivel");
Nivel.addEventListener("change", async function() {
    let idcarrera = document.getElementById("carrera").value;
    let idnivel = this.value;

    await axios.post(DIR + 'estudiante/findestudianteslista/',{
        idperiodo,
        idcarrera,
        idnivel
    })
    .then(function (res) {
        let options = res.data;

        document.getElementById("tbEstudiantes").innerHTML = options;
    })
    .catch(function (error){
        $.confirm({
        title: 'Información del Sistema',
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
});

async function agregarEstudiante(idmatricula)
{
    let idmateria = document.getElementById("idmateria").value;

    await axios.post(DIR + 'matricula/agregamateriaidmatricula/',{
        idmateria,
        idmatricula
    })
    .then(function (res) {
        let info = res.data;

        if(info){
            $.confirm({
                title: 'Información del Sistema',
                icon: 'fa fa-thumbs-up',
                content: 'El estudiante fue agregado a la materia de forma satisfactoria',
                theme: 'modern',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                    aceptar: function () {
    
                    }
                }
            });
        } else {
            $.confirm({
                title: 'Información del Sistema',
                icon: 'fa fa-exclamation-triangle',
                content: 'No es posible agregar estudiante a la materia seleccionada',
                theme: 'modern',
                type: 'orange',
                typeAnimated: true,
                buttons: {
                    aceptar: function () {
    
                    }
                }
            });
        }
    })
    .catch(function (error){
        $.confirm({
        title: 'Información del Sistema',
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

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function() {
    modalEstudiantes.hide();
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