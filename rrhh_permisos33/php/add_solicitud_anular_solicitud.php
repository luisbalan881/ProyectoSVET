<?php

require_once '../../inc/Database.php';

$dia1=1;
$status=2;// asignar formulario
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



$sql1 = "UPDATE rrhh_solicitud SET status=?
        WHERE id_solicitud=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status0,$id));


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
$q1->execute(array($status_bloqueado,$id_periodo));

} */

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