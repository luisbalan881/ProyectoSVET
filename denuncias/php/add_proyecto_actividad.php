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
$departamneto=$_POST['dep'];  // vehiculo_id  depa
$depa=$_POST['depa'];
$descripcion=$_POST['descripcion'];  // descripcion participantes
$dir=$_POST['dir'];  // direccion participantes
//$participantes=$_POST['participantes'];
$material=$_POST['material'];
$status="1";
$status2="2";  // nota para validar que ya hayan registrado km final
$participacion=$_POST['participacion'];
$participacion2=$_FILES['arch_recibido']['name'];
$hora=$_POST['tiempo'];
$id=$_POST['id'];   // persona peticion 


$arch_recibido = sanear_string($participacion2);

// atrapar archivo
/*
date_default_timezone_set('America/Guatemala');
$date = date('Ymd H.i.s',time());
$ext = strtolower(pathinfo($_FILES['arch_recibido']['name'],PATHINFO_EXTENSION));
$allowed = array('pdf');
$arch_recibido = $date.' - RECIBIDO '.substr(strtolower($_FILES['arch_recibido']['name']),-120); //renombrar archivo RECIBIDO
$arch_recibido = sanear_string($arch_recibido);
$dirname = $dirname.'/recibido';
*/
//

//$fichero = $_FILES["arch_recibido"];

//$fichero = $_FILES["file"]["name"];

// Cargando el fichero en la carpeta "subidas"
//$arch_recibido = $_FILES['arch_recibido']['name'];

//$arch_recibido = $date.' - RECIBIDO '.substr(strtolower($_FILES['arch_recibido']['name']),-120); //renombrar archivo RECIBIDO

// Cargando el fichero en la carpeta "subidas"
//$arch_recibido = "subidas/".$fichero["name"]);
//$arch_recibido = ($fichero["tmp_name"], "subidas/".$fichero["name"]);
$persona = User::get_empleado_datos_id($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ultimo registro id de bitacora de vehiculo



   
   // echo "Variable definida!!!";
	
    

//insertar a tabla
$sql = "INSERT INTO  tb_actividad (nombre, descripcion,lugar, status,id_proyecto,hora,personal,autoridad,material,fecha_inicio,fecha_fin,id_departamento,id_usuario) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

//INSERT INTO  tb_proyecto (nombre, descripcion) VALUES ("a1", "jf")  $participacion

$q = $pdo->prepare($sql);
$q->execute(array($nombre,$descripcion,$dir,$status,$departamneto,$hora,$arch_recibido,$participacion,$material,$date1,$date2,$depa,$id));
$Id = $pdo->lastInsertId();
Database::disconnect();
echo $Id;

		{
		echo "Variable NO definida!!!";
		}
    
 ?>
