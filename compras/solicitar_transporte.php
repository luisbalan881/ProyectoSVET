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

            <script src="assets/js/pages/solicitud_form_validate.js"></script>
            <script src="compras/js/funciones.js"></script>

            <script src="assets/js/plugins/jspdf/jspdf.js"></script>
            <script src="assets/js/plugins/jspdf/pdfFromHTML.js"></script>
			 <script src="transporte/js/validarentradas2.js"></script>
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
                

				
				
				<h1>Solicitar <span>Formulario para la solicitud de </span></h1>
				
				
                  <div class="form-group">
                                        

                      
                      
                      <div class="col-xs-2 col-sm-25">
                          <div class="form-material">
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="fa fa-calendar-check-o"></span></span>
                             
                              <select class="form-control" name="clasificacion" id="clasificacion"data-placeholder="Seleccione uno" required>
                                <option value="" disabled selected hidden>Seleccionar</option>
                                <option value="Suministro"> Suministro</option>
                                <option value="Material"> Material</option>
                                <option value="Servicio"> Servicio</option>
                                <option value="Equipo"> Equipo</option>
                              </select>
                            </div>
                            <label for="destinatarios">Clasificación de la compra</label>
                          </div>
                      </div> 
                     
                  </div>



                  <div class="form-group">
                    <div class="">
                      <div class="table-responsive">

                        <table class="table" width="100%" id="crud_table">
                         <thead>
                           <th width="12%" style="border:12px solid transparent" >Cantidad</th>
                           <th width="12%" style="border:12px solid transparent" >Distrubución de centro de costo</th>
                           <th width="12%" style="border:12px solid transparent" >Código Insumo</th>
                            <th width="12%" style="border:12px solid transparent" >Código Presentación</th>
                            <th width="12%" style="border:12px solid transparent" >Unidad de Medida</th>
                            <th width="10%" style="border:12px solid transparent" >Nombre</th>
                             <th width="20%" style="border:12px solid transparent" >Caracteristicas</th>
                             <th width="10%" style="border:12px solid transparent" >Renglon</th>
                           <th width="" style="border:1px solid transparent" class="text-center"></th>

                         </thead>
                         <tbody>
                           <tr>
                            <td  class="" style="border:1px solid transparent">


                                          
                                           <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                            <input  type='number' class='form-control item_cantidad' id='num1' required></input>
                                          </div>




                            </td>
                            <td class="" style="border:1px solid transparent">
                            
                                          
			                                   <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                 <select class='form-control item_destino' id='txtd1' required>
                                 <option value="" disabled selected hidden>Seleccionar</option>
                                <option value="A1"> A1</option>
                                <option value="A2"> A2</option>
                                <option value="A3"> A3</option>
                                <option value="A5"> A5</option>


                                            
                                            
                                          </div>


                                         


                            </td>
                            
                             <td class="" style="border:1px solid transparent">


                                          <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                            <input  type='text' class='form-control item_codigo_insumo' id='txtm1' required></input>
                                          </div>



                            </td>
                            
                             <td class="" style="border:1px solid transparent">


                                          <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                            <input  type='text' class='form-control item_codigo_presentacion' id='c2' required></input>
                                          </div>



                            </td>
                            
                            <td class="" style="border:1px solid transparent">


                                          <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                            <input  type='text' class='form-control item_medida' id='m1' required></input>
                                          </div>



                            </td>
                            
                             <td class="" style="border:1px solid transparent">


                                          <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                            <input  type='text' class='form-control item_nombre' id='n1' required></input>
                                          </div>



                            </td>
                            
                            
                             <td class="" style="border:1px solid transparent">


                                          <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                            <input  type='text' class='form-control item_caracteristica' id='c1' required></input>
                                          </div>



                            </td>
                            
                            
                             <td class="" style="border:1px solid transparent">


                                          <div class='input-group has-personalizado'>
                                            <span class='input-group-addon' ><span class='fa fa-edit'></span></span>
                                            <input  type='text' class='form-control item_renglon' id='r1' required></input>
                                          </div



                            </td>

                            <td><span style="margin-top:5px;" name="add" id="add" class="btn-add"></span></td>
                           </tr>
                         </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-12">

                          <div class="has-personalizado">
                            <label for="soli_desc">OBSERBACIONES (Campo obligatorio)</label>
                            <div class="input-group has-personalizado">
                              <span class="input-group-addon" ><span class="si si-pencil"></span></span>
                              <textarea class="form-control" id="soli_desc" name="soli_desc" rows="3" required></textarea>
                            </div>


                          </div>

                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <button id="boton_s_t" class="btn btn-sm btn-success btn-block" onclick="add_solicitud2(<?php echo $id ?>,<?php echo $persona->persona['dep_id']?>)" ><i id="loading1" class="fa fa-refresh fa-spin" style="display:none;"></i> Crear Solicitud</button>
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
