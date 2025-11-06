<?php

require_once '../../inc/functions.php';
require_once '../../inc/User.php';


//$fecha=$_POST['fecha'];
//$date1 = date('Y-m-d', strtotime($fecha));
//$salida=$_POST['salida'];
//$duracion=$_POST['duracion'];
//$especificacion=$_POST['especificacion'];
//$cantidad=$_POST['cantidad'];//
$clasificacion=$_POST['clasificacion'];
$desc=$_POST['desc'];
$dep=$_POST['dep1'];

$id=$_POST['id'];
$estatus=1;   // enviado
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




$sql = "INSERT INTO da_solicitud_compra (id_solicitante, observaciones,clasificacion,estado_solicitud,id_dep) VALUES (?,?,?,?,?)";
$q = $pdo->prepare($sql);		
$q->execute(array($id,$desc,$clasificacion,$estatus,$dep));	
$Id = $pdo->lastInsertId();
Database::disconnect();

echo $Id;
 ?>
