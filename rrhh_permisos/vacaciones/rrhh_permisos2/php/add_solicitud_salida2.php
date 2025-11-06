<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$fecha=$_POST['fecha'];// esta atrapando fecha sin formato soli_fecha
$date1 = date('Y-m-d', strtotime($fecha));   
$duracion1=$_POST['duracion1'];  //   dias_consumidos_user
$hora1=$_POST['hora1'];//hora1
$hora2=$_POST['hora2'];//hora2 tiempo
$justifiacion=$_POST['justifiacion'];  
$obs=$_POST['obs'];

$tcompleto=$_POST['tcompleto'];
$tiempo=$_POST['tiempo'];

$status="1";
$tipo_solicitud="2";   // tipo permiso vale de salida

$id=$_POST['id'];   // persona peticion 
$persona = User::get_empleado_datos_id($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO rrhh_solicitud_salida (justificacion,fecha,duracion,hora_inicio, hora_fin,status,obs,id_usuario,tipo_tiempo,tiempo_completo) VALUES (?,?,?,?,?,?,?,?,?,?)";
$q = $pdo->prepare($sql);
$q->execute(array($justifiacion,$date1,$duracion1,$hora1,$hora2,$status,$obs,$id,$tiempo,$tcompleto));
$Id = $pdo->lastInsertId();
Database::disconnect();

echo $Id;
 ?>
