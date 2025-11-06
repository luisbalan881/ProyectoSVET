<?php
	

	require_once '../../inc/functions.php';
	//require ('../conexion.php');
	
	$id_departamento = $_POST['id_departamento'];
	
	$queryM = "SELECT id_municipio, nombre FROM tb_municipios WHERE id_departamento = 'id_departamento' ORDER BY nombre ";  //SELECT id_municipio, nombre FROM tb_municipios WHERE id_departamento = '5' ORDER BY nombre


	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_municipio']."'>".$rowM['nombre']."</option>";
	}
	
	echo $html;
?>		