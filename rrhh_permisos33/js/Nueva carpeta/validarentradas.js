  function validarKilometrosFinales(numero){
  
   var btnEnviar = document.getElementById('boton_s_t');
   var dias_res2 = $('#pendientes1').val(); //pendientes
	var dias_res = $('#dias_restantes').val();  //acumulados dias_restantes 
//	var dias_res3 = $('#dias_restantes').val();  //acumulados dias_restantes 
	
	
      
       /*
        if(parseInt(numero) < parseInt(kmInicial)){
           
            swal("El kilometraje " + numero + " es menor a kilometraje inical:" + " " +kmInicial+ " " + "Verificar valor no se procesara ingreso");
        btnEnviar.disabled = true;
        
         document.write(name + "<br/>");
       } 
       
       
      else if(numero == null ){
           
           swal("El kilometraje " + numero + " so procesan valores vacio:" + " " +kmInicial+ " " + "no se procesara");
        btnEnviar.disabled = true;
        
        
       } 
      else if (parseInt(numero) > parseInt(kmInicial) )
        btnEnviar.disabled = false;
        swal("validos","contenido","success");  */
		
		if(parseFloat(numero) <= dias_res2){
		
		if(parseFloat(numero) <= dias_res){
		
		swal("validos","a números de días permitidos","success");
		 btnEnviar.disabled = false;
		} 
		else if(parseFloat(numero) > dias_res){
           
           swal("error ", " El valor sobrepasas  a los días acumulados del periodo seleccionado " , "error");
        btnEnviar.disabled = true;
		
        
        
       } 
	  
	   } 
		
       else {
           
           swal("error ", "El valor ingresado sobrepasa a los días pendientes " , "error");
        btnEnviar.disabled = true;
		
        
        
       } 
       
  }

  
  
    function validarstatus(numero2){
  
   var btnEnviar = document.getElementById('boton_s_t');
   var kmInicial = $('#status').val();

      
       /*
        if(parseInt(numero) < parseInt(kmInicial)){
           
            swal("El kilometraje " + numero + " es menor a kilometraje inical:" + " " +kmInicial+ " " + "Verificar valor no se procesara ingreso");
        btnEnviar.disabled = true;
        
        
       } 
       
       
      else if(numero == null ){
           
           swal("El kilometraje " + numero + " so procesan valores vacio:" + " " +kmInicial+ " " + "no se procesara");
        btnEnviar.disabled = true;
        
        
       } 
      else if (parseInt(numero) > parseInt(kmInicial) )
        btnEnviar.disabled = false;
        swal("validos","contenido","success");  */
		
		if(parseInt(numero2) == 1){
			
		
		swal("validos","a númerosdsfhoisdhfiohfoishdofis ","success");
		} 
		else if(parseInt(numero2) > 20){
           
           swal("error ", " sobrepasa a los dias permitidos " , "error");
        btnEnviar.disabled = true;
        
        
       } 
       
       
  }
