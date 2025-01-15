let defaultValue = "";
let auxValue = "";
var myModal = new bootstrap.Modal(document.getElementById('calificacionesModal'), {keyboard:false, backdrop:'static' })
const miToast = document.getElementById('myToast');
const toast = new bootstrap.Toast(miToast);

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

    let idperiodo = document.getElementById("idperiodo").value;
    let idmodulo = document.getElementById("idmodulo").value;

    await axios.post(DIR + 'reportecalificacion/viewlistaestudiante/', {
        idperiodo,
        idmodulo
    })
    .then(function (res){
        let rows = res.data;

        document.getElementById("periodo").innerHTML = "<strong>Periodo: </strong>" + $("#idperiodo option:selected").text();
        document.getElementById("modulo").innerHTML = "<strong>MODULO: </strong>" + $("#idmodulo option:selected").text();

        tabla.innerHTML = rows;
        myModal.show();
    })

});

var btnCerrar = document.getElementById("btnCerrar");
btnCerrar.addEventListener("click", function(){
    myModal.hide();
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
    if (document.getElementById("idmodulo").value == "") {
        input = document.getElementById("idmodulo");
        input.className += " is-invalid";
        flag = false;
      } else {
        input = document.getElementById("idmodulo");
        input.classList.remove("is-invalid");
      }

    return flag;
}
