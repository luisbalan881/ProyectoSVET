<?php
include_once '../inc/functions.php';
sec_session_start();
    if (function_exists('login_check') && login_check() == true) :
        if (usuarioPrivilegiado()->hasPrivilege('leerSolicitudTransporte')) :

      include_once 'php/funciones.php';
      $solicitudes = array();
        $solicitudes = solicitudes_list();
         $user_id =$_SESSION['user_id'];

        ?>

        <!-- INICIO Contenido de pagina -->


        <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Usuario Horario</title>

    
     <script src="assets/js/plugins/jspdf/jspdf.js"></script>
    
   
            <script src="assets/js/plugins/chosen/chosen.jquery.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/prism.js"></script>
   <script src="assets/js/plugins/jspdf/pdfFromHTML2.js"></script>
             <script src="assets/js/plugins/jspdf/pdfFromHTML3.js"></script>
             <script src="assets/js/plugins/jspdf/pdfFromHTML31.js"></script>
              <script src="assets/js/plugins/jspdf/pdfSolicitudCompra.js"></script>  


        </head>
        <body >



                    <table id="solicitudes_list" class="table table-bordered table-condensed table-striped ">
                      <thead >
					  <tr>
                                    <td colspan="9">
                                       
                                    </td>
                                </tr>
                              <tr>
                                  <th class="text-center">No Ref.</th>
                                <!--<th class="text-center" >Dia</th>-->
                                <th class="text-center" >Fecha</th>
                                  <th class="text-center" >Dirección/unidad</th>
                                 
                                  <th class="text-center">Solicitante</th>
                                
                                
								  <th class="text-center">Clasificacion de compra </th>
z								  <th class="text-center">No CGC. </th>
                                  <th class="text-center">Descarga</th>
                              
								<!--<th class="text-center" >Dia</th>
                                
                                //<th class="text-center">motivo</th>
                      echo '-->


                                  <th class="text-center">Estatus</th>
                                  <th class="text-center">Acción</th>




                              </tr>
                          </thead>
                          <tbody>
                            <?php


                                  foreach ($solicitudes as $s){

                                  	

                                      echo '<tr '.(($s['estado_solicitud'] == 0)?'class="warning"':'"class="warning"').'>';
                                      //echo '<td class="text-center">'.$p['NOMBRE'].'</td>';
                                      echo '<td class="text-center">'.$s['id_solicitud_compra'].'</td>';
                                      //echo '<td class="text-center">'.get_nombre_dia($s['FECHA']).'</td>';
                                      echo '<td class="text-center">'.date('d-m-Y', strtotime($s['fecha_creacion'])).'</td>';
                                      echo '<td class="text-center">'.$s['dep_nm'].'</td>';
                                      echo '<td class="text-center">'.$s['solicitante'].' ';
                                     

                                      echo '<td class="text-center">'.$s['clasificacion'].'</td>';
                                       echo '<td class="text-center">'.$s['correlativo'].'</td>';
                                      //echo '<td class="text-center">'.$s['NOMBRE'].'</td>';
                                    //  echo '<td class="text-center">'.$s['EXT'].'</td>';
									//  echo '<td class="text-center">'.$s['Creacion'].'</td>';
                                      echo '<td class="text-center">';
                                      
                                      
												 echo '<button title="Imprimir Solicitud" class="btn btn-personalizado outline" title="Descargar" ';
                                      if($s['estado_solicitud']==3 and ($user_id == $s['id_solicitante'] ))
                                      {                                         
                                      echo 'onclick="pdfDetalleCompra('.$s['id_solicitud_compra'].')"';
                                         echo 'onclick="HTMLtoPDFV1('.$s['id_solicitud_compra'].')"';
                                          
                                      }                                      
                                      
                                       else {
                                    
                                    echo'disabled';
                                       }
                                echo '><i class="fa fa-download"></i></button>';
                                
                                
                                
                                
												//  echo '<td class="text-center">';
                                      /*
                                      
												 echo '<button title="Descargar borrador de solicitud" class="btn btn-personalizado outline" title="Descargar" ';
                                      if($s['estado_solicitud']==1 and ($user_id == 1058 or $user_id==9997) )
                                      //if ($nombramiento['status'] >= 2 and ($user_id == 9966 or $user_id==177) )
                                      {
                                         echo 'onclick="pdfDetalleCompra('.$s['id_solicitud_compra'].')"';
                                          
                                      }                                      
                                      
                                       else {
                                    
                                    echo'disabled';
                                       }
                                       
                                echo '><i class="fa fa-download"></i></button>'; 
                                
                                */
                                
                                  echo '<button title="Imprimir solicitud de compras" class="btn btn-personalizado outline" title="Descargar  prueba" ';
                                      if($s['estado_solicitud']<=2 and ($user_id == $s['id_solicitante'] ) )
                                      //if ($nombramiento['status'] >= 2 and ($user_id == 9966 or $user_id==177) )
                                      {
                                       //  echo 'onclick="pdfDetalleCompra('.$s['id_solicitud_compra'].')"';
                                         echo 'onclick="pdfDetalleCompra('.$s['id_solicitud_compra'].')"';//TMLtoPDF1
                                          
                                      }                                      
                                      
                                       else {
                                    
                                    echo'disabled';
                                       }
                                echo '><i class="fa fa-download"></i></button>';                                 
                                
                                
                                
                                   /*   
                                      
                                      if($s['estado_solicitud']==0)
                                      {
                                        echo '<span class="label label-warning">Anulado</span> </td>';
                                      }
                                      
                                      
                                      else if($s['estado_solicitud']==1){
                                      	

                                        echo '<span class="label label-success">Enviado</span> </td>';
                                      }
                                      else if($s['estado_solicitud']==2){
                                        echo '<span class="label label-danger">Cancelado</span> </td>';
                                      }*/

                                   //   echo '<td class="text-center">'.$s['DESTINO'].'</td>';
                                      //echo '<td class="text-center">'.$s['MOTIVO'].'</td>';

                                      echo '<td class="text-center">';
                                      if($s['estado_solicitud']==0)
                                      {
                                        echo '<span class="label label-danger">Anulado</span> </td>';
                                      }
                                      else if($s['estado_solicitud']==1){
          
                                        echo '<span class="label label-primary">Solicitud Generada</span> </td>';
                                      }
                                      else if($s['estado_solicitud']==2){
                                        echo '<span class="label label-warning">Editado</span> </td>';
                                      }
                                      else if($s['estado_solicitud']==3){
                                        echo '<span class="label label-success">Aprobado</span> </td>';
                                      }  
                                      else if($s['estado_solicitud']==-1){
                                        echo '<span class="label label-danger">No CGC Anulado</span> </td>';
                                      }

                                          echo '<td class="text-center" style="white-space: nowrap;">';
                                          
                                          //anular                            	
                                          //echo '<span data-toggle="tooltip" title="Anular"><a class="btn btn-default"  title="Anular"  data-toggle="modal" data-target="#modal-remoto" href="compras/solicitar_anulacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-times text-danger"></i></a></span>';
                                          
                                          //Asignar Form
                                          
                                          // Aqui validar usuario 
                                          
                                        //  if($s['estado_solicitud']==3){
                                          
                                          //echo '<span data-toggle="tooltip" title="Dar Seguimiento"><a class="btn btn-default"  title="Dar Seguimiento"  data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_aprobacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-pencil-square-o text-warnig"></i></a></span>';
                                       //  }
                                       
                                        // echo '<button title="Imprimir solicitud de compra" class="btn btn-personalizado outline" title="Descargar" ';
                                     if(($s['estado_solicitud']==1 OR $s['estado_solicitud']==2)and ($user_id == $s['id_solicitante'] ) )
                                      //if ($nombramiento['status'] >= 2 and ($user_id == 9966 or $user_id==177) )
                                      {
                                        // echo 'onclick="pdfDetalleCompra('.$s['id_solicitud_compra'].')"';
                                        echo '<span data-toggle="tooltip" title="Dar Seguimiento"><a class="btn btn-default"  title="Dar Seguimiento"  data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_aprobacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-pencil-square-o text-warnig"></i></a></span>';
                                          
                                      }                                      
                                      
                                       else {
                                    
                                   // echo'disabled';
                                       }
                                       
													 if(($s['estado_solicitud']==1 OR $s['estado_solicitud']==2) and ($user_id == $s['id_solicitante'] ) )
                                      //if ($nombramiento['status'] >= 2 and ($user_id == 9966 or $user_id==177) )
                                      {
                                        // echo 'onclick="pdfDetalleCompra('.$s['id_solicitud_compra'].')"';
                                        //echo '<span data-toggle="tooltip" title="Dar Seguimiento"><a class="btn btn-default"  title="Dar Seguimiento"  data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_aprobacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-pencil-square-o text-warnig"></i></a></span>';
                                          
                                          echo '<span data-toggle="tooltip" title="Anular"><a class="btn btn-default"  title="Anular"  data-toggle="modal" data-target="#modal-remoto" href="compras/solicitar_anulacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-times text-danger"></i></a></span>';
                                           echo '<span data-toggle="tooltip" title="Editar observaciones"><a class="btn btn-default"  title="Editar observaciones"  data-toggle="modal" data-target="#modal-remoto" href="compras/solicitar_modificacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-pencil text-warning"></i></a></span>';
                                      }                                      
                                      
                                       else {
                                    
                                   // echo'disabled';
                                       }                                       
                                       
                                          echo '<button title="Imprimir solicitud de compra test" class="btn btn-personalizado outline" title="Descargar" ';
                                      if($s['estado_solicitud']>=-1 and ($user_id == 1058 or $user_id==10067) )
                                                                           // if(($s['estado_solicitud']==1 OR $s['estado_solicitud']==3) and ($user_id == 1058 or $user_id==9997) )
                                      //if ($nombramiento['status'] >= 2 and ($user_id == 9966 or $user_id==177) )
                                      {
                                      echo 'onclick="pdfDetalleCompra('.$s['id_solicitud_compra'].')"';
                                      
                                      
                                   //     echo '<span data-toggle="tooltip" title="Dar Seguimiento"><a class="btn btn-default"  title="Dar Seguimiento"  data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_aprobacion.php?id='.$s['id_solicitud_compra'].'"><i class="fa fa-pencil-square-o text-warnig"></i></a></span>';
                                          
                                      }                                      
                                      
                                       else {
                                    
                                    echo'disabled';
                                       }
                                       
                               echo '><i class="fa fa-download"></i></button>';    

                                       //   echo '<span title="Editar"><a class="btn btn-warning outline"  title="Actualizar" data-toggle="modal" data-target="#modal-remoto-lgg" href="transporte/ver_solicitud.php?id='.$s['id_solicitud_compra'].'" ><i class="fa fa-pencil-square-o "></i></a></span>';

                                          echo '</td>';




                                      echo '</tr>';
                                  }
                                  ?>
                        </tbody>
                    </table>
                    <script>
                    $(document).ready(function() {
                      var table = $('#solicitudes_list').DataTable({
                        "pageLength": 50,

                        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
                        buttons: [],
                        columnDefs: [
                            {responsivePriority:0, targets: [0,2,-1]},
                            {responsivePriority:1, targets: [8,9]},
                            {responsivePriority:2, targets: [3,4]},
                            {responsivePriority:3, targets: [1]},
                            {responsivePriority:4, targets: [5,6,7]}
                        ],

                         "ordering": false,
                        "columnDefs": [
                          //{ "visible": false, "targets": 0 }
                        ],
                        "order": [[ 0, 'asc' ]],
                        "displayLength": 25
                      } );

                      // Order by the grouping

                    } );
              </script>


        </body>



        </html>
        <!-- FIN Contenido de Pagina -->
        <?php
    else:
        echo include(unauthorized());
    endif;
else:
  echo "<script type='text/javascript'> window.location='../herramientas/inicio.php'; </script>";
endif;
?>
