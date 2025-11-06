<?php
/*require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$fecha=$_POST['fecha'];// esta atrapando fecha sin formato soli_fecha
$date1 = date('Y-m-d', strtotime($fecha));   
$duracion1=$_POST['duracion1'];  //   dias_consumidos_user
$hora1=$_POST['hora1'];//hora1
$hora2=$_POST['hora2'];//hora2 tiempo
$just=$_POST['justifiacion'];  
$obs=$_POST['obs'];

$status=2;
$id2=$_POST['id2'];   // persona peticion 


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$sql = "UPDATE rrhh_solicitud_salida SET fecha=?, justificacion=?,hora_inicio=?, Hora_fin=?,obs=? WHERE id_solicitud_salida=?"
$sql = "UPDATE rrhh_solicitud_salida SET obs=?, justificacion=? WHERE id_solicitud_salida=?"
$q = $pdo->prepare($sql);
$q->execute(array($obs,$just,$id2));
Database::disconnect();



echo $Id2;
*/


require_once '../../inc/functions.php';
require_once '../../inc/User.php';


$fecha=$_POST['fecha'];//  fecha sin formato soli_fecha
$date1 = date('Y-m-d', strtotime($fecha)); 
$duracion1=$_POST['duracion1'];  //   dias_consumidos_user
$hora1=$_POST['hora1'];//hora1
$hora2=$_POST['hora2'];//hora2 tiempo
$tv=$_POST['tiempo'];//tiempo en:
$tipo=$_POST['tcompleto'];// tipo
  
$just=$_POST['justifiacion'];  
$obs=$_POST['obs'];
$id=$_POST['id2'];   //id  ,


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql1 = "UPDATE  rrhh_solicitud_salida SET  fecha=?, hora_inicio=?, Hora_fin=?,duracion=?, justificacion=?, obs=?, tipo_tiempo=?, tiempo_completo=? WHERE id_solicitud_salida=?";  
$q1 = $pdo->prepare($sql1);
$q1->execute(array($date1,$hora1,$hora2,$duracion1,$just,$obs,$tv,$tipo,$id));
Database::disconnect();



//echo $Id;
 



 ?>
