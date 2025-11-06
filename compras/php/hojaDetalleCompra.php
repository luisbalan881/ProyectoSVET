<?php
include_once '../../inc/functions.php';
require_once '../../inc/Database.php';
require_once 'get_solicitudes.php';

$id=$_POST['solicitud'];

$solicitud = get_solicitud_by_id($id);
$solicitud_detalle = get_solicitud_by_id2($id);
//$solicitud1 = get_solicitud_by_id_solicitante($id);
//$solicitud2 = get_solicitud_by_id_encargado($id);
//$solicitud3 = get_solicitud_by_id_total($id);  // esto menos
//$solicitud4 = get_solicitud_by_id_descripcion($id);//
//$solicitud5 = get_solicitud_by_id_descripcion($id);//
//$solicitud6 = get_solicitud_by_id_dia($id);
//$solicitud7 = get_formulario($id);


$solicitud_compra = get_solicitud_by_id_descripcion3($id); // esto total_liq


$complemento = get_complemento($id);
//$solicitud9 = get_solicitud_by_id_total_liquidacion($id);  // lo solicitado
//$liquidado = get_liquidados($id);
$tipod='Minutos';
if($solicitud['TIPO_D']==1)
{
  $tipod='Hora(s)';
}
else if($solicitud['TIPO_D']==2){
  $tipod='Dia(s)';
}

$a = get_vehiculo_by_id($id);

$b = get_nombre_conductor($a['conductor_id']);
$c = get_nombre_vehiculo($a['vehiculo_id']);


$des='';
$mot='';
$ve='';
$pi='';
$n2=30;
if($solicitud['DESTINO']!=''){
  $des=$solicitud['DESTINO'];
  $mot=$solicitud['MOTIVO'];
  $ve=$b['VEHICULO'];
  $pi=$c['NOMBRE'];
}

// detalle compra1

$detalle1='';
$detalle2='';
$detalle3='';
$detalle4='';
$detalle5='';
$detalle6='';
$detalle7='';
$detalle8='';
$c='';
$array=array();
//$id2 = 921;
$det = get_solicitud_by_id_detalle1($id);
foreach ($det as $c)
{
  if($c['clasificacion_compra']!=''){
              
    $detalle1 =$c['1'];  
    $detalle2 =$c['2']; 
    $detalle3 =$c['3'];
    $detalle4 =$c['4'];
    $detalle5 =$c['5'];
    $detalle6 =$c['6'];
    $detalle7 =$c['7'];
    $detalle8 =$c['8'];
     
  } 
 
}

////////////////////
// detalle compra2

$detalle11='';
$detalle21='';
$detalle31='';
$detalle41='';
$detalle51='';
$detalle61='';
$detalle71='';
$detalle81='';
$c1='';
//$array=array();
//$id2 = 921;
$det1 = get_solicitud_by_id_detalle2($id);
foreach ($det1 as $c1)
{
  if($c1['clasificacion_compra']!=''){
              
    $detalle11 =$c1['1'];  
    $detalle21 =$c1['2']; 
    $detalle31 =$c1['3'];
    $detalle41 =$c1['4'];
    $detalle51 =$c1['5'];
    $detalle61 =$c1['6'];
    $detalle71 =$c1['7'];
    $detalle81 =$c1['8'];
     
  } 
 
}

////////////////////

// detalle compra3

$detalle13='';
$detalle23='';
$detalle33='';
$detalle43='';
$detalle53='';
$detalle63='';
$detalle73='';
$detalle83='';
$c3='';
//$array=array();
//$id2 = 921;
$det3 = get_solicitud_by_id_detalle3($id);
foreach ($det3 as $c3)
{
  if($c3['clasificacion_compra']!=''){
              
    $detalle13 =$c3['1'];  
    $detalle23 =$c3['2']; 
    $detalle33 =$c3['3'];
    $detalle43 =$c3['4'];
    $detalle53 =$c3['5'];
    $detalle63 =$c3['6'];
    $detalle73 =$c3['7'];
    $detalle83 =$c3['8'];
     
  } 
 
}

////////////////////
// detalle compra4

$detalle14='';
$detalle24='';
$detalle34='';
$detalle44='';
$detalle54='';
$detalle64='';
$detalle74='';
$detalle84='';
$c4='';
//$array=array();
//$id2 = 921;
$det4 = get_solicitud_by_id_detalle4($id);
foreach ($det4 as $c4)
{
  if($c4['clasificacion_compra']!=''){
              
    $detalle14 =$c4['1'];  
    $detalle24 =$c4['2']; 
    $detalle34 =$c4['3'];
    $detalle44 =$c4['4'];
    $detalle54 =$c4['5'];
    $detalle64 =$c4['6'];
    $detalle74 =$c4['7'];
    $detalle84 =$c4['8'];
     
  } 
 
}
///////////////////8
// detalle compra5

$detalle15='';
$detalle25='';
$detalle35='';
$detalle45='';
$detalle55='';
$detalle65='';
$detalle75='';
$detalle85='';
$c5='';
//$array=array();
//$id2 = 921;
$det5 = get_solicitud_by_id_detalle5($id);
foreach ($det5 as $c5)
{
  if($c5['clasificacion_compra']!=''){
              
    $detalle15 =$c5['1'];  
    $detalle25 =$c5['2']; 
    $detalle35 =$c5['3'];
    $detalle45 =$c5['4'];
    $detalle55 =$c5['5'];
    $detalle65 =$c5['6'];
    $detalle75 =$c5['7'];
    $detalle85 =$c5['8'];
     
  } 
 
}

////////////////////
// detalle compra6

$detalle16='';
$detalle26='';
$detalle36='';
$detalle46='';
$detalle56='';
$detalle66='';
$detalle76='';
$detalle86='';
$c6='';
//$array=array();
//$id2 = 921;
$det6 = get_solicitud_by_id_detalle6($id);
foreach ($det6 as $c6)
{
  if($c6['clasificacion_compra']!=''){
              
    $detalle16 =$c6['1'];  
    $detalle26 =$c6['2']; 
    $detalle36 =$c6['3'];
    $detalle46 =$c6['4'];
    $detalle56 =$c6['5'];
    $detalle66 =$c6['6'];
    $detalle76 =$c6['7'];
    $detalle86 =$c6['8'];
     
  } 
 
}

////////////////////

// detalle compra7

$detalle17='';
$detalle27='';
$detalle37='';
$detalle47='';
$detalle57='';
$detalle67='';
$detalle77='';
$detalle87='';
$c7='';
//$array=array();
//$id2 = 921;
$det7 = get_solicitud_by_id_detalle7($id);
foreach ($det7 as $c7)
{
  if($c7['clasificacion_compra']!=''){
              
    $detalle17 =$c7['1'];  
    $detalle27 =$c7['2']; 
    $detalle37 =$c7['3'];
    $detalle47 =$c7['4'];
    $detalle57 =$c7['5'];
    $detalle67 =$c7['6'];
    $detalle77 =$c7['7'];
    $detalle87 =$c7['8'];
     
  } 
 
}

////////////////////
// detalle compra8

$detalle18='';
$detalle28='';
$detalle38='';
$detalle48='';
$detalle58='';
$detalle68='';
$detalle78='';
$detalle88='';
$c8='';
//$array=array();
//$id2 = 921;
$det8 = get_solicitud_by_id_detalle8($id);
foreach ($det8 as $c8)
{
  if($c8['clasificacion_compra']!=''){
              
    $detalle18 =$c8['1'];  
    $detalle28 =$c8['2']; 
    $detalle38 =$c8['3'];
    $detalle48 =$c8['4'];
    $detalle58 =$c8['5'];
    $detalle68 =$c8['6'];
    $detalle78 =$c8['7'];
    $detalle88 =$c8['8'];
     
  } 
 
}

////////////////////end 8
/*
$detalle31='';
$detalle33='';
$detalle333='';
$detalle3333='';
$c3='';

$det3 = get_solicitud_by_id34($id);
foreach ($det3 as $c3)
{
  //if($c3['clasificacion_compra']!=''){

    //$array[]='Destino : '.$c['destino'].',   detalle1 : '.$c['motivo'].'/';
    //$detalle1 = $array;                   
    $detalle31 =$c3['1'].'                 '.$c3['2'].'          '.$c3['3'].'                   '.$c3['4'];  
    
    $detalle33 =$c3['5'];
     $detalle333 =$c3['6'];
     $detalle3333 =$c3['7'].'            '.$c3['8'];
     
  
    
  
}*/




$return_arr = array(
                  //  'correlativo'=>$solicitud1['cod_nombramiento'],
                   // 'departamentos'=>$solicitud1['dep_nm'],
                 //  'caracteristicas'=>$solicitud_detalle['caracteristicas'], //vp_user.partida_presupuestaria
                   // 'partida'=>$solicitud1['partida_presupuestaria'],
                 //   'fecha'=>fecha_dmy($solicitud1['fecha_inicio']),
                //    'fecha2'=>fecha_dmy($solicitud1['fecha_fin']),
                 //   'fecha1'=>fecha_dmy($solicitud1['fecha']),  //vp_user.sueldo_total

                    //'salida'=>$solicitud['SALIDA'],
                    //'duracion'=>$solicitud['DURACION'],
                     //'lugar1'=>$solicitud1['lugar'],
                    //'tipo_duracion'=>$tipod,
                   // 'Total'=>$solicitud3['total'], 
					// 'Totalsolicitado'=>$solicitud9['totalSolicitado'], 
                 //   'Total2'=>$solicitud6['totald'], 
                   // 'id1'=>$solicitud7['id_viatico'], //
                   // 'autorizado'=>$solicitud2['encargado'],
                 //   'solicitante'	=>$solicitud['NOMBRE'],
                    // 'autorizado2'=>$solicitud1['nombre'],
                      // 'puesto'=>$solicitud1['user_puesto'],
                     //   'nit'=>$solicitud1['user_nit'],
                      // 'puesto2'=>$solicitud2['user_puesto'],
                        // 'desa'=>$solicitud_compra['solicitante'],//almu
                        
 //echo '<td class="text-center">'.date('d-m-Y', strtotime($s['fecha_creacion'])).'</td>';                        
                        
                        
                         'id_soli'=>$solicitud_compra['id_solicitud_compra'],
                         'departamento'=>$solicitud_compra['dep_nm'],
                          'clasificacion'=>$solicitud_compra['clasificacion'],//almu
                         'observaciones'=>$solicitud_compra['observaciones'],
                         'correlativo'=>$solicitud_compra['correlativo'],
                            'status'=>$solicitud_compra['estado_solicitud'],
                         
                      //   'tgas'=>$solicitud_compra['estado_solicitud'],
                        // 'complemento'=>$complemento['total'],
                       //'desayuno'=>$liquidado['tdesayunos'],
                      // 'resu'=>$res,
                   // 'solicitante2'=>$sol doc.setFontType("normal");icitud1['user_ap1'],
                                     
                    'caracteristicas1'=>$detalle1,
                    'caracteristicas2'=>$detalle2,
                    'caracteristicas3'=>$detalle3,
                    'caracteristicas4'=>$detalle4,
                    'caracteristicas5'=>$detalle5,
                    'caracteristicas6'=>$detalle6,
                    'caracteristicas7'=>$detalle7,
                    'caracteristicas8'=>$detalle8,
                      //detalle2
                      
                    'caracteristicas11'=>$detalle11,
                    'caracteristicas21'=>$detalle21,
                    'caracteristicas31'=>$detalle31,
                    'caracteristicas41'=>$detalle41,
                    'caracteristicas51'=>$detalle51,
                    'caracteristicas61'=>$detalle61,
                    'caracteristicas71'=>$detalle71,
                    'caracteristicas81'=>$detalle81,
                    //detalle3
                    'caracteristicas13'=>$detalle13,
                    'caracteristicas23'=>$detalle23,
                    'caracteristicas33'=>$detalle33,
                    'caracteristicas43'=>$detalle43,
                    'caracteristicas53'=>$detalle53,
                    'caracteristicas63'=>$detalle63,
                    'caracteristicas73'=>$detalle73,
                    'caracteristicas83'=>$detalle83,
                    //detalle4
                    'caracteristicas14'=>$detalle14,
                    'caracteristicas24'=>$detalle24,
                    'caracteristicas34'=>$detalle34,
                    'caracteristicas44'=>$detalle44,
                    'caracteristicas54'=>$detalle54,
                    'caracteristicas64'=>$detalle64,
                    'caracteristicas74'=>$detalle74,
                    'caracteristicas84'=>$detalle84,
                    ///detalle5
                    
                    
                    'caracteristicas15'=>$detalle15,
                    'caracteristicas25'=>$detalle25,
                    'caracteristicas35'=>$detalle35,
                    'caracteristicas45'=>$detalle45,
                    'caracteristicas55'=>$detalle55,
                    'caracteristicas65'=>$detalle65,
                    'caracteristicas75'=>$detalle75,
                    'caracteristicas85'=>$detalle85,
               
                    //detalle6                  
                    
                    'caracteristicas16'=>$detalle16,
                    'caracteristicas26'=>$detalle26,
                    'caracteristicas36'=>$detalle36,
                    'caracteristicas46'=>$detalle46,
                    'caracteristicas56'=>$detalle56,
                    'caracteristicas66'=>$detalle66,
                    'caracteristicas76'=>$detalle76,
                    'caracteristicas86'=>$detalle86,
                    //detalle7
                     'caracteristicas17'=>$detalle17,
                    'caracteristicas27'=>$detalle27,
                    'caracteristicas37'=>$detalle37,
                    'caracteristicas47'=>$detalle47,
                    'caracteristicas57'=>$detalle57,
                    'caracteristicas67'=>$detalle67,
                    'caracteristicas77'=>$detalle77,
                    'caracteristicas87'=>$detalle87,
                    //detalle8
                     'caracteristicas18'=>$detalle18,
                    'caracteristicas28'=>$detalle28,
                    'caracteristicas38'=>$detalle38,
                    'caracteristicas48'=>$detalle48,
                    'caracteristicas58'=>$detalle58,
                    'caracteristicas68'=>$detalle68,
                    'caracteristicas78'=>$detalle78,
                    'caracteristicas88'=>$detalle88,

                    //
						 // 'caracteristicas31'=>$detalle31,
                    //'caracteristicas32'=>$detalle33,
                    //'caracteristicas33'=>$detalle333,
                    //'caracteristicas34'=>$detalle3333,                    
                    
                    
                    // 'caracteristicas5'=>$detalle22,
                    // 'destino2'=>$det,
                    //'destino'=>$solicitud1['objetivo'],
                   // 'obj'=>$solicitud1['objetivo'],
                    // 'descripcion2'=>$solicitud5['descripcion'],
                    // 'fecha'=>$solicitud_compra['fecha_creacion'],
                    //  'fechaf'=>fecha_dmy($solicitud7['fecha_liquidacion']),
                  //  'motivo'=>$mot,
                  //  'piloto'=>$pi,
                   // 'vehiculo'=>$ve,
                    'fecha'=>date('d-m-Y', strtotime($solicitud_compra['fecha_creacion']))
                  );

echo json_encode($return_arr);

?>

