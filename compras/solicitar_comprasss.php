<?php
  
  // include_once 'inc/functions.php';
  if (function_exists('login_check') && login_check()):
    if (isset($u) && $u->hasPrivilege('crearSolicitudTransporte')):
        include_once 'funciones_proyectos.php';
        $user = User::getByUserId($_SESSION['user_id']);
        $id = $_SESSION['user_id'];
        $proyecto = proyectos();
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
                        <div class="block-header bg-primary">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="content_toggle">
                                        <i class="si si-arrow-up"></i>
                                    </button>
                                </li>
                            </ul>
                            <span id="block_show" class="text-white"><h3 class="block-title">+ Agregar Nueva Actividad</h3></span>
                        </div>
                        
                        <div class="block-content block-content-full">
                            <form class="js-validation-documento form-horizontal push-10-t push-10" action="proyectos/nueva_actividad.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                          <label for="destinatarios">Destinatario(s)*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="fa fa-bank"></span></span>
                                            <select name="d_departamentos" multiple="multiple" data-placeholder="Seleccione un departamento" class="chosen-select col-xs-12" multiple tabindex="6" required>
                                              <?php
                                              foreach ($departamentosgt as $departamento):
                                                 // if ($departamento['inst_status'] == 1){
                                                      echo '<option value="'.$departamento["id_departamento"].'">'.$departamento["nombre"].'</option>';
                                                 // }  .'">'.
                                              endforeach
                                              ?>
                                            </select>
                                          </div>

                                            <label for="destinatarios_cc">Departamento donde se va a realizar la actividad</label>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                                              <input class="form-control"  type="text" id="lugar" name="lugar" data-placeholder="Seleccione un departamento" required>
                                          </div>
                                            <label for="arch_titulo">Dirección de la actividad*</label>
                                            <div class="help-block text-right"> Direccion donde se realizará la actividad.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                                            <select class ="chosen-select" name="proyecto_id" id="proyecto_id"  style="width: 100%;" data-placeholder="-- Seleccionar Proyecto --" required>
                                                <option></option>
                                                <?php
                                                foreach ($proyecto as  $proy):
                                                   // if ($tipo['tipo_status'] == 1){
                                                        echo '<option value="'. $proy["id_proyecto"].'">'. $proy["nombre"].''." creada por:".''. $proy["dep_nm"].'</option>';
                                                   // }
                                                endforeach
                                                ?>
                                            </select>
                                          </div>
                                            <label for="tipo_id">Proyectos*</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="fa fa-calendar-o"></span></span>
                                            <input class="js-datepicker form-control" type="text" id="fechainicio" name="fechainicio" data-date-language="es-ES"  data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                                          </div>
                                            <label for="arch_fecha">Fecha inicio de la actividad</label>
                                        </div>
                                    </div>

                                    <div class="col-xs-4">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="fa fa-calendar-o"></span></span>
                                            <input class="js-datepicker form-control" type="text" id="fechafin" name="fechafin" data-date-language="es-ES"  data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                                          </div>
                                            <label for="arch_fecha">Fecha finalización la actividad</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                                            <input class="form-control"  type="text" id="nombre" name="nombre" required>
                                          </div>
                                            <label for="arch_correlativo">Nombre de la actividad*</label>
                                            <div class="help-block text-right">Ingresar nombre de la actividad.</div>
                                        </div>
                                    </div>
                              
                                <div class="col-xs-4">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"    id="hora" name="hora" required>
                            </div>
                              <label for="soli_horas">Hora de la actividad*</label>
                          </div>
                      </div>

                      <div class="col-xs-4">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <select class="form-control" name="part" id="part"data-placeholder="Seleccione" required>
                                <option value="" disabled selected hidden>Seleccione</option>
                                <option value="Interna"> Interna</option>
                                <option value="Externa"> Externa</option>
                               
                              </select>
                            </div>

                            
                            <label for="destinatarios"> Tipo de Actividad</label>
                          </div>
                      </div>
                      </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                                              <input class="form-control"  type="text" id="desc" name="desc" required>
                                          </div>
                                            <label for="arch_titulo">Descripción de la actividad</label>
                                            <div class="help-block text-right"> Ingresar descripción de actividad.</div>
                                        </div>
                                    </div>
                                </div>

								    <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                                              <input class="form-control"  type="text" id="personal" name="personal" required>
                                          </div>
                                            <label for="arch_titulo">Participantes</label>
                                            <div class="help-block text-right"> Participantes</div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                          <div class="input-group has-personalizado">
                                            <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                                              <input class="form-control"  type="text" id="material" name="material" required>
                                          </div>
                                            <label for="arch_titulo">Material requerido a la Unidad de Comunicación Social*</label>
                                            <div class="help-block text-right"> Material requerido a comunicacion social para la actividad.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <div class="">
                                            <input class="form-control"  type="file" id="arch_original" name="arch_original"
                                                   accept="text/csv,
                                                   text/plain,
                                                   application/x-mspublisher,
                                                   application/vnd.ms-excel,
                                                   application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,
                                                   application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                                                   application/vnd.ms-powerpoint,
                                                   application/vnd.openxmlformats-officedocument.presentationml.presentation,
                                                   application/pdf,
                                                   image/jpeg,
                                                   image/png">
                                                   <div class="help-block text-right"> ingrese documento.</div>
                                        </div>
                                    </div>
                                
                                <div class="form-group">
                                    <div class="col-xs-12 text-center">
                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><i class=""></i>Agregar actividad</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      
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
                              <th class="text-center">ID Proyecto</th>
                              <th class="text-center">Departamento</th>
                             
                              <th class="text-center">Proyecto</th>
                              <th class="text-center">Actividad</th>
                              <th class="text-center">Dirección</th>
                           
                             
                            
                             
                              <th class="text-center">Material</th>
                            
                              <th class="text-center">Fecha y Hora de creación </th>
							    <th class="text-center">Fecha inicio</th>
                             
                               <th class="text-center">Fecha finalización</th>
                              
                              <th class="text-center">A cargo de</th>
                              <th class="text-center">Hora</th>
                              <th class="text-center">Tipo de Actividad</th>
							   <th class="text-center"> Participantes</th>
                              <th class="text-center"> Agenda</th>
                              <th class="text-center">Cambiar estado de actividad: </th>
                              <th class="text-center">Estado</th>
                                                                    
                             
                           </tr>

                          </thead>
                          <tbody>
                          <?php
                          foreach ($actividades as $actividad){
                           //  echo '<tr.(($actividad['status']==0 )?'class="danger"':' ').(($actividad['status']==1)?'class="warning"':' ').'>';

                            // echo '<tr '.(($actividad['status']==0)?'class="danger"':' ').(($actividad['status']==3)?'class="success"':' ').'>';
							echo '<tr '.(($actividad['status']==0)?'class="danger"':' ').(($actividad['status']==3)?'class="success"':' ').'>';

                             
                          //  echo '<td class="text-left" style="white-space: nowrap;">'.fecha_dmy($actividad['fecha_creacion']).'</td>'; //fecha de creación
                            $dir_original = sanear_string($actividad['dep_nm']).'/'.$actividad['personal'];
                            //echo '<td class="text-center" style="white-space: nowrap;">'.$producto['prod_cod'].'</td>';
                             echo '<td class="text-center">'.$actividad['id_actividad'].'</td>'; //Departamento
                          
                             echo '<td class="text-left" style="white-space: nowrap;">'.$actividad['departamento'].'</td>'; //Departamento
                                                       
                             echo '<td class="text-center" style="white-space: nowrap;">'.$actividad['nombre'].'</td>'; //Actividad
                             echo '<td class="text-left">'.$actividad['nombreactividad'].'</td>';        // Nombre de la Actividad  
                             echo '<td class="text-left" style="white-space: nowrap;">'.$actividad['lugar'].'</td>';   //Dirección                
                           
                             echo '<td class="text-center">'.$actividad['material'].'</td>'; //  material                                         
                            // echo '<td class="text-center" style="white-space: nowrap;">'.$actividad['hora'].'</td>'; //hora
                             $fecha = date('d-m-Y H:i:s', strtotime($actividad['fecha_creacion']));
                             echo '<td class="text-center" style="white-space: nowrap;">'.$fecha.'</td>';
                             
                              echo '<td class="text-center" style="white-space: nowrap;">'.fecha_dmy($actividad['fecha_inicio']).'</td>';//Fecha inicio
                            
                               echo '<td class="text-center" style="white-space: nowrap;">'.fecha_dmy($actividad['fecha_fin']).'</td>';   //Fecha fin                     
                             echo '<td class="text-center">'.$actividad['dep_nm'].'</td>'; //  A cargo de:  
                            // echo '<td class="text-center">'.$actividad['material'].'</td>'; //  material
                            echo '<td class="text-center" style="white-space: nowrap;">'.$actividad['hora'].'</td>'; //hora                        
                             echo '<td class="text-center">'.$actividad['autoridad'].'</td>'; //  material 
							   echo '<td class="text-center">'.$actividad['personal'].'</td>'; //  personal
                            
                             echo '<td class="text-center">';
                              if($actividad['archivo']==NULL )
                             {
                               echo '<span style="white-space: nowrap;"><strong>doc: sin documento asociado por ususario </strong></span> <br>';// acción
                            

                               } else{
                             echo '<span style="white-space: nowrap;"><strong>doc: </strong><a target="_blank" href="proyectos/adjuntos/'.$actividad['archivo'].'"><button class="btn btn-xs btn-default outline" type="button" data-toggle="tooltip" title="Ver agenda"><i class="fa fa-file"></i> Ver </button></a></span> <br>';// acción
                             } 
                             echo '</td>';  
                             


                             
                             echo '<td class="text-center" style="white-space: nowrap;">';


                             //echo '<tr '

                             if($actividad['status']==0 )
                             {
                              echo '<span> Estado actual:<i class="text-danger">Cancelado</i></span>';
 
                             }
                           /* else if($actividad['status']==1 )
                             {
                              echo '<span> Estado actual:<i class="text-primary">Iniciado</i></span>';
 
                             }*/

                            // echo '<span title="Editar"><a class="btn btn-warning outline"  title="Actualizar" data-toggle="modal" data-target="#modal-remoto-lgg" href="transporte/ver_solicitud.php?id='.$actividad['id_actividad'].'" ><i class="fa fa-pencil-square-o "></i></a></span>';
                            else if($actividad['status']==1 AND $id==$actividad['id_usuario']) //id_usuario
                            {
                             echo '<span data-toggle="tooltip" title="Procesando"><a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_en_proceso.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-primary"> Estado actual: Inicializado</i></a>   <a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_cancelar.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-danger">Cancelar</i></a></span>';

                            }
                            else if($actividad['status']==2 AND $id==$actividad['id_usuario'])
                            {
                             echo '<span data-toggle="tooltip" title="finalizar"><a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_finalizado.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-warning">Estado actual:  En proceso </i></a>   <a class="btn btn-default" data-toggle="modal" data-target="#modal-remoto" href="proyectos/modificar_status_cancelar.php?id='.$actividad['id_actividad'].'"><i class="fa fa-pencil text-danger">Cancelar</i></a></span>';

                            }
                            else if($actividad['status']==3)
                            {
                             echo '<span> Estado actual: <i class="text-success">Finalizado</i></span>';

                            }
                            else 
                            {
                             echo '<span>Solo el usuario que creo la actividad puede realizar esta acción</span>';

                            }

                             echo '</td>';

                            
                            echo '<td class="text-center">';
                            if($actividad['status']==0)
                            {
                              //echo '<span class="label label-warning">Pendiente</span> </td>';
                              echo ' <div class="progress">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:100%;"></div>
                                                                0% cancelado 
                                                            </div>';
                            }
                            else if($actividad['status']==1)
                            {
                              //echo '<span class="label label-warning">Pendiente</span> </td>';
                              echo ' <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%;"><span></span></div>
                                                                33.33% completado 
                                                            </div>';
                            }
                            else if($actividad['status']==2){
                             // echo '<span class="label label-success">Aprobado</span> </td>';
                              echo '  <div class="progress">
                                                               
                                                             
                                                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:66.66%;"><span>66.66%</span></div>
                                                                66.66% completado 
                                                             </div>';
                            }
                            else if($actividad['status']==3){
                              
                                echo '  <div class="progress">
                                                               
                                                             
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:100%;"><span>100%</span></div>
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
