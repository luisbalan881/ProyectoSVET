<?php
include_once '../inc/functions.php';
include_once 'funciones_proyectos.php';
sec_session_start();
if (function_exists('login_check') && login_check()):
    if (usuarioPrivilegiado()->hasPrivilege('crearSolicitudTransporte')){
          if ( !empty($_POST)) {
            actividad_nueva();
            header("Location: index.php?ref=_52");
          }
    }else{
        echo include(unauthorized());
    }
else:
    header("Location: index.php");
endif;
?>
