init();

var form = document.getElementById("form");
form.addEventListener("submit", function (event) {
    event.preventDefault();

    if (!validate()) {
        $.confirm({
            title: 'Perfil del estudiante',
            icon: 'fa fa-exclamation-triangle',
            content: 'Ingrese un número de identificación para realizar una búsqueda.',
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

    var numero_identificacion = document.getElementById("buscar").value;
    datosEstudiante(numero_identificacion);
});

var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function (){ 
  var element = document.getElementById("datos");
  var opt = {
    margin:       10,
    filename:     'document.pdf',
    image:        { type: 'png', quality: 1.0 },
    html2canvas:  { scale: 2 },
    jsPDF:        { orientation: 'p',
                    unit: 'mm',
                    format: 'a4',
                    putOnlyUsedFonts:true,
                    floatPrecision: 16 // or "smart", default is 16 
                  }
  };

  html2pdf().set(opt).from(element).save();
  
});

async function datosEstudiante(numero_identificacion) {
    document.getElementById("buscar").value = "";
    await axios.post(DIR + 'solicitudmatricula/findcedulanombres/', {
        numero_identificacion
    })
        .then(function (res) {
            let info = res.data[0];

            if(res.data.length == 0){
                $.confirm({
                    title: 'Perfil del estudiante',
                    icon: 'fa fa-exclamation-triangle',
                    content: 'No se encontraron coincidencias.',
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

            document.getElementById("foto").innerHTML = '<img src="https://appit.itsup.edu.ec/estudiante/files/'+info.foto+'" style="width:100px; height:150px">';
            document.getElementById("tipo_identificacion").value = info.tipo_identificacion;
            document.getElementById("numero_identificacion").value = info.numero_identificacion;
            document.getElementById("apellido1").value = info.apellido1;
            document.getElementById("apellido2").value = info.apellido2;
            document.getElementById("nombre1").value = info.nombre1;
            document.getElementById("nombre2").value = info.nombre2;
            document.getElementById("correo_electronico").value = info.correo_electronico;

            document.getElementById("tipo_identificacion").disabled = true;
            document.getElementById("numero_identificacion").disabled = true;
            document.getElementById("correo_electronico").disabled = true;

            var fecha_nacimiento = moment(info.fecha_nacimiento).format("YYYY-MM-DD");
            document.getElementById("fecha_nacimiento").value = fecha_nacimiento;
            if (info.sexo == 1) {
                document.getElementById("hombre").checked = true;
            } else {
                document.getElementById("mujer").checked = true;
            }
            document.getElementById("genero").value = info.genero;
            document.getElementById("estado_civil").value = info.estado_civil;
            document.getElementById("etnia").value = info.etnia;
            document.getElementById("tipo_sangre").value = info.tipo_sangre;
            if (info.discapacidad == 1) {
                document.getElementById("discapacidadSI").checked = true;
            } else {
                document.getElementById("discapacidadNO").checked = true;
            }
            document.getElementById("porcentaje_discapacidad").value = info.porcentaje_discapacidad;
            if (info.carnet_conadis == 1) {
                document.getElementById("carnet_conadisSI").checked = true;
            } else {
                document.getElementById("carnet_conadisNO").checked = true;
            }
            document.getElementById("numero_carnet").value = info.numero_carnet;
            document.getElementById("tipo_discapacidad").value = info.tipo_discapacidad;
            document.getElementById("idpais_nacionalidad").value = info.idpais_nacionalidad;
            document.getElementById("idcanton_nacimiento").value = info.idcanton_nacimiento;
            document.getElementById("idpais_residencia").value = info.idpais_residencia;
            document.getElementById("idcanton_residencia").value = info.idcanton_residencia;
            document.getElementById("numero_celular").value = info.numero_celular;
            document.getElementById("tipo_colegio").value = info.tipo_colegio;
            document.getElementById("ocupacion").value = info.ocupacion;
            document.getElementById("ingresos").value = info.ingresos;
            if (info.bono_desarrollo == 1) {
                document.getElementById("bono_desarrolloSI").checked = true;
            } else {
                document.getElementById("bono_desarrolloNO").checked = true;
            }
            document.getElementById("nivel_formacionp").value = info.nivel_formacionp;
            document.getElementById("nivel_formacionm").value = info.nivel_formacionm;
            document.getElementById("ingresos_hogar").value = info.ingresos_hogar;
            document.getElementById("miembros_hogar").value = info.miembros_hogar;
        })
}

function init() {
    document.getElementById("tipo_identificacion").disabled = true;
    document.getElementById("numero_identificacion").disabled = true;
    document.getElementById("fecha_nacimiento").disabled = true;
    document.getElementById("apellido1").disabled = true;
    document.getElementById("apellido2").disabled = true;
    document.getElementById("nombre1").disabled = true;
    document.getElementById("nombre2").disabled = true;
    document.getElementById("hombre").disabled = true;
    document.getElementById("mujer").disabled = true;
    document.getElementById("genero").disabled = true;
    document.getElementById("estado_civil").disabled = true;
    document.getElementById("etnia").disabled = true;
    document.getElementById("tipo_sangre").disabled = true;
    document.getElementById("discapacidadSI").disabled = true;
    document.getElementById("discapacidadNO").disabled = true;
    document.getElementById("porcentaje_discapacidad").disabled = true;
    document.getElementById("carnet_conadisSI").disabled = true;
    document.getElementById("carnet_conadisNO").disabled = true;
    document.getElementById("numero_carnet").disabled = true;
    document.getElementById("tipo_discapacidad").disabled = true;
    document.getElementById("idpais_nacionalidad").disabled = true;
    document.getElementById("idcanton_nacimiento").disabled = true;
    document.getElementById("idpais_residencia").disabled = true;
    document.getElementById("idcanton_residencia").disabled = true;
    document.getElementById("correo_electronico").disabled = true;
    document.getElementById("numero_celular").disabled = true;
    document.getElementById("tipo_colegio").disabled = true;
    document.getElementById("ocupacion").disabled = true;
    document.getElementById("ingresos").disabled = true;
    document.getElementById("bono_desarrolloSI").disabled = true;
    document.getElementById("bono_desarrolloNO").disabled = true;
    document.getElementById("nivel_formacionp").disabled = true;
    document.getElementById("nivel_formacionm").disabled = true;
    document.getElementById("ingresos_hogar").disabled = true;
    document.getElementById("miembros_hogar").disabled = true;
}

function validate() {
    var flag = true;
    if (document.getElementById("buscar").value == "") {
        input = document.getElementById("buscar");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("buscar");
        input.classList.remove("is-invalid");
    }

    return flag;
}