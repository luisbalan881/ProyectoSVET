<?php

require_once '../../inc/Database.php';
require_once '../../inc/User.php';

$status=5;// Anulado por administrador
$id=$_POST['codigo'];
//$id_autoriza="20";
//$persona = User::get_empleado_datos_id($id);


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql2 = "UPDATE rrhh_solicitud SET status=?
        WHERE id_solicitud=?";  
$q1 = $pdo->prepare($sql2);
$q1->execute(array($status,$id));
Database::disconnect();

echo 'Updated successfully.';
 ?>

