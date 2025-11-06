<?php

require_once '../../inc/Database.php';

$dia1=1;
$id=$_POST['codigo'];
$dia_com=$_POST['inst'];
$duracion1=$_POST['duracion1']; 
//$periodo=$_POST['inst'];//hora1
$hora1=$_POST['hora1'];//hora1
$hora2=$_POST['hora2'];//hora2 tiempo
$obs=$_POST['obs'];
$tiempo=$_POST['tiempo'];
$status="5";
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




/*
$sql= "SELECT MAX(solicitud_id) as codigo from vp_solicitud_transporte WHERE solicitante_id=?";
$p = $pdo->prepare($sql);
$p->execute(array($id));
$solicitud = $p->fetch(PDO::FETCH_ASSOC);


$codigo_soli = $solicitud['codigo'];

*/

$sql1 = "INSERT INTO rrhh_detalle_solicitud ( id_solicitud, no_dias ,status,hora_inicio,hora_fin,obs,dia_completo, tipo_tiempo) VALUES (?,?,?,?,?,?,?,?)";
$q1 = $pdo->prepare($sql1);
$q1->execute(array($id,$duracion1,$status,$hora1,$hora2,$obs,$dia_com,$tiempo));
Database::disconnect();

echo 'Solicitud Generada';
 ?>
