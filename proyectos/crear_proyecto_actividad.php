<?php
    include_once '../inc/functions.php';
    include_once '../proyectos/funciones_proyectos.php';

    sec_session_start();
    $u = usuarioPrivilegiado();
    if (function_exists('login_check') && login_check() == true) :
        if ($u->hasPrivilege('crearSolicitudTransporte') ) :
            $id = $_SESSION['user_id'];
           
			 $proyecto = proyectos();
        $actividades = actividades();
        $departamentosgt = departamentosgt();
			
			
	



        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Solicitar Transporte</title>

            <script src="assets/js/plugins/chosen/chosen.jquery.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/prism.js"></script>
            <script src="assets/js/plugins/chosen/docsupport/init.js"></script>
            <link rel="stylesheet" href="assets/js/plugins/chosen/chosen.css">
            <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/datepicker33.min.css">





            <script src="assets/js/plugins/timepicker/js/timepicki.js"></script>
            <link href="assets/js/plugins/timepicker/css/timepicki.css" rel="stylesheet">

            <script src="assets/js/pages/validar_proyecto.js"></script>
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
             <form class="js-validation-documento form-horizontal push-10-t push-10" action="proyectos/nueva_actividad.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                          <label for="destinatarios">Destinatario(s)*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-4">
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
                                <option value="SI"> SI</option>
                                <option value="NO"> NO</option>
                               
                              </select>
                            </div>

                            
                            <label for="destinatarios"> Participación de la Secretaria Ejecutiva</label>
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
                                            <label for="arch_titulo">Personal SVET</label>
                                            <div class="help-block text-right"> Personal SVET</div>
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
