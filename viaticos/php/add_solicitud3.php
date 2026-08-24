<?php

require_once '../../inc/Database.php';
require_once '../funciones_viaticos.php';

//$status=3;
$id=$_POST['codigo'];
$t1=$_POST['total'];
$t2=$_POST['total2'];
$t3=$_POST['total3'];
$t4=$_POST['total4'];
$objetivos=$_POST['objetivo'];
$actividades=$_POST['actividades'];
$logros=$_POST['logros'];
$jefeACargo = isset($_POST['jefe_a_cargo']) ? trim($_POST['jefe_a_cargo']) : '';

$plazoLiquidacion = viaticos_liquidacion_plazo_por_nombramiento($id);
if (!$plazoLiquidacion['allowed']) {
    echo 'ERROR:' . $plazoLiquidacion['message'];
    exit;
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql1 = "UPDATE vs_nombramiento SET  tdesayunos =?, talmuerzos=?, tcenas=?, thospedaje=?, actividades=? , logros=?,  objetivod=?";
$params = array($t1,$t2,$t3,$t4,$actividades,$logros,$objetivos);

if ($jefeACargo !== '' && ctype_digit($jefeACargo)) {
    $sql1 .= ", id_funcionario2=?";
    $params[] = (int) $jefeACargo;
}

$sql1 .= " WHERE id_nombramiento=?";
$params[] = $id;
$q1 = $pdo->prepare($sql1);
$q1->execute($params);
Database::disconnect();

echo 'Updated successfully.';
 ?>
