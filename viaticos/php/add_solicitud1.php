<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$fecha = $_POST['fecha'];     // sin formato
$date1 = date('Y-m-d', strtotime($fecha));
$fecha2 = $_POST['fecha2'];
$date2 = date('Y-m-d', strtotime($fecha2));
$objetivos = $_POST['objetivo'];
$especificacion = $_POST['especificacion'];
$departamento = $_POST['dep'];      // dep_f1
$lugares = $_POST['lugar'];
$year1 = (int)$_POST['year'];       // año del sistema que quieres usar
$status = "1";

$id = $_POST['id'];
$persona = User::get_empleado_datos_id($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $pdo->beginTransaction();

    // 1) Traer datos del depto
    $sql1 = "SELECT dep_encargado, dep FROM vp_deptos WHERE dep_id=?";
    $p1 = $pdo->prepare($sql1);
    $p1->execute([$persona['dep_id']]);
    $per_rol = $p1->fetch(PDO::FETCH_ASSOC);
    $enc  = $per_rol['dep_encargado']; // autoriza
    $dep1 = $per_rol['dep'];

    // 2) Calcular correlativo POR AÑO y POR DEPTO (bloqueando filas relevantes)
    //    Usamos el año contra YEAR(fecha_inicio) para reiniciar cada año:
    $sql2 = "SELECT COALESCE(MAX(contador), 0) + 1 AS con
             FROM vs_nombramiento
             WHERE dep_f1 = :dep AND YEAR(fecha_inicio) = :anio
             FOR UPDATE";
    $p2 = $pdo->prepare($sql2);
    $p2->execute([
        ':dep'  => $persona['dep_id'],
        ':anio' => $year1
    ]);
    $con1 = (int)$p2->fetchColumn();  // si no hay registros en ese año → 1

    // 3) Construir código
    $codigo5 = $dep1 . $con1 . "-" . $year1;

    // 4) Insert
    $sql = "INSERT INTO vs_nombramiento
            (cod_nombramiento,id_funcionario,id_funcionario2,fecha_inicio,fecha_fin,lugar,objetivo,contador,dep_f1,status)
            VALUES (?,?,?,?,?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute([$codigo5, $id, $enc, $date1, $date2, $lugares, $objetivos, $con1, $departamento, $status]);

    $Id = $pdo->lastInsertId();
    $pdo->commit();
    Database::disconnect();

    echo $Id;
} catch (PDOException $e) {
    $pdo->rollBack();
    Database::disconnect();
    throw $e;
}
