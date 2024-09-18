const miToast = document.getElementById('myToast');
const toast = new bootstrap.Toast(miToast);

$(document).ready(async function (){
    let idperiodo = document.getElementById("cmbidperiodo").value;

    await axios.post(DIR + 'carrera/findcarreraintroductorio/', {
        idperiodo
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

    let idperiodo = document.getElementById("cmbidperiodo").value;
    let idcarrera = this.value;

    await axios.post(DIR + 'materiaintroductorio/findmateriasidcarrera/', {
        idperiodo,
        idcarrera
    })
    .then(function (res){
        let options = res.data;
        console.log(options)
        document.getElementById("idmateria").innerHTML = options;
    })

});