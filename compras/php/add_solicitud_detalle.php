

<?php

require_once '../../inc/Database.php';


$id=$_POST['codigo'];
$c=$_POST['correlativo'];
$destino=$_POST['destino'];
$cantidad=$_POST['medida'];
$motivo2=$_POST['motivo2'];
$presentacion=$_POST['presentacion'];
$cantidad1=$_POST['cantidad'];
$nombre=$_POST['nombre'];
$caracteristica=$_POST['caracteristica'];
$renglon=$_POST['renglon'];


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql1 = "INSERT INTO da_detalle_solicitud_compra (id_solicitud, clasificacion_compra,cantidad,caracteristicas,codigo_insumo,codigo_presentacion,unidad_medida,nombre, renglon, distribucion) VALUES (?,?,?,?,?,?,?,?,?,?)";
$q1 = $pdo->prepare($sql1);			
$q1->execute(array($id,$destino,$cantidad,$caracteristica,$motivo2,$presentacion,$cantidad1,$nombre, $renglon,$c ));

Database::disconnect();

echo 'Solicitud Generada';
 
 ?>
