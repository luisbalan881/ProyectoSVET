<!DOCTYPE html>
<html>
<head>
    <title>MIS SOLICITOS DE VACACIONES</title>
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

            
            <script src="assets/js/pages/status_ampliacion_admin.js"></script>
			<script src="assets/js/plugins/jspdf/pdfFromHTML2Justificacion.js"></script>
            <script src="transporte/js/funciones.js"></script>

            <script src="assets/js/plugins/jspdf/hoja_cupones.js"></script>
            <script src="assets/js/plugins/jspdf/hoja_cupones5.js"></script>
            <script src="assets/js/plugins/jspdf/solicitud_cupones.js"></script>
			
			<script src="assets/js/plugins/jspdf/pdfFromHTMLVacaciones.js"></script>
			
			

    
</head>
<body>
<?php
if (function_exists('login_check') && login_check()):
   //  if (usuarioPrivilegiado()->hasPrivilege('leerViaticos')) :
    //$personas = personas();
        $user_id =$_SESSION['user_id'];
        include_once 'funciones_permisos.php';
    //    $nombramientos = nombramientos();
		  $solicitud_permiso = permiso_salida_admin($user_id);

    // $nombramientos = nombramientos();
?>
  <!-- INICIO Encabezado de Pagina -->
 <div class="content bg-gray-lighter">
     <div class="row items-push">
         <div class="col-sm-7">
             <h1 class="page-heading">
                 SOLICITUDES DE VACACIONES
             </h1>
         </div>
         <div class="col-sm-5 text-right hidden-xs">
             <ol class="breadcrumb push-10-t">
                 <li>CONTROL DE SOLICITUDES DE VACACIONES
             </h1></li>
                 <li><a class="link-effect" href="#">VACACIONES
             </h1>  </a></li>
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
           <h3 class="block-title">Solicitudes de Vacaciones
             </h1></h3>
         </div>
         <div class="block-content">
             <table class="table table-bordered table-condensed table-striped js-dataTable-directorio" >
                 <thead>
                     <tr>
							
							 <th class="hidden-xs text-center">ID solicitud</th>
                          <th class="text-center">Fecha de cración.</th>
                         <th>Nombre Solicitante</th>

                         
                         <th class="hidden-xs text-center">Justificación</th>
						 <th class="hidden-xs text-center">Fecha Inicio</th>
                         <th class="hidden-xs text-center">Fecha de finalización</th>
						  <th class="hidden-xs text-center">cantidad de dias solicitado</th>
						    <th class="hidden-xs text-center">Periodo</th>
                         <th class="text-center">Acción</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     
                       foreach ($solicitud_permiso as $nombramiento){
                         //foreach ($personas as $persona){
                           // if($persona['ext_id'] > 0 && $nombramiento['user_status'] == 1){
                                echo '<tr>';
                                echo '<td class="hidden-xs">'.$nombramiento['id_solicitud'].'</td>';
                                //echo '<td >'.$nombramiento['cod_nombramiento'].' '.fecha_dmy($nombramiento['fecha']).'</td>';
								  echo '<td class="text-center">'.fecha_dmy($nombramiento['fecha_creacion']).'</td>';
								  echo '<td class="hidden-xs">'.($nombramiento['usuario']).'</td>';
                                //echo '<td >'.$nombramiento['user_nm1'].' '.$nombramiento['user_nm2'].' '.$nombramiento['user_ap1'].' '.$nombramiento['user_ap2'].'</td>';
                                echo '<td class="hidden-xs">'.($nombramiento['justificacion']).'</td>';
                              
                               // echo '<td class="hidden-xs" ><a href="mailto:'.$nombramiento['user_mail'].'">'.$nombramiento['user_mail'].'</td>';
                                echo '<td class="hidden-xs">'.fecha_dmy($nombramiento['fecha_inicio']).'</td>';
								 echo '<td class="hidden-xs">'.fecha_dmy($nombramiento['fecha_final']).'</td>';
                                //echo '<td >'.$nombramiento['user_nm1'].' '.$nombramiento['user_nm2'].' '.$nombramiento['user_ap1'].' '.$nombramiento['user_ap2'].'</td>';
                                echo '<td class="hidden-xs">'.$nombramiento['dias_solicitado'].'</td>';
								  echo '<td class="hidden-xs">'.($nombramiento['año']).'</td>';
                               //echo '<td class="hidden-xs">'.$nombramiento['objetivo'].'</td>';
                              //  echo '</tr>';
                                 echo '<td class="text-center" style="white-space: nowrap;">';
                            echo '<div class="btn-group">';
							
							
							
							//echo '<button title="Imprimir Aprobación" class="btn btn-personalizado outline" title="Descargar" ';
                                  if ($nombramiento['status'] == 2 )
                                {
                                // echo '<span data-toggle="tooltip" title="Autorizar"><a class="btn btn-default"  title="validar permiso"  data-toggle="modal" data-target="#modal-remoto" href="rrhh_permisos/solicitar_permiso_aprobacion.php?id='.$nombramiento['id_solicitud'].'"><i class="fa fa-check-square" aria-hidden="true"></i></a></span>';
								echo '<span data-toggle="tooltip" title="Anular Solicitud"><a class="btn btn-default"  title="Anular solicitud de vacaciones"  data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_permiso_devolver_dias.php?id='.$nombramiento['id_solicitud'].'"><i class="fa fa-times" aria-hidden="true"></i></a></span>';
                                  }
								//echo '<button title="Imprimir Aprobación" class="btn btn-personalizado outline" title="Descargar" ';  
                     
								if ($nombramiento['status'] == 4 )
                                {
                                // echo '<span data-toggle="tooltip" title="Autorizar"><a class="btn btn-default"  title="validar permiso"  data-toggle="modal" data-target="#modal-remoto" href="rrhh_permisos/solicitar_permiso_aprobacion.php?id='.$nombramiento['id_solicitud'].'"><i class="fa fa-check-square" aria-hidden="true"></i></a></span>';
								echo '<span data-toggle="tooltip" title="Solicitud de Retorno"><a class="btn btn-default"  title="Retornar vacaciones"  data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_permiso_retornar_dias.php?id='.$nombramiento['id_solicitud'].'"><i class="fa fa-times" aria-hidden="true"></i></a></span>';
                                  }
                               
										/*echo '<button title="Imprimir Aprobación" class="btn btn-personalizado outline" title="Descargar" ';
                             if ($nombramiento['status'] == 2)
                                {
									
									//solicitar_permiso_devolver_dias
                                 //echo 'onclick="HTMLtoPDF1('.$nombramiento['id_solicitud'].')"';
								 //  echo 'onclick="HTMLtoPDF_reporte('.$nombramiento['id_solicitud'].')"';
								   
                                 
                                }
                                
                                echo '><i class="fa fa-download"></i></button>';*/
								//
								
								 
							echo '<button title="Imprimir Aprobación" class="btn btn-personalizado outline" title="Descargar" ';
                             if ($nombramiento['status'] == 2)
                                {
									
									
                                 echo 'onclick="HTMLtoPDF_reporte('.$nombramiento['id_solicitud'].')"';
                                 
                                }
                                else {
                                    
                                    echo'disabled';
                                }
                                echo '><i class="fa fa-download"></i></button>';
								
								
								
								
							   //
                                 if ($nombramiento['status'] == 0 ){
                                    echo '<span class="label label-danger"> Anulado por usurio </span> </td>';
                                    //echo'-liquidado';
                                }  
                                  
                                else if ($nombramiento['status'] == 1 ){
                                    echo '<span class="label label-warning">Por validar por usurio</span> </td>';
                                    //echo'-liquidado';
                                }
                                else if ($nombramiento['status'] == 2 ){
                                    echo '<span class="label label-success">Nueva solicitud</span> </td>';
                                    //echo'-liquidado';
                                }
                                else if ($nombramiento['status'] == 3 ){
                                    echo '<span class="label label-primary">Anulado por Administrador</span> </td>';
                                    //echo'-liquidado';
                                }
								
								else if ($nombramiento['status'] == 4 ){
                                    echo '<span class="label label-info">Solicitud de retorno de vacaciones enviada</span> </td>';
                                    //echo'-liquidado';
																
                                }
								else if ($nombramiento['status'] == 5 ){
                                    echo '<span class="label label-success">solicitud retorno de vacaciones procesada</span> </td>';
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
