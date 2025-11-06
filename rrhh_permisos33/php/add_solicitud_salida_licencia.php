<?php
// add_solicitud_salida_licencia
require_once '../../inc/Database.php';

$dia1=1;
$id=$_POST['id'];
//$inst_id=$_POST['inst'];
$duracion1=$_POST['tiempo']; 
//$periodo=$_POST['inst'];
$status="1";
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




/*
$sql= "SELECT MAX(solicitud_id) as codigo from vp_solicitud_transporte WHERE solicitante_id=?";
$p = $pdo->prepare($sql);
$p->execute(array($id));
$solicitud = $p->fetch(PDO::FETCH_ASSOC);


$codigo_soli = $solicitud['codigo'];

*/

$sql1 = "INSERT INTO rrhh_solicitud_salida (status) VALUES (?)";
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status));
Database::disconnect();

echo 'Solicitud Generada';
 ?>

