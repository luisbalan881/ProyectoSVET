<?php

require_once '../../inc/functions.php';
require_once '../../inc/User.php';

//fecha1
$fecha=$_POST['fecha'];
$date1 = date('Y-m-d', strtotime($fecha));
//fecha2
$fecha2=$_POST['fecha2'];
$date2 = date('Y-m-d', strtotime($fecha2));

$salida=$_POST['salida'];
$duracion=$_POST['duracion'];
$especificacion=$_POST['especificacion'];
$cantidad=$_POST['cantidad'];
$desc=$_POST['desc'];
$id1=$_POST['n'];
$id2=2;
$status=1;

$id=$_POST['id'];
$persona = User::get_empleado_datos_id($id);
//$dep=$_POST['dep'];


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*

$sql1= "SELECT dep_encargado from vp_deptos WHERE dep_id=?";
$p1 = $pdo->prepare($sql1);
$p1->execute(array($persona['dep_id']));
$per_rol = $p1->fetch(PDO::FETCH_ASSOC);


$enc = $per_rol['dep_encargado'];*/


//UPDATE `da_fechas` SET `fecha` = '2023-03-30' WHERE `da_fechas`.`id_fecha` = 1


$sql = "UPDATE da_fechas SET fecha=?, status=? WHERE id_fecha=?";
$q = $pdo->prepare($sql);
$q->execute(array($date1,$status, $id1));


/*
$sq2 = "UPDATE da_fechas SET fecha=?, status=? WHERE id_fecha=?";
$q2 = $pdo->prepare($sq2);
$q2->execute(array($date2,$status, $id2));*/

//$Id = $pdo->lastInsertId();
Database::disconnect();

/*

$sql1 = "UPDATE vs_nombramiento SET  lugar =?, objetivo=?,  fecha_inicio=?, fecha_fin=? WHERE id_nombramiento=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($lugares,$objetivos,$date1,$date2,$id));
Database::disconnect();*/





echo $Id;
 ?>
