<?php

require_once '../../inc/Database.php';

$status=3;// Anulado por administrador
$id=$_POST['codigo'];
$razon_anulacion=$_POST['razon'];//agreado 


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql2 = "UPDATE rrhh_solicitud SET status=?, razon_anulacion=? 
        WHERE id_solicitud=?";  
$q1 = $pdo->prepare($sql2);
$q1->execute(array($status,$razon_anulacion,$id));
Database::disconnect();

echo 'Updated successfully.';
 ?>

