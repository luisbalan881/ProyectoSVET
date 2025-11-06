<?php

require_once '../../inc/Database.php';

$dia1=1;
$dep=$_POST['dep'];
$fechainicio=$_POST['fechainicio'];
$fechafin=$_POST['fechafin'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
//$inst_id=$_POST['inst'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*
$sql2= "SELECT MAX(id_viatico)+1 AS con from vs_viaticos";
$p2 = $pdo->prepare($sql2);
$p2->execute();
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$con1 = $per_rol2['con']; //perosona autoriza

*/ 


$sql3 = "INSERT INTO tb_proyecto (id_proyecto,nombre,descripcion,fecha_inicio,fecha_fin,status,dep_id) VALUES (?,?,?,?,?,?,?,?)";
$q2 = $pdo->prepare($sql3);
$q2->execute(array($dep,$fechainicio,$fechafin,$nombre,$descripcion));
Database::disconnect();

echo 'Solicitud Generada';
 ?>