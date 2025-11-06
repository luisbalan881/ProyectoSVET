  function validarDias(numero){
  
  
   var btnEnviar3 = document.getElementById('soli_tiempo');
  
   var btnEnviar = document.getElementById('boton_s_t');
   var dias_res2 = $('#pendientes1').val(); //pendientes
	var dias_res = $('#dias_restantes').val();  //acumulados dias_restantes //soli_tiempo2
//	var dias_res3 = $('#dias_restantes').val();  //acumulados dias_restantes 
    var validar = $('#soli_tiempo2').val(); //pendientes
	
	
      
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
		if(validar === ''){
			
			   swal("error ", " No tiene asignado periodos posteriores llamar al administrador,  para realizar la activacion de periodos " , "error");
        btnEnviar.disabled = true;
			
		}  else {
		if(parseFloat(numero) <= dias_res2){
		
		if(parseFloat(numero) <= dias_res){
		
		swal("validos","a números de días permitidos","success");
		 btnEnviar.disabled = false;
		} 
		else if(parseFloat(numero) > dias_res){
           
           swal("error ", " El valor sobrepasa  a los días acumulados durante el año en curso" , "error");
        btnEnviar.disabled = true;
		
        
        
       } 
	  
	   } 
		
       else {
           
           swal("error ", "El valor ingresado sobrepasa a los días pendientes al periodo asignado " , "error");
        btnEnviar.disabled = true;
		
        
        
       } 
	   } // fin de else
       
  }
  
  function validarDias2(numero){
  
   var btnEnviar = document.getElementById('boton_s_t');
   var dias_res2 = $('#pendientes1').val(); //pendientes
	var dias_res = $('#dias_restantes').val();  //acumulados dias_restantes //soli_tiempo2
//	var dias_res3 = $('#dias_restantes').val();  //acumulados dias_restantes 
    var validar = $('#soli_tiempo2').val(); //pendientes
	
	
      
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
		if(validar === ''){
			
			   swal("error ", " No tiene asignado periodos posteriores llamar al administrador,  para realizar la activacion de periodos " , "error");
        btnEnviar.disabled = true;
			
		}  else {
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
	   } // fin de else
       
  }


  