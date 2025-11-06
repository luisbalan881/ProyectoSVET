<?php

require_once '../../inc/Database.php';

$status=2;// asignar formulario
$id=$_POST['codigo'];


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql2 = "UPDATE rrhh_solicitud SET status=?
        WHERE id_solicitud=?";  
$q1 = $pdo->prepare($sql2);
$q1->execute(array($status,$id));
Database::disconnect();

echo 'Updated successfully.';
 ?>

