
function calcularFluxo(){
	var residente = document.getElementById("residente").value;
	var empregada = document.getElementById("empregada").value;
  var estudantes = document.getElementById("estudantes").value;
  var idosos = document.getElementById("idosos").value;
	var token = $('meta[name="csrf-token"]').attr('content');
	console.log(residente);
  console.log(idosos);
  console.log(idosos >= residente);
  /*if(residente <= empregada || residente <= estudantes || residente <= idosos){
    if(residente <= empregada){
      alert('População Total Residente não pode ser menor ou igual a população empregada da cidade');
    }
    if(residente <= estudantes){
      alert('População Total Residente não pode ser menor ou igual a população de estudantes da cidade');
    }
    if(residente <= idosos){
      alert('População Total Residente não pode ser menor ou igual a população de idosos da cidade');
    }
  }else{
    $.ajax({
      type: "POST",
      url:'calcularFluxo',
      data:{
        _token:token,
        residente: residente,
        empregada: empregada,
        estudantes: estudantes,
        idosos: idosos
      },
      success: function (response) {
                  
                  alert('response');
                  location.replace('/');
      },
      error: function () {
                 alert("erro ao calcular Fluxo :(");
      }

    });
  }*/
}