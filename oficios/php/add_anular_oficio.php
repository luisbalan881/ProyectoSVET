<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$id=$_POST['id2'];   //id  ,
$status=0;


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql1 = "UPDATE  ds_oficios SET  estatus=? WHERE id_oficio=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($status,$id));
Database::disconnect();


 ?>
