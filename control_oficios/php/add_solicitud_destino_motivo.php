<?php

require_once '../../inc/Database.php';


$id=$_POST['codigo'];
$c=$_POST['correlativo'];
$destino=$_POST['destino'];
$motivo=$_POST['motivo'];


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql1 = "INSERT INTO vp_solicitud_transporte_destino_motivo (solicitud_id, correlativo,destino,motivo,status) VALUES (?,?,?,?,?)";
$q1 = $pdo->prepare($sql1);
$q1->execute(array($id,$c,$destino,$motivo,1));
Database::disconnect();

echo 'Solicitud Generada';
 ?>
