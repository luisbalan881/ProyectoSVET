function add_solicitud(userid, dep) {
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
       
        var fecha1=$('#soli_fecha').val();
        //var fecha2=$('#soli_fecha2').val();

       // var fecha=$('#soli_fecha').val();
        var fecha2=$('#soli_fecha2').val();

       var descripcion=$('#soli_desc  ').val();
      
        var nombre=$("#nombre1").val(); // luares
      
      var departamento =$("#d_solicitantes option:selected").val();
                    
      
      
          
         var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
            $.ajax({

            type: "POST",
            url: "proyectos/php/add_proyecto.php",
            data: {id:id,nombre:nombre,fecha1:fecha1,fecha2:fecha2, descripcion:descripcion,dep:departamento}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading').fadeIn("slow");
                  },
                  success:function(data){
                    //alert(data);
                    
                    
                     setTimeout(function(){
                                                    $('#loading').fadeOut("slow");
                                               }, 500);
                                     $('#message').fadeIn().html(data);
                                     $("#message").addClass('alert alert-success');
                                     setTimeout(function(){
                                                    $('#message').fadeOut("slow");
                                                    $('#loading').fadeOut("slow");
                                                    $('#modal-remoto-lgg').modal('hide');
                                                      show_notificacion_success("Proyecto creado");
                                                  //get_horarios_usuario();
                                           }, 300);
                                    
      } // fin de funcion data
      
      
   }).done( function(data) {



                          }).fail( function( XMLHttpRequest, textSttus, errorThrown){

                            alert("some error");

                          });
}
 });

}


function add_denuncia(userid, dep) {
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
       
      //  var fecha1=$('#soli_fecha').val();
        //var fecha2=$('#soli_fecha2').val();

       // var fecha=$('#soli_fecha').val();
      //  var fecha2=$('#soli_fecha2').val();

       var descripcion=$('#soli_desc  ').val();
      
        var motivo=$("#motivo").val(); // luares
      
      var tipo =$("#tipo_denuncia option:selected").val();
                    
       var denuciado =$("#d_user option:selected").val();
                    
      
          console.log(tipo);
		  console.log(denunciado);
		  console.log(motivo);
		  console.log(descripcion);
		  
         var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
            $.ajax({

            type: "POST",
            url: "denucias/php/add_denuncia.php",
            data: {id:id,motivo:motivo,descripcion:descripcion,tipo:tipo, denuciado:denuciado}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading').fadeIn("slow");
                  },
                  success:function(data){
                    //alert(data);
                    
                    
                     setTimeout(function(){
                                                    $('#loading').fadeOut("slow");
                                               }, 500);
                                     $('#message').fadeIn().html(data);
                                     $("#message").addClass('alert alert-success');
                                     setTimeout(function(){
                                                    $('#message').fadeOut("slow");
                                                    $('#loading').fadeOut("slow");
                                                    $('#modal-remoto-lgg').modal('hide');
                                                      show_notificacion_success("Denuncia creada");
                                                  //get_horarios_usuario();
                                           }, 300);
                                    
      } // fin de funcion data
      
      
   }).done( function(data) {



                          }).fail( function( XMLHttpRequest, textSttus, errorThrown){

                            alert("some erroreeeee");

                          });
}
 });

}





function add_seguimiento(userid, dep) {
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
       
      //  var fecha1=$('#soli_fecha').val();
        //var fecha2=$('#soli_fecha2').val();

       // var fecha=$('#soli_fecha').val();
      //  var fecha2=$('#soli_fecha2').val();

       var descripcion=$('#soli_desc  ').val();
      
        var motivo=$("#motivo").val(); // luares
      
      var tipo =$("#tipo_denuncia option:selected").val();
                    
       var denuciado =$("#d_user option:selected").val();
                    
      
          console.log(tipo);
		  console.log(denunciado);
		  console.log(motivo);
		  console.log(descripcion);
		  
         var codigo1=$('#codigo').val();
         var year = (new Date).getFullYear();
            $.ajax({

            type: "POST",
            url: "denucias/php/add_denuncia.php",
            data: {id:id,motivo:motivo,descripcion:descripcion,tipo:tipo, denuciado:denuciado}, //f de fecha y u de estado.

            beforeSend:function(){
                          //$('#response').html('<span class="text-info">Loading response...</span>');

                          $('#loading').fadeIn("slow");
                  },
                  success:function(data){
                    //alert(data);
                    
                    
                     setTimeout(function(){
                                                    $('#loading').fadeOut("slow");
                                               }, 500);
                                     $('#message').fadeIn().html(data);
                                     $("#message").addClass('alert alert-success');
                                     setTimeout(function(){
                                                    $('#message').fadeOut("slow");
                                                    $('#loading').fadeOut("slow");
                                                    $('#modal-remoto-lgg').modal('hide');
                                                      show_notificacion_success("Denuncia creada");
                                                  //get_horarios_usuario();
                                           }, 300);
                                    
      } // fin de funcion data
      
      
   }).done( function(data) {



                          }).fail( function( XMLHttpRequest, textSttus, errorThrown){

                            alert("some erroreeeee");

                          });
}
 });

}



