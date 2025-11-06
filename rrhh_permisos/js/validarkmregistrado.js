  function validarStatus1(){
   //  var kilo = "<?php echo $kilo;?>";
   var btnEnviar = document.getElementById('boton_s_t');
   //var n =$(this).find("motivo").text();
//   alert ("Tiene pendiente de aprobar una solicitud");
   
    swal("error ", " Tiene pendiente de ser aprobado una solicitud, no se puede generar una nueva solicitud" , "error");
    btnEnviar.disabled = true;
  
     
  }

