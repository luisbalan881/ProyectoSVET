<!DOCTYPE html>
<html>
<head>
    <title>Control de Oficios</title>
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.css">
    <script src="assets/js/plugins/jspdf/jspdf.js"></script>
    
    
            <script src="assets/js/plugins/chosen/chosen.jquery.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/prism.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/init.js"></script>
            <link rel="stylesheet" href="assets/js/plugins/chosen/chosen.css">
            <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/datepicker33.min.css">





            <script src="assets/js/plugins/timepicker/js/timepicki.js"></script>
            <link href="assets/js/plugins/timepicker/css/timepicki.css" rel="stylesheet">

           
    
</head>
<body>
<?php
if (function_exists('login_check') && login_check()):
   //  if (usuarioPrivilegiado()->hasPrivilege('leerViaticos')) :
    //$personas = personas();
        $user_id =$_SESSION['user_id'];
        include_once 'funciones_seguimiento_oficios.php';
      //  $nombramientos = nombramientos2($user_id);
        	$nombramientos = contro_of();
       // da_oficio_control
?>
  <!-- INICIO Encabezado de Pagina -->
 <div class="content bg-gray-lighter">
     <div class="row items-push">
         <div class="col-sm-7">
             <h1 class="page-heading">
                 Control de Oficios
             </h1>
         </div>
         <div class="col-sm-5 text-right hidden-xs">
             <ol class="breadcrumb push-10-t">
                 <li>CONTROL DE MIS SOLICITUDES</li>
                 <li><a class="link-effect" href="#">MIS x</a></li>
             </ol>
         </div>
     </div>
 </div>
 <!-- FIN Encabezado de Pagina -->
 <!-- INICIO Contenido de pagina -->
 <div class="content content-boxed">
     <!-- Todos los Productos -->
     <div class="block">
         <div class="block-header bg-gray-lighter">
           <ul class="block-options">
               <li>
                   <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
               </li>
           </ul>
           <h3 class="block-title">Listado </h3>
         </div>
         <div class="block-content">
             <table class="table table-bordered table-condensed table-striped js-dataTable-directorio" >
                 <thead>
                     <tr>
                         <th class="hidden-xs"> ID</th>
                         <th>No Oficio</th>
                         <th class="text-center">Fecha de respuesta.</th>


                        <th class="text-center">Plazo de Respuesta</th>                         
                         <th class="hidden-xs text-center"> Estatus Plazo de Respuesta</th>
                         <th class="hidden-xs text-center">Descripción</th>
                         <th class="hidden-xs text-center">Dirigido A:</th>
                         <th class="text-center">Of.enviado</th>
                         <th class="text-center">Documento de respuesta</th>
                         <th class="text-center">Acción.</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                                         
                 
                     $current_date = date('Y-m-d '); // date1                  
                        
                     
                       foreach ($nombramientos as $nombramiento){
                        
                                echo '<tr>';
                                echo '<td class="hidden-xs">'.$nombramiento['id'].'</td>';
                                echo '<td class="hidden-xs">'.($nombramiento['no_oficio']).'</td>';
                                echo '<td class="text-center">'.fecha_dmy($nombramiento['fecha_creacion']).'</td>';
                                echo '<td class="hidden-xs">'.fecha_dmy($nombramiento['fecha_finalizacion']).'</td>';
                                echo '<td class="text-left">';
                              if($current_date  <  $nombramiento['fecha_finalizacion'] )
                             {
                               echo '<span style="white-space: nowrap;"><strong>En Tiempo</strong></span> <br>';// acción
                            

                               } else{
                               	
                               	   echo '<span style="white-space: nowrap;"><strong>Finalizado</strong></span> <br>';// acción
                            
                             } 
                             echo '</td>'; 
                                
                                echo '<td class="hidden-xs">'.$nombramiento['motivo'].'</td>';
                                echo '<td class="hidden-xs">'.$nombramiento['user1'].'</td>';
                             
                                
                             echo '<td class="text-left">';
                              if($nombramiento['url_oficio']==NULL )
                             {
                               echo '<span style="white-space: nowrap;"><strong>sin archivo cargado </strong></span> <br>';// acción
                            

                               } else{
                             echo '<span style="white-space: nowrap;"><strong> </strong><a target="_blank" href="control_oficios/'.$nombramiento['url_oficio'].'"><button class="btn btn-xs btn-default outline" type="button" data-toggle="tooltip" title="Ver archivo"><i class="fa fa-file"></i> Ver </button></a></span> <br>';// acción
                             // echo '<span data-toggle="tooltip" title="Dar Seguimiento"><a class="btn btn-default"  title="Dar Seguimiento"  data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_aprobacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-pencil-square-o text-warnig"></i></a></span>';
                             
                             } 
                             echo '</td>';  
                             
                             
                             // archivo respuesta
                             
                             echo '<td class="text-left">';
                              if($nombramiento['url_oficio_respuesta']==NULL )
                             {
                               echo '<span style="white-space: nowrap;"><strong>sin respuesta</strong></span> <br>';// acción
                            

                               } else{
                             echo '<span style="white-space: nowrap;"><strong>doc: </strong><a target="_blank" href="control_oficios/'.$nombramiento['url_oficio_respuesta'].'"><button class="btn btn-xs btn-default outline" type="button" data-toggle="tooltip" title="Ver archivo"><i class="fa fa-file"></i> Ver </button></a></span> <br>';// acción
                             // echo '<span data-toggle="tooltip" title="Dar Seguimiento"><a class="btn btn-default"  title="Dar Seguimiento"  data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_aprobacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-pencil-square-o text-warnig"></i></a></span>';
                             
                             } 
                             echo '</td>';  
                             
                                
                                
                                 echo '<td class="text-center" style="white-space: nowrap;">';
                                 echo '<div class="btn-group">';
                                             
                           
                                 
									  if ($nombramiento['estatus'] ==4)
                                {
                                 echo '<span data-toggle="tooltip" title="Liquidar sin anticipo"><a class="btn btn-default"  title="liquidación"  data-toggle="modal" data-target="#modal-remoto" href="viaticos/liquidar_sin_anticipo.php?id='.$nombramiento['id'].'"><i class="fa fa-pencil text-warning"></i></a></span>';
                                  } //liquidar_sin_anticipio.php
                                 						 
								 
							                                 
                                else if ($nombramiento['estatus'] == 1 ){
                                    //echo '<span class="label label-primary">Solicitud Enviada</span> </td>';
                                     echo '<span class="label label-success">Oficio Enviado </span> </td>';
                                }
								 else if ($nombramiento['estatus'] == -1 ){
                                   echo '<span class="label label-info">Asignación de Actividad generado <a class="btn btn-default"  title="Editar Nombramiento"  data-toggle="modal" data-target="#modal-remoto-lgg1" href="viaticos/solicitar_nombramiento_editable.php?id='.$nombramiento['id'].'"><i class="fa fa-pencil text-warning"></i></a> </span> </td>';
                                    //echo'-liquidado';
                                }
                                else if ($nombramiento['estatus'] == 2 ){
                                    echo '<span class="label label-primary"> Con Respuesta</span> </td>';
                                    //echo'-liquidado';
                                }
                               /* else if ($nombramiento['estatus'] == 3 ){
                                    echo '<span class="label label-success">Enviado con Correcciones <a class="btn btn-default"  title="Editar liquidacion"  data-toggle="modal" data-target="#modal-remoto" href="viaticos/liquidar_viaticos_editable.php?id='.$nombramiento['id'].'"><i class="fa fa-pencil text-warning"></i></a> </span> </td>';
                                    
                                    //echo'-liquidado';
                                }*/
                                 else if ($nombramiento['estatus'] == 4 ){
                                    echo '<span class="label label-success">Repuesta de correcciones </span> </td>';
                                    //echo'-liquidado';
                                }
                                 else if ($nombramiento['estatus'] == 5 ){
                                    echo '<span class="label label-success">Finalizado<a class="btn btn-default"  title="Editar liquidacion sin anticipo"  data-toggle="modal" data-target="#modal-remoto" href="viaticos/update_liquidar_sin_anticipo.php?id='.$nombramiento['id'].'"><i class="fa fa-pencil text-warning"></i></a> </span> </td>';
                                    //echo'-liquidado';
                                }
                                                             
                                
                                 
                            echo ' ';
                            echo '</div>';
                            echo '</td>';
                            echo '</tr>';
      
                                
                                
                            //}
                         }
                     ?>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- Final Todos los Productos -->
 </div>
 <!-- FIN Contenido de Pagina -->
 
<?php else : ?>
    <p>
         <span class="error">Usted no esta autorizado para acceder a esta pagina.</span> Por favor <a href="index.php">inicie sesión</a>.
    </p>
<?php endif; ?>
    
    
    
    
    
</body>
</html>
