<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$nombre=$_POST['nombre'];  // lugares
//$fecha1=$_POST['fecha'];

$fecha1=$_POST['fecha1'];// esta atrapando fecha sin formato soli_fecha
$date1 = date('Y-m-d', strtotime($fecha1));   // fecha inicio
$fecha2=$_POST['fecha2'];// esta atrapando fecha sin formato soli_fecha
$date2 = date('Y-m-d', strtotime($fecha2));   // fecha fin





//$fecha1 = date('Y-m-d', strtotime($fecha1));   // fecha inicioçç
$departamneto=$_POST['dep'];  // vehiculo_id
$descripcion=$_POST['descripcion'];  // A;o del sistema
$status="1";
$status2="2";  // nota para validar que ya hayan registrado km final
$id=$_POST['id'];   // persona peticion 
$persona = User::get_empleado_datos_id($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ultimo registro id de bitacora de vehiculo



   
   // echo "Variable definida!!!";
	
    

//insertar a tabla
$sql = "INSERT INTO  tb_proyecto (nombre, descripcion, fecha_inicio,fecha_fin ,status,dep_id, id_user) VALUES (?,?,?,?,?,?,?)";

//INSERT INTO  tb_proyecto (nombre, descripcion) VALUES ("a1", "jf")

$q = $pdo->prepare($sql);
$q->execute(array($nombre,$descripcion,$date1,$date2,$status,$departamneto,$id));
$Id = $pdo->lastInsertId();
Database::disconnect();
echo $Id;

		{
		echo "Variable NO definida!!!";
		header("Location: index.php?ref=_53");
		}
    
 ?>
