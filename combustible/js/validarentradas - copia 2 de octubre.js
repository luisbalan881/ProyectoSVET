 function validarKilometrosFinales(numero){
  
   var btnEnviar = document.getElementById('boton_s_t');
   var kmInicial = $('#km_inicial').val();
  
        if(numero < kmInicial ){
           
           alert("El kilometraje " + numero + " es menor a kilometraje inical:" + " " +kmInicial+ " " + "Verificar valor no se procesara ingreso");
        btnEnviar.disabled = true
        
        
       } else 
        btnEnviar.disabled = false
       
  }
