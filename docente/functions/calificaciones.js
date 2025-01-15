var btnImprimir = document.getElementById("btnImprimir");
btnImprimir.addEventListener("click", function (){ 
  var element = document.getElementById("tbLista");
  var opt = {
    margin:       5,
    filename:     'document.pdf',
    image:        { type: 'jpeg', quality: 0.98 },
    html2canvas:  { scale: 10 },
    jsPDF:        { orientation: 'l',
                    unit: 'mm',
                    format: 'a4',
                    putOnlyUsedFonts:true,
                    floatPrecision: 16 // or "smart", default is 16 
                  }
  };

  html2pdf().set(opt).from(element).save();

  document.getElementById("firma").style.display = 'block';
});

