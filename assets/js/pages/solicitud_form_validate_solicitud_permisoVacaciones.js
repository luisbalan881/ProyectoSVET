function add_formulario_vacaciones(userid, dep, correlativo) {
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
		  
      
        var codigo;
        var id_user=userid;
        var c=correlativo; //d_solicitud
        var dep1=dep;   
		//dias_soli
        
		console.log(id_user);  //id_usuario
		console.log(c);     //id_solicitud
		//console.log(dep1);   // departamento 
				//console.log(id);
       // soli_tiempo


        //var p = regformhash(form,form.password,form.confirmpwd);

        //var fecha=$('#soli_fecha').val();
        //var fecha2=$('#soli_fecha2').val();
        var dias_soli=$('#dias_solicitados').val();
		 var dias_consumidos=$('#dias_consumidos').val(); 
		 var id_periodo=$('#id_periodo').val(); //id_periodo
		
		console.log(dias_soli);
		
		
		console.log(dias_consumidos);
        //var duracion1=$('#soli_tiempo2').val();
        var dur_en=$("#horas_dias option:selected");
       //var lugar=$("#soli_lugar").val(); // luares
        var especificacion = "";  // tiempo 
        
        dur_en.each(function ()
      {
         especificacion=$(this).val();
      });
        
          
         var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
          //var s = "SVET-";                      // preubas add codigo
          //var codigo3 = s + dep1 +"-" + ano;
    
         

          $.ajax({

            type: "POST",
            url: "rrhh_permisos/php/add_solicitud2_vacaciones.php",
            data: {c:c,dias_soli:dias_soli, id_user:id_user, dias_consumidos:dias_consumidos, id_periodo:id_periodo}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading').fadeIn("slow");
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
                                                      show_notificacion_success("generando");
                                                  //get_horarios_usuario();
                                           }, 300);
                                           
                    
                    
                    
                    codigo= data;
                    
                    
                    

                        //  
                   
                          
                          
                          
                          // HTMLtoPDF
                          $.ajax({

                            type: "POST",
                            url: "rrhh_permisos/php/add_solicitud_detalle11.php",
                            data: {codigo:c}, //f de fecha y u de estado.

                            beforeSend:function(){
                                          //$('#response').html('<span class="text-info">Loading response...</span>');

                                          $('#loading1').fadeIn("slow");
                                  },
                                  //
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
                                                      show_notificacion_success("Solicitud validada");
													  location.reload();
                                                  //get_horarios_usuario();
                                           }, 300);
                                           
                                        //  HTMLtoPDF1(codigo);
                                         // HTMLtoPDFV(codigo);
                                            
                                           // datos_hoja_cupones5(codigo);
                                  }  // fin de data


                          }).done( function(data) {










                          }).fail( function( jqXHR, textSttus, errorThrown){

                            alert(errorThrown);

                          });

                   // });  // fin de funcion selected
                    
                    
                      // fin de funcion selected2

                    
      } // fin de funcion data
  });

}
 });

}

