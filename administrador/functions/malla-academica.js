var idperiodo = document.getElementById("idperiodo").value;

var idcarrera = document.getElementById("idcarrera");
idcarrera.addEventListener("change", async function () {
    let idcarrera = this.value;

    await axios.post(DIR + 'modalidad/findmodalidadidcarreraidperiodo', {
        idperiodo,
        idcarrera
    })
    .then(function (res) {
        let options = res.data;

        document.getElementById("modalidad").innerHTML = options; 
        document.getElementById("idnivel").innerHTML = '<option value="">-- Seleccione Nivel --</option>';
    })
    .catch(function (error) {
        console.log(error);
        $.confirm({
            title: 'Acceso no autorizado',
            icon: 'fa fa-exclamation-triangle',
            content: error.data,
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

var idnivel = document.getElementById("idnivel");
idnivel.addEventListener("change", async function () {
    let idcarrera = document.getElementById("idcarrera").value;
    let idnivel = this.value;

    await axios.post(DIR + 'mallaacademica/findmallaidperiodo', {
        idperiodo,
        idcarrera,
        idnivel
    })
    .then(function (res) {
        let table = res.data;
console.log(table)
        document.getElementById("tabla").innerHTML = table; 
    })
    .catch(function (error) {
        console.log(error);
        $.confirm({
            title: 'Acceso no autorizado',
            icon: 'fa fa-exclamation-triangle',
            content: error.data,
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
