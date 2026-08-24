 function validarPeriodo(numero){  
		    var fecha="2027";
			
			 var periodo1=$('#periodo').val();
			 if (periodo1==fecha){
			  
			  
		//	  alert(periodo1);
		 swal("error ", " Actualmente No se puede utilizar el periodo 2026 hasta nuevo aviso" , "error");
        btnEnviar.disabled = true;
		soli_tiempo.disabled = true;
		
		
		  }
			
			
			}
