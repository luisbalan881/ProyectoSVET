<?php

require_once '../../inc/Database.php';

$status=0;
//$f="";
$id=$_POST['codigo'];


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql1 = "UPDATE da_solicitud_compra SET estado_solicitud=?
        WHERE id_solicitud_compra=?";  	
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status,$id));
Database::disconnect();

echo 'Updated successfully.';
 ?>

