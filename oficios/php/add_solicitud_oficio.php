<?php
require_once '../../inc/functions.php';
require_once '../../inc/User.php';

$objetivos = $_POST['objetivo1'];  /// Asunto
$lugar = $_POST['lugar']; //lugar destinos
$dep = $_POST['especificacion'];  // departamento o direccion
$year1 = $_POST['year'];  // A;o del sistema


$id = $_POST['id'];   // persona peticion 
$persona = User::get_empleado_datos_id($id);

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try {
    $pdo->beginTransaction();

    // 1) Traer datos del depto
    $sql1 = "SELECT dep_encargado, dep from vp_deptos WHERE dep_id=?";
    $p1 = $pdo->prepare($sql1);
    $p1->execute(array($dep));
    $per_rol = $p1->fetch(PDO::FETCH_ASSOC);
    $enc = $per_rol['dep_encargado']; //perosona autoriza
    $dep1 = $per_rol['dep'];


    $sql2 = "SELECT COALESCE(MAX(contador), 0) + 1 AS con 
        FROM ds_oficios 
        WHERE id_dep= :dep AND YEAR(fecha_creaacion) = :anio
        FOR UPDATE";  //ds_oficios
    $p2 = $pdo->prepare($sql2);
    $p2->execute([
        ':dep'  => $dep,
        ':anio' => $year1
    ]);
    $con1 = (int)$p2->fetchColumn();  // si no hay registros en ese año → 1 

    $codigo = "OFICIO-" . $dep1 . $con1 . "-" . $year1;

    $sql = "INSERT INTO ds_oficios (institucion_destino,asunto,contador,id_dep,id_user, estatus,no_ofi) VALUES (?,?,?,?,?,?,?)";

    $q = $pdo->prepare($sql);
    $q->execute([$lugar, $objetivos, $con1, $dep, $id, 1, $codigo]);
    $Id = $pdo->lastInsertId();
    $pdo->commit();
    Database::disconnect();

    echo $Id;
} catch (Exception $e) {
    $pdo->rollBack();
    Database::disconnect();
    throw $e;
}
