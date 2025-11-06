<?php
if (isset($u) && $u->hasPrivilege('leerSolicitudTransporte')):
  switch($page)
  {
    case '_50':
      include('transporte/solicitudes_transporte.php');
      break;
      case '_51':
        include('transporte/vehiculos.php');
        break;
		case '_39':
        include('combustible/MisRegistrosKm.php');
        break;
		case '_45':
        include('combustible/control_km_todos.php');
        break;
		 case '_52':
          //include('proyectos/crear_actividad.php');
		   include('transporte/boloqueo_fecha_solicitar_transporte.php');
          break;
		  case '_55':
          include('proyectos/crear_proyecto_actividad.php');
          break;		  
		case '_53':
            include('proyectos/verProyecto.php');
            break;
		case '_54':
            include('denuncias/ver_denuncia.php');
            break;
		case '_77':
		include('viaticos/ViaticosAdmin2.php');
		break;
		case '_78':
		include('viaticos/ReporteViaticosAdmin.php');
		break;
		
		case '_79':
		include('viaticos/Nombramientos.php');
		break;





  }
endif;
?>
