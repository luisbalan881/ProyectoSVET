 function validarPeriodo(numero){  
		    var fecha="2026";
			
			 var periodo1=$('#periodo').val();
			 if (periodo1==fecha){
			  
			  
		//	  alert(periodo1);
		 swal("error ", " Actualmente No se puede utilizar el periodo 2025 hasta nuevo aviso" , "error");
        btnEnviar.disabled = true;
		soli_tiempo.disabled = true;
		
		
		  }
			
			
			}
