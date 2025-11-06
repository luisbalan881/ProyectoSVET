<?php
    include_once '../inc/functions.php';


    sec_session_start();
    $u = usuarioPrivilegiado();
    if (function_exists('login_check') && login_check() == true) :
        if ($u->hasPrivilege('crearSolicitudTransporte') ) :
            $id = $_SESSION['user_id'];
            //$fee = $_POST['fee'];
            $departamentos = departamentos();
            //$departamentos = nom();
            $tipo = periodo_user($id);
			//$tipo3 = periodo_user1($id);
			$tipo2 = periodo_user_dias_consumidos($id);//$lista1 = $p->fetch(PDO::FETCH_ASSOC);
			$restantes = periodo_user_dias_restantes($id); //dias restantes
			$fecha_inicial_periodo = periodo_user_fecha_inicio($id);  //periodo_user_fecha_fin
			$periodo_user_fecha_fin = periodo_user_fecha_fin($id); //año_periodo_user
			$año_periodo_user = año_periodo_user($id); //año_periodo_user
			$periodo_user_calculo=periodo_calculo_dia_permitido($id);
			$periodo_user_calculo2=periodo_calculo_dia_permitido2($id);
			$periodo_calculo=periodo_calculo_periodo($id);
			$pendientes=periodo_calculo_pendientes($id);
			
         //   $tipo2 = tipo_viaticos2();
            $persona = User::getByUserId($id);


               
             
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
            <title>Solicitar vacaciones</title>

            <script src="assets/js/plugins/chosen/chosen.jquery.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/prism.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/init.js"></script>
            <link rel="stylesheet" href="assets/js/plugins/chosen/chosen.css">
            <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/datepicker33.min.css">





            <script src="assets/js/plugins/timepicker/js/timepicki.js"></script>
            <link href="assets/js/plugins/timepicker/css/timepicki.css" rel="stylesheet">

            <script src="assets/js/pages/solicitud_form_validate_permiso_salida.js"></script>
            <script src="transporte/js/funciones.js"></script>

            <script src="assets/js/plugins/jspdf/jspdf.js"></script>
            <script src="assets/js/plugins/jspdf/pdfFromHTML.js"></script>
            <script src="assets/js/plugins/jspdf/pdfFromHTML1.js"></script>
            
			 <script src="rrhh_permisos/js/validarentradas.js"></script>
			  <script src="rrhh_permisos/js/validarkmregistrado.js"></script>


            
            <link href="https://fonts.googleapis.com/css?family=Chau+Philomene+One|Fredoka+One" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                <h1>Solicitar Vacaciones<span>Formulario de solicitud de Vacaciones   </span></h1>
				
				<label> <h3> DATOS DE PERIODO </h3></label>
                   <div class="form-group">
				   
				   <div class="col-xs-1 col-sm-25">
				   
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="soli_tiempo2" name="soli_tiempo2" value="<?php echo $tipo2['dias_consumidos'] ?>" disabled  >
                            </div>
                            <label for="soli_tiempo">Días gozados *</label>
                          </div>
                      </div>
					  
					     <div class="col-xs-1 col-sm-25">
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="pendientes1" name="pendientes1" value="<?php echo round($pendientes['pendientes'],1,PHP_ROUND_HALF_UP) ?>" disabled >
                            </div>
                            <label for="pendientes1">Dias pendientes*</label>
                          </div>
                      </div> 
					  
					  					
					  
					  
	 
					  <div class="col-xs-1 col-sm-25">
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="dias_restantes1" name="dias_restantes1" value="<?php echo $periodo_calculo['dias2'] ?>" disabled >
                            </div>
                            <label for="dias_restantes1">Dias Autorizados*</label>
                          </div>
                      </div> 
					  
					  
					  <div class="col-xs-1 col-sm-25">
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="dias_restantes" name="dias_restantes" value="<?php echo round($periodo_user_calculo2['dias'],2) ?>" disabled >
                            </div>
                            <label for="dias_restantes">Dias acumulados*</label>
                          </div>
                      </div> 
					  
					  
					   
					   </div>

					  
					  
                  <div class="form-group">
					
					   <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <input class="js-datepicker form-control" type="text" id="soli_inicio" name="soli_inicio" data-date-language="es-ES" data-date-days-of-week-disabled="0,7" data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"  value="<?php echo $fecha_inicial_periodo['fecha_inicial'] ?>" disabled>
                            </div>

                              <label for="soli_inicio">Periodo de trabajo DE:</label>
                          </div>
                      </div>
					  
					  
					  <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <input class="js-datepicker form-control" type="text" id="soli_fin" name="soli_fin" data-date-language="es-ES" data-date-days-of-week-disabled="0,7" data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"  value="<?php echo $periodo_user_fecha_fin['fecha_final_periodo'] ?>" disabled>
                            </div>

                              <label for="soli_fin">Periodo de trabajo A:</label>
                          </div>
                      </div>
					  
					   <div class="col-xs-1 col-sm-25">
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="periodo" name="periodo" value="<?php echo round($año_periodo_user['año'],2) ?>" disabled >
                            </div>
                            <label for="periodo">Año*</label>
                          </div>
                      </div> 
					  
				   
				   </div>

                
                  <div class="form-group">
                      <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <input class="js-datepicker form-control" type="text" id="soli_fecha" name="soli_fecha" data-date-language="es-ES" data-date-days-of-week-disabled="0,7" data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"  required>
                            </div>

                              <label for="soli_fecha">Fecha Inicio*</label>
                          </div>
                      </div>
                      
                       <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <input class="js-datepicker form-control" type="text" id="soli_fecha2" name="soli_fecha2" data-date-language="es-ES" data-date-days-of-week-disabled="0,7" data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"  required>
                            </div>

                              <label for="soli_fecha2">Fecha Finalización*</label>
                          </div>
                      </div>
                       <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <input class="js-datepicker form-control" type="text" id="soli_fecha3" name="soli_fecha3" data-date-language="es-ES" data-date-days-of-week-disabled="0,7" data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"  required>
                            </div>

                              <label for="soli_fecha3">Fecha de retorno*</label>
                          </div>
                      </div>
                      
                     
  <div class="col-xs-1 col-sm-25">
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="soli_tiempo" name="soli_tiempo" min="1" max="20" step="0.50"  required onChange="validarKilometrosFinales(this.value);"  >
                            </div>
                            <label for="soli_tiempo">cantidad de días a solicitar*</label>
                          </div>
                      </div>
					  
					  
					  
					  
                                     </div>
									 
									 
									 
									 
									 
									 


                  <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="soli_lugar">Justificación *</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="soli_just" name="soli_just" maxlength="90" rows="1"  required  ></textarea>
                            </div>


                          </div>

                    </div>
                  </div>
 <div class="form-group">
                      <div class="col-xs-12">
                          <div class="form-material">
                              <!--<input class="js-tags-input form-control" type="text" id="destinatarios" name="destinatarios" value="" required>-->

                              <label for="destinatarios">Confirme el periodo *</label>
                              <div class="input-group has-personalizado">
                                <span class="input-group-addon" ><span class="fa fa-bank"></span></span>
                                <select name="d_solicitantes" id="d_solicitantes"  multiple="multiple" data-placeholder="Seleccionar el periodo más antiguo que debe de consumir" class="chosen-select-width col-xs-12 form-control" multiple tabindex="6" required>
                                  <?php
                                  foreach ($tipo as $dept):
                                      if ($dept['status'] == 1){
                                               echo '<option value="'.$dept["id_periodo_user"].'">'.$dept["dias_consumidos"]."--dias gozados del año-".$dept["año"].'</option>';
                                      }
                                  endforeach
                                  ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

                

                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <button id="boton_s_t" class="btn btn-sm btn-primary btn-block" onclick="add_solicitud1(<?php echo $id ?>,<?php echo $persona->persona['dep_id']?>)" ><i id="loading1" class="fa fa-refresh fa-spin" style="display:none;"></i> Crear Solicitud</button>
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

              $('#soli_salida1').timepicki();  //pendientes1
			  
			  
			     var dias_res2 = $('#dias_restantes1').val(); //pendientes

			  
			  
			 if (dias_res2===''){
			  
			   swal("error ", " No tiene asignado periodos posteriores llamar al administrador,  para realizar la activacion de periodos " , "error");
        btnEnviar.disabled = true;
		
			  }
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
