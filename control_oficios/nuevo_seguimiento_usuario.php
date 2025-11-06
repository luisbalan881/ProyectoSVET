<?php
include_once '../inc/functions.php';
include_once 'funciones_seguimiento_oficios.php';
sec_session_start();
if (function_exists('login_check') && login_check()):
    if (usuarioPrivilegiado()->hasPrivilege('crearSolicitudTransporte')){
          if ( !empty($_POST)) {
            //actividad_nueva();
             $id2 = $_REQUEST['id'];
			seguimiento_nuevo_user($id2);
			
			header("Location: index.php");
			//funciones_denuncias
          //  header("Location: index.php?ref=_54");
          }
    }else{
        echo include(unauthorized());
    }
else:
    header("Location: index.php");
endif;
?>
