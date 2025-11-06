<?php
if (isset($u) && $u->hasPrivilege('leerSolicitudTransporte')):
  switch($page)
  {
    case '_49':
      include('transporte/Mis_solicitudes_transporte.php');
      break;
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
            case '_544':
            include('control_oficios/ver_lista_control_de_usuario.php');
            break;
            
            case '_545':
            include('control_oficios/ver_todos_oficios_control.php');
            break;
				            
            
		case '_77':
		include('viaticos/ViaticosAdmin2.php');
		break;
		case '_137':
		include('oficios/oficios_list.php');
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
