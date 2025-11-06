<?php
include_once '../inc/functions.php';
include_once 'funciones_proyectos.php';
sec_session_start();
if (function_exists('login_check') && login_check()):
    if (usuarioPrivilegiado()->hasPrivilege('crearSolicitudTransporte')):
        $id = null;
        $consultaractividad  = array();
        if ( !empty($_GET['id'])) {
          $id = $_REQUEST['id'];
          $consultaractividad  = consultarActividad ($id);
        }

        if ( null==$id ) {
          header("Location: index.php?ref=_30");
        }

        if ( !empty($_POST)) {
          cambiarStadoEnFinalizado($id);
          header("Location: index.php?ref=_52");
        }
    ?>
        <!DOCTYPE html>
        <html>
        <head>
          <meta http-equiv="content-type" content="text/html; charset=UTF-8">
          <title>Modificar estado a finalizado</title>
        </head>
        <body>
          <div class="block block-themed block-transparent remove-margin-b">
            <div class="block-header bg-info">
                <ul class="block-options">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Modificar a finalizado</h3>
            </div>
            <div class="block-content">
                <form class="js-validation-documento form-horizontal push-10-t push-10" action="<?php echo htmlentities($_SERVER['REQUEST_URI']);?>" method="POST">
                    <input type="text"  id="tipo_id" name="tipo_id"  value="<?php echo $consultaractividad ['id_actividad']; ?>" hidden title="tipo_id">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control"  type="text"   readonly="readonly" id="tipo_nombre" name="tipo_nombre" value="<?php echo $consultaractividad ['nombre']; ?>" required>
                                <label for="tipo_nombre">Nombre*</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="css-input switch switch-success">
                            <h3 class="block-title">El estado actual de la actividad es: En proceso</h3>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-sm btn-info btn-block" type="submit"><i class=""></i>Cambiar a finalizado</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <!-- Page JS Code -->
          <script src="assets/js/pages/archivo_forms_validation.js"></script>
        </body>
        </html>
    <?php
    else :
        echo include(unauthorizedModal());
    endif;
else:
    header("Location: index.php");
endif;
?>
