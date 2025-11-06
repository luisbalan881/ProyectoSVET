<?php
  
  // include_once 'inc/functions.php';
  if (function_exists('login_check') && login_check()):
    if (isset($u) && $u->hasPrivilege('crearSolicitudTransporte')):
        include_once 'funciones_proyectos.php';
        $user = User::getByUserId($_SESSION['user_id']);
        $id = $_SESSION['user_id'];
        $proyecto = proyectos();
        $infoProyecto = infProyectos();
        $departamentosgt = departamentosgt();
        if ($u->hasPrivilege('crearSolicitudTransporte')){
          $infoProyecto = infProyectos();
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
                
            </div>
            <!-- END nuevo archivo -->
            <!-- Todos los archivos -->
            <div class="block block-themed block-rounded">
              <div class="block-header  bg-muted">
                  <ul class="block-options">
                    <li>
                         <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                      </li>
                  </ul>
                  <h3 class="block-title text-white">Listado de Proyectos</h3>
              </div>
              <div class="block-content">
                      
                      <table class="table table-bordered table-condensed table-striped js-dataTable-proyectos dt-responsive display nowrap" cellspacing="0" width="100%">  
                          <thead>
                          <tr>
                              <th class="text-center">ID Proyecto</th>
                              <th class="text-center">Nombre del Proyecto</th>
                                 <th class="text-center">Nombre</th>
                             
                              <th class="text-center">Fecha Inicio</th>
                              <th class="text-center">fecha Finalización</th>
                              <th class="text-center">Descripción del Proyecto</th>
                           
                             
                            
                             
                             
                              <th class="text-center">A cargo de</th>
                              <th class="text-center">Cambiar Estado de Actividad: </th>
                              
                              
                              <th class="text-center">A cargo de</th>
                             
                          
                             
                              
                              <th class="text-center">Fecha y Hora de creación del Proyecto </th>
                              <th class="text-center">Estado</th>
                                                                    
                             
                           </tr>

                          </thead>
                          <tbody>
                          <?php
                          foreach ($infoProyecto as $infProyecto){

                          //  echo '<tr '.(($actividad['status']==0)?'class="danger"':' ').(($actividad['status']==1)?'class="success"':' ').'>';
                             echo '<tr'.(($infProyecto['status']==1)?'class="primary"':' ').(($infProyecto['status']==2)?'class="success"':' ').'>';
                          //  echo '<td class="text-left" style="white-space: nowrap;">'.fecha_dmy($infProyecto['fecha_creacion']).'</td>'; //fecha de creación
                          //  $dir_original = sanear_string($infProyecto['dep_nm']).'/'.$infProyecto['personal'];
                            //echo '<td class="text-center" style="white-space: nowrap;">'.$producto['prod_cod'].'</td>';
                             echo '<td class="text-center">'.$infProyecto['id_proyecto'].'</td>'; //Departamento
                          
                             echo '<td class="text-left" style="white-space: nowrap;">'.$infProyecto['nombre'].'</td>'; //Departamento
							 echo '<td class="text-center">'.$infProyecto['nombre'].'</td>'; //  material 
                                                       
                           //  echo '<td class="text-center" style="white-space: nowrap;">'.$infProyecto['nombre'].'</td>'; //Actividad
						    echo '<td class="text-center" style="white-space: nowrap;">'.fecha_dmy($infProyecto['fecha_inicio']).'</td>';//Fecha inicio
                           echo '<td class="text-center" style="white-space: nowrap;">'.fecha_dmy($infProyecto['fecha_fin']).'</td>';   //Fecha fin   
                          
                             echo '<td class="text-left" style="white-space: nowrap;">'.$infProyecto['descripcion'].'</td>';   //Dirección                
                           
                                                                      
                           //  echo '<td class="text-center" style="white-space: nowrap;">'.$infProyecto['status'].'</td>'; //hora
                            // echo '<td class="text-center" style="white-space: nowrap;">'.fecha_dmy($infProyecto['fecha_inicio']).'</td>';//Fecha inicio
                           
                             echo '<td class="text-left">'.$infProyecto['dep_nm'].'</td>';        // Nombre de la Actividad  
                            
                             
                             echo '<td class="text-center" style="white-space: nowrap;">';

                            // echo '<span title="Editar"><a class="btn btn-warning outline"  title="Actualizar" data-toggle="modal" data-target="#modal-remoto-lgg" href="transporte/ver_solicitud.php?id='.$infProyecto['id_actividad'].'" ><i class="fa fa-pencil-square-o "></i></a></span>';
                            if($infProyecto['status']==1 AND $id==$infProyecto['id_user']) //id_usuario
                            {
                             echo '<span data-toggle="tooltip" title="Procesando"><a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_en_proceso_proyecto.php?id='.$infProyecto['id_proyecto'].'"><i class="fa fa-pencil text-danger"> Estado actual: Inicializado</i></a></span>';

                            }
                            else if($infProyecto['status']==2 )
                            {
                            // echo '<span data-toggle="tooltip" title="finalizar"><a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_finalizado.php?id='.$infProyecto['id_proyecto'].'"><i class="fa fa-pencil text-warning">Estado actual:  En proceso </i></a></span>';
                            echo '<span> Estado actual:<i class="text-primary">finalizado</i></span>';
                            }
                            else if($infProyecto['status']==3)
                            {
                            // echo '<span>finalizado</span>';
                             echo '<span> Estado actual:<i class="text-primary">finalizado</i></span>';

                            }
                            else 
                            {
                             echo '<span>Solo el usuario que creo la actividad puede realizar esta acción</span>';

                            }

                             echo '</td>';



                             echo '<td class="text-center">'.$infProyecto['dep_nm'].'</td>'; //  A cargo de:  
                             //echo '<td class="text-center">'.$infProyecto['descripcion'].'</td>'; //  material
                                                      
                           //  echo '<td class="text-center">'.$infProyecto['nombre'].'</td>'; //  material 
                            // echo '<td class="text-center">';
                           //  echo '<span style="white-space: nowrap;"><strong>doc: </strong><a target="_blank" href="proyectos/adjuntos/'.$dir_original.'"><button class="btn btn-xs btn-default outline" type="button" data-toggle="tooltip" title="Ver agenda"><i class="fa fa-file"></i> Ver </button></a></span> <br>';// acción
                           //  echo '</td>'; 
                           $fecha = date('d-m-Y H:i:s', strtotime($infProyecto['fecha']));
                           echo '<td class="text-center" style="white-space: nowrap;">'.$fecha.'</td>';
                                  
                             
                            
                            
                            echo '<td class="text-center">';
                            if($infProyecto['status']==1)
                            {
                              //echo '<span class="label label-warning">Pendiente</span> </td>';
                              echo ' <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%;"></div>
                                                                33.33% completado 
                                                            </div>';
                            }
                            else if($infProyecto['status']==2){
                             // echo '<span class="label label-success">Aprobado</span> </td>';
                              echo '  <div class="progress">
                                                               
                                                             
                                                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:100%;"></div>
                                                                100% completado 
                                                             </div>';
                            }
                            else if($infProyecto['status']==3){
                              
                                echo '  <div class="progress">
                                                               
                                                             
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:100%;"></div>
                                100% completado 
                             </div>';
                              
                                //echo '<span class="label label-danger">Cancelado</span> </td>';
                            }
                            
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
