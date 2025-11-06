<?php
    include_once '../inc/functions.php';


    sec_session_start();
    $u = usuarioPrivilegiado();
    if (function_exists('login_check') && login_check() == true) :
        if ($u->hasPrivilege('crearSolicitudTransporte') ) :
            $id = $_SESSION['user_id'];
            //$fee = $_POST['fee'];

            $departamentos = departamentos();
            $persona = User::getByUserId($id);
           // if ( !empty($_POST)) {
            //  cambiarStadoProyecto ($id);
           // header("Location: index.php?ref=_53");
         // }


                //$dias = tipos_dias_laborales();



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
              <form id="SolicitudForm" class="js-validation-solicitud form-horizontal form-style-10" method="POST" enctype="multipart/form-data">
                <h1>Proyectos SVET<span>Formulario para la creación de proyectos</span></h1>
                  <div class="form-group">
                      <div class="col-xs-12">
                          <div class="form-material">
                              <!--<input class="js-tags-input form-control" type="text" id="destinatarios" name="destinatarios" value="" required>-->

                              <label for="destinatarios">Departamento quien lo organiza*</label>
                              <div class="input-group has-personalizado">
                                <span class="input-group-addon" ><span class="fa fa-bank"></span></span>
                                <select name="d_solicitantes" id="d_solicitantes"  multiple="multiple" data-placeholder="Seleccione uno Departamentos" class="chosen-select-width col-xs-12 form-control" multiple tabindex="6" required>
                                  <?php
                                  foreach ($departamentos as $dept):
                                      if ($dept['dep_status'] == 1){
                                          echo '<option value="'.$dept["dep_id"].'">'.$dept["dep_nm"].'</option>';
                                      }
                                  endforeach
                                  ?>
                                  </select>
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

                              <label for="soli_fecha">Fecha inicio</label>
                          </div>
                      </div>


                        <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                              <input class="js-datepicker form-control" type="text" id="soli_fecha2" name="soli_fecha2" data-date-language="es-ES" data-date-days-of-week-disabled="0,7" data-provide="datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"  required>
                            </div>

                              <label for="soli_fecha2">Fecha Fin</label>
                          </div>
                      </div>

                      <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="objetivo">Nombre (Campo obligatorio)</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="nombre1" name="nombre1" maxlength="225" rows="2" required></textarea>
                            </div>


                          </div>

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="soli_desc">Descripción (Campo obligatorio)</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="soli_desc" name="soli_desc" rows="3" required></textarea>
                            </div>


                          </div>

                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <button id="boton_s_t" class="btn btn-sm btn-primary btn-block" onclick="add_solicitud(<?php echo $id ?>,<?php echo $persona->persona['dep_id']?>)" ><i id="loading1" class="fa fa-refresh fa-spin" style="display:none;"></i> Crear Proyecto</button>
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
