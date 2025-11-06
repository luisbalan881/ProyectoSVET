<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';
require_once '../../inc/Database.php';
echo "hollalallala";


$fecha=$_POST['fecha'];// esta atrapando fecha sin formato soli_fecha
$date1 = date('Y-m-d', strtotime($fecha));   // fecha inicio
$fecha2=$_POST['fecha2'];// esta atrapando fecha sin formato soli_fecha
$date2 = date('Y-m-d', strtotime($fecha2));   // fecha fin
$objetivos=$_POST['objetivo'];  /// ya no usar
//$duracion=$_POST['duracion'];  // duracion
$especificacion=$_POST['especificacion'];  // tiempo en 
$departamento=$_POST['dep'];  // cod nombramiento
$lugares=$_POST['lugar'];  // lugares
$year1=$_POST['year'];  // A;o del sistema
$status="1";

$periodo1=$_POST['periodo'];

$id=$_POST['id'];   // persona peticion 
$persona = User::get_empleado_datos_id($id);

$persona2 = 999;

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql1= "SELECT * FROM `rrhh_periodo_usuario` where año=? ";
$p1 = $pdo->prepare($sql1);
$p1->execute(array($periodo1));
$per_rol = $p1->fetch(PDO::FETCH_ASSOC);


  foreach ($per_rol as $dept):
   // if ($dept['status'] == 1){
    echo '<option value="'.$dept["id_periodo_user"].'">'.$dept["dias_consumidos"]."--dias gozados del año-".$dept["año"].'</option>';
	   
											  // echo $dept["dias_consumidos"];
											   
                     //  }
                                  endforeach



 /* $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1");
  while($consulta = mysqli_fetch_array($resultados))
  {
    echo $consulta['nombre']."<br>";
  }*/

//echo $per_rol;
//$enc = $per_rol['dep_encargado']; //perosona autoriza
//$dep1 = $per_rol['dep'];



/*

$sql2= "SELECT id_periodo_user, no_dias from `rrhh_detalle_solicitud` where id_solicitud=?";
$p2 = $pdo->prepare($sql2);
$p2->execute(array($id));
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$id_periodo = $per_rol2['id_periodo_user']; // periodo a actual
$dia_ingresados = $per_rol2['no_dias']; // No dias a actual

*/

/*
$sql2= "SELECT MAX(contador)+1 AS con from vs_nombramiento where dep_f1=?";
$p2 = $pdo->prepare($sql2);
$p2->execute(array($persona['dep_id']));
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$con1 = $per_rol2['con']; //perosona autoriza

$codigo5=$dep1.$con1."-".$year1;

$sql = "INSERT INTO vs_nombramiento (cod_nombramiento,id_funcionario,id_funcionario2,fecha_inicio,fecha_fin,lugar,objetivo,contador,dep_f1,status) VALUES (?,?,?,?,?,?,?,?,?,?)";

$q = $pdo->prepare($sql);
$q->execute(array($codigo5,$id,$enc,$date1,$date2,$lugares,$objetivos,$con1,$departamento,$status));
$Id = $pdo->lastInsertId();
Database::disconnect();

echo $Id;





$sql2= "SELECT id_periodo_user, no_dias from `rrhh_detalle_solicitud` where id_solicitud=?";
$p2 = $pdo->prepare($sql2);
$p2->execute(array($id));
$per_rol2 = $p2->fetch(PDO::FETCH_ASSOC);
$id_periodo = $per_rol2['id_periodo_user']; // periodo a actual
$dia_ingresados = $per_rol2['no_dias']; // No dias a actual


$sql3= "SELECT dias_consumidos from `rrhh_periodo_usuario` where id_periodo_user=?";
$p3 = $pdo->prepare($sql3);
$p3->execute(array($id_periodo));
$per_rol3 = $p3->fetch(PDO::FETCH_ASSOC);
$dias_consumidos = $per_rol3['dias_consumidos']; // dias_cunsumidos_actuales

$dias_a_actualizar = ($dias_consumidos+$dia_ingresados);

$sql1 = "UPDATE rrhh_periodo_usuario SET dias_consumidos=?
        WHERE id_periodo_user=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($dias_a_actualizar,$id_periodo));

*/
 ?>
