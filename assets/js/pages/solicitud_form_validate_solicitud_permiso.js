function add_formulario1(userid, dep, correlativo) {
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
        var c=correlativo;
        var dep1=dep;
        
       // soli_tiempo


        //var p = regformhash(form,form.password,form.confirmpwd);

        //var fecha=$('#soli_fecha').val();
        //var fecha2=$('#soli_fecha2').val();
       // var objetivo1=$('#objetivo').val();
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
            url: "rrhh_permisos/php/add_solicitud2.php",
            data: {codigo:c}, //f de fecha y u de estado.

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
                                       setTimeout( function() { window.location.href = "?ref=_500"; }, 1000);

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
                                                      show_notificacion_success("Solicitud Aprobada");
					setTimeout( function() { window.location.href = "?ref=_500"; }, 1000);
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

/*
 function validarKilometrosFinales(numero){
 
   var btnEnviar = document.getElementById('boton_s_t');
   var kmInicial = $('#d_solicitantes').val();  //  var codigo1=$('#codigo').val();
 
  
     /*
    if (!/^([0-9]).*$/.test(numero) )  {
      alert("El valor " + numero + " no es un numero");
      //
       btnEnviar.disabled = false;
      //
  }
         else if(numero < kmInicial ){
           
           alert("El kilometraje " + numero + " es menor a kilometraje inical:" + " " +kmInicial+ " " + "Verificar valor no se procesara ingreso");
        btnEnviar.disabled = false
       } 
         else if(numero > kmInicial ){
           
           alert("El kilometraje " + numero + " es mayor a kilometraje inical:" + " " +kmInicial+ " " + "Validos");
        btnEnviar.disabled = true;
       } 
   else if(numero === "" ){
           
           alert("la casilla esta vacia debe colocar un O Ã³ el valor su factura");
           btnEnviar.disabled = false;
       }
       
       
      
      
       
        if(parseInt(numero) < parseInt(kmInicial)){
           
           alert("El kilometraje " + numero + " es menor a kilometraje inical:" + " " +kmInicial+ " " + "Verificar valor no se procesara ingreso");
        btnEnviar.disabled = true;
        
        
       } 
       
       
      else if(numero == null ){
           
           alert("El kilometraje " + numero + " so procesan valores vacio:" + " " +kmInicial+ " " + "no se procesara");
        btnEnviar.disabled = true;
        
        
       } 
      else if (parseInt(numero) > parseInt(kmInicial) )
        btnEnviar.disabled = false;
        alert("validos");
       
  }*/


//SOLICITURD add_solicitud_manual

