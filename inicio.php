<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    include_once 'inc/functions.php';
    sec_session_start();
    if (login_check() == true) :
        require 'inc/config.php';
        require 'inc/views/template_head_start.php';
        require 'inc/views/template_head_end.php';
        require 'inc/views/base_head.php';
        $u = usuarioPrivilegiado();
          //page content
          if (! isset($_GET['ref']))
          {
            echo '<div class="content content-boxed text-center">';
            echo '<img src="assets/img/_vice_logo_bw.png" />';
            echo '</div>';
			echo '<div class="content content-boxed text-center">';
				
		/*	echo '<div class="btn-group" role="group" aria-label="Basic menu">

<button class="btn btn-default btn-block"><img src="assets/img/carro1.jpg" width="50px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="transporte/solicitar_transporte.php"  style="cursor:pointer;" solicitar> Solicitar Transporte  </a>    </button>
  <button class="btn btn-default btn-block"><img src="assets/img/money.png" width="50px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="viaticos/solicitar_viaticos.php"  style="cursor:pointer;" solicitar> Solicitar Viaticos  </a>    </button>
  <button type="button" class="btn btn-default btn-block"><img src="assets/img/vacaciones.png" width="50px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_permiso.php"  style="cursor:pointer;" solicitar> Solicitar Vacaciones  </a>  </button>
  <button type="button" class="btn btn-default btn-block"><img src="assets/img/gas1.jpeg" width="50px" ><a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="combustible/reg_km_ini_user.php"  style="cursor:pointer;" solicitar> Registra Kilometraje  </a>  </button>
  <button type="button" class="btn btn-default btn-block"><img src="assets/img/run.png" width="50px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_permiso2.php"  style="cursor:pointer;" solicitar> Solicitar Pase de salida</a>  </button>
  <button type="button" class="btn btn-default btn-block"><img src="assets/img/solicitud1.jpeg" width="50px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_nombramiento.php"  style="cursor:pointer;" solicitar> Crear Nombramiento  </a>  </button>
  
  
</div>';*/

	echo '<div>
	
	
  <div class="row">
    <div class="col-md-6"><div class="btn-group" role="group" aria-label="Basic example">

<button class="btn btn-default btn-block"><img src="assets/img/carro1.jpg" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="transporte/solicitar_transporte.php"  style="cursor:pointer;" solicitar> Solicitar Transporte  </a>    </button>
  <button class="btn btn-default btn-block"><img src="assets/img/money.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="viaticos/solicitar_viaticos.php"  style="cursor:pointer;" solicitar> Solicitar Viaticos 011 </a>    </button>
  <button type="button" class="btn btn-default btn-block"><img src="assets/img/vacaciones.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg"  href="rrhh_permisos/solicitar_permiso.php"  style="cursor:pointer;" solicitar> Solicitar Vacaciones  </a>  </button>
   <button type="button" class="btn btn-default btn-block"><img src="assets/img/gestion.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="proyectos/crear_proyecto.php"  style="cursor:pointer;" solicitar> Iniciar nuevo Proyecto </a>  </button>
  <button type="button" class="btn btn-default btn-block"><img src="assets/img/run.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg"  href="rrhh_permisos/solicitar_permiso2.php"  style="cursor:pointer;" solicitar> Generar Pase de Salida   </a>  </button> 
	    
</div></div>
    <div class="col-md-6"><div class="btn-group" role="group" aria-label="Basic example">

  <button type="button" class="btn btn-default btn-block"><img src="assets/img/gas1.jpeg" width="100px" ><a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="combustible/reg_km_ini_user.php"  style="cursor:pointer;" solicitar> Registra Kilometraje  </a>  </button>
 <!-- <button type="button" class="btn btn-default btn-block"><img src="assets/img/solicitud1.jpeg" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_nombramiento.php"  style="cursor:pointer;" solicitar>Nombramiento 011 sin viaticos  </a>  </button>-->
  <!-- <button type="button" class="btn btn-default btn-block"><img src="assets/img/solicitud1.jpeg" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="viaticos/solicitar_nombramiento.php"  style="cursor:pointer;" solicitar>Nombramiento 011 sin viaticos  </a>  </button>-->
  <button type="button" class="btn btn-default btn-block"><img src="assets/img/anonimato.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="denuncias/crear_denuncia_anonima.php"  style="cursor:pointer;" solicitar> Denuncia Anonima</a>  </button>
<button type="button" class="btn btn-default btn-block"><img src="assets/img/anonimato.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="control_oficios/crear_ingreso.php"  style="cursor:pointer;" solicitar> test</a>  </button> 
   <!-- <button type="button" class="btn btn-default btn-block"><img src="assets/img/actividad.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="trasporte/crear_proyecto_actividad.php"  style="cursor:pointer;" solicitar> Asignar Actividad a Proyecto </a>  </button> -->
 <!--  <button type="button" class="btn btn-default btn-block"><img src="assets/img/actividad.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_retornar_dias_vacaciones.php"  style="cursor:pointer;" solicitar> Asignar Actividad a Proyecto </a>  </button>  -->
  <!--  <button type="button" class="btn btn-default btn-block"><img src="assets/img/actividad.png" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="transporte/boloqueo_fecha_solicitar_transporte.php"  style="cursor:pointer;" solicitar> Asignar Actividad a Proyecto </a>  </button>    --> 

 


  <button class="btn btn-default btn-block"><img src="assets/img/compras.jpg" width="100px"> <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_compra.php"  style="cursor:pointer;" solicitar> Solicitar Compra  </a>    </button>
  <button type="button" class="btn btn-secundary btn-block" ><img src="assets/img/solicitar1.jpeg" width="100px" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_nombramiento.php" > <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_nombramiento.php"  style="cursor:pointer;" solicitar> Crear asignaciòn de Actividades</a>  </button>
  <button type="button" class="btn btn-secundary btn-block" ><img src="assets/img/doc2.png" width="100px" data-target="#modal-remoto-lgg" href="oficios/solicitar_oficio.php" > <a tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="oficios/solicitar_oficio.php"  style="cursor:pointer;" solicitar> Crear No. Oficio </a>  </button>
  
  
  	
  
  
</div></div>


  </div>
  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6"></div>
  </div>
  
  
  <!--  <iframe src="http://192.168.4.25:8082/calendario" width=800 height=700> "no es posible mostrar el contenido"</iframe>  --> 
  
  <!-- <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=America%2FGuatemala&bgcolor=%23ffffff&src=ZjUxOWRkMDBjZDMyNDkyZWJiNTk3OGQ4NzZmZTdkZDE0ZjVhMmI5MjE0MmE2MzNkNGQ4MjU3YjY1YzM0OTU2N0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%239E69AF" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>--> 
</div>';



          } else {
            $page = $_GET['ref'];
            include('almacen/secciones.php');
            include('archivo/secciones.php');
            include('usuarios/secciones.php');
            include('cheques/secciones.php');
            include('combustible/secciones.php');
            include('proveedores/secciones.php');
            include('transporte/secciones.php');
            include('compras/secciones.php');

            switch($page)
            {
                case '_0':
                    include('perfil.php');
                break;
                case '_200':
                    include('herramientas/traslado_bienes.php');
                break;
				case '_201':
                    include('herramientas/traslado_bienes.php');
                break;
                case '_37':
                    include('directorio/directorio.php');
                break;
				case '_89':
                    include('viaticos/MisViaticos.php');
                break;
                case '_90':
                    include('viaticos/ViaticosAdmin.php');
                break;
				case '_91':
                    include('viaticos/ReporteViaticos.php');
                break;
				
				case '_92':
                include('rrhh_permisos/MisVacaciones.php');
                break;
				case '_93':
                include('rrhh_permisos/VacacionesAdmin.php');
                break;
				case '_95':
                include('rrhh_permisos/MisSolicitudes.php');
                break;
            case '_951':
                include('rrhh_permisos/Solicitudes_list.php');
                break;
				case '_96':
                    include('rrhh_permisos/VacacionesAdmin2.php');
                break;
				case '_97':
                include('rrhh_permisos/solicitar_retornar_dias_vacaciones.php');
                break;
				
                case '_99':
                    include('administrador/control_dias_usuario.php');
                break;
                case '_99':
                    include('administrador/control_dias_usuario.php');
                break;
                case '_100':
                include('administrador/settings.php');
                break;
                case '_101':
                include('administrador/documentos.php');
                break;
            }
          }
          //END page content
    require 'inc/views/base_footer.php';
    require 'inc/views/template_footer_start.php';
    require 'inc/views/template_footer_end.php';
    else:
        header("Location: index.php");
    endif;
