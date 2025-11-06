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

            <script src="assets/js/pages/solicitud_form_validate_permiso_salidas.js"></script>
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
                <h1>Solicitar Pase de salida<span>Formulario de solicitud. </span></h1>
				
			
                 
					  
              

                
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
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"    id="soli_salida1" name="soli_salida1" required>
                            </div>
                              <label for="soli_horas">DE: *</label>
                          </div>
                      </div>
					  
					  <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"    id="soli_salida2" name="soli_salida2" required>
                            </div>
                              <label for="soli_horas">A: *</label>
                          </div>
                      </div>
					  
					  <div class="col-xs-2 col-sm-25">
                          <div class="form-material ">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"  type="number"  id="soli_tiempo" name="soli_tiempo" min="1" max="60"   required >
                            </div>
                            <label for="soli_tiempo">Duración*</label>
                          </div>
                      </div>
					  
					  
					  </div>
                      
                     
                      
                     <div class="form-group">
						
					  
					   <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <select class="form-control" name="horas_dias" id="horas_dias"data-placeholder="Seleccione uno o mas Departamentos" required>
                                <option value="" disabled selected hidden>Seleccionar</option>
                                <option value="Minutos"> Minuto(s)</option>
                                <option value="horas"> Hora(s)</option>
                               
                              </select>
                            </div>
                            <label for="destinatarios">Tiempo en*</label>
                          </div>
                      </div>
					  
					  <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <select class="form-control" name="t_completo" id="t_completo"data-placeholder="Seleccione uno" required>
                                <option value="" disabled selected hidden>Seleccionar</option>
                                <option value="Pase de salida"> Pase de salida</option>
                                <option value="Licencia"> Licencia</option>
								 <option value="Permiso"> Permiso</option>
                               
                              </select>
                            </div>
                            <label for="destinatarios">Tipo de salida*</label>
                          </div>
                      </div>
					  

								
					  
					  
					  
                                     </div>
									 
									 
									 
									 
									 
									 


                  <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="soli_lugar">Motivo de Solicitud: *</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="soli_just" name="soli_just" maxlength="90" rows="1"  required  ></textarea>
                            </div>


                          </div>

                    </div>
                  </div>
				  
				  
                  <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="soli_lugar">Observaciones: *</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="soli_obs" name="soli_obs" maxlength="90" rows="1"  ></textarea>
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
			    $('#soli_salida2').timepicki();  //pendientes1
			  
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
