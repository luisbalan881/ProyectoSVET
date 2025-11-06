<?php

require_once '../../inc/Database.php';



$id=$_POST['codigo'];
$inst_id2=$_POST['inst2'];
$duracion1=$_POST['duracion1']; 
$periodo=$_POST['periodo1'];
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

/*
$sql1 = "INSERT INTO rrhh_detalle_solicitud (id_periodo_user,  id_solicitud, no_dias ,status) VALUES (?,?,?,?)";
$q1 = $pdo->prepare($sql1);
$q1->execute(array($periodo,$id,$duracion1,$status));
Database::disconnect();

echo 'Solicitud Generada';*/


$sql12 = "INSERT INTO rrhh_detalle_solicitud (id_periodo_user,  id_solicitud, no_dias ,status) VALUES (?,?,?,?)";
$q12 = $pdo->prepare($sql12);
$q12->execute(array($periodo,$id,$duracion1,$status));
Database::disconnect();

echo 'Solicitud Generada2';
 ?>
