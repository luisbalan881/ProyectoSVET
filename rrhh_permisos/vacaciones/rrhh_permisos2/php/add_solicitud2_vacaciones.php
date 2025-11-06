<?php

require_once '../../inc/Database.php';

$dia1=1;
$status=2;// asignar formulario
$status_bloqueado=0; // status bloque de periodo
$status_auto=1; // status bloque de periodo

$id=$_POST['c'];  // id_solicitud
$id_user_solicita=$_POST['id_user'];  // id_user
$dias_solicita=$_POST['dias_soli'];  // id_solicitud  
$dias_consumidos=$_POST['dias_consumidos']; //dias consumidos 
$id_periodo=$_POST['id_periodo']; //id periodo solicitado

$inst_id=$_POST['inst'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
$sql2= "SELECT id_periodo_user, no_dias from `rrhh_detalle_solicitud` where id_solicitud=?"; // inicio 
$p2 = $pdo->prepare($sql2);
$p2->execute(array($id));
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$id_periodo = $per_rol2['id_periodo_user']; // periodo a actual */
//$dia_ingresados = $per_rol2['no_dias']; // No dias a actual ojo 

$dias_a_actualizar = ($dias_consumidos+$dias_solicita); //dias a actualizar

$sql1 = "UPDATE rrhh_periodo_usuario SET dias_consumidos=? WHERE id_periodo_user=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($dias_a_actualizar,$id_periodo));   

/////////////////////////////////

$sql4= "SELECT dias_consumidos from `rrhh_periodo_usuario` where id_periodo_user=?";
$p4 = $pdo->prepare($sql4);
$p4->execute(array($id_periodo));
$per_rol4 = $p4->fetch(PDO::FETCH_ASSOC);
$dias_a_verficar = $per_rol4['dias_consumidos']; // dias Actuales


// query consulta de periodo posterior al actual
$sql5= "SELECT id_periodo_user , status, dias_autorizados FROM rrhh_periodo_usuario WHERE id_periodo_user > ? AND id_usuario=? ORDER BY id_periodo_user ASC LIMIT 1";
$p5 = $pdo->prepare($sql5);
$p5->execute(array($id_periodo, $id_user_solicita));
$per_rol45= $p5->fetch(PDO::FETCH_ASSOC);
$id_periodo_actualizar = $per_rol45['id_periodo_user']; // dias Actuales
$dias_a_verificar20 = $per_rol45['dias_autorizados']; // dias autorizados desde BD agreagar a validar if of 20


if($dias_a_verficar == 20){
	$sql1 = "UPDATE rrhh_periodo_usuario SET status=?
        WHERE id_periodo_user=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status_bloqueado,$id_periodo));


$sql11 = "UPDATE rrhh_periodo_usuario SET status=?
        WHERE id_periodo_user=?";  
$q11 = $pdo->prepare($sql11);
$q11->execute(array($status_auto,$id_periodo_actualizar));  
						} 
Database::disconnect();

echo 'Solicitud Generada';
 ?>