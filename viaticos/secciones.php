<?php
if (isset($u) && $u->hasPrivilege('viaticos')):
  switch($page)
  {
    case '_77':
      include('viaticos/ViaticosAdmin2.php');
    break;
    case '_41':
      include('administrador/permisos_por_permiso.php');
    break;
    case '_46':
      include('combustible/control_de_combustible.php');
    break;

  }
endif;
