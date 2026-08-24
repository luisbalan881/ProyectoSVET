<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php
include_once 'inc/functions.php';
sec_session_start();

if (function_exists('login_check') && login_check()) {
    header("Location: inicio.php");
    exit();
} else {
    if (!empty($_GET['error'])) {
        $id = $_REQUEST['error'];
        $message = NULL;
        switch ($id) {
            case 1:
                $message = "Usuario o contraseña ingresados no son correctos.";
                break;
            default:
                $message = NULL;
                break;
        }
    }
?>

<style>
    body {
        background: linear-gradient(135deg, #003876 0%, #0056b3 45%, #eef5fb 45%, #ffffff 100%) !important;
        min-height: 100vh;
        font-family: "Segoe UI", Arial, sans-serif;
    }

    .login-svet-wrapper {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 35px 15px;
    }

    .login-svet-card {
        width: 100%;
        max-width: 430px;
        background: #ffffff;
        border-radius: 22px;
        box-shadow: 0 18px 45px rgba(0, 56, 118, 0.28);
        overflow: hidden;
        border: 1px solid rgba(0, 56, 118, 0.10);
        animation: fadeInUp .6s ease;
    }

    .login-svet-header {
        background: linear-gradient(135deg, #003876, #0056b3);
        padding: 30px 25px 25px;
        text-align: center;
        color: #ffffff;
        position: relative;
    }

    .login-svet-header::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: -1px;
        height: 22px;
        background: #ffffff;
        border-radius: 50% 50% 0 0 / 100% 100% 0 0;
    }

    .login-logo-box {
        width: 110px;
        height: 110px;
        margin: 0 auto 15px;
        background: #ffffff;
        border-radius: 24px;
        padding: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 22px rgba(0,0,0,.18);
    }

    .login-logo-box img {
        max-height: 85px;
        max-width: 100%;
    }

    .login-svet-header h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
        letter-spacing: .3px;
    }

    .login-svet-header p {
        margin: 8px 0 0;
        font-size: 12px;
        opacity: .95;
        line-height: 1.3;
    }

    .login-svet-body {
        padding: 35px 32px 30px;
    }

    .login-intro {
        text-align: center;
        margin-bottom: 25px;
    }

    .login-intro h3 {
        color: #003876;
        font-size: 19px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .login-intro p {
        color: #6b7280;
        font-size: 13px;
        margin: 0;
    }

    .btn-login-svet {
        background: linear-gradient(135deg, #003876, #0056b3);
        border: none;
        border-radius: 12px;
        color: #ffffff;
        font-weight: 700;
        padding: 12px 18px;
        transition: all .25s ease;
        box-shadow: 0 8px 18px rgba(0, 86, 179, .28);
    }

    .btn-login-svet:hover {
        background: linear-gradient(135deg, #002b5c, #004a99);
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 10px 22px rgba(0, 86, 179, .35);
    }

    .sistemas-extra {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e5edf5;
    }

    .sistemas-extra-title {
        text-align: center;
        font-size: 12px;
        color: #64748b;
        margin-bottom: 15px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .sistema-btn {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        padding: 12px 14px;
        border-radius: 14px;
        text-decoration: none;
        margin-bottom: 10px;
        transition: all .25s ease;
        border: 1px solid #dbe7f3;
        background: #f8fbff;
    }

    .sistema-btn:hover {
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0, 56, 118, .14);
        background: #ffffff;
    }

    .sistema-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 18px;
        flex-shrink: 0;
    }

    .icon-documentos { background: linear-gradient(135deg, #003876, #0056b3); }
    .icon-reservas { background: linear-gradient(135deg, #ff9800, #f57c00); }
    .icon-viaticos { background: linear-gradient(135deg, #00a887, #007a6c); }

    .sistema-text strong {
        display: block;
        color: #003876;
        font-size: 14px;
        font-weight: 800;
    }

    .sistema-text span {
        display: block;
        color: #64748b;
        font-size: 11px;
    }

    .footer-svet-login {
        color: #ffffff;
        text-align: center;
        padding: 15px 0;
    }
</style>

<div class="login-svet-wrapper">
    <div class="login-svet-card">

        <div class="login-svet-header">
            <div class="login-logo-box">
                <img src="assets/img/escudo_logo.png" alt="SVET" />
            </div>
            <h2>Control Administrativo</h2>
            <p>Secretaría contra la Violencia Sexual, <br> Explotación y Trata de Personas</p>
        </div>

        <div class="login-svet-body">
            <div class="login-intro">
                <h3>Bienvenido</h3>
                <p>Ingrese sus credenciales para acceder</p>
            </div>

            <?php if(isset($message)): ?>
                <div class="alert alert-danger alert-dismissable animated shake">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p style="margin:0; font-size: 13px;"><i class="fa fa-warning push-5-r"></i> <?php echo $message; ?></p>
                </div>
            <?php endif; ?>

            <form class="js-validation-login form-horizontal" action="process_login.php" method="post" name="login_form">
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material input-group floating">
                            <input class="form-control" type="text" id="email" name="email" autofocus>
                            <label for="email">Usuario</label>
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material input-group floating">
                            <input class="form-control" type="password" id="password" name="password">
                            <label for="password">Contraseña</label>
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group push-20-t">
                    <div class="col-xs-12">
                        <button class="btn btn-block btn-login-svet" type="submit" onclick="formhash(this.form, this.form.password);">
                            <i class="fa fa-sign-in push-5-r"></i> Ingresar al Sistema
                        </button>
                    </div>
                </div>

                <div class="sistemas-extra">
                    <div class="sistemas-extra-title">Gestión Institucional</div>

                    <a href="http://192.168.4.92:8080/gestor-expedientes/login" class="sistema-btn" target="_blank">
                        <div class="sistema-icon icon-documentos">
                            <i class="fa fa-folder-open"></i>
                        </div>
                        <div class="sistema-text">
                            <strong>Gestor de Documentos</strong>
                            <span>Gestión y seguimiento de expedientes</span>
                        </div>
                    </a>

                    <a href="http://192.168.4.92:8080/roomctrl/index.php" class="sistema-btn" target="_blank">
                        <div class="sistema-icon icon-reservas">
                            <i class="fa fa-calendar-check-o"></i>
                        </div>
                        <div class="sistema-text">
                            <strong>Reservar y Solicitudes</strong>
                            <span>Control de salas y recursos</span>
                        </div>
                    </a>

                    <a href="http://192.168.4.92:8080/inventario/usuarios/login.php" class="sistema-btn" target="_blank">
                        <div class="sistema-icon icon-viaticos">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="sistema-text">
                            <strong>Registro de Viáticos</strong>
                            <span>Sistema de viáticos institucional</span>
                        </div>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="footer-svet-login animated fadeInUp">
    <small><script>document.write(new Date().getFullYear())</script> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
</div>

<?php require 'inc/views/template_footer_start.php'; ?>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_forms.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_sha512.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_login.js"></script>
<?php require 'inc/views/template_footer_end.php'; ?>

<?php } ?>