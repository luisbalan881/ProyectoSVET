  function validarFecha(numero){
 
	//var fecha4="05-12-2024";
	//var fecha5="06-12-2024";
    var btnEnviar = document.getElementById('boton_s_t');//d_solicitantes
    var fecha_a_validar = $('#soli_fecha').val();
	
	 var fecha1 = $('#soli_fecha1').val();
	 var fecha2 = $('#soli_fecha2').val();
	  var fecha3 = $('#soli_fecha3').val();
	  
         
        if(parseInt(fecha1) == parseInt(fecha_a_validar)){
           
           swal("error", "la fecha:"+fecha_a_validar+ " " + "ingresada ya se encuetra ocupada todo el día" + " seleccionar una fecha diferente a:" +fecha_a_validar+ " " + ",o no se creará esta solicitud" ,"error");
		  // swal("validos","a números de días permitidos","success");
        btnEnviar.disabled = true;     
        
       } 
      
           else if(numero == null ){
           
           swal("la fecha no puede estar vacia " + numero + " no procesan valores vacio:" + " " +fecha_a_validar+ " " + "no se procesara");
        btnEnviar.disabled = true;
        
        
									} 
			else if (parseInt(numero) > parseInt(fecha_a_validar) )
        btnEnviar.disabled = false;
	
	
	 if(parseInt(fecha2) == parseInt(fecha_a_validar)){
           
           swal("error", "la fecha:"+fecha_a_validar+ " " + "ingresada ya se encuetra ocupada todo el día" + " seleccionar una fecha diferente a:" +fecha_a_validar+ " " + ",o no se creará esta solicitud", "error");
        btnEnviar.disabled = true;     
        
       } 
      
           else if(numero == null ){
           
           alert("error","la fecha no puede estar vacia " + numero + " no procesan valores vacio:" + " " +fecha_a_validar+ " " + "no se procesara","error");
        btnEnviar.disabled = true;
        
        
									} 
			else if (parseInt(numero) > parseInt(fecha_a_validar) )
        btnEnviar.disabled = false;
	
	 if(parseInt(fecha3) == parseInt(fecha_a_validar)){
           
          swal( "error","la fecha:"+fecha_a_validar+ " " + "ingresada ya se encuetra ocupada todo el día" + " seleccionar una fecha diferente a:" +fecha_a_validar+ " " + ",o no se creará esta solicitud", "error");
        btnEnviar.disabled = true;     
        
       } 
      
           else if(numero == null ){
           
           alert("la fecha no puede estar vacia " + numero + " no procesan valores vacio:" + " " +fecha_a_validar+ " " + "no se procesara");
        btnEnviar.disabled = true;
        
        
									} 
			else if (parseInt(numero) > parseInt(fecha_a_validar) )
        btnEnviar.disabled = false;
	
	 if(parseInt(fecha4) == parseInt(fecha_a_validar)){
           
          swal( "error","la fecha:"+fecha_a_validar+ " " + "ingresada ya se encuetra ocupada todo el día" + " seleccionar una fecha diferente a:" +fecha_a_validar+ " " + ",o no se creará esta solicitud", "error");
        btnEnviar.disabled = true;     
        
       } 
      
           else if(numero == null ){
           
           alert("la fecha no puede estar vacia " + numero + " no procesan valores vacio:" + " " +fecha_a_validar+ " " + "no se procesara");
        btnEnviar.disabled = true;
        
        
									} 
			else if (parseInt(numero) > parseInt(fecha_a_validar) )
        btnEnviar.disabled = false;
	
	 if(parseInt(fecha5) == parseInt(fecha_a_validar)){
           
          swal( "error","la fecha:"+fecha_a_validar+ " " + "ingresada ya se encuetra ocupada todo el día" + " seleccionar una fecha diferente a:" +fecha_a_validar+ " " + ",o no se creará esta solicitud", "error");
        btnEnviar.disabled = true;     
        
       } 
      
           else if(numero == null ){
           
           alert("la fecha no puede estar vacia " + numero + " no procesan valores vacio:" + " " +fecha_a_validar+ " " + "no se procesara");
        btnEnviar.disabled = true;
        
        
									} 
			else if (parseInt(numero) > parseInt(fecha_a_validar) )
        btnEnviar.disabled = false;
	
           
  }

  
  
