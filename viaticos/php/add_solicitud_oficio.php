<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$objetivos=$_POST['objetivo1'];  /// Asunto
$lugar=$_POST['lugar']; //lugar destinos
$dep=$_POST['especificacion'];  // departamento o direccion
$year1=$_POST['year'];  // A;o del sistema


$id=$_POST['id'];   // persona peticion 
$persona = User::get_empleado_datos_id($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql1= "SELECT dep_encargado, dep from vp_deptos WHERE dep_id=?";
$p1 = $pdo->prepare($sql1);
$p1->execute(array($dep));
$per_rol = $p1->fetch(PDO::FETCH_ASSOC);
$enc = $per_rol['dep_encargado']; //perosona autoriza
$dep1 = $per_rol['dep'];



$sql2= "SELECT MAX(contador)+1 AS con from ds_oficios where id_dep=?";  //ds_oficios
$p2 = $pdo->prepare($sql2);
$p2->execute(array($dep));
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$con1 = $per_rol2['con']; //contador por departamento

$codigo="OFICIO-".$dep1.$con1."-".$year1;



$sql = "INSERT INTO ds_oficios (institucion_destino,asunto,contador,id_dep,id_user, estatus,no_ofi) VALUES (?,?,?,?,?,?,?)";

$q = $pdo->prepare($sql);
$q->execute(array($lugar,$objetivos,$con1,$dep,$id,1,$codigo));
$Id = $pdo->lastInsertId();
Database::disconnect();

echo $Id;
 ?>
