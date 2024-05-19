
var cmbIdPeriodo = document.getElementById("cmbidperiodo");
cmbIdPeriodo.addEventListener("change", async function(){
    let idperiodo = this.value;
  
    await axios.post(DIR + 'matriculadosporsexo/findsexocarreraidperiodo/', {
        idperiodo
    })
    .then(function (res){
        let options = res.data;
       
        'use strict';
        const tbody = document.querySelector('#tbLista tbody');
        tbody.innerHTML = options;
    })
    .catch(function (ex){
        console.log(ex)
    })
});
