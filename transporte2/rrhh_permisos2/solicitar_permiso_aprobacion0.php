<?php
    include_once '../inc/functions.php';


    sec_session_start();
    $u = usuarioPrivilegiado();
	
    if (function_exists('login_check') && login_check() == true) :
        if ($u->hasPrivilege('crearSolicitudTransporte') ) :
            $id = $_SESSION['user_id'];
            //$fee = $_POST['fee'];
            $departamentos = departamentos();
            
            
             if ( !empty($_GET['id'])) {
				 
		
            $id2 = $_REQUEST['id'];
            //$renglon = renglon_info($id);
			$id3 = $id2;
			include_once 'funciones_permisos.php';
  
		  $bitacora = permiso_salida_admin0($id3);// nota crear consulta para ver los datos releveantes para devolver $bitacora
			
        }

        if ( null==$id2 ) {
            header("Location: index.php?ref=_2");
        }

            
            
            //$departamentos = nom();
            $tipo = tipo_viaticos();
          //  $tipo2 = tipo_viaticos2();
            $persona = User::getByUserId($id);
			$tipo2 = periodo_user_dias_consumidos($id);


               
             
                                //  foreach ($tipo as $dept):
                                     // if ($dept['dep_status'] == 1){
                                  //        echo '<option value="'.$dept["id_tipo"].'">'.$dept["descripcion"].'</option>';
                                     // }
                                  //endforeach
                                  



        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Solicitar Vacaciones</title>

            <script src="assets/js/plugins/chosen/chosen.jquery.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/prism.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/init.js"></script>
            <link rel="stylesheet" href="assets/js/plugins/chosen/chosen.css">
            <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/datepicker33.min.css">





            <script src="assets/js/plugins/timepicker/js/timepicki.js"></script>
            <link href="assets/js/plugins/timepicker/css/timepicki.css" rel="stylesheet">

            <script src="assets/js/pages/solicitud_form_validate_solicitud_permisoVacaciones.js"></script>
			<script src="assets/js/pages/solicitud_form_validate_solicitud_permiso_anulacion.js"></script>
            <script src="transporte/js/funciones.js"></script>

            <script src="assets/js/plugins/jspdf/jspdf.js"></script>
            <script src="assets/js/plugins/jspdf/pdfFromHTML.js"></script>
            <script src="assets/js/plugins/jspdf/pdfFromHTML1.js"></script>
              <script src="assets/js/plugins/jspdf/pdfFromHTML2.js"></script>
             <script src="assets/js/plugins/jspdf/pdfFromHTML3.js"></script>
              <script src="assets/js/plugins/jspdf/pdfFromHTML31.js"></script>
              <script src="assets/js/plugins/jspdf/pdfFromHTML4.js"></script>
            
            <script src="assets/js/plugins/jspdf/hoja_cupones.js"></script>
            <script src="assets/js/plugins/jspdf/hoja_cupones5.js"></script>
            <script src="assets/js/plugins/jspdf/solicitud_cupones.js"></script>

            
            <link href="https://fonts.googleapis.com/css?family=Chau+Philomene+One|Fredoka+One" rel="stylesheet">

        </head>
        <body>
          <div class="">
            <div class="">

              <!--<div class="tag-green">Solicitar Transporte</div>-->
              <div class="">
                  <ul class="block-options2" style="margin-top:10px; margin-right:9px;">
                      <li>
                          <button data-dismiss="modal" type="button" ><i class="btn-circle"></i></button>
                      </li>
                  </ul>


              </div>


            </div>
              
              

              
            <div class="block-content ">
              <form id="SolicitudForm" class="js-validation-solicitud form-horizontal form-style-10" method="POST" enctype="multipart/form-data">
                <h1>Validar Solicitud <span> ¿Esta realmente seguro(a) de validar esta solicitud? si lo valida de habilitara su descarga</span></h1>
                  
                              

							  
							   <div class="form-group">
							   
							   <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $id2; ?>" disabled >
                            </div>
                            <label for="soli_tiempo">No. Solicitud *</label>
                          </div>
                      </div>
							   
							   
							   <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="text"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $bitacora['usuario']; ?>" disabled >
                            </div>
                            <label for="soli_tiempo"> Solicitante*</label>
                          </div>
                      </div> 
							   
							   
                 
					  
					  
					  <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="text"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $bitacora['fecha_inicio']; ?>" disabled >
                            </div>
                            <label for="soli_tiempo">Fecha Inicial *</label>
                          </div>
                      </div> 
					  
					  <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="text"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $bitacora['fecha_final']; ?>" disabled >
                            </div>
                            <label for="soli_tiempo">Fecha Final *</label>
                          </div>
                      </div> 
					  
					  
					   <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="text"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $bitacora['fecha_retorno']; ?>" disabled >
                            </div>
                            <label for="soli_tiempo">Fecha Retorno *</label>
                          </div>
                      </div> 
					  
					   <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="dias_solicitados" name="dias_solicitados" value="<?php echo $bitacora['dias_solicitado']; ?>" disabled >
                            </div>
                            <label for="dias_solicitados">No. dias solicitado *</label>
                          </div>
                      </div>


						<div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="dias_consumidos" name="dias_consumidos" value="<?php echo $bitacora['dias_consumidos_user']; ?>" disabled >
                            </div>
                            <label for="dias_consumidos">No. dias consumidos *</label>
                          </div>
                      </div> 
					  
					  <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $bitacora['pendientes']; ?>" disabled >
                            </div>
                            <label for="soli_tiempo">No. dias pendientes *</label>
                          </div>
                      </div> 
					  
					   <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $bitacora['año']; ?>" disabled >
                            </div>
                            <label for="soli_tiempo">Periodo *</label>
                          </div>
                      </div> 
					  
					   <div class="col-xs-12 col-sm-35" hidden>
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="id_periodo" name="id_periodo" value="<?php echo $bitacora['id_periodo']; ?>" disabled >
                            </div>
                            <label for="id_periodo">Periodo id *</label>
                          </div>
                      </div> 
					  
					    <div class="col-xs-12 col-sm-35">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="text"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $bitacora['justificacion']; ?>" disabled >
                            </div>
                            <label for="soli_tiempo">Justificacion *</label>
                          </div>
                      </div> 
					  
                   </div>
                  
                

                  <div class="form-group">
                    <div class="col-sm-12 text-center">  
                        <button id="boton_s_t" class="btn btn-sm btn-success btn-block" onclick="add_formulario_vacaciones(<?php echo $id ?>,<?php echo $persona->persona['dep_id']?>, <?php   echo $id2 ?>)" ><i id="loading1" class="fa fa-refresh fa-spin" style="display:none;"></i> Validar Solicitud</button>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <div class="col-sm-12 text-center">  
                        <button id="boton_s_t1" class="btn btn-sm btn-danger btn-block" onclick="add_formulario2(<?php echo $id ?>,<?php echo $persona->persona['dep_id']?>, <?php   echo $id2 ?>)" ><i id="loading1" class="fa fa-refresh fa-spin" style="display:none;"></i> Anular Solicitud</button>
                    </div>
                  </div>
                
                
               
                
                
                </form>

            </div>
                      
              
          </div>
          <!-- Page JS Code -->
          <script>
              jQuery(function(){
                  // Init page helpers (BS  Select2 Inputs plugins)
                  App.initHelpers(['datepicker','select2']);
              });

              $('#soli_salida1').timepicki();
            </script>

        </body>

        </html>

        <?php
      else :
            echo include(unauthorizedModal());
        endif;
    else:
       //echo "<script type='text/javascript'> window.location='../index.ph'; </script>";
    endif;
?>
