<?php

require_once '../../inc/Database.php';

$dia1=1;
$status=0;// asignar formulario Anulado
$status0=0;// desabilitar periodo
$status_bloqueado=0; // status bloque de periodo

$id=$_POST['codigo'];
$inst_id=$_POST['inst'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




/*
$sql= "SELECT MAX(solicitud_id) as codigo from vp_solicitud_transporte WHERE solicitante_id=?";
$p = $pdo->prepare($sql);
$p->execute(array($id));
$solicitud = $p->fetch(PDO::FETCH_ASSOC);

$sql2= "SELECT MAX(contador)+1 AS con from vs_nombramiento where dep_f1=?";
$p2 = $pdo->prepare($sql2);
$p2->execute(array($persona['dep_id']));
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$con1 = $per_rol2['con']; //perosona autoriza



$codigo_soli = $solicitud['codigo'];

*/



/*$sql1 = "UPDATE vs_nombramiento SET status=?
        WHERE id_nombramiento=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status,$id));
*/
/*$sql2= "SELECT MAX(id_viatico)+1 AS con from vs_viaticos";
$p2 = $pdo->prepare($sql2);
$p2->execute();
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$con1 = $per_rol2['con']; //perosona autoriza*/




$sql2= "SELECT id_periodo_user, no_dias from `rrhh_detalle_solicitud` where id_solicitud=?";
$p2 = $pdo->prepare($sql2);
$p2->execute(array($id));
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$id_periodo = $per_rol2['id_periodo_user']; // periodo a actual
$dia_ingresados = $per_rol2['no_dias']; // No dias a actual


$sql3= "SELECT dias_consumidos from `rrhh_periodo_usuario` where id_periodo_user=?";
$p3 = $pdo->prepare($sql3);
$p3->execute(array($id_periodo));
$per_rol3 = $p3->fetch(PDO::FETCH_ASSOC);
$dias_consumidos = $per_rol3['dias_consumidos']; // dias_cunsumidos_actuales

$dias_a_actualizar = ($dias_consumidos+$dia_ingresados);

$sql1 = "UPDATE rrhh_periodo_usuario SET dias_consumidos=?
        WHERE id_periodo_user=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($dias_a_actualizar,$id_periodo));


/*
$sql4= "SELECT dias_consumidos from `rrhh_periodo_usuario` where id_periodo_user=?";
$p4 = $pdo->prepare($sql4);
$p4->execute(array($id_periodo));
$per_rol4 = $p4->fetch(PDO::FETCH_ASSOC);
$dias_a_verficar = $per_rol4['dias_consumidos']; // dias Actuales


if($dias_a_verficar == 20){
	$sql1 = "UPDATE rrhh_periodo_usuario SET status=?
        WHERE id_periodo_user=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($con3,$con1));
	
	
}   */


$sql4= "SELECT dias_consumidos from `rrhh_periodo_usuario` where id_periodo_user=?";
$p4 = $pdo->prepare($sql4);
$p4->execute(array($id_periodo));
$per_rol4 = $p4->fetch(PDO::FETCH_ASSOC);
$dias_a_verficar = $per_rol4['dias_consumidos']; // dias Actuales


if($dias_a_verficar == 20){
	$sql1 = "UPDATE rrhh_periodo_usuario SET status=?
        WHERE id_periodo_user=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status_bloqueado,$id_periodo));

} 

/*  
$id_periodo_siguiente=$id_periodo+1;
if($dias_a_verficar == 20){
	$sql1 = "UPDATE rrhh_periodo_usuario SET status=?
        WHERE id_periodo_user=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status_bloqueado,$id_periodo));

} 


*/


/*
$sql3 = "INSERT INTO vs_viaticos (id_viatico,id_nombramiento) VALUES (?,?)";
$q2 = $pdo->prepare($sql3);
$q2->execute(array($con1,$id));*/
Database::disconnect();

echo 'Solicitud Generada';
 ?>