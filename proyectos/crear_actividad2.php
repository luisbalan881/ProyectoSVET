<?php
    include_once '../inc/functions.php';


    sec_session_start();
    $u = usuarioPrivilegiado();
    if (function_exists('login_check') && login_check() == true) :
        if ($u->hasPrivilege('crearSolicitudTransporte') ) :
            $id = $_SESSION['user_id'];
            //$fee = $_POST['fee'];

            $proyecto = proyectos();
            $departamentosgt = departamentosgt();
            $persona = User::getByUserId($id);

         
                //$dias = tipos_dias_laborales();

        ?>
           <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Control de vehiculo</title>

            <script src="assets/js/plugins/chosen/chosen.jquery.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/prism.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/init.js"></script>
            <link rel="stylesheet" href="assets/js/plugins/chosen/chosen.css">
            <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/datepicker33.min.css">





            <script src="assets/js/plugins/timepicker/js/timepicki.js"></script>
            <link href="assets/js/plugins/timepicker/css/timepicki.css" rel="stylesheet">

            <script src="assets/js/pages/validar_proyecto_actividad.js"></script>
            <script src="transporte/js/funciones.js"></script>
			 

            <script src="assets/js/plugins/jspdf/jspdf.js"></script>
            <script src="assets/js/plugins/jspdf/pdfFromHTML.js"></script>
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
                <h1>GESTION DE PROYECTOS SVET <span>Formulario para creación de actividades</span></h1>
                              
                  <div class="form-group">
                      <div class="col-xs-12">
                          <div class="form-material">
                              <!--<input class="js-tags-input form-control" type="text" id="destinatarios" name="destinatarios" value="" required>-->

                              <label for="destinatarios">Departamento donde se realizara la activiada</label>
                              <div class="input-group has-personalizado">
                                <span class="input-group-addon" ><span class="fa fa-bank"></span></span>
                                <select name="d_departamentos" id="d_departamentos" id="d_departamentos" multiple="multiple" data-placeholder="Seleccione un Departamentos" class="chosen-select-width col-xs-12 form-control" multiple tabindex="6" required>
                                  <?php
                                  foreach ($departamentosgt as  $dep):
                                   //   if ( $proy['status'] == 1){
                                          echo '<option value="'. $dep["id_departamento"].'">'. $dep["nombre"].'</option>';
                                    //  }
                                  endforeach
                                  ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
               
                  <div class="form-group">
                      <div class="col-xs-12">
                          <div class="form-material">
                              <!--<input class="js-tags-input form-control" type="text" id="destinatarios" name="destinatarios" value="" required>-->

                              <label for="destinatarios">Lista de proyectos activos*</label>
                              <div class="input-group has-personalizado">
                                <span class="input-group-addon" ><span class="fa fa-bank"></span></span>
                                <select name="d_solicitantes" id="d_solicitantes"  multiple="multiple" data-placeholder="Seleccione un Departamentos" class="chosen-select-width col-xs-12 form-control" multiple tabindex="6" required>
                                  <?php
                                  foreach ($proyecto as  $proy):
                                   //   if ( $proy['status'] == 1){
                                          echo '<option value="'. $proy["id_proyecto"].'">'. $proy["dep_nm"].''. $proy["nombre"].'</option>';
                                    //  }
                                  endforeach
                                  ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                                        
                      <div class="form-group">
                    <div class="col-xs-5">

                          <div class="has-personalizado">
                            <label for="soli_lugar">Nombre de actividad (Campo obligatorio)</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="nombre" name="nombre" maxlength="200" rows="1"  required></textarea>
                            </div>
                            


                          </div>

                    </div>

                    <div class="col-xs-5">

                          <div class="has-personalizado">
                            <label for="soli_lugar">Dirección (Campo obligatorio)</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="dir" name="dir" maxlength="200" rows="1"  required></textarea>
                            </div>
                            


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

                              <label for="soli_fecha2">Fecha Fin*</label>
                          </div>
                      </div>
        
                    
                      <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-clock-o"></span></span>
                              <input class="form-control"    id="soli_salida1" name="soli_salida1" required>
                            </div>
                              <label for="soli_horas">Hora*</label>
                          </div>
                      </div>
                      <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <select class="form-control" name="participacion" id="participacion"data-placeholder="Seleccione" required>
                                <option value="" disabled selected hidden>Seleccione</option>
                                <option value="2"> SI</option>
                                <option value="1"> NO</option>
                               
                              </select>
                            </div>

                            
                            <label for="destinatarios"> Participación de Secretaria</label>
                          </div>
                      </div>
                      <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="soli_desc">Descripcion del actividad (Campo obligatorio)</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="desc" name="desc" rows="1" required></textarea>
                            </div>


                          </div>

                    </div>
                  </div>

                 
                  <div class="form-group">
                                    <div class="col-xs-4">
                                        <div class="">
                                            <input class=" "  type="file" id="arch_original" name="arch_original"
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
                                                   image/png" required>
                                            <label for="arch_original">Archivo Original*</label>
                                        </div>
                                    </div>

                  <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="soli_desc">Solicitud de material communicación social (Campo obligatorio)</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="descm" name="descm" rows="1" required></textarea>
                            </div>


                          </div>

                    </div>
                  </div>


                 

                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                        
                         <button id="boton_s_t" class="btn btn-sm btn-success btn-block" onclick="add_solicitud_bitacora(<?php echo $id ?>,<?php echo $persona->persona['dep_id']?>)"><i id="loading" class="fa fa-refresh fa-spin" style="display:none;"></i> Crear actividad </button>
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
