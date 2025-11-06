function add_solicitud1(userid, dep) {
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
        var codigo;
        var id=userid;
        var dep1=dep;
        
       // soli_tiempo


        //var p = regformhash(form,form.password,form.confirmpwd);

        var fecha=$('#soli_fecha').val();
        var fecha2=$('#soli_fecha2').val();
		var fecha3=$('#soli_fecha3').val();
        var periodo1=$('#periodo').val();
        var duracion1=$('#soli_tiempo').val();
		var dias_consumidos_user=$('#soli_tiempo2').val();//pendientes1
		var pendientes=$('#pendientes1').val();   // periodo
		var periodo=$('#periodo').val();
        var id_periodo=$('#periodo_id').val();		
		
		

       // var dur_en=$("#horas_dias option:selected");
        var justifiacion=$("#soli_just").val(); // luares
      //  var especificacion = "";  // tiempo 
        
      //  dur_en.each(function ()
     // {
      //   especificacion=$(this).val();
      //});
        
          
         var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
          //var s = "SVET-";                      // preubas add codigo
          //var codigo3 = s + dep1 +"-" + ano;
    
         

          $.ajax({

            type: "POST",
            url: "rrhh_permisos/php/add_solicitud_salida.php",
            data: {fecha:fecha,fecha2:fecha2,fecha3:fecha3,dias_consumidos_user:dias_consumidos_user,duracion1:duracion1,id:id,justifiacion:justifiacion,pendientes:pendientes,periodo:periodo,id_periodo:id_periodo}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading').fadeIn("slow");
                  },
                  success:function(data){
                    //alert(data);
                    codigo= data;

                        //  
                    var selected =$("#d_solicitantes option:selected"); // inicio de funcion selected
                      var message = "";
                    selected.each(function () {
                      var inst = $(this).val();
                        message = $(this).val();
                                  
                         var inst = $(this).val();
                          //vp_solicitud_transporte_departamento
                          
                          
                          
                          
                          // HTMLtoPDF
                          $.ajax({

                            type: "POST",
                            url: "rrhh_permisos/php/add_solicitud_detalle1.php",
                            data: {codigo:codigo, inst:inst, duracion1:duracion1}, //f de fecha y u de estado.  periodo1:periodo1

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
                                                      show_notificacion_success("detalle Generada");
													setTimeout( function() { window.location.href = "?ref=_92"; }, 1000);
													//  location.reload();
                                                  //get_horarios_usuario();
                                           }, 300);
                                           
                                        //  HTMLtoPDF1(codigo);
                                         // HTMLtoPDFV(codigo);
                                            
                                           // datos_hoja_cupones5(codigo);
                                  }


                          }).done( function(data) {










                          }).fail( function( jqXHR, textSttus, errorThrown){

                            alert(errorThrown);

                          });

                    });  // fin de funcion selected
                    
                    

                    
      } // fin de funcion data
  });

}
 });

}




//SOLICITURD add_solicitud_manual

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
        var codigo;
        var id=userid;
        var dep1=dep;
        
       // soli_tiempo


        //var p = regformhash(form,form.password,form.confirmpwd);

        var fecha=$('#soli_fecha').val();
        var fecha2=$('#soli_fecha2').val();
		var fecha3=$('#soli_fecha3').val();
        var periodo1=$('#periodo').val();
        var duracion1=$('#soli_tiempo').val();
		var dias_consumidos_user=$('#soli_tiempo2').val();//pendientes1
		var pendientes=$('#pendientes1').val();   // periodo
		var periodo=$('#periodo').val();
        var id_periodo=$('#periodo_id').val();		
		
		

       // var dur_en=$("#horas_dias option:selected");
        var justifiacion=$("#soli_just").val(); // luares
      //  var especificacion = "";  // tiempo 
        
      //  dur_en.each(function ()
     // {
      //   especificacion=$(this).val();
      //});
        
          
         var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
          //var s = "SVET-";                      // preubas add codigo
          //var codigo3 = s + dep1 +"-" + ano;
    
         

          $.ajax({

            type: "POST",
            url: "rrhh_permisos/php/add_solicitud_salida.php",
            data: {fecha:fecha,fecha2:fecha2,fecha3:fecha3,dias_consumidos_user:dias_consumidos_user,duracion1:duracion1,id:id,justifiacion:justifiacion,pendientes:pendientes,periodo:periodo,id_periodo:id_periodo}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading').fadeIn("slow");
                  },
                  success:function(data){
                    //alert(data);
                    codigo= data;

                        //  
                    var selected =$("#d_solicitantes option:selected"); // inicio de funcion selected
                      var message = "";
                    selected.each(function () {
                      var inst = $(this).val();
                        message = $(this).val();
                                  
                         var inst = $(this).val();
                          //vp_solicitud_transporte_departamento
                          
                          
                          
                          
                          // HTMLtoPDF
                          $.ajax({

                            type: "POST",
                            url: "rrhh_permisos/php/add_solicitud_detalle1.php",
                            data: {codigo:codigo, inst:inst, duracion1:duracion1}, //f de fecha y u de estado.  periodo1:periodo1

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
                                                      show_notificacion_success("detalle Generada");
													setTimeout( function() { window.location.href = "?ref=_92"; }, 1000);
													//  location.reload();
                                                  //get_horarios_usuario();
                                           }, 300);
                                           
                                        //  HTMLtoPDF1(codigo);
                                         // HTMLtoPDFV(codigo);
                                            
                                           // datos_hoja_cupones5(codigo);
                                  }


                          }).done( function(data) {










                          }).fail( function( jqXHR, textSttus, errorThrown){

                            alert(errorThrown);

                          });

                    });  // fin de funcion selected
                    
                    

                    
      } // fin de funcion data
  });

}
 });

}



function add_solicitud2(userid, dep) {
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
        var codigo;
        var id=userid;
        var dep1=dep;
        
       // soli_tiempo


        //var p = regformhash(form,form.password,form.confirmpwd);

        var fecha=$('#soli_fecha').val();
        var fecha2=$('#soli_fecha2').val();
		var fecha3=$('#soli_fecha3').val();
        var periodo1=$('#periodo').val();
        var duracion1=$('#soli_tiempo').val();
		var dias_consumidos_user=$('#soli_tiempo2').val();//pendientes1
		var pendientes=$('#pendientes1').val();   // periodo
		var periodo=$('#periodo').val();
        var id_periodo=$('#periodo_id').val();		
		
		

       // var dur_en=$("#horas_dias option:selected");
        var justifiacion=$("#soli_just").val(); // luares
      //  var especificacion = "";  // tiempo 
        
      //  dur_en.each(function ()
     // {
      //   especificacion=$(this).val();
      //});
        
          
         var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
          //var s = "SVET-";                      // preubas add codigo
          //var codigo3 = s + dep1 +"-" + ano;
    
         

          $.ajax({

            type: "POST",
            url: "rrhh_permisos/php/add_solicitud_retorar_dias.php",
            data: {fecha:fecha,fecha2:fecha2,fecha3:fecha3,dias_consumidos_user:dias_consumidos_user,duracion1:duracion1,id:id,justifiacion:justifiacion,pendientes:pendientes,periodo:periodo,id_periodo:id_periodo}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading').fadeIn("slow");
                  },
                  success:function(data){
                    //alert(data);
                    codigo= data;

                        //  
                    var selected =$("#d_solicitantes option:selected"); // inicio de funcion selected
                      var message = "";
                    selected.each(function () {
                      var inst = $(this).val();
                        message = $(this).val();
                                  
                         var inst = $(this).val();
                          //vp_solicitud_transporte_departamento
                          
                          
                          
                          
                          // HTMLtoPDF
                          $.ajax({

                            type: "POST",
                            url: "rrhh_permisos/php/add_solicitud_detalle1retorno.php",
                            data: {codigo:codigo, inst:inst, duracion1:duracion1}, //f de fecha y u de estado.  periodo1:periodo1

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
                                                      show_notificacion_success("detalle Generada");
													setTimeout( function() { window.location.href = "?ref=_92"; }, 1000);
													//  location.reload();
                                                  //get_horarios_usuario();
                                           }, 300);
                                           
                                        //  HTMLtoPDF1(codigo);
                                         // HTMLtoPDFV(codigo);
                                            
                                           // datos_hoja_cupones5(codigo);
                                  }


                          }).done( function(data) {



                          }).fail( function( jqXHR, textSttus, errorThrown){

                            alert(errorThrown);

                          });

                    });  // fin de funcion selected
                    
                    

                    
      } // fin de funcion data
  });

}
 });

}




