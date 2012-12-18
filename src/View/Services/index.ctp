<?php
    $datos = array();
    foreach ($services as $service) {
        $service['Service']['is_saved']=true;
        array_push($datos,$service['Service']);
    }
    $respuesta = array(
        'success' => true,
        'total' => count($datos),
        'data' => $datos
    );
    echo json_encode($respuesta);
?>