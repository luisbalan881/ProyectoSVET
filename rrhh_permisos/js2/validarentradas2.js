 function validarPeriodo(numero){  
		    var fecha="2024";
			
			 var periodo1=$('#periodo').val();
			 if (periodo1==fecha){
			  
			  
		//	  alert(periodo1);
		 swal("error ", " Actualmente No se puede utilizar el periodo 2024 hasta nuevo aviso" , "error");
        btnEnviar.disabled = true;
		soli_tiempo.disabled = true;
		
		
		  }
			
			
			}
