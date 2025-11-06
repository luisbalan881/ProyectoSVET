function add_solicitud_editable(userid, dep) {
  jQuery('.js-validation-solicitud').validate({
      ignore: [],
      errorClass: 'help-block animated fadeInDown',
      errorElement: 'div',
      errorPlacement: function(error, e) {
          jQuery(e).parents('.form-group > div').append(error);
      },
      highlight: function(e) {
          var elem = jQuery(e);

          elem.closest('.form-group').removeClass('has-error').addClass('has-error');
          elem.closest('.help-block').remove();
          $("#boton_s_t").removeClass('vibrar').addClass('vibrar');
      },
      success: function(e) {
          var elem = jQuery(e);

          elem.closest('.form-group').removeClass('has-error');
          $("#boton_s_t").removeClass('vibrar');
          elem.closest('.help-block').remove();


      },
      submitHandler: function(form){
        //alert('OK');
        //var codigo;
        var id2=userid;
        var dep1=dep;
        
       // soli_tiempo


        //var p = regformhash(form,form.password,form.confirmpwd);

        var fecha=$('#soli_fecha').val();
      //  var fecha2=$('#soli_fecha2').val();
		
        var periodo1=$('#periodo').val();
        var duracion1=$('#soli_tiempo').val();
		 var dias_consumidos_user=$('#soli_tiempo2').val();//pendientes1
		//  var pendientes=$('#pendientes1').val();   // periodo
		 // var periodo=$('#periodo').val(); 
		   var hora1=$('#soli_salida1').val(); 
		     var hora2=$('#soli_salida2').val();  //horas_dias
			  var tiempo=$('#horas_dias').val();
			  var tcompleto=$('#t_completo').val();
			//  alert("aqui");
		
		console.log(tcompleto);
		console.log(id2);

		console.log(hora1);
		console.log(hora2);
       // var dur_en=$("#horas_dias option:selected");
        var justifiacion=$("#soli_just").val(); // soli_obs
		 var obs=$("#soli_obs").val();
      //  var especificacion = "";  // tiempo 
        
      //  dur_en.each(function ()
     // {
      //   especificacion=$(this).val();
      //});
        
          
       //  var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
          //var s = "SVET-";                      // preubas add codigo
          //var codigo3 = s + dep1 +"-" + ano;
    
         

          $.ajax({

            type: "POST",
            url: "rrhh_permisos/php/add_solicitud_salida_editable.php",
            data: {fecha:fecha,duracion1:duracion1,hora1:hora1,hora2:hora2,id2:id2,justifiacion:justifiacion,obs:obs,tiempo:tiempo,tcompleto:tcompleto}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading1').fadeIn("slow");
                  },
				  
				  
				  
				  
				  
                //  success:function(data){
					  
					   success:function(data){
                                    //alert(data);

                                    setTimeout(function(){
                                                    $('#loading1').fadeOut("slow");
                                               }, 500);
                                     $('#message').fadeIn().html(data);
                                     $("#message").addClass('alert alert-success');
                                     setTimeout(function(){
                                                    $('#message').fadeOut("slow");
                                                    $('#loading1').fadeOut("slow");
                                                    $('#modal-remoto-lgg').modal('hide');
                                                      show_notificacion_success("Solicitud de modificada");
													   setTimeout( function() { window.location.href = "?ref=_95"; }, 1000);
                                                  //get_horarios_usuario();
                                           }, 300);
                                           
                                        //  HTMLtoPDF1(codigo);
                                         // HTMLtoPDFV(codigo);
                                            
                                           // datos_hoja_cupones5(codigo);
                                  
					  
					  
					  
					  
                    //alert(data);
               //     codigo= data;

                        //  
                   // var selected =$("#d_solicitantes option:selected"); // inicio de funcion selected
                    //  var message = "";
                    
                    

                    
      } // fin de funcion data
  });

}
 });

}


function add_solicitud_anular(userid, dep) {
  jQuery('.js-validation-solicitud').validate({
      ignore: [],
      errorClass: 'help-block animated fadeInDown',
      errorElement: 'div',
      errorPlacement: function(error, e) {
          jQuery(e).parents('.form-group > div').append(error);
      },
      highlight: function(e) {
          var elem = jQuery(e);

          elem.closest('.form-group').removeClass('has-error').addClass('has-error');
          elem.closest('.help-block').remove();
          $("#boton_s_t").removeClass('vibrar').addClass('vibrar');
      },
      success: function(e) {
          var elem = jQuery(e);

          elem.closest('.form-group').removeClass('has-error');
          $("#boton_s_t").removeClass('vibrar');
          elem.closest('.help-block').remove();


      },
      submitHandler: function(form){
        //alert('OK');
        //var codigo;
        var id2=userid;
        var dep1=dep;
        
       // soli_tiempo


        //var p = regformhash(form,form.password,form.confirmpwd);

        var fecha=$('#soli_fecha').val();
      //  var fecha2=$('#soli_fecha2').val();
		
        var periodo1=$('#periodo').val();
        var duracion1=$('#soli_tiempo').val();
		 var dias_consumidos_user=$('#soli_tiempo2').val();//pendientes1
		//  var pendientes=$('#pendientes1').val();   // periodo
		 // var periodo=$('#periodo').val(); 
		   var hora1=$('#soli_salida1').val(); 
		     var hora2=$('#soli_salida2').val();  //horas_dias
			  var tiempo=$('#horas_dias').val();
			  var tcompleto=$('#t_completo').val();
			//  alert("aqui");
		
		console.log(tcompleto);
		console.log(id2);

		console.log(hora1);
		console.log(hora2);
       // var dur_en=$("#horas_dias option:selected");
        var justifiacion=$("#soli_just").val(); // soli_obs
		 var obs=$("#soli_obs").val();
      //  var especificacion = "";  // tiempo 
        
      //  dur_en.each(function ()
     // {
      //   especificacion=$(this).val();
      //});
        
          
       //  var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
          //var s = "SVET-";                      // preubas add codigo
          //var codigo3 = s + dep1 +"-" + ano;
    
         

          $.ajax({

            type: "POST",
            url: "rrhh_permisos/php/add_solicitud_salida_anular1.php",
            data: {fecha:fecha,duracion1:duracion1,hora1:hora1,hora2:hora2,id2:id2,justifiacion:justifiacion,obs:obs,tiempo:tiempo,tcompleto:tcompleto}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading1').fadeIn("slow");
                  },
				  
				  
				  
				  
				  
                //  success:function(data){
					  
					   success:function(data){
                                    //alert(data);

                                    setTimeout(function(){
                                                    $('#loading1').fadeOut("slow");
                                               }, 500);
                                     $('#message').fadeIn().html(data);
                                     $("#message").addClass('alert alert-success');
                                     setTimeout(function(){
                                                    $('#message').fadeOut("slow");
                                                    $('#loading1').fadeOut("slow");
                                                    $('#modal-remoto-lgg').modal('hide');
                                                      show_notificacion_success("Solicitud de modificada");
													   setTimeout( function() { window.location.href = "?ref=_95"; }, 1000);
                                                  //get_horarios_usuario();
                                           }, 300);
                                           
                                        //  HTMLtoPDF1(codigo);
                                         // HTMLtoPDFV(codigo);
                                            
                                           // datos_hoja_cupones5(codigo);
                                  
					  
					  
					  
					  
                    //alert(data);
               //     codigo= data;

                        //  
                   // var selected =$("#d_solicitantes option:selected"); // inicio de funcion selected
                    //  var message = "";
                    
                    

                    
      } // fin de funcion data
  });

}
 });

}




function add_solicitud_anular_oficio(userid, dep) {
  jQuery('.js-validation-solicitud').validate({
      ignore: [],
      errorClass: 'help-block animated fadeInDown',
      errorElement: 'div',
      errorPlacement: function(error, e) {
          jQuery(e).parents('.form-group > div').append(error);
      },
      highlight: function(e) {
          var elem = jQuery(e);

          elem.closest('.form-group').removeClass('has-error').addClass('has-error');
          elem.closest('.help-block').remove();
          $("#boton_s_t").removeClass('vibrar').addClass('vibrar');
      },
      success: function(e) {
          var elem = jQuery(e);

          elem.closest('.form-group').removeClass('has-error');
          $("#boton_s_t").removeClass('vibrar');
          elem.closest('.help-block').remove();


      },
      submitHandler: function(form){
        //alert('OK');
        //var codigo;
        var id2=userid;
        var dep1=dep;
        var justifiacion=$("#soli_just").val(); // soli_obs

		 var obs=$("#soli_obs").val();
      
        
          
       //  var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
                   $.ajax({

            type: "POST",
            url: "oficios/php/add_anular_oficio.php",
            data: {id2:id2}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading1').fadeIn("slow");
                  },
				  
		
					   success:function(data){
                                    //alert(data);

                                    setTimeout(function(){
                                                    $('#loading1').fadeOut("slow");
                                               }, 500);
                                     $('#message').fadeIn().html(data);
                                     $("#message").addClass('alert alert-success');
                                     setTimeout(function(){
                                                    $('#message').fadeOut("slow");
                                                    $('#loading1').fadeOut("slow");
                                                    $('#modal-remoto-lgg').modal('hide');
                                                      show_notificacion_success("Oficio Anulado");
						  setTimeout( function() { window.location.href = "?ref=_137"; }, 1000);
                                                  //get_horarios_usuario();
                                           }, 300);
                                   
                    

                    
      } // fin de funcion data
  });

}
 });

}


