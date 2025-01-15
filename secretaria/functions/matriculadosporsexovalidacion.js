
var cmbIdPeriodo = document.getElementById("cmbidperiodo");
cmbIdPeriodo.addEventListener("change", async function(){
    let idperiodo = this.value;
  
    await axios.post(DIR + 'matriculadosporsexovalidacion/findsexovalidacionidperiodo/', {
        idperiodo
    })
    .then(function (res){
        let table = res.data;
       
        document.getElementById("tabla").innerHTML = table;
        tbody.innerHTML = options;
    })
    .catch(function (ex){
        console.log(ex)
    })
});
