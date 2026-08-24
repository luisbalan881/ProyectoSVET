<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    include_once 'inc/functions.php';
    sec_session_start();
    if (login_check() == true) :
        require 'inc/config.php';
        require 'inc/views/template_head_start.php';
        require 'inc/views/template_head_end.php';
        require 'inc/views/base_head.php';
        $u = usuarioPrivilegiado();
          //page content
          if (! isset($_GET['ref']))
          {
            echo <<<'HTML'
<style>
/* =====================================================
   Vista institucional moderna - SVET
   Solo cambia presentación visual del menú principal.
   Conserva enlaces, modales y funcionamiento original.
   ===================================================== */
:root{
  --svet-blue:#003876;
  --svet-blue-2:#0056b3;
  --svet-blue-3:#0b74d1;
  --svet-green:#00a887;
  --svet-bg:#f4f8fc;
  --svet-card:#ffffff;
  --svet-text:#172033;
  --svet-muted:#667085;
  --svet-border:#dbe7f3;
  --svet-shadow:0 18px 45px rgba(16,24,40,.10);
}

body{
  background:
    radial-gradient(circle at 8% 12%, rgba(0,168,135,.12), transparent 28%),
    radial-gradient(circle at 92% 8%, rgba(0,86,179,.16), transparent 30%),
    linear-gradient(180deg,#eef7fb 0%,#f8fbff 42%,#ffffff 100%) !important;
}

.svet-dashboard{
  max-width:1180px;
  margin:0 auto 45px;
  padding:24px 16px 38px;
  font-family:'Segoe UI', Arial, sans-serif;
  color:var(--svet-text);
}

.svet-hero{
  position:relative;
  overflow:hidden;
  border-radius:30px;
  background:linear-gradient(135deg,var(--svet-blue) 0%,var(--svet-blue-2) 58%,var(--svet-green) 125%);
  box-shadow:0 24px 58px rgba(0,56,118,.22);
  margin-bottom:22px;
}
.svet-hero:before{
  content:"";
  position:absolute;
  width:260px;
  height:260px;
  right:-85px;
  top:-100px;
  border-radius:50%;
  background:rgba(255,255,255,.14);
}
.svet-hero:after{
  content:"";
  position:absolute;
  width:190px;
  height:190px;
  right:110px;
  bottom:-115px;
  border-radius:50%;
  background:rgba(0,168,135,.25);
}
.svet-hero-inner{
  position:relative;
  z-index:1;
  display:grid;
  grid-template-columns:1fr 310px;
  gap:24px;
  align-items:center;
  padding:30px;
}
.svet-hero h1{
  margin:14px 0 8px;
  color:#fff;
  font-size:33px;
  line-height:1.12;
  font-weight:850;
}
.svet-hero p{
  margin:0;
  max-width:660px;
  color:rgba(255,255,255,.86);
  font-size:15px;
  line-height:1.55;
}
.svet-kicker{
  display:inline-flex;
  align-items:center;
  gap:8px;
  color:#fff;
  background:rgba(255,255,255,.15);
  border:1px solid rgba(255,255,255,.25);
  padding:8px 13px;
  border-radius:999px;
  font-size:12px;
  letter-spacing:.08em;
  text-transform:uppercase;
  font-weight:800;
}
.svet-logo-box{
  justify-self:end;
  min-height:126px;
  width:100%;
  border-radius:25px;
  background:rgba(255,255,255,.96);
  display:flex;
  align-items:center;
  justify-content:center;
  padding:18px;
  box-shadow:0 18px 38px rgba(0,0,0,.14);
}
.svet-logo-box img{
  max-width:100%;
  max-height:95px;
  object-fit:contain;
}

.svet-summary{
  display:grid;
  grid-template-columns:repeat(3,minmax(0,1fr));
  gap:14px;
  margin-bottom:23px;
}
.svet-summary-card{
  background:rgba(255,255,255,.92);
  border:1px solid var(--svet-border);
  border-radius:22px;
  padding:15px 16px;
  box-shadow:0 10px 28px rgba(16,24,40,.055);
  display:flex;
  align-items:center;
  gap:13px;
}
.svet-summary-icon{
  width:44px;
  height:44px;
  min-width:44px;
  border-radius:16px;
  color:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  background:linear-gradient(135deg,var(--svet-blue),var(--svet-blue-2));
}
.svet-summary-card:nth-child(2) .svet-summary-icon{background:linear-gradient(135deg,#008a75,#00a887);}
.svet-summary-card:nth-child(3) .svet-summary-icon{background:linear-gradient(135deg,#0a58ca,#2ca9ff);}
.svet-summary-icon svg,
.svet-icon svg{
  width:25px;
  height:25px;
  stroke:currentColor;
  fill:none;
  stroke-width:2.25;
  stroke-linecap:round;
  stroke-linejoin:round;
}
.svet-summary-card strong{
  display:block;
  color:var(--svet-blue);
  font-size:13px;
  margin-bottom:3px;
}
.svet-summary-card span{
  display:block;
  color:var(--svet-muted);
  font-size:12px;
}

.svet-title-row{
  display:flex;
  align-items:flex-end;
  justify-content:space-between;
  gap:14px;
  margin:4px 2px 16px;
}
.svet-title-row h2{
  margin:0;
  color:var(--svet-blue);
  font-size:23px;
  font-weight:850;
}
.svet-title-row p{
  margin:4px 0 0;
  color:var(--svet-muted);
  font-size:13px;
}
.svet-pill{
  display:inline-flex;
  align-items:center;
  white-space:nowrap;
  padding:8px 13px;
  border-radius:999px;
  background:#eef7ff;
  color:var(--svet-blue-2);
  border:1px solid #d5eaff;
  font-size:12px;
  font-weight:800;
}

.svet-menu-grid{
  display:grid;
  grid-template-columns:repeat(3,minmax(0,1fr));
  gap:17px;
}
.svet-card{
  position:relative;
  min-height:132px;
  display:flex;
  align-items:center;
  gap:16px;
  padding:20px;
  border-radius:25px;
  background:rgba(255,255,255,.95);
  border:1px solid rgba(219,231,243,.96);
  color:var(--svet-text)!important;
  text-decoration:none!important;
  box-shadow:0 12px 32px rgba(16,24,40,.07);
  overflow:hidden;
  transition:transform .23s ease, box-shadow .23s ease, border-color .23s ease, background .23s ease;
}
.svet-card:before{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(135deg,rgba(0,86,179,.08),rgba(0,168,135,.06));
  opacity:0;
  transition:opacity .23s ease;
}
.svet-card:after{
  content:"";
  position:absolute;
  right:-48px;
  bottom:-48px;
  width:118px;
  height:118px;
  border-radius:50%;
  background:rgba(0,86,179,.07);
  transition:transform .23s ease, background .23s ease;
}
.svet-card:hover,
.svet-card:focus{
  transform:translateY(-7px);
  box-shadow:0 24px 48px rgba(0,56,118,.16);
  border-color:rgba(0,86,179,.30);
  background:#fff;
}
.svet-card:hover:before{opacity:1;}
.svet-card:hover:after{transform:scale(1.22);background:rgba(0,168,135,.12);}
.svet-card:hover .svet-icon{transform:scale(1.06) rotate(-2deg);}
.svet-card:hover .svet-arrow{background:var(--svet-green);color:#fff;transform:translateX(4px);}

.svet-icon{
  position:relative;
  z-index:1;
  width:60px;
  height:60px;
  min-width:60px;
  border-radius:20px;
  display:flex;
  align-items:center;
  justify-content:center;
  color:#fff;
  background:linear-gradient(135deg,var(--svet-blue),var(--svet-blue-2));
  box-shadow:0 16px 28px rgba(0,86,179,.24);
  transition:transform .23s ease;
}
.svet-card:nth-child(3n+2) .svet-icon{background:linear-gradient(135deg,#006f75,#00a887);}
.svet-card:nth-child(3n+3) .svet-icon{background:linear-gradient(135deg,#0a58ca,#2ca9ff);}
.svet-card-body{
  position:relative;
  z-index:1;
  flex:1;
  min-width:0;
}
.svet-card-body strong{
  display:block;
  color:var(--svet-blue);
  font-size:16px;
  font-weight:850;
  line-height:1.2;
  margin-bottom:7px;
}
.svet-card-body span{
  display:block;
  color:var(--svet-muted);
  font-size:12.5px;
  line-height:1.35;
}
.svet-arrow{
  position:relative;
  z-index:1;
  width:33px;
  height:33px;
  min-width:33px;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  background:#f0f7ff;
  color:var(--svet-blue-2);
  font-weight:900;
  font-size:22px;
  transition:all .23s ease;
}

@media(max-width:1100px){
  .svet-menu-grid{grid-template-columns:repeat(2,minmax(0,1fr));}
}
@media(max-width:900px){
  .svet-hero-inner{grid-template-columns:1fr;}
  .svet-logo-box{justify-self:start;max-width:420px;}
  .svet-summary{grid-template-columns:1fr;}
}
@media(max-width:640px){
  .svet-dashboard{padding:14px 9px 28px;}
  .svet-hero{border-radius:23px;}
  .svet-hero-inner{padding:22px 18px;}
  .svet-hero h1{font-size:26px;}
  .svet-title-row{flex-direction:column;align-items:flex-start;}
  .svet-menu-grid{grid-template-columns:1fr;gap:13px;}
  .svet-card{min-height:112px;padding:16px;border-radius:21px;}
  .svet-icon{width:54px;height:54px;min-width:54px;border-radius:17px;}
}
</style>

<div class="svet-dashboard">
  <section class="svet-hero">
    <div class="svet-hero-inner">
      <div>
        <span class="svet-kicker">Panel institucional</span>
        <h1>Menú principal de gestiones</h1>
        <p>Accesos rápidos para solicitudes, controles internos y registros administrativos de forma ordenada, moderna y fácil de utilizar.</p>
      </div>
      <div class="svet-logo-box">
        <img src="assets/img/_vice_logo_bw.png" alt="SVET">
      </div>
    </div>
  </section>

 

  <div class="svet-title-row">
    <div>
      <h2>Módulos disponibles</h2>
      <p>Haga clic en una tarjeta para abrir el formulario correspondiente.</p>
    </div>
    <span class="svet-pill">Menú de solicitudes</span>
  </div>

  <section class="svet-menu-grid">
    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="transporte/solicitar_transporte.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M5 17h14l-1.5-7.5A3 3 0 0 0 14.6 7H9.4a3 3 0 0 0-2.9 2.5L5 17Z"/><path d="M7 17v2"/><path d="M17 17v2"/><path d="M8 13h8"/></svg></span>
      <span class="svet-card-body"><strong>Solicitar Transporte</strong><span>Movilización institucional y comisiones.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="viaticos/solicitar_viaticos.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 6.5C15.8 5.6 14.1 5 12.4 5 9.6 5 8 6.3 8 8.2c0 4 9 2.1 9 7 0 2-1.9 3.8-5.1 3.8-2 0-3.8-.7-5-1.7"/></svg></span>
      <span class="svet-card-body"><strong>Solicitar Viáticos 011</strong><span>Gestión de viáticos para personal.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_permiso.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><rect x="4" y="5" width="16" height="15" rx="2"/><path d="M8 3v4"/><path d="M16 3v4"/><path d="M4 10h16"/><path d="M8 14h3"/><path d="M13 14h3"/><path d="M8 17h3"/></svg></span>
      <span class="svet-card-body"><strong>Solicitar Vacaciones</strong><span>Permisos y vacaciones del personal.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <!-- <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="proyectos/crear_proyecto.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M3 7h7l2 3h9v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/><path d="M3 7V5a2 2 0 0 1 2-2h4l2 2h4"/></svg></span>
      <span class="svet-card-body"><strong>Iniciar nuevo Proyecto</strong><span>Registro y apertura de proyecto.</span></span>
      <span class="svet-arrow">›</span>
    </a>-->

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_permiso2.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg></span>
      <span class="svet-card-body"><strong>Generar Pase de Salida</strong><span>Control de salidas autorizadas.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="combustible/reg_km_ini_user.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M6 19a8 8 0 1 1 12 0"/><path d="M12 13l4-4"/><path d="M8 19h8"/><path d="M12 5v2"/><path d="M5 12h2"/><path d="M17 12h2"/></svg></span>
      <span class="svet-card-body"><strong>Registra Kilometraje</strong><span>Control de kilometraje vehicular.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="denuncias/crear_denuncia_anonima.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M12 3 4 7v5c0 5 3.4 8.7 8 9 4.6-.3 8-4 8-9V7Z"/><path d="M9.5 12.5a3 3 0 0 0 5 0"/><path d="M9 10h.01"/><path d="M15 10h.01"/></svg></span>
      <span class="svet-card-body"><strong>Denuncia Anónima</strong><span>Registro confidencial de denuncia.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <!--<a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="control_oficios/crear_ingreso.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6Z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h6"/></svg></span>
      <span class="svet-card-body"><strong>Test</strong><span>Ingreso y control documental.</span></span>
      <span class="svet-arrow">›</span>
    </a>-->

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="compras/solicitar_compra.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M6 6h15l-2 8H8Z"/><path d="M6 6 5 3H2"/><circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/></svg></span>
      <span class="svet-card-body"><strong>Solicitar Compra</strong><span>Solicitud de adquisición o compra.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="rrhh_permisos/solicitar_nombramiento.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 8h8"/><path d="M8 12h8"/><path d="M8 16h5"/></svg></span>
      <span class="svet-card-body"><strong>Crear asignación de Actividades</strong><span>Asignaciones, actividades y nombramientos.</span></span>
      <span class="svet-arrow">›</span>
    </a>

    <a class="svet-card" tabindex="-1" data-toggle="modal" data-target="#modal-remoto-lgg" href="oficios/solicitar_oficio.php">
      <span class="svet-icon"><svg viewBox="0 0 24 24"><path d="M7 3h7l5 5v13H7Z"/><path d="M14 3v6h5"/><path d="M10 14h6"/><path d="M10 17h4"/></svg></span>
      <span class="svet-card-body"><strong>Crear No. Oficio</strong><span>Generación de correlativo oficial.</span></span>
      <span class="svet-arrow">›</span>
    </a>
  </section>
</div>
HTML;

          } else {
            $page = $_GET['ref'];
            include('almacen/secciones.php');
            include('archivo/secciones.php');
            include('usuarios/secciones.php');
            include('cheques/secciones.php');
            include('combustible/secciones.php');
            include('proveedores/secciones.php');
            include('transporte/secciones.php');
            include('compras/secciones.php');

            switch($page)
            {
                case '_0':
                    include('perfil.php');
                break;
                case '_200':
                    include('herramientas/traslado_bienes.php');
                break;
                case '_201':
                    include('herramientas/traslado_bienes.php');
                break;
                case '_37':
                    include('directorio/directorio.php');
                break;
                case '_89':
                    include('viaticos/MisViaticos.php');
                break;
                case '_90':
                    include('viaticos/ViaticosAdmin.php');
                break;
                case '_91':
                    include('viaticos/ReporteViaticos.php');
                break;
                case '_92':
                    include('rrhh_permisos/MisVacaciones.php');
                break;
                case '_93':
                    include('rrhh_permisos/VacacionesAdmin.php');
                break;
                case '_95':
                    include('rrhh_permisos/MisSolicitudes.php');
                break;
                case '_951':
                    include('rrhh_permisos/Solicitudes_list.php');
                break;
                case '_96':
                    include('rrhh_permisos/VacacionesAdmin2.php');
                break;
                case '_97':
                    include('rrhh_permisos/solicitar_retornar_dias_vacaciones.php');
                break;
                case '_99':
                    include('administrador/control_dias_usuario.php');
                break;
                case '_100':
                    include('administrador/settings.php');
                break;
                case '_101':
                    include('administrador/documentos.php');
                break;
            }
          }
          //END page content
    require 'inc/views/base_footer.php';
    require 'inc/views/template_footer_start.php';
    require 'inc/views/template_footer_end.php';
    else:
        header("Location: index.php");
    endif;
