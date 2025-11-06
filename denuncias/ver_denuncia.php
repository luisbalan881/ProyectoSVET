<?php
  
  // include_once 'inc/functions.php';
  if (function_exists('login_check') && login_check()):
    if (isset($u) && $u->hasPrivilege('crearSolicitudTransporte')):
        include_once 'funciones_denuncias.php';
        $user = User::getByUserId($_SESSION['user_id']);
        $id = $_SESSION['user_id'];
        $proyecto = proyectos();
		$denuncia = denuncias();
        $actividades = actividades();
        $departamentosgt = departamentosgt();
        if ($u->hasPrivilege('crearSolicitudTransporte')){
          $actividades = actividades();
        }else{
            $archivos = archivos_depto($user->persona['dep_id']);
        }
        ?>
   
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.css"></link>
        <link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/responsive/2.1.1/css/responsive.dataTables.min.css"></link>
        <link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css"></link>
        <link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2.min.css"></link>

        <!-- INICIO Encabezado de Pagina -->
          <!-- FIN Encabezado de Pagina -->
        <!-- INICIO Contenido de pagina -->
        <div class="content content-boxed">
            <!-- Archivo nuevo -->
            <div class="row">
                <?php if ($u->hasPrivilege('crearSolicitudTransporte')): ?>
                    <!-- Ingreso Producto -->
                    <div class="block block-themed block-rounded" id="block_hide">
                        
                        
                       
                      
                <?php endif; ?>
            </div>
            <!-- END nuevo archivo -->
            <!-- Todos los archivos -->
            <div class="block block-themed block-rounded">
              <div class="block-header  bg-primary">
                  <ul class="block-options">
                    <li>
                         <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                      </li>
                  </ul>
                  <h3 class="block-title text-white">Listado de actividades </h3>
              </div>
              <div class="block-content">
                      
                      <table class="table table-bordered table-condensed table-striped js-dataTable-proyectos dt-responsive display nowrap" cellspacing="0" width="100%">  
                          <thead>
                          <tr>
                              <th class="text-center">ID</th>
							  <th class="text-center">Fecha y Hora de creación </th>
							  <th class="text-center">tipo de denuncia</th>
                              <th class="text-center">Descripción</th>
                              <th class="text-center">Motivo</th>   
                              <th class="text-center">Quien cometio la falta</th>
                              <th class="text-center">Archivo asociado: </th>
                              
                                                                    
                             
                           </tr>

                          </thead>
                          <tbody>
                          <?php
                          foreach ($denuncia as $actividad){
                        
							echo '<tr '.(($actividad['estatus']==1)?'class="danger"':' ').(($actividad['estatus']==0)?'class="success"':' ').'>';

                             echo '<td class="text-left">'.$actividad['id_denuncia'].'</td>'; //Departamento
							 
							  $fecha = date('d-m-Y H:i:s', strtotime($actividad['fecha']));
                             echo '<td class="text-left" style="white-space: nowrap;">'.$fecha.'</td>';
                             
                          
                             //echo '<td class="text-left" style="white-space: nowrap;">'.$actividad['tipo'].'</td>'; //Departamento
								 echo '<td class="text-left">';
                              if($actividad['tipo']== 1 )
                             {
                               echo '<span class="text-left" style="white-space: nowrap;">Denuincia de Etica</span> <br>';// acción
                            

                               } 
							   else if($actividad['tipo']== 2 )
							   {
                            echo '<span class="text-center" style="white-space: nowrap;">Denuincia de corrupción</span> <br>';// acción
								} 
                             echo '</td>';  

							   
                             echo '<td class="text-left" style="white-space: nowrap;">'.$actividad['motivo'].'</td>'; //Actividad
                            // echo '<td class="text-left">'.$actividad['nombreactividad'].'</td>';        // Nombre de la Actividad  
                           //  echo '<td class="text-left" style="white-space: nowrap;">'.$actividad['lugar'].'</td>';   //Dirección                
                                                                                           
                             echo '<td class="text-left" style="white-space: nowrap;">'.$actividad['descripcion'].'</td>'; //Departamento
							 
							  echo '<td class="text-left" style="white-space: nowrap;">'.$actividad['user1'].'</td>'; //Departamento
                            
							
                            
                             echo '<td class="text-left">';
                              if($actividad['archivo']==NULL )
                             {
                               echo '<span style="white-space: nowrap;"><strong>sin archivo cargado </strong></span> <br>';// acción
                            

                               } else{
                             echo '<span style="white-space: nowrap;"><strong>doc: </strong><a target="_blank" href="denuncias/'.$actividad['archivo'].'"><button class="btn btn-xs btn-default outline" type="button" data-toggle="tooltip" title="Ver agenda"><i class="fa fa-file"></i> Ver </button></a></span> <br>';// acción
                             } 
                             echo '</td>';  
                             


                             /*
                             echo '<td class="text-left" style="white-space: nowrap;">';


                             //echo '<tr '

                             if($actividad['estatus']==0 )
                             {
                              echo '<span> Estado actual:<i class="text-danger">Cancelado</i></span>';
 
                             }
                           
                            else if($actividad['estatus']==1 AND $id==$actividad['id_denuncia']) //id_usuario
                            {
                             echo '<span data-toggle="tooltip" title="Procesando"><a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_en_proceso.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-primary"> Estado actual: Inicializado</i></a>   <a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_cancelar.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-danger">Cancelar</i></a></span>';

                            }
                            else if($actividad['estatus']==2 AND $id==$actividad['id_denuncia'])
                            {
                             echo '<span data-toggle="tooltip" title="finalizar"><a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_finalizado.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-warning">Estado actual:  En proceso </i></a>   <a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_cancelar.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-danger">Cancelar</i></a></span>';

                            }
                            else if($actividad['estatus']==3)
                            {
                             echo '<span> Estado actual: <i class="text-success">Finalizado</i></span>';

                            }
                            else 
                            {
                             echo '<span>Solo el usuario que creo la actividad puede realizar esta acción</span>';

                            }

                             echo '</td>'; */

                            /*
                            echo '<td class="text-center">';
                            if($actividad['estatus']==0)
                            {
                              //echo '<span class="label label-warning">Pendiente</span> </td>';
                              echo ' <div class="progress">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:100%;"></div>
                                                                0% cancelado 
                                                            </div>';
                            }
                            else if($actividad['estatus']==1)
                            {
                              //echo '<span class="label label-warning">Pendiente</span> </td>';
                              echo ' <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%;"><span></span></div>
                                                                33.33% completado 
                                                            </div>';
                            }
                            else if($actividad['estatus']==2){
                             // echo '<span class="label label-success">Aprobado</span> </td>';
                              echo '  <div class="progress">
                                                               
                                                             
                                                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:66.66%;"><span>66.66%</span></div>
                                                                66.66% completado 
                                                             </div>';
                            }
                            else if($actividad['estatus']==3){
                              
                                echo '  <div class="progress">
                                                               
                                                             
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:100%;"><span>100%</span></div>
                                100% completado 
                             </div>';
                              
                                //echo '<span class="label label-danger">Cancelado</span> </td>';
                            }
                            */
                             echo '</tr>'; 
                                                                                        
                          }
                          ?>
                          </tbody>
                      </table>
              </div>
            </div>
            <!-- Final Todos los archivos -->
        </div>
        <!-- FIN Contenido de Pagina -->
        <?php
    else:
        echo include(unauthorized());
    endif;
else:
    header("Location: index.php");
endif;
?>


<!-- CHOSEN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/chosen/chosen.jquery.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/chosen/docsupport/prism.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/chosen/docsupport/init.js"></script>
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/chosen/chosen.css">
<script type="text/javascript" src="<?php echo $one->assets_folder; ?>/js/plugins/file_style/bootstrap-filestyle.min.js"> </script>
<script>
$('#arch_original').filestyle();
$('#arch_firmado').filestyle();
$('#arch_recibido').filestyle();
</script>
