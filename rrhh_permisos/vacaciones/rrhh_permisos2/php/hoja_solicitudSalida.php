<?php
include_once '../../inc/functions.php';
require_once '../../inc/Database.php';
require_once 'get_solicitudes.php';

$id=$_POST['solicitud'];

$solicitud = get_solicitud_by_id($id);
$solicitud1 = get_solicitud_by_id_solicitante2($id);


$return_arr = array(
                    'correlativo'=>$solicitud1['id_solicitud'],
                    'puesto'=>$solicitud1['user_puesto'],
					'dias'=>$solicitud1['dias_solicitado'],
					'hora1'=>$solicitud1['hora_inicio'], 
					'hora2'=>$solicitud1['hora_fin'], 
					//'dias_pendientes'=>$solicitud1['dias_pendientes'],
				//	'd1'=>$solicitud1['d1'],
                    'fecha'=>fecha_dmy($solicitud1['fecha_inicio']),
                    //'fecha2'=>fecha_dmy($solicitud1['fecha_final']),
					//'fecha3'=>fecha_dmy($solicitud1['fecha_retorno']),
                    'fecha1'=>fecha_dmy($solicitud1['fecha_creacion']),//dias_consumidos
					 //'fecha3'=>fecha_dmy($solicitud1['fecha_inicial']),
                    //'fecha4'=>fecha_dmy($solicitud1['fecha_final_periodo']),//dias_consumidos
                    //'fecha_liq'=>fecha_dmy($solicitud1['fecha_liquidacion']),
                    
                     'autorizado2'=>$solicitud1['nombre'],
                    'just'=>$solicitud1['justificacion'],
				    'obs'=>$solicitud1['obs'],
					  'diaCompleto'=>$solicitud1['dia_completo'],
					    'tipoTiempo'=>$solicitud1['tipo_tiempo'],

					//  'just'=>$solicitud1['justificacion_ampliacion'],
                     'fecha_creacion'=>date('d-m-Y H:m:s', strtotime($solicitud1['fecha_creacion']))
                  );

echo json_encode($return_arr);

?>

