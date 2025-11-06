<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$fecha=$_POST['fecha'];// esta atrapando fecha sin formato soli_fecha
$date1 = date('Y-m-d', strtotime($fecha));   // fecha inicio
$fecha2=$_POST['fecha2'];// esta atrapando fecha sin formato soli_fecha
$date2 = date('Y-m-d', strtotime($fecha2));   // fecha fin
$fecha3=$_POST['fecha3'];// esta atrapando fecha sin formato soli_fecha
$date3 = date('Y-m-d', strtotime($fecha3));   // fecha fin

$duracion1=$_POST['duracion1'];  //   dias_consumidos_user
$justifiacion=$_POST['justifiacion'];  // lugares
$dias_consumidos_user=$_POST['dias_consumidos_user'];  //pendientes
$pendientes=$_POST['pendientes'];  //
$periodo=$_POST['periodo'];  //periodo  
$id_periodo=$_POST['id_periodo'];  // A;o del sistema
$status="4";  // estatus para solicitar retorno de dias
$tipo="2";  // establecer tipo de solicitud para retornar dias


$periodoAdd=$periodo+1;  // para validar el proximo año y pornero en estatus 1

$id=$_POST['id'];   // persona peticion 
$persona = User::get_empleado_datos_id($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO rrhh_solicitud (id_tipo,justificacion,fecha_inicio,fecha_final,fecha_retorno,dias_solicitado,status,dias_consumidos_user,pendientes,periodo,id_periodo, id_user_solicita) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$q = $pdo->prepare($sql);
$q->execute(array($tipo,$justifiacion,$date1,$date2,$date3,$duracion1,$status,$dias_consumidos_user,$pendientes,$periodo,$id_periodo, $id));
$Id = $pdo->lastInsertId();
Database::disconnect();

echo $Id;
 ?>
